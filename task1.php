<?php 


        $field = 0;
        for ($i = 0; $i < 65; $i++) {

            if ($field % 2 == 0) {
                $field = 0;
            } else {
                $field = 1;
            }

            echo $field;
			
            if ($i % 8 == 0) {
                echo "\n";
            } else {
                $field++;
            }

        }


