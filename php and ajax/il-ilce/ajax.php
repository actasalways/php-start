<?php

require 'db.php';

if (isset($_POST['plakaKodu'])) {
    #ilce bulma
    $plakaKodu = $_POST['plakaKodu'];
    $query = $db->prepare('SELECT * FROM ilceler WHERE il_plaka = ? ');
    $query->execute([$plakaKodu]);
    $ilceler = ($query->fetchAll(PDO::FETCH_ASSOC));

    #print_r($ilceler);

    $html =  '<option value="">-- İlçe Seçin-- </option>';


    foreach ($ilceler as $ilce) {
        $html .= '<option value="' . $ilce['ilce_id'] . '">' . $ilce['ilce_adi'] . '</option>';
    }

    echo $html;
}
