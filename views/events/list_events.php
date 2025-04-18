<?php
require_once __DIR__ . '/../../controllers/EventController.php';

$controller = new EventController();
$events = $controller->getAllEvents();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements | Event Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #7749F8;
            --primary-light: #9e78ff;
            --primary-dark: #6438e4;
            --secondary: #6C757D;
            --success: #10B981;
            --info: #0DCAF0;
            --danger: #dc3545;
            --light: #F8F9FA;
            --dark: #212529;
            --background: #F5F7FF;
            --border-radius: 1rem;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Header Section */
        .header-section {
            background: linear-gradient(135deg, rgba(119, 73, 248, 0.9) 0%, rgba(91, 31, 255, 0.8) 100%);
            color: white;
            padding: 3rem 0;
            text-align: center;
            border-radius: 0 0 2rem 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .page-title {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-weight: 300;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .search-container {
            max-width: 500px;
            margin: 0 auto;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: none;
            border-radius: 2rem;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-input:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: white;
        }

        /* Events Card */
        .events-container {
            margin: 2rem 0;
        }

        .events-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .events-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            background-color: var(--light);
            border-bottom: 1px solid #e9ecef;
        }

        .events-title {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .events-count {
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            margin-left: 0.5rem;
        }

        .events-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 0.5rem;
            color: var(--secondary);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background-color: var(--light);
            color: var(--primary);
        }

        /* Table Styles */
        .events-table-wrapper {
            overflow-x: auto;
        }

        .events-table {
            width: 100%;
            border-collapse: collapse;
        }

        .events-table th, 
        .events-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        .events-table th {
            font-weight: 600;
            color: var(--secondary);
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
        }

        .events-table tbody tr {
            transition: all 0.2s ease;
        }

        .events-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .events-table td:nth-child(1) {
            color: var(--secondary);
            font-weight: 500;
        }

        .events-table td:nth-child(2) {
            font-weight: 600;
            color: var(--primary);
        }

        .events-table td:nth-child(3) {
            color: var(--dark);
        }

        .event-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .date-icon {
            color: var(--info);
        }

        .event-description {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Empty State */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            text-align: center;
        }

        .empty-icon {
            font-size: 3rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        .empty-text {
            color: var(--secondary);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .create-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Back Link */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 2rem 0;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--primary);
        }

        .back-icon {
            transition: transform 0.2s ease;
        }

        .back-link:hover .back-icon {
            transform: translateX(-3px);
        }

        .new-event-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .new-event-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header-section {
                padding: 2rem 0;
                border-radius: 0 0 1rem 1rem;
            }
            
            .page-title {
                font-size: 1.75rem;
            }
            
            .events-table th:nth-child(1),
            .events-table td:nth-child(1) {
                display: none;
            }
            
            .events-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .action-bar {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .new-event-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <h1 class="page-title">Liste des Événements</h1>
            <p class="page-subtitle">Consultez et gérez tous vos événements</p>
            
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Rechercher un événement..." id="eventSearch">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="action-bar">
            <a href="../../index.php" class="back-link">
                <i class="fas fa-arrow-left back-icon"></i> Retour à l'accueil
            </a>
            <a href="create_event.php" class="new-event-btn">
                <i class="fas fa-plus"></i> Nouvel événement
            </a>
        </div>

        <div class="events-container">
            <?php if (empty($events)): ?>
                <div class="events-card">
                    <div class="empty-state">
                        <i class="fas fa-calendar-times empty-icon"></i>
                        <p class="empty-text">Aucun événement trouvé.</p>
                        <a href="create_event.php" class="create-btn">
                            <i class="fas fa-plus"></i> Créer votre premier événement
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="events-card">
                    <div class="events-header">
                        <h2 class="events-title">
                            <i class="fas fa-calendar-check"></i> Événements
                            <span class="events-count"><?= count($events) ?></span>
                        </h2>
                        <div class="events-actions">
                            <button class="action-btn" title="Rafraîchir">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button class="action-btn" title="Filtrer">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="events-table-wrapper">
                        <table class="events-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody id="eventsTableBody">
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($event['id']) ?></td>
                                        <td><?= htmlspecialchars($event['titre']) ?></td>
                                        <td>
                                            <div class="event-date">
                                                <i class="fas fa-calendar-day date-icon"></i>
                                                <?= htmlspecialchars($event['date_evenement']) ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-description" title="<?= htmlspecialchars($event['description']) ?>">
                                                <?= htmlspecialchars($event['description']) ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Simple search functionality
        document.getElementById('eventSearch').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableBody = document.getElementById('eventsTableBody');
            const rows = tableBody.getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const titleCell = rows[i].getElementsByTagName('td')[1];
                const dateCell = rows[i].getElementsByTagName('td')[2];
                const descCell = rows[i].getElementsByTagName('td')[3];
                
                if (titleCell && dateCell && descCell) {
                    const titleText = titleCell.textContent.toLowerCase();
                    const dateText = dateCell.textContent.toLowerCase();
                    const descText = descCell.textContent.toLowerCase();
                    
                    if (titleText.includes(searchValue) || 
                        dateText.includes(searchValue) || 
                        descText.includes(searchValue)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        });
    </script>
</body>
</html>