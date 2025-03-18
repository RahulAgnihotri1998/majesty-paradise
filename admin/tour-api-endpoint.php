<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adventure_tours";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

function getTour($conn, $id) {
    $sql = "SELECT * FROM tours WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $tour = $result->fetch_assoc();

    $sql = "SELECT * FROM slider_images WHERE tour_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $slider_images = [];
    while($row = $result->fetch_assoc()) {
        $slider_images[] = $row;
    }
    $tour['slider_images'] = $slider_images;

    return $tour;
}

function getAllTours($conn) {
    $sql = "SELECT * FROM tours";
    $result = $conn->query($sql);
    $tours = [];
    while($row = $result->fetch_assoc()) {
        $tours[] = $row;
    }
    return $tours;
}

function uploadImage($file) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}

function createTour($conn, $data, $image, $slider_images) {
    $image_url = uploadImage($image);
    $sql = "INSERT INTO tours (title, duration, persons, cost, note, image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidss", $data['title'], $data['duration'], $data['persons'], $data['cost'], $data['note'], $image_url);
    $stmt->execute();
    $tour_id = $stmt->insert_id;

    foreach ($slider_images as $slider_image) {
        $slider_image_url = uploadImage($slider_image);
        $sql = "INSERT INTO slider_images (tour_id, image_url) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $tour_id, $slider_image_url);
        $stmt->execute();
    }

    return ['status' => 'success', 'tour_id' => $tour_id];
}

function updateTour($conn, $id, $data, $image, $slider_images) {
    if ($image) {
        $image_url = uploadImage($image);
        $sql = "UPDATE tours SET title = ?, duration = ?, persons = ?, cost = ?, note = ?, image_url = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssidssi", $data['title'], $data['duration'], $data['persons'], $data['cost'], $data['note'], $image_url, $id);
    } else {
        $sql = "UPDATE tours SET title = ?, duration = ?, persons = ?, cost = ?, note = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssidsi", $data['title'], $data['duration'], $data['persons'], $data['cost'], $data['note'], $id);
    }
    $stmt->execute();

    if ($slider_images) {
        $sql = "DELETE FROM slider_images WHERE tour_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        foreach ($slider_images as $slider_image) {
            $slider_image_url = uploadImage($slider_image);
            $sql = "INSERT INTO slider_images (tour_id, image_url) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $id, $slider_image_url);
            $stmt->execute();
        }
    }

    return ['status' => 'success'];
}

function deleteTour($conn, $id) {
    $sql = "DELETE FROM tours WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $sql = "DELETE FROM slider_images WHERE tour_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return ['status' => 'success'];
}

switch ($method) {
    case 'GET':
        $id = $_GET['id'] ?? null;
        if ($id) {
            echo json_encode(getTour($conn, $id));
        } else {
            echo json_encode(getAllTours($conn));
        }
        break;
    case 'POST':
        $data = json_decode($_POST['data'], true);
        $image = $_FILES['image'];
        $slider_images = $_FILES['slider_images'];
        echo json_encode(createTour($conn, $data, $image, $slider_images));
        break;
    case 'PUT':
        $id = $request[0];
        parse_str(file_get_contents("php://input"), $put_vars);
        $data = json_decode($put_vars['data'], true);
        $image = $_FILES['image'] ?? null;
        $slider_images = $_FILES['slider_images'] ?? null;
        echo json_encode(updateTour($conn, $id, $data, $image, $slider_images));
        break;
    case 'DELETE':
        $id = $request[0];
        echo json_encode(deleteTour($conn, $id));
        break;
}

$conn->close();
?>