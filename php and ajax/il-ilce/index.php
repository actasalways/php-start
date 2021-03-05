<?php

require_once 'db.php';

$cities = $db->query('SELECT * FROM iller ORDER BY il_plaka ASC')->fetchAll(PDO::FETCH_ASSOC);

#print_r($cities);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="app.js"></script>


</head>

<body>

    <ul>
        <li>
            <p>il</p>
            <select name="" id="il">
                <option value=""> -- İl Seçin -- </option>
                <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city['il_plaka'] ?>"> <?= $city['il_adi'] ?> </option>
                <?php endforeach; ?>
            </select>
        </li>

        <li>
            <p>ilçe</p>
            <select disabled name="" id="ilce">
                <option  value=""> -- İlçe Seçin -- </option>


            </select>
        </li>

    </ul>




</body>
</html>