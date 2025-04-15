import os
import re
from PIL import Image
import requests
from io import BytesIO
from bs4 import BeautifulSoup
import urllib.parse

def make_seo_friendly(filename):
    """Convert filename to SEO-friendly format."""
    name, ext = os.path.splitext(filename)
    name = re.sub(r'[^a-zA-Z0-9\s-]', '', name.lower())
    name = re.sub(r'\s+', '-', name)
    name = re.sub(r'-+', '-', name).strip('-')
    return f"{name}{ext}"

def download_image(url):
    """Download image from URL and return PIL Image object."""
    try:
        response = requests.get(url, timeout=10)
        response.raise_for_status()
        return Image.open(BytesIO(response.content))
    except Exception as e:
        print(f"Error downloading {url}: {e}")
        return None

def process_image(img_path, output_dir, input_dir, quality=80):
    """Compress and convert image to WebP."""
    try:
        # Check if image is a URL
        if img_path.startswith(('http://', 'https://')):
            img = download_image(img_path)
            if img is None:
                return None
            filename = os.path.basename(urllib.parse.urlparse(img_path).path)
        else:
            img_path = os.path.join(input_dir, img_path.lstrip('/\\'))
            if not os.path.exists(img_path):
                print(f"Image not found: {img_path}")
                return None
            img = Image.open(img_path)
            filename = os.path.basename(img_path)

        seo_filename = make_seo_friendly(os.path.splitext(filename)[0]) + '.webp'
        output_path = os.path.join(output_dir, seo_filename)

        if img.mode in ('RGBA', 'LA'):
            img = img.convert('RGB')

        img.save(output_path, 'WEBP', quality=quality)
        img.close()
        return seo_filename
    except Exception as e:
        print(f"Error processing {img_path}: {e}")
        return None

def process_html_file(html_path, input_dir, output_dir, new_img_dir):
    """Process HTML/PHP file to update image paths."""
    try:
        with open(html_path, 'r', encoding='utf-8') as file:
            content = file.read()

        # Preserve PHP code by splitting content
        php_blocks = []
        html_content = content
        php_pattern = r'(<\?php.*?!\?>|<\?php.*?\?>)'
        matches = re.finditer(php_pattern, content, re.DOTALL)
        for i, match in enumerate(matches):
            placeholder = f"__PHP_BLOCK_{i}__"
            php_blocks.append(match.group(0))
            html_content = html_content.replace(match.group(0), placeholder)

        # Parse HTML content with BeautifulSoup
        soup = BeautifulSoup(html_content, 'html.parser')

        images = soup.find_all('img')
        if not images:
            print(f"No images found in {html_path}")

        for img in images:
            src = img.get('src')
            if not src:
                print(f"Skipping image with no src in {html_path}")
                continue

            new_filename = process_image(src, new_img_dir, input_dir)
            if new_filename:
                img['src'] = os.path.join('optimized_images', new_filename)
                print(f"Updated image {src} to {img['src']} in {html_path}")

        # Convert soup back to string and restore PHP blocks
        output_content = str(soup)
        for i, php_block in enumerate(php_blocks):
            output_content = output_content.replace(f"__PHP_BLOCK_{i}__", php_block)

        # Save updated file
        output_html_path = os.path.join(output_dir, os.path.basename(html_path))
        with open(output_html_path, 'w', encoding='utf-8') as file:
            file.write(output_content)
        print(f"Processed {html_path} -> {output_html_path}")

    except Exception as e:
        print(f"Error processing {html_path}: {e}")

def main():
    input_dir = os.getcwd()
    output_dir = os.path.join(input_dir, 'output')
    new_img_dir = os.path.join(output_dir, 'optimized_images')

    os.makedirs(output_dir, exist_ok=True)
    os.makedirs(new_img_dir, exist_ok=True)

    for filename in os.listdir(input_dir):
        if filename.endswith(('.html', '.php')):
            html_path = os.path.join(input_dir, filename)
            print(f"Processing file: {html_path}")
            process_html_file(html_path, input_dir, output_dir, new_img_dir)

if __name__ == '__main__':
    main()