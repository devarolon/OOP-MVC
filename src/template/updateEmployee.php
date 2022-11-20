<!doctype html>
<html lang="de">
<head>
    <?php require __DIR__ . '/../template/include/head.php' ?>
    <title>MVC-OOP/EMS</title>
</head>
<body>
<?php require __DIR__ . '/../template/include/navbar.php' ?>
<div class="container mt-3">
    <h2>Mitarbeiter data aktualisieren</h2>
    <form action="?path=updateEmployee" method="POST">
        <div class="mb-3 mt-3">
            <input type="hidden" class="form-control" id="id" name="id" value="<?=$this->_['employee']['id']?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="firstname" class="form-label">Vorname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$this->_['employee']['firstname']?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="lastname" class="form-label">Nachname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$this->_['employee']['lastname']?>" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="age" class="form-label">Alter:</label>
            <input type="number" class="form-control" id="age" name="age" value="<?=$this->_['employee']['age']?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Speichern</button>
    </form>
</div>
<?php require __DIR__ . '/include/footer.php' ?>
</body>
</html>