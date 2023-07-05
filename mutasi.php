<?php

$apiKey = 'Register ke https://cekmutasi.co.id';

// Periksa metode HTTP yang digunakan (POST atau GET)
$method = $_SERVER['REQUEST_METHOD'];

// Tentukan data berdasarkan metode yang digunakan
if ($method === 'POST') {
    $data = [
        'search' => [
            'date' => [
                'from' => $_POST['from_date'] . ' 00:00:00',
                'to'   => $_POST['to_date'] . ' 23:59:59',
            ],
            'service_code'   => $_POST['service_code'],
            'account_number' => $_POST['account_number'],
            'amount'         => $_POST['amount'],
        ],
    ];
} elseif ($method === 'GET') {
    $data = [
        'search' => [
            'date' => [
                'from' => $_GET['from_date'] . ' 00:00:00',
                'to'   => $_GET['to_date'] . ' 23:59:59',
            ],
            'service_code'   => $_GET['service_code'],
            'account_number' => $_GET['account_number'],
            'amount'         => $_GET['amount'],
        ],
    ];
} else {
    die('Metode HTTP tidak valid.');
}

// Convert data to JSON
$jsonData = json_encode($data);

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => 'https://api.cekmutasi.co.id/v1/bank/search',
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $jsonData,
    CURLOPT_HTTPHEADER     => ['Api-Key: ' . $apiKey, 'Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
    CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,
]);

$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>
