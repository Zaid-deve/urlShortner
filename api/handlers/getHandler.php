<?php
$short_code = $_GET['code'] ?? null;

if (!$short_code) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Short code is required"]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT original_url FROM urls WHERE short_url = ?");
    $stmt->execute([$short_code]);

    if ($stmt->rowCount() > 0) {
        $url = $stmt->fetchColumn();
        http_response_code(302);
        header("Location: $url");
        exit;
    } else {
        http_response_code(302);
        header("Location: /urlShortner/error");
        // echo json_encode(["success" => false, "message" => "URL not found"]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Internal server error"]);
}
