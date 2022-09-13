<?php

$mysqli = new mysqli("localhost","admin","admin","Monitoramento");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query="";

$dataInicio="2022-09-13 00:00";
$dataFim="2022-09-14 00:00";
$ipPesquisa="172.16.2.160";

$query="select ip_sta, ap_nome, date from (select * from (select * from MAC_STA inner join AP on MAC_STA.mac_ap=AP.ap_mac where date>=\"".$dataInicio."\" and date<=\"".$dataFim."\")aa where ip_sta=\"".$ipPesquisa."\" order by mac_ap, date)bb order by date;";

//echo "Query: \"".$query."\"";
if ($result = $mysqli -> query($query)) {
//  echo "Returned rows are: " . $result -> num_rows;

//	echo $result;
// Free result set
	$ap_nome_atual="";
	$data_atual="00:00";
	$caminhos[] = array();
	$caminho[] = array();
for($i=0; $i<$result->num_rows;$i++){
	$row = $result->fetch_array();
	$ap_nome=$row["ap_nome"];
	$data=$row["date"];
	if($ap_nome!=$ap_nome_atual){
		$ap_nome_atual=$ap_nome;
		echo "\"".$ap_nome."\" as \"".$data."\"";
		echo "\n";
	}

//	var_dump($ip_sta);
//	echo $row[0];
}

  $result -> free_result();
}

$mysqli -> close();


?>
