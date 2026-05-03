<?php
$directory = 'gallery/';
$images = [];

if (is_dir($directory)) {
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (in_array($extension, $allowed_extensions)) {
                $images[] = [
                    'url' => 'gallery/' . rawurlencode($file),
                    'alt' => htmlspecialchars(pathinfo($file, PATHINFO_FILENAME))
                ];
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($images);
?>