<?php

    function superrmdir($diretorio) {

        if (is_dir($diretorio)) {

            $objects = scandir($diretorio);

            foreach ($objetos as $objeto) {

                if ($objeto != "." && $objeto != "..") {

                    if (filetype($diretorio."/".$objeto) == "diretorio"){

                        rrmdir($diretorio."/".$objeto);

                    }else{

                        unlink($diretorio."/".$objeto);

                    }

                }

            }

            reset($objetos);

            rmdir($diretorio);

        }

    }

?>
