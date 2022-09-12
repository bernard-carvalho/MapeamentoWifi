<?php
require_once('Client.php');
$controller_user = "admin";
$controller_password = "#p4lm4s";
$controller_url = "https://10.10.0.14:8443";
$site_id = "default";
$controller_version = "5.12.35";
$option = false;
$unifi_connection = new UniFi_API\Client($controller_user, $controller_password, $controller_url, $site_id, $controller_version, $option);
$login = $unifi_connection->login();
$results = $unifi_connection->list_clients();
$a="[";
//echo json_encode($results[0]);
//echo "[";
for($i=0;$i<count($results);$i++){
//	echo "{";
//	echo "\""."mac_sta"."\":"."\"".$results[$i]->mac."\"";
//	echo ",\""."mac_ap"."\":"."\"".$results[$i]->ap_mac."\"";
//	echo ",\""."ip_sta"."\":"."\"".$results[$i]->ip."\"";
//	echo ",\""."date"."\":"."\"".date("Y-m-d H:i:s")."\"";
//	echo "}";
//	if(($i+1)!=count($results))
//		echo ",";
	$a=$a."{";
        $a=$a."\""."mac_sta"."\":"."\"".$results[$i]->mac."\"";
        $a=$a.",\""."mac_ap"."\":"."\"".$results[$i]->ap_mac."\"";
        $a=$a.",\""."ip_sta"."\":"."\"".$results[$i]->ip."\"";
        $a=$a.",\""."date"."\":"."\"".date("Y-m-d H:i:s")."\"";
        $a.="}";
        if(($i+1)!=count($results))
                $a.=",\n";

//	echo $a."\n";
}
//echo $a;
$mac_sta_command="cat /tmp/zyxelMacSta.out";
$mac_ap_command="cat /tmp/zyxelMacAp.out";
$ip_sta_command="cat /tmp/zyxelIpSta.out";


exec($mac_sta_command, $mac_sta_command_result, $return_var);
exec($mac_ap_command, $mac_ap_command_result, $return_var);
exec($ip_sta_command, $ip_sta_command_result, $return_var);
if(count($mac_sta_command_result)>0){
//	echo ",";
	$a .= ",\n";
}

for($i=0;$i<count($mac_sta_command_result);$i++){
//	echo "{";
//        echo "\""."mac_sta"."\":"."\"".$mac_sta_command_result[$i]."\"";
//        echo ",\""."mac_ap"."\":"."\"".$mac_ap_command_result[$i]."\"";
//        echo ",\""."ip_sta"."\":"."\"".$ip_sta_command_result[$i]."\"";
//        echo ",\""."date"."\":"."\"".date("Y-m-d H:i:s")."\"";
//        echo "}";
//	if(($i+1)!=count($mac_sta_command_result))
//		echo ",";
	$a.="{";
        $a.="\""."mac_sta"."\":"."\"".$mac_sta_command_result[$i]."\"";
        $a.=",\""."mac_ap"."\":"."\"".$mac_ap_command_result[$i]."\"";
        $a.=",\""."ip_sta"."\":"."\"".$ip_sta_command_result[$i]."\"";
        $a.=",\""."date"."\":"."\"".date("Y-m-d H:i:s")."\"";
        $a.="}";
        if(($i+1)!=count($mac_sta_command_result))
                $a.=",\n";

}
$a.="]";
//echo $a;
//echo"]";

$obj=json_decode($a);

$mysqli = new mysqli("localhost","admin","admin","Monitoramento");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query="";

for($i=0;$i<count($obj);$i++){
	$query="";
	$query.="INSERT INTO `Monitoramento`.`MAC_STA` (";
	$query.="`mac_sta`, ";
	$query.="`mac_ap`, ";
	$query.="`ip_sta`, ";
	$query.="`date`) VALUES (";
//	echo "Informações da estacao ".$i." :\n";
	$query.="\"".$obj[$i]->mac_sta."\",";
	$query.="\"".$obj[$i]->mac_ap."\",";
	$query.="\"".$obj[$i]->ip_sta."\",";
	$query.="\"".$obj[$i]->date."\");";
//	echo $obj[$i]->mac_sta."\n";
//	echo $obj[$i]->mac_ap."\n";
//	echo $obj[$i]->ip_sta."\n";
//	echo $obj[$i]->date."\n";
	echo "\nQuery $i:\n".$query."\n";
	mysqli_query($mysqli, $query);
}

?>
