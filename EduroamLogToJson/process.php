<?php
    echo "[";
    $file_name = "../tmp/logfile";
    $vetor_entradas=array();
    $vetor_comandos=array();
    $cat_file = "cat ".$file_name;
    exec($cat_file,$conteudo_arquivo,$return);
    $head=1;$tail=0;$number_of_entry=0;
    for($linha_arquivo=0;$linha_arquivo<count($conteudo_arquivo);$linha_arquivo++){
    //loop que percorre todo o arquivo, linha a linha
        if(strlen($conteudo_arquivo[$linha_arquivo])!=0){
        //condicional para verificar se a linha do arquivo não esta vazia, representando um atributo ou a criação de uma nova entrada
            if($conteudo_arquivo[$linha_arquivo][0]!="\t"){
                if($number_of_entry!=0)
                    echo "},\n";
                //echo 
                $number_of_entry++;
                echo "{"."\n";
                $number_of_attributes=0;
                do{
                    if($linha_arquivo>=count($conteudo_arquivo))
                        break;
                    if(strlen($conteudo_arquivo[$linha_arquivo])==0)
                        break;                 
                    $attribute = $conteudo_arquivo[$linha_arquivo];
                    if($number_of_attributes==0)
                    {
                        $attribute_name = "\"date\"";
                        $attribute_value = "\"".$conteudo_arquivo[$linha_arquivo]."\"";
                        echo $attribute_name.":".$attribute_value."\n";
                    }
                    else
                    {
                        echo ",";
                        $attribute_name = "\"".trim(explode("=",substr($attribute,1))[0])."\"";
                        $attribute_value = "";
                        if(strlen(explode("\"",trim(explode("=",substr($attribute,1))[1]))[0])!=0)
                            $attribute_value = "\"".explode("\"",trim(explode("=",substr($attribute,1))[1]))[0]."\"";
                        else
                            $attribute_value = "\"".explode("\"",trim(explode("=",substr($attribute,1))[1]))[1]."\"";
                        echo $attribute_name.":".$attribute_value."\n";
                    }
                    $number_of_attributes++;
                    
                    if($linha_arquivo+1>=count($conteudo_arquivo))
                        break;    
                    $linha_arquivo++;
                }while(
                    strlen($conteudo_arquivo[$linha_arquivo])>0 &&
                    $conteudo_arquivo[$linha_arquivo][0]=="\t" &&
                    $linha_arquivo < count($conteudo_arquivo)
                );
            }
        }//if(strlen($conteudo_arquivo[$linha_arquivo])==0)
    }//for($linha_arquivo=0;$linha_arquivo<count($result);$linha_arquivo++)
    echo "}]";
?>