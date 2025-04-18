<?php require_once('views/layout/header.php'); ?>

<div class="container text-center mt-5">
    <h1 class="mb-4">Système de Gestion des Événements</h1>
    <div class="row g-3 justify-content-center">
        <div class="col-md-3">
            <a href="views/events/create_event.php" class="btn btn-outline-primary w-100">Créer un Événement</a>
        </div>
        <div class="col-md-3">
            <a href="views/events/list_events.php" class="btn btn-outline-dark w-100">Voir les Événements</a>
        </div>
        <div class="col-md-3">
            <a href="views/participants/register_participant.php" class="btn btn-outline-success w-100">Inscrire un Participant</a>
        </div>
        <div class="col-md-3">
            <a href="views/inscriptions/list_inscriptions.php" class="btn btn-outline-info w-100">Voir les Inscriptions</a>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager - Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #7749F8;
            --secondary: #6C757D;
            --success: #10B981;
            --info: #0DCAF0;
            --light: #F8F9FA;
            --dark: #212529;
            --background: #F5F7FF;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--dark);
        }
        
        .hero-section {
            background: linear-gradient(135deg, rgba(119, 73, 248, 0.9) 0%, rgba(91, 31, 255, 0.8) 100%), url('/api/placeholder/1200/400') no-repeat center center;
            background-size: cover;
            padding: 6rem 0;
            color: white;
            border-radius: 0 0 2rem 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .hero-title {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero-subtitle {
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            height: 100%;
            border: none;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            background: var(--background);
            height: 80px;
            width: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
        }
        
        .create-icon { color: var(--primary); }
        .view-icon { color: var(--dark); }
        .register-icon { color: var(--success); }
        .inscriptions-icon { color: var(--info); }
        
        .feature-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .feature-desc {
            color: var(--secondary);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        
        .custom-btn {
            border-radius: 2rem;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: #6438e4;
            border-color: #6438e4;
        }
        
        .stats-section {
            background-color: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-top: 3rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .stat-item {
            text-align: center;
            padding: 1rem;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0;
        }
        
        .stat-label {
            color: var(--secondary);
            font-size: 0.9rem;
        }
        
        .footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 4rem 0;
                border-radius: 0 0 1rem 1rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation would go here from your header.php -->
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title">Event Manager</h1>
            <p class="hero-subtitle">Planifiez, organisez et gérez vos événements en toute simplicité</p>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon create-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <h3 class="feature-title">Créer un Événement</h3>
                        <p class="feature-desc">Planifiez un nouvel événement avec tous les détails nécessaires</p>
                        <a href="views/events/create_event.php" class="btn btn-primary custom-btn">Créer</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon view-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="feature-title">Voir les Événements</h3>
                        <p class="feature-desc">Consultez tous vos événements planifiés et leur état actuel</p>
                        <a href="views/events/list_events.php" class="btn btn-dark custom-btn">Consulter</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon register-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3 class="feature-title">Inscrire un Participant</h3>
                        <p class="feature-desc">Ajoutez de nouveaux participants à vos événements</p>
                        <a href="views/participants/register_participant.php" class="btn btn-success custom-btn">Inscrire</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon inscriptions-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3 class="feature-title">Voir les Inscriptions</h3>
                        <p class="feature-desc">Suivez toutes les inscriptions à vos différents événements</p>
                        <a href="views/inscriptions/list_inscriptions.php" class="btn btn-info custom-btn text-white">Consulter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="container stats-section">
        <div class="row">
            <div class="col-md-3 stat-item">
                <p class="stat-number">27</p>
                <p class="stat-label">Événements actifs</p>
            </div>
            <div class="col-md-3 stat-item">
                <p class="stat-number">354</p>
                <p class="stat-label">Participants</p>
            </div>
            <div class="col-md-3 stat-item">
                <p class="stat-number">14</p>
                <p class="stat-label">Événements à venir</p>
            </div>
            <div class="col-md-3 stat-item">
                <p class="stat-number">98%</p>
                <p class="stat-label">Taux de satisfaction</p>
            </div>
        </div>
    </section>
    
    <!-- Footer would go here from your footer.php -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php require_once('views/layout/footer.php'); ?>
