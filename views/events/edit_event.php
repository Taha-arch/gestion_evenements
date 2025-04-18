<?php require_once('../layout/header.php'); ?>

<div class="card shadow mx-auto mt-5" style="max-width: 600px;">
    <div class="card-body">
        <h3 class="text-center mb-4">Modifier un Événement</h3>
        <form method="post" action="../../controllers/EventController.php">
            <input type="hidden" name="id" value="<?= $event['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Titre :</label>
                <input type="text" class="form-control" name="titre" value="<?= $event['titre'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date :</label>
                <input type="date" class="form-control" name="date_evenement" value="<?= $event['date_evenement'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description :</label>
                <textarea class="form-control" name="description" rows="4" required><?= $event['description'] ?></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="list_events.php" class="text-decoration-none">&larr; Retour</a>
        </div>
    </div>
</div>

<?php require_once('../layout/footer.php'); ?>
