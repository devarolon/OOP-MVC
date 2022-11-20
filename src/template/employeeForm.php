<!doctype html>
<html lang="de">
<head>
    <?php require __DIR__ . '/../template/include/head.php' ?>
    <title>Neue Eingabe</title>
</head>
<body>
<?php require __DIR__ . '/../template/include/navbar.php' ?>
<div class="container mt-3">
    <h2>Neuer Mitarbeiter Hinzufügen</h2>
    <form action="?path=addEmployee" method="POST">
        <div class="mb-3 mt-3">
            <label for="firstname" class="form-label">Vorname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="lastname" class="form-label">Nachname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="age" class="form-label">Alter:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php require __DIR__ . '/include/footer.php' ?>
</body>
</html>

