<?php

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['url']) || !filter_var($data['url'], FILTER_VALIDATE_URL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid URL']);
    exit;
}

$original_url = $data['url'];
$short_code = substr(md5(uniqid()), 0, 8);

try {
    $stmt = $pdo->prepare('INSERT INTO urls (original_url, short_url) VALUES (?, ?)');
    $stmt->execute([$original_url, $short_code]);

    $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $short_url = "$host/urlShortner?code=$short_code";

    http_response_code(201);
    echo json_encode(['success' => true, 'short_url' => $short_url]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Internal server error']);
}
