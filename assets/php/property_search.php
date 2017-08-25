<?php
    include_once 'dbconnect.php';
    include_once 'property.php';

    // get connection
    $database = New Database();
    $db = $database->getConnection();

    $property = new Property($db);
    $property->srch_municipal_id = $_POST['prop_municipal'];
    $property->srch_type_id = $_POST['prop_type'];
    $property->srch_min_price = substr($_POST['price'], 0, strpos($_POST['price'],';'));
    $property->srch_max_price = substr($_POST['price'], strpos($_POST['price'],';')+1);

    if ($property->search()) {
      header("Location: ../../index.php?searchresult=1");
    } else {
      header("Location: ../../index.php?searchresult=0");
    }
?>
