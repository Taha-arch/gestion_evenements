<?php 
require_once '../../controllers/ParticipantController.php'; 
require_once '../../controllers/EventController.php'; 
require_once '../layout/header.php';  

$participantController = new ParticipantController(); 
$eventController = new EventController(); 
$message = '';  

if ($_SERVER["REQUEST_METHOD"] === "POST") {     
    $message = $participantController->register($_POST['nom'], $_POST['email'], $_POST['event_id']); 
}  

$events = $eventController->getAllEvents(); 
?>

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

    .participant-form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .form-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 2.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .form-decorator {
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--primary) 0%, transparent 50%);
        border-radius: 0 0 0 100%;
        opacity: 0.1;
    }

    .form-decorator-2 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 120px;
        height: 120px;
        background: linear-gradient(315deg, var(--primary) 0%, transparent 50%);
        border-radius: 0 100% 0 0;
        opacity: 0.1;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark);
        display: flex;
        align-items: center;
    }

    .label-icon {
        margin-right: 0.5rem;
        color: var(--primary);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(119, 73, 248, 0.25);
    }

    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: var(--transition);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%237749F8' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px 12px;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(119, 73, 248, 0.25);
    }

    .btn-submit {
        display: block;
        width: 100%;
        padding: 0.8rem;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-submit:hover {
        background-color: var(--primary-hover);
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(119, 73, 248, 0.3);
    }

    .alert {
        padding: 1rem;
        border-radius: 0.75rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .alert-icon {
        margin-right: 0.75rem;
        font-size: 1.25rem;
    }

    .alert-info {
        background-color: rgba(13, 202, 240, 0.1);
        border-left: 4px solid var(--info);
        color: #087990;
    }

    .back-link {
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        margin-top: 1.5rem;
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

    /* Events Quick Select */
    .events-quickselect {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-top: 0.75rem;
    }

    .event-option {
        background-color: var(--light);
        color: var(--dark);
        border: 1px solid #dee2e6;
        border-radius: 2rem;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .event-option:hover, .event-option.selected {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    @media (max-width: 768px) {
        .form-card {
            padding: 1.5rem;
        }
    }
</style>

<div class="header-section">
    <div class="container">
        <h1 class="page-title">Inscription Participant</h1>
        <p class="page-subtitle">Rejoignez nos événements en quelques clics</p>
    </div>
</div>

<div class="participant-form-container">
    <div class="form-card">
        <div class="form-decorator"></div>
        <div class="form-decorator-2"></div>
        
        <form method="POST" action="">
            <?php if ($message): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle alert-icon"></i>
                    <?= $message ?>
                </div>
            <?php endif; ?>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user label-icon"></i>
                    Nom
                </label>
                <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom complet" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-envelope label-icon"></i>
                    Email
                </label>
                <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-calendar-alt label-icon"></i>
                    Événement
                </label>
                <select name="event_id" class="form-select" id="eventSelect" required>
                    <option value="">-- Sélectionner un événement --</option>
                    <?php foreach ($events as $event): ?>
                        <option value="<?= $event['id'] ?>"><?= htmlspecialchars($event['titre']) ?> (<?= htmlspecialchars($event['date_evenement']) ?>)</option>
                    <?php endforeach; ?>
                </select>
                
                <?php if (!empty($events) && count($events) > 0): ?>
                    <div class="events-quickselect">
                        <?php 
                        // Display up to 3 events as quick options
                        $count = 0;
                        foreach ($events as $event): 
                            if ($count >= 3) break;
                        ?>
                            <div class="event-option" data-id="<?= $event['id'] ?>">
                                <?= htmlspecialchars($event['titre']) ?>
                            </div>
                        <?php 
                            $count++;
                        endforeach; 
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> S'inscrire
            </button>
            
            <a href="../../index.php" class="back-link">
                <i class="fas fa-arrow-left back-icon"></i>
                Retour à l'accueil
            </a>
        </form>
    </div>
</div>

<script>
    // Quick select event functionality
    document.querySelectorAll('.event-option').forEach(option => {
        option.addEventListener('click', function() {
            const eventId = this.getAttribute('data-id');
            document.getElementById('eventSelect').value = eventId;
            
            // Update visual selection
            document.querySelectorAll('.event-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
</script>

<?php require_once '../layout/footer.php'; ?>