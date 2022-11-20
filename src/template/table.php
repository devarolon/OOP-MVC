<!DOCTYPE html>
<html lang="de">
<head>
    <?php require __DIR__ . '/../template/include/head.php' ?>
    <title>Mitarbeiter Liste</title>
</head>
<body>
<?php require __DIR__ . '/../template/include/navbar.php' ?>

<div class="container mt-3">

    <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
            <a class="nav-link bg-dark" href="?path=csvExport" style="color: gainsboro">CSV Exportieren</a>
        </li>
    </ul>

    <h4>Mitarbeiter Liste</h4>

    <table class="table table-striped table-bordered border-dark">
        <thead>
        <tr>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Alter</th>
            <th scope="col">Aktion</th>
            <th scope="col">Aktion</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->_['employees'] as $employee) : ?>
        <tr>
            <td><?=$employee['firstname']?></td>
            <td><?=$employee['lastname']?></td>
            <td><?=$employee['age']?></td>
             <td>
                 <a href="?path=employeeEdit&id=<?=$employee['id']?>">Bearbeiten</a>
             </td>
             <td>
                 <a href="?path=deleteEmployee&id=<?=$employee['id']?>">Löschen</a>
             </td>
        </tr>
        <?php endforeach?>
        </tbody>
    </table>

    <ul class="pagination justify-content-end">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    </div>
</body>
</html>
