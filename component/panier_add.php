<?php

session_start();

$add= $_GET['add'];

$_SESSION['panier'][] = $add;

header('Location: /component/panier.php');
exit();