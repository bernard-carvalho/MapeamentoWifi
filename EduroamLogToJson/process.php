<?php
    echo "[";
    $file_name = "../tmp/logfile";
    $cat_file_command = "cat ".$file_name;
    exec($cat_file_command,$conteudo_arquivo,$return);
    $number_of_entry=0;
    for($linha_arquivo=0;$linha_arquivo<count($conteudo_arquivo);$linha_arquivo++){
        if(strlen($conteudo_arquivo[$linha_arquivo])==0)
            continue;
        if($conteudo_arquivo[$linha_arquivo][0]!="\t"){
            if($number_of_entry!=0)
                echo "}, \n";
            $number_of_entry++;
        }

    }
    echo "]";
?>