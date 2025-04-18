<?php
require_once __DIR__ . '/../models/EventModel.php';

class EventController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new EventModel();
    }

    public function createEvent($data) {
        $titre = trim($data['titre']);
        $date = $data['date_evenement'];
        $description = trim($data['description']);

        // Validate input
        if (empty($titre) || empty($date)) {
            return ["success" => false, "message" => "Tous les champs obligatoires doivent être remplis."];
        }

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return ["success" => false, "message" => "Format de date invalide (YYYY-MM-DD attendu)."];
        }

        try {
            $this->eventModel->createEvent($titre, $date, $description);
            return ["success" => true, "message" => "Événement créé avec succès."];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Erreur lors de la création de l'événement."];
        }
    }

    public function getAllEvents() {
        return $this->eventModel->getAllEvents();
    }

    public function getEventById($id) {
        return $this->eventModel->getEventById($id);
    }

    public function updateEvent($id, $data) {
        $titre = trim($data['titre']);
        $date = $data['date_evenement'];
        $description = trim($data['description']);

        if (empty($titre) || empty($date)) {
            return ["success" => false, "message" => "Tous les champs obligatoires doivent être remplis."];
        }

        try {
            $this->eventModel->updateEvent($id, $titre, $date, $description);
            return ["success" => true, "message" => "Événement modifié avec succès."];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Erreur lors de la modification de l'événement."];
        }
    }

    public function deleteEvent($id) {
        try {
            $this->eventModel->deleteEvent($id);
            return ["success" => true, "message" => "Événement supprimé avec succès."];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Erreur lors de la suppression de l'événement."];
        }
    }
}
?>
