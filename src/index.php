<?php 

include "./connect.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home - Montadora</title>
        
        <link rel="stylesheet" href="../node_modules/bootstrap/compile/bootstrap.css">
        <link rel="stylesheet" href="../styles/css/mystyles.css">
        
        <script src="../node_modules/jquery/dist/jquery.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </head>

    <body>
        <div class="container my_container_main mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="col-sm-12 text-center">Montadora</h3>

                    <button class="col-lg-12 col-sm-12 p-2 mt-3 btn btn-my6-color" type="button" data-toggle="modal" data-target="#modal_new_manufacturer">
                        Adicionar Fabricante
                    </button>

                    <button class="col-lg-12 col-sm-12 p-2 mt-3 btn btn-my6-color" type="button" data-toggle="modal" data-target="#modal_vehicle">
                        Adicionar Veículo
                    </button>

                    <h5 class="col-sm-12 mt-4 mb-4 text-center">Quantidade</h5>
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Fabricantes</td>
                                <th scope="col">Veículos</td>

                            </tr>

                        </thead>

                        <tbody>
                            <?php

                            $sql_1_type = "SELECT * FROM tbl_manufacturer";
                            $sql_2_type = "SELECT * FROM tbl_vehicle";

                            $result_1 = mysqli_query($connectiondb, $sql_1_type);
                            $result_2 = mysqli_query($connectiondb, $sql_2_type);

                            $quantity_manufacturer =  mysqli_num_rows($result_1);
                            $quantity_vehicle = mysqli_num_rows($result_2);

                            echo '<tr>';
                            echo '<td>'. $quantity_manufacturer .'</td>';
                            echo '<td>'. $quantity_vehicle .'</td>';
                            echo '</tr>';

                            ?>
                        </tbody>

                    </table>

                    <h5 class="col-sm-12 mt-4 mb-4 text-center">Fabricante</h5>
                    <table class="table table-striped table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">id</td>
                                <th scope="col">Nome do Fabricante</td>
                                <th scope="col">Setor</td>

                            </tr>

                        </thead>

                        <tbody>
                            <?php

                            $sql_type = "SELECT * FROM tbl_manufacturer";
                            $result = $connectiondb->query($sql_type);

                            if ($result->num_rows > 0){

                                while ( $row = $result->fetch_assoc()){
                                    echo '<tr>';
                                    echo '<th scope="row">'. $row['id_manufacturer'] .'</th>';
                                    echo '<td>'. $row['name_manufacturer'] .'</td>';
                                    echo '<td>'. $row['sector_manufacturer'] .'</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>

                    </table>

                    <h5 class="col-sm-12 mt-4 mb-4 text-center">Veículos</h5>
                    <table class="table table-dark mb-5 text-center">
                        <thead>
                            <tr>
                                <th scope="col">id</td>
                                <th scope="col">Nome do Veículo</td>
                                <th scope="col">Ano</td>
                                <th scope="col">Preço</td>
                                <th scope="col">Fabricante</td>

                            </tr>

                        </thead>

                        <tbody>
                            <?php

                            // $selectjoin = "SELECT * FROM tbl_vehicle";

                            $sql_type = 
                            "   SELECT p.*, m.name_manufacturer
                                FROM tbl_vehicle as p
                                INNER JOIN tbl_manufacturer as m
                                ON p.id_manufacturer_fk = m.id_manufacturer
                                order by id_vehicle ASC
                            ";

                            $result = $connectiondb->query($sql_type);

                            if ($result->num_rows > 0){

                                while ( $row = $result->fetch_assoc()){
                                    echo '<tr>';
                                    echo '<td>'. $row['id_vehicle'] .'</td>';
                                    echo '<td>'. $row['name_vehicle'] .'</td>';
                                    echo '<td>'. $row['year_vehicle'] .'</td>';
                                    echo '<td>'. $row['price_vehicle'] .'</td>';
                                    echo '<td>'. $row['name_manufacturer'] .'</td>';
                                    echo '</tr>';

                                }
                            }
                            ?>
                        </tbody>

                    </table>
                    <!-- class="col-lg-12 col-sm-12 p-2 mt-3 mb-3 text-center" -->
                    </table>

                </div>

            </div>
            
            <!-- Modal Novo Fabricante -->
            <div class="modal fade" id="modal_new_manufacturer" tabindex="-1" aria-labelledby="New_Author" aria-hidden="true">
                <div class="modal-dialog modal-dm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Fabricante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                
                                </button>
                
                            </div>
                            <div class="modal-body">
                                <form action="new_manufacturer.php" method="POST">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                    
                                        <input class="form-control" type="text" name="name_manufacturer" placeholder="Digite o nome do Fabricante..." alt="Inserir nome do Fabricante">
                    
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="">Setor</label>
                    
                                        <input class="form-control" type="text" name="sector_manufacturer" placeholder="Digite o Setor do Fabricante..." alt="Informar o Setor que o Fabricante Atua.">
                    
                                    </div>
                    
                                    <button type="submit" class="btn btn-my6-color">
                                        Adicionar Fabricante
                                    </button>
                
                                </form>
                
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-my5-color" data-dismiss="modal">Fechar</button>
                
                            </div>
            
                        </div>
            
                    </div>
            
                </div>
            
            </div>

            <!-- Modal Novo Veículo -->
            <div class="modal fade" id="modal_vehicle" tabindex="-1" aria-labelledby="New_Vehicle" aria-hidden="true">
                <div class="modal-dialog modal-dm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Veículo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="text-white" aria-hidden="true">&times;</span>
            
                                </button>
                
                            </div>
            
                            <div class="modal-body">
                                <form action="new_vehicle.php" method="POST">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                    
                                        <input class="form-control" type="text" name="name_vehicle" placeholder="Digite o nome do Veículo..." alt="Informar o nome do Veículo">
                    
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">Fabricante</label>
            
                                        <select class="form-control" type="text" name="id_manufacturer" alt="Informar o nome do Fabricante">
                                            <?php 
                                                $selectsql = "SELECT * FROM tbl_manufacturer order by name_manufacturer";
                                                $resquery = mysqli_query($connectiondb, $selectsql);
                                                while($v_register=mysqli_fetch_row($resquery)){
                                                    $v_id_manufac=$v_register[0];
                                                    $v_name_manufac=$v_register[1];
                                                    echo "<option value=$v_id_manufac>$v_name_manufac</option>";
                                                }

                                            ?>
                                        </select>
                    
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="">Ano</label>
                    
                                        <input class="form-control" type="text" name="year_vehicle" placeholder="Digite o ano do Veículo" alt="Informar o ano de criação do Veículo">
                    
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">Preço</label>
                    
                                        <input class="form-control" type="text" name="price_vehicle" placeholder="Digite o valor do Veículo" alt="Informar o valor do Veículo">
                    
                                    </div>
                    
                                    <button type="submit" class="btn btn-my6-color">
                                        Adicionar Veículo
                                    </button>
                
                                </form>
                
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-my5-color" data-dismiss="modal">Fechar</button>
                
                            </div>
            
                        </div>
            
                    </div>
            
                </div>
            
            </div>
        
        </div>

    </body>

</html>