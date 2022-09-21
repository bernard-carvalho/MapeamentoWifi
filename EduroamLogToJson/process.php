<?php
    echo "[";
    $file_name = "../tmp/logfile";
    $cat_file_command = "cat ".$file_name;
    exec($cat_file,$conteudo_arquivo,$return);    
    echo "]"
?>