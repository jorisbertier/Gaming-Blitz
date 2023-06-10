<?php
session_start();

$delete = $_GET['delete'];

if (isset($_SESSION['panier'])) {
    $index = array_search($delete, $_SESSION['panier']);
    if ($index !== false) {
        unset($_SESSION['panier'][$index]);
    }
}

header('Location: /component/panier.php');
exit();
?>