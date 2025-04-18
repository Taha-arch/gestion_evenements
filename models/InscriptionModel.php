<?php
require_once __DIR__ . '/../config/Database.php';

class InscriptionModel {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Database())->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("
            SELECT 
                inscriptions.id,
                participants.nom AS participant_nom,
                participants.email,
                events.titre AS event_titre,
                inscriptions.date_inscription
            FROM inscriptions
            INNER JOIN participants ON inscriptions.participant_id = participants.id
            INNER JOIN events ON inscriptions.event_id = events.id
            ORDER BY inscriptions.date_inscription DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
