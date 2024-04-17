<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['title'])) {
        $title = urlencode($_GET['title']);
        $url = "https://www.googleapis.com/books/v1/volumes?q={$title}";

        $response = file_get_contents($url);
        if ($response === FALSE) {
            http_response_code(500);
            echo json_encode(array('error' => 'Internal Server Error'));
        } else {
            echo $response;
        }
    } else {
        http_response_code(400);
        echo json_encode(array('error' => 'Bad Request'));
    }
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
