<?php
header('Content-Type: application/json; charset=utf-8');

use controllers\LocationController;
require_once __DIR__ . '/../../controllers/LocationController.php';

$address = $_POST['data'];

$location = new LocationController();

echo json_encode([
    "result" => $location->getByAddress($address)
]);

