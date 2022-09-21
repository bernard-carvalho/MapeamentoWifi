<?php
    echo "[";
    $file_name = "../tmp/logfile";
    $cat_file_command = "cat ".$file_name;
    exec($cat_file_command,$conteudo_arquivo,$return);
    for($linha_arquivo=0;$linha_arquivo<count($conteudo_arquivo);$linha_arquivo++){
        if(strlen($conteudo_arquivo[$linha_arquivo])==0)
            break;
    }
    echo "]";
?>