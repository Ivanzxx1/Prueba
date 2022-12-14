<?php

error_reporting(0);
?>
<?php


// Importación de archivos php
require_once "../models/AvionModel.php";
require_once "../models/AsientoModel.php";

// Creacion de objeto
$bus = new BusModel();

// Casteo de variables que provienen desde una petición AJAX
$name = $_POST["name"];
$first_name = $_POST["first_name"];
$number = $_POST["number"];
$destiny = $_POST["destiny"];
$origin = $_POST["origin"];
$cost = $_POST["cost"];

if (empty($name) || empty($first_name) || empty($number) || empty($destiny) || empty($origin) || empty($cost)) {
    echo json_encode(array("msj" => "Campo(s) vacio(s)"));
} else {
    // Creación de Objeto Asiento para despues convertirlo a JSON y asignar el asiento a la session
    $asiento = new AsientoModel($number, "false", $name, $first_name, $destiny, $origin, $cost, date("Y-m-d H:i:s"));
    $json = json_encode($asiento);
    echo json_encode($bus->assignSeat($json));
}

exit();

?>