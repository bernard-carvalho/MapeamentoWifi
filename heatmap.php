<?php
    $conexao_mysql = new mysqli("localhost","admin","admin","Monitoramento");
    if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL ".mysqli_connect_error();
            exit();
    }
    $query =" SELECT * FROM MAC_STA INNER JOIN AP ON MAC_STA.mac_ap=AP.ap_mac WHERE ".
            "MAC_STA.date>=\"".$busca_data_inicio."\" ".
            " AND ".
            "MAC_STA.date<=\"".$busca_data_fim."\" ".
            " AND ".
            "MAC_STA.ip_sta=\"".$busca_ip."\" ".
            "ORDER BY date";
    if(!($result = $conexao_mysql -> query($query))){
            echo "Failed to query MySQL";
            exit();
    }
?>