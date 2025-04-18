<?php
require_once __DIR__ . '/../../controllers/InscriptionController.php';

$controller = new InscriptionController();
$inscriptions = $controller->getAllInscriptions();
?>

<?php include '../layout/header.php'; ?>

<style>
    :root {
        --primary: #7749F8;
        --primary-hover: #6438e4;
        --secondary: #6C757D;
        --success: #10B981;
        --info: #0DCAF0;
        --light: #F8F9FA;
        --dark: #212529;
        --background: #F5F7FF;
        --border-radius: 1rem;
        --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--background);
        color: var(--dark);
    }

    .header-section {
        background: linear-gradient(135deg, rgba(119, 73, 248, 0.9) 0%, rgba(91, 31, 255, 0.8) 100%);
        color: white;
        padding: 3rem 0;
        text-align: center;
        border-radius: 0 0 2rem 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .header-bubbles {
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 20px;
    }

    .bubble {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .bubble:nth-child(1) {
        width: 60px;
        height: 60px;
        left: 10%;
        bottom: 20px;
    }

    .bubble:nth-child(2) {
        width: 40px;
        height: 40px;
        left: 20%;
        bottom: 40px;
    }

    .bubble:nth-child(3) {
        width: 80px;
        height: 80px;
        left: 50%;
        bottom: 30px;
    }

    .bubble:nth-child(4) {
        width: 50px;
        height: 50px;
        left: 80%;
        bottom: 25px;
    }

    .page-title {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        font-weight: 300;
        opacity: 0.9;
        margin-bottom: 0;
    }

    .inscriptions-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 2rem;
        background-color: var(--light);
        border-bottom: 1px solid #e9ecef;
    }

    .card-title {
        font-weight: 600;
        margin-bottom: 0;
        display: flex;
        align-items: center;
    }

    .card-title-icon {
        margin-right: 0.75rem;
        color: var(--primary);
    }

    .inscription-count {
        background-color: var(--primary);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .card-actions {
        display: flex;
        gap: 0.75rem;
    }

    .action-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: white;
        border: 1px solid #dee2e6;
        color: var(--secondary);
        cursor: pointer;
        transition: var(--transition);
    }

    .action-button:hover {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .action-button-text {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        background-color: white;
        border: 1px solid #dee2e6;
        color: var(--secondary);
        cursor: pointer;
        transition: var(--transition);
        font-size: 0.85rem;
    }

    .action-button-text:hover {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .action-icon {
        margin-right: 0.5rem;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .inscriptions-table {
        width: 100%;
        border-collapse: collapse;
    }

    .inscriptions-table th, 
    .inscriptions-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
    }

    .inscriptions-table th {
        font-weight: 600;
        color: var(--secondary);
        background-color: #f8f9fa;
    }

    .inscriptions-table tbody tr {
        transition: var(--transition);
    }

    .inscriptions-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .inscriptions-table td:first-child {
        font-weight: 500;
        color: var(--primary);
    }

    .participant-info {
        display: flex;
        align-items: center;
    }

    .participant-avatar {
        width: 32px;
        height: 32px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0.75rem;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .event-badge {
        background-color: rgba(13, 202, 240, 0.1);
        color: var(--info);
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
    }

    .event-icon {
        margin-right: 0.5rem;
    }

    .date-badge {
        display: flex;
        align-items: center;
        color: var(--secondary);
        font-size: 0.9rem;
    }

    .date-icon {
        margin-right: 0.5rem;
        color: var(--secondary);
    }

    .empty-state {
        padding: 3rem;
        text-align: center;
    }

    .empty-icon {
        font-size: 3rem;
        color: #e9ecef;
        margin-bottom: 1rem;
    }

    .empty-text {
        color: var(--secondary);
        margin-bottom: 1.5rem;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 2rem;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .cta-button:hover {
        background-color: var(--primary-hover);
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(119, 73, 248, 0.3);
    }

    .cta-icon {
        margin-right: 0.5rem;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .back-link:hover {
        color: var(--primary-hover);
    }

    .back-icon {
        margin-right: 0.5rem;
        transition: var(--transition);
    }

    .back-link:hover .back-icon {
        transform: translateX(-3px);
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 1.5rem;
        list-style: none;
        padding: 0;
    }

    .page-item {
        margin: 0 0.25rem;
    }

    .page-link {
        display: flex;
        width: 36px;
        height: 36px;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: white;
        border: 1px solid #dee2e6;
        color: var(--dark);
        text-decoration: none;
        transition: var(--transition);
    }

    .page-link:hover, .page-item.active .page-link {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
        .header-section {
            padding: 2rem 0;
        }

        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-actions {
            margin-top: 1rem;
        }

        .inscriptions-table th:nth-child(1),
        .inscriptions-table td:nth-child(1) {
            display: none;
        }

        .action-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }

    @media (max-width: 576px) {
        .inscriptions-table th:nth-child(5),
        .inscriptions-table td:nth-child(5) {
            display: none;
        }
    }
</style>

<div class="header-section">
    <div class="container">
        <h1 class="page-title">Liste des Inscriptions</h1>
        <p class="page-subtitle">Consultez et gérez les participants à vos événements</p>
    </div>
    <div class="header-bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>
</div>

<div class="inscriptions-container">
    <div class="action-bar">
        <a href="../../index.php" class="back-link">
            <i class="fas fa-arrow-left back-icon"></i> Retour à l'accueil
        </a>
        <div class="card-actions">
            <button class="action-button-text" title="Exporter">
                <i class="fas fa-file-export action-icon"></i> Exporter
            </button>
            <button class="action-button-text" title="Filtrer">
                <i class="fas fa-filter action-icon"></i> Filtrer
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-users card-title-icon"></i> Inscriptions
                <?php if (!empty($inscriptions)): ?>
                    <span class="inscription-count"><?= count($inscriptions) ?></span>
                <?php endif; ?>
            </h2>
            <div class="card-actions">
                <button class="action-button" title="Actualiser">
                    <i class="fas fa-sync-alt"></i>
                </button>
                <button class="action-button" title="Imprimer">
                    <i class="fas fa-print"></i>
                </button>
            </div>
        </div>
        
        <?php if (!empty($inscriptions)): ?>
            <div class="table-responsive">
                <table class="inscriptions-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Participant</th>
                            <th>Email</th>
                            <th>Événement</th>
                            <th>Date d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inscriptions as $index => $inscription): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td>
                                    <div class="participant-info">
                                        <div class="participant-avatar">
                                            <?= substr(htmlspecialchars($inscription['participant_nom']), 0, 1) ?>
                                        </div>
                                        <?= htmlspecialchars($inscription['participant_nom']) ?>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($inscription['email']) ?></td>
                                <td>
                                    <span class="event-badge">
                                        <i class="fas fa-calendar-day event-icon"></i>
                                        <?= htmlspecialchars($inscription['event_titre']) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="date-badge">
                                        <i class="fas fa-clock date-icon"></i>
                                        <?= htmlspecialchars($inscription['date_inscription']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-user-slash empty-icon"></i>
                <p class="empty-text">Aucune inscription trouvée.</p>
                <a href="../participants/register_participant.php" class="cta-button">
                    <i class="fas fa-user-plus cta-icon"></i> Inscrire un participant
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Simple filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelectorAll('.action-button-text')[1]) {
            document.querySelectorAll('.action-button-text')[1].addEventListener('click', function() {
                alert('La fonctionnalité de filtrage sera bientôt disponible!');
            });
        }
        
        // Add click handlers to action buttons
        document.querySelectorAll('.action-button').forEach(btn => {
            btn.addEventListener('click', function() {
                if (this.title === 'Actualiser') {
                    window.location.reload();
                } else if (this.title === 'Imprimer') {
                    window.print();
                }
            });
        });
    });
</script>

<?php include '../layout/footer.php'; ?>