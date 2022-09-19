<?php

$mysqli = new mysqli("localhost","admin","admin","Monitoramento");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query="";

$dataInicio=$_GET["inicio"];
//"2022-09-13 00:00";
$dataFim=$_GET["fim"];
//"2022-09-14 00:00";
$ipPesquisa=$_GET["ip"];
//"172.16.2.160";
$intervaloMaximo=intval($_GET["intervalo"]);

$query="select ap_ip, ip_sta, ap_nome, date from (select * from (select * from MAC_STA inner join AP on MAC_STA.mac_ap=AP.ap_mac where date>=\"".$dataInicio."\" and date<=\"".$dataFim."\")aa where ip_sta=\"".$ipPesquisa."\" order by mac_ap, date)bb order by date;";

//echo "Query: \"".$query."\"";
if ($result = $mysqli -> query($query)) {
//  echo "Returned rows are: " . $result -> num_rows;

//	echo $result;
// Free result set
	$ap_ip_antigo="";
	$data_antiga="00:00";
	$caminhos = "{";
	$qntd_caminhos=0;
	$caminho="\"queryInfo\":[{";
	$caminho.="\"sta_ip\":\"".$ipPesquisa."\", ";
	$caminho.="\"dataInicio\":\"".$dataInicio."\", ";
	$caminho.="\"dataFim\":\"".$dataFim."\", ";
	$caminho.="\"IntervaloMaximo\":\"".$intervaloMaximo."\"}";
	$qntd_saltos=0;

	for($i=0; $i<$result->num_rows;$i++){
		$salto="";
		$row = $result->fetch_array();
	//	var_dump($row);
	//	$ap_nome=$row["ap_nome"];
		$data=$row["date"];
		$ap_ip=$row["ap_ip"];
		$ap_nome=$row["ap_nome"];


		$data_hora_minuto=substr($data,11,5);

		//echo "detectado salto de ".$data_antiga." para ".$data_hora_minuto."\n";
		$unidadeMinuto=intval(substr($data_hora_minuto,3,2))+
		intval(substr($data_hora_minuto,0,2))*60;
		$unidadeMinutoAntigo=intval(substr($data_antiga,3,2))+
		intval(substr($data_antiga,0,2))*60;
		//SE O INTERVALO FOR SUPERIOR A X MINUTOS
		//echo $unidadeMinutoAntigo." proxima conexao:".$unidadeMinuto."\n";
		if(
			$unidadeMinuto
			- $unidadeMinutoAntigo
			>=$intervaloMaximo || $i==$result->num_rows
		)
		{
			//echo "[ ## CAMINHO ] detectado novo caminho"."\n";
			//	echo $data_antiga."-".$data_hora_minuto."\n";
			$caminho.="]";
			//if($qntd_caminhos>0)
			//	$caminhos.=", ";
			$qntd_caminhos++;
			$caminhos.=$caminho;
			$caminho=", \"".$qntd_caminhos." caminho\":[";
			$qntd_saltos=0;
		}
//		if(
//			!((substr($data_minuto,0,2)==substr($data_antiga,0,2))&&
//			(substr($data_minuto,3,1)==substr($data_antiga,3,1)))
//		)
//			echo "detectado um salto na data".$data_antiga." para ".$data_minuto."\n";
		//echo $ap_ip_antigo."::".$ap_ip."\n";

		if(	$ap_ip_antigo	!=	$ap_ip	){
			//echo "[ # SALTO ] registrando novo salto\n";
			if($qntd_saltos>0)
				$salto=", ";
			else
				$salto="";
			$salto.="{\"ap_ip\":\"".$ap_ip."\", \"data\":\"".$data."\", \"ap_nome\":\"".$ap_nome."\"}";

			$caminho.=$salto;
			//echo "caminho ".$qntd_caminhos.":".$caminho."\n";

			$qntd_saltos++;
			$ap_ip_antigo=$ap_ip;
		}

		$data_antiga=$data_hora_minuto;

		if($i==($result->num_rows-1))
		{
			//echo "registrando ultimo caminho\n";
			$caminho.="]";
			$caminhos.=$caminho;

			//echo "registrando ultima conexao\n";
			$caminhos.=", \""."last_seen"."\":[{\"ap_ip\":\"".$ap_ip."\", \"data\":\"".$data."\", \"ap_nome\":\"".$ap_nome."\"}]";
		}
	}
	$caminhos.="}";

	echo $caminhos."\n";

  $result -> free_result();
}

$mysqli -> close();


?>