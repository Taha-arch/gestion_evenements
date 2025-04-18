<?php

require_once __DIR__ . '/../config/Database.php';

class ParticipantModel {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function insert($nom, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO participants (nom, email) VALUES (:nom, :email)");
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email
        ]);
        return $this->pdo->lastInsertId(); // Returns the ID of the newly inserted participant
    }

    public function registerToEvent($participantId, $eventId) {
        $stmt = $this->pdo->prepare("INSERT INTO inscriptions (participant_id, event_id, date_inscription) VALUES (:participant_id, :event_id, NOW())");
        $stmt->execute([
            ':participant_id' => $participantId,
            ':event_id' => $eventId
        ]);
    }

    public function getAllParticipants() {
        $stmt = $this->pdo->query("SELECT * FROM participants");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM participants WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
