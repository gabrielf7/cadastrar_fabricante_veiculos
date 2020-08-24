<?php

$name_manufacturer = $_POST["name_manufacturer"];
$sector_manufacturer = $_POST["sector_manufacturer"];

$connectiondb = new mysqli("localhost", "root", "", "mydb_carmaker");

if($connectiondb->connect_error){
    die("Error during connection. Status: Error".$connectiondb->connect_error);
    
}
else{
    $insert = "INSERT INTO tbl_manufacturer (name_manufacturer, sector_manufacturer)
    VALUES('$name_manufacturer', '$sector_manufacturer')";

    if($connectiondb->query($insert) == TRUE){
?>

    <script>
        alert("Inserido com secusso");
        window.location.href="index.php";
    </script>

<?php

    }
    else{
        echo "Ocorreu algum problema. Erro: ".$connectiondb->error;
    }
}

?>
