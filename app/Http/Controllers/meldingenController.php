<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = "achtbaan";

echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';
//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, type, melder) VALUES (:attractie, :capaciteit, :type, :melder)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":melder" => $melder,
    ":capaciteit" => $capaciteit
]);

header(header: "Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");