<?php

$v_name_vehicle = $_POST["name_vehicle"];
$v_year_vehicle = $_POST["year_vehicle"];
$v_price_vehicle = $_POST["price_vehicle"];
$v_id_manufacturer = $_POST["id_manufacturer"];

$connectiondb = new mysqli("localhost", "root", "", "mydb_carmaker");

if($connectiondb->connect_error){
    die("Error during connection. Status: Error".$connectiondb->connect_error);
    
}
else{
    $insert = "INSERT INTO tbl_vehicle (name_vehicle, year_vehicle, price_vehicle, id_manufacturer_fk)
    VALUES('$v_name_vehicle', '$v_year_vehicle', '$v_price_vehicle', '$v_id_manufacturer')";

    if($connectiondb->query($insert) == TRUE){
?>

    <script>
        alert("Concluído com sucesso");
        window.location.href="index.php";
    </script>

<?php

    }
    else{
        echo "Ocorreu algum problema. Erro: ".$connectiondb->error;
    }

}

?>
