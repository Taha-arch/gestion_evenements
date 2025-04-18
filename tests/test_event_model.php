<?php
require_once '../models/EventModel.php';

$model = new EventModel();

// Test create
$model->createEvent("Hackathon", "2025-05-01", "24-hour coding competition");

// Test fetch all
$events = $model->getAllEvents();
echo "<pre>";
print_r($events);
echo "</pre>";
?>
