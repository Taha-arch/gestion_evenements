<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Événement | Event Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        /* Global Styles */
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

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, rgba(119, 73, 248, 0.9) 0%, rgba(91, 31, 255, 0.8) 100%), url('/path/to/background-image.jpg') no-repeat center center;
    background-size: cover;
    padding: 6rem 0;
    color: white;
    border-radius: 0 0 2rem 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
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

/* Header Section for Internal Pages */
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
}

/* Feature Cards */
.feature-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 2rem;
    margin-bottom: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: var(--shadow);
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

/* Forms */
.form-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 2rem;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.event-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-group {
    margin-bottom: 1rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--dark);
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #dee2e6;
    border-radius: 0.5rem;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(119, 73, 248, 0.25);
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.form-buttons {
    display: flex;
    gap: 1rem;
    justify-content: flex-start;
    flex-wrap: wrap;
    margin-top: 1rem;
}

/* Buttons */
.btn-primary, .btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border-radius: 2rem;
    font-weight: 500;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}

.btn-primary {
    background-color: var(--primary);
    color: white;
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-secondary {
    background-color: var(--secondary);
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Alert Messages */
.message-alert {
    border-radius: var(--border-radius);
    padding: 1rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
}

.alert-success {
    background-color: rgba(16, 185, 129, 0.1);
    border-left: 4px solid var(--success);
    color: #065f43;
}

.alert-danger {
    background-color: rgba(220, 53, 69, 0.1);
    border-left: 4px solid var(--danger);
    color: #842029;
}

/* Stats Section */
.stats-section {
    background-color: white;
    border-radius: var(--border-radius);
    padding: 2rem;
    margin: 3rem 0;
    box-shadow: var(--shadow);
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

/* Footer */
.footer {
    background-color: var(--dark);
    color: white;
    padding: 2rem 0;
    margin-top: 4rem;
    text-align: center;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .header-section,
    .hero-section {
        padding: 2.5rem 0;
        border-radius: 0 0 1rem 1rem;
    }
    
    .page-title,
    .hero-title {
        font-size: 1.75rem;
    }
    
    .form-buttons {
        flex-direction: column;
    }
    
    .btn-primary,
    .btn-secondary {
        width: 100%;
    }
}
    </style>
</head>
<body>
    <div class="page-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="container">
                <h1 class="page-title">Créer un Événement</h1>
                <p class="page-subtitle">Remplissez les détails pour créer un nouvel événement</p>
            </div>
        </div>

        <div class="container my-5">
            <?php if (!empty($message)): ?>
                <div class="alert <?php echo $success ? 'alert-success' : 'alert-danger'; ?> message-alert">
                    <i class="fas <?php echo $success ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?> me-2"></i>
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <div class="form-card">
                <form method="POST" class="event-form">
                    <div class="form-group">
                        <label for="titre" class="form-label">
                            <i class="fas fa-heading me-2"></i>Titre de l'événement
                        </label>
                        <input type="text" name="titre" id="titre" class="form-control" placeholder="Entrez le titre de l'événement" required>
                    </div>

                    <div class="form-group">
                        <label for="date_evenement" class="form-label">
                            <i class="fas fa-calendar-alt me-2"></i>Date de l'événement
                        </label>
                        <input type="date" name="date_evenement" id="date_evenement" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left me-2"></i>Description
                        </label>
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Décrivez votre événement"></textarea>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-calendar-plus me-2"></i>Créer l'événement
                        </button>
                        <a href="../../index.php" class="btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à l'accueil
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>