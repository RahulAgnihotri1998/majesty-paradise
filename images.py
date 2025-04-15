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

def process_image(img_path, output_dir, quality=80):
    """Compress and convert image to WebP."""
    try:
        # Check if image is a URL
        if img_path.startswith(('http://', 'https://')):
            img = download_image(img_path)
            if img is None:
                return None
            # Use the filename from the URL
            filename = os.path.basename(urllib.parse.urlparse(img_path).path)
        else:
            img = Image.open(img_path)
            filename = os.path.basename(img_path)

        seo_filename = make_seo_friendly(os.path.splitext(filename)[0]) + '.webp'
        output_path = os.path.join(output_dir, seo_filename)

        # Convert to RGB if necessary
        if img.mode in ('RGBA', 'LA'):
            img = img.convert('RGB')

        # Save as WebP
        img.save(output_path, 'WEBP', quality=quality)
        img.close()
        return seo_filename
    except Exception as e:
        print(f"Error processing {img_path}: {e}")
        return None

def process_html_file(html_path, input_dir, output_dir, new_img_dir):
    """Process HTML/PHP file to update image paths."""
    with open(html_path, 'r', encoding='utf-8') as file:
        soup = BeautifulSoup(file, 'html.parser')

    images = soup.find_all('img')
    for img in images:
        src = img.get('src')
        if not src:
            continue

        # Handle both relative and absolute URLs
        if src.startswith(('http://', 'https://')):
            img_path = src
        else:
            img_path = os.path.join(input_dir, src.lstrip('/\\'))
        
        new_filename = process_image(img_path, new_img_dir)
        if new_filename:
            # Update img src to point to new WebP image
            img['src'] = os.path.join('optimized_images', new_filename)

    # Save updated HTML/PHP
    output_html_path = os.path.join(output_dir, os.path.basename(html_path))
    with open(output_html_path, 'w', encoding='utf-8') as file:
        file.write(str(soup))

def main():
    input_dir = 'input_html'
    output_dir = 'output_html'
    new_img_dir = os.path.join(output_dir, 'optimized_images')

    # Create output directories
    os.makedirs(output_dir, exist_ok=True)
    os.makedirs(new_img_dir, exist_ok=True)

    # Process each HTML and PHP file
    for filename in os.listdir(input_dir):
        if filename.endswith(('.html', '.php')):
            html_path = os.path.join(input_dir, filename)
            process_html_file(html_path, input_dir, output_dir, new_img_dir)

if __name__ == '__main__':
    main()