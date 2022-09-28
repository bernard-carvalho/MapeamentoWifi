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
    for($i=0; $i<$result->num_rows;$i++){//itera entre cada linha da resposta
        $row = $result->fetch_array();
        //echo $row["id"]."\n";
        $resultado = "{".
                            "\""."id_bloco"."\"".      ":"   ."\"".$row["id"]."\""    . ",".
                            "\""."nome_bloco"."\"".      ":"   ."\"".$row["bloco"]."\""    . ",".
                            "\""."qntd"."\"".      ":"   ."\"".$row["quantidade_clientes"]."\"".
                        "}";
        //echo $resultado."\n";
        $resultados[] = json_decode($resultado);
        //var_dump($resultados);
    }
    echo json_encode($resultados);
?>