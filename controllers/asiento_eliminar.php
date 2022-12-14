<?php

error_reporting(0);
?>
<?php

require_once "../models/AvionModel.php";

$bus = new BusModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat = $_POST["seat"];
    $bus->removeSeat($seat);
    echo "ok";
}

?>