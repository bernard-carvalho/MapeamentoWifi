<?php
    function get_json_answer($data)
    {
        $json_string = "[";
        $directory="/tmp/directory";
        $command_find_directory = "ls ".$directory." -l "."| cut -d':' -f2 | cut -d' ' -f2";
        //echo $command_find_directory."\n";
        exec($command_find_directory, $query, $return);
        for($directoryIndex=1;$directoryIndex<count($query);$directoryIndex++)
        {
            if($directoryIndex>1 && count($query)>2)
            {
                //echo "erro está em: ".$query[$directoryIndex]."\n";
                $json_string.=", ";
            }
            $directory_name=$query[$directoryIndex];
            $command_find_files = "ls ".$directory."/".$directory_name." -l | cut -d':' -f2 | cut -d' ' -f2";
            //echo $command_find_files."\n";
            $query2="";
            exec($command_find_files,$query2,$return);
            //var_dump($query2);
            for($fileIndex=1;$fileIndex<count($query2);$fileIndex++)
            {
                if(!strcmp($date,$query2[$fileIndex]))
                    CONTINUE;

                if($fileIndex>1 && count($query2)>2)
                    $json_string.=", ";

                $file_name = $directory."/".$query[$directoryIndex]."/".$query2[$fileIndex];
                //echo $file_name."\n";
                
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
                                $json_string.= "},\n";
                            $number_of_entry++;
                            $json_string.="{"."\n";
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
                                    $json_string.= $attribute_name.":".$attribute_value."\n";
                                }
                                else
                                {
                                    $json_string.= ",";
                                    $attribute_name = "\"".trim(explode("=",substr($attribute,1))[0])."\"";
                                    $attribute_value = "";
                                    if(strlen(explode("\"",trim(explode("=",substr($attribute,1))[1]))[0])!=0)
                                        $attribute_value = "\"".explode("\"",trim(explode("=",substr($attribute,1))[1]))[0]."\"";
                                    else
                                        $attribute_value = "\"".explode("\"",trim(explode("=",substr($attribute,1))[1]))[1]."\"";
                                    $json_string.=$attribute_name.":".$attribute_value."\n";
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
                $json_string.= "}";
            }
        }
        $json_string.= "]";

        return $json_string;
    }
?>