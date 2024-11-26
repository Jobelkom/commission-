<?php
header("Content-Type: application/json");

$promoCodes = [
    "CODE123" => ["commission" => 5000],
    "BONUS456" => ["commission" => 10000],
    "GAGNANT789" => ["commission" => 15000],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $code = $data['promoCode'];

    if (array_key_exists($code, $promoCodes)) {
        echo json_encode([
            "success" => true,
            "commission" => $promoCodes[$code]['commission']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Code promo non valide"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Méthode non autorisée"]);
}
