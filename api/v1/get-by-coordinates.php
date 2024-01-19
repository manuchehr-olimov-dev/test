<?php

header('Content-Type: application/json; charset=utf-8');

use controllers\LocationController;
require_once __DIR__ . '/../../controllers/LocationController.php';

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$location = new LocationController();

echo json_encode([
    "result" => $location->getByCoordinates($latitude, $longitude)
]);

