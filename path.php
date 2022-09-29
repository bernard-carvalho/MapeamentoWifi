<?php
        $conexao_mysql = new mysqli("localhost","admin","admin","Monitoramento");
        if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL ".mysqli_connect_error();
                exit();
        }
        $busca_data_inicio="2022-09-26 00:00";
        $busca_data_fim="2022-09-28 00:00";
        $busca_ip="172.16.2.160";
        $busca_intervalo=intval("5");
        $ap_atual="nenhum";
        $quantidade_caminhos=0;
        $caminhos=array();
        $caminho=array();
        $data_atual="0000-00-00 00:00";
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
        for($i=0; $i<$result->num_rows;$i++){//itera entre cada linha da resposta
                $row = $result->fetch_array();
                //var_dump($row);
                if(
                        $row["ap_nome"]!=$ap_atual
                ){
                        //################
                        //## NOVO SALTO ##
                        //################
                        //atualiza as datas
                                $data_antiga=$data_atual;
                                $data_atual=$row["date"];
                        //sumariza as datas em minutos
                                $data_antiga_ano=intval(substr($data_antiga,1,4));
                                $data_antiga_mes=intval(substr($data_antiga,6,2));
                                $data_antiga_dia=intval(substr($data_antiga,9,2));
                                $data_antiga_horas=intval(substr($data_antiga,12,2));
                                $data_antiga_minutos=intval(substr($data_antiga,14,2));
                                $data_antiga_em_minutos = 
                                        $data_antiga_ano*60*24*30*12+
                                        $data_antiga_mes*60*24*30+
                                        $data_antiga_dia*60*24+
                                        $data_antiga_horas*60+
                                        $data_antiga_minutos;
                                $data_atual_ano=intval(substr($data_atual,1,4));
                                $data_atual_mes=intval(substr($data_atual,6,2));
                                $data_atual_dia=intval(substr($data_atual,9,2));
                                $data_atual_horas=intval(substr($data_atual,12,2));
                                $data_atual_minutos=intval(substr($data_atual,14,2));
                                $data_atual_em_minutos=
                                        $data_atual_ano*60*24*30*12+
                                        $data_atual_mes*60*24*30+
                                        $data_atual_dia*60*24+
                                        $data_atual_horas*60+
                                        $data_atual_minutos;
                        if($data_atual_em_minutos-$data_antiga_em_minutos >= $busca_intervalo || $i == $result->num_rows-1 )
                        {
                                //####################
                                //##  NOVO CAMINHO  ##
                                //####################
                                //echo "Identificado novo caminho ".$quantidade_caminhos++." as ".$row["date"]."\n";
                                        //#################################################
                                        //##  todo: INSERE SAIDA NO CAMINHO ANTERIOR     ## 
                                        //#################################################
                                        $caminho[] =    json_decode("{".
                                                "\"ip_sta\":"."\"".$row["ip_sta"]."\"".",".
                                                "\"ap_mac\":"."\""."-"."\"".",".
                                                "\"ap_nome\":"."\""."-"."\"".",".
                                                "\"date\":"."\"".$data_antiga."\"".
                                                "}");
                                if($i!=0)
                                        $caminhos[]=$caminho;
                                $caminho = array();
                        }
                        //echo "detectado salto de ".$ap_atual." para ".$row["ap_nome"]." ás ".$row["date"]."\n";
                        $caminho[] =    json_decode("{".
                                        "\"ip_sta\":"."\"".$row["ip_sta"]."\"".",".
                                        "\"ap_mac\":"."\"".$row["ap_mac"]."\"".",".
                                        "\"ap_nome\":"."\"".$row["ap_nome"]."\"".",".
                                        "\"date\":"."\"".$row["date"]."\"".
                                        "}"); 
                }
                else{
                        //caso seja o mesmo AP
                        //$data_antiga=$data_atual;
                        //$data_atual=$row["date"];
                }
                $ap_atual=$row["ap_nome"];
        }
        $caminhos[]=$caminho;
        echo json_encode($caminhos);
?>