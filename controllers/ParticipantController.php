<?php
require_once __DIR__ . '/../models/ParticipantModel.php';

class ParticipantController {
    private $participantModel;

    // Constructor to initialize the model
    public function __construct() {
        $this->participantModel = new ParticipantModel();
    }

    // Registration function
    public function register($nom, $email, $eventId) {
        if (empty($nom) || empty($email) || empty($eventId)) {
            return "Tous les champs sont obligatoires.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email invalide.";
        }

        try {
            // Insert participant and register to event
            $participantId = $this->participantModel->insert($nom, $email);
            $this->participantModel->registerToEvent($participantId, $eventId);
            return "Inscription réussie !";
        } catch (Exception $e) {
            return "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
?>
