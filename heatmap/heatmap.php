<?php
    $conexao_mysql = new mysqli("localhost","admin","admin","Monitoramento");
    if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL ".mysqli_connect_error();
            exit();
    }
    $query = "call heatmap()";
    if(!($result = $conexao_mysql -> query($query))){
            echo "Failed to query MySQL";
            exit();
    }
    $resultados=array();
    $quantidade_total_clientes=0;
    for($i=0; $i<$result->num_rows;$i++){//itera entre cada linha da resposta
        $row = $result->fetch_array();
        //echo $row["id"]."\n";
        $resultado = "{".
                            "\""."id_bloco"."\"".      ":"   ."\"".$row["id"]."\""    . ",".
                            "\""."nome_bloco"."\"".      ":"   ."\"".$row["nome_bloco"]."\""    . ",".
                            "\""."qntd"."\"".      ":"   ."\"".$row["quantidade_clientes"]."\"".",".
                            "\""."X"."\"".      ":"   ."\"".$row["posX"]."\"".",".
                            "\""."Y"."\"".      ":"   ."\"".$row["posY"]."\"".
                        "}";
        $quantidade_total_clientes+=intval($row["quantidade_clientes"]);
        //echo $resultado."\n";
        $resultados[] = json_decode($resultado);
        //var_dump($resultados);
    }
        $last_element="{"."\"quantidadeTotalClientes\":"."\"".$quantidade_total_clientes."\""."}";
        $resultados[] = json_decode($last_element);
        echo json_encode($resultados);
?>

