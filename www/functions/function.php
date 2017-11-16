<?php

    function picUpload($dummy_name, $dummy_size, $dummy_tmp_name) {

        if(empty($dummy_name)) {        //validates for file selection

            $errors[] = "Please select a file";
        }

        if($dummy_size > MAX_FILE_SIZE) {          //validates for file size
            $errors[] = "File too large. Maximum: ".MAX_FILE_SIZE;
            $dummy_tmp_name = null;
        }

        $rnd = rand(0000000000, 9999999999);
        $strip_name = str_replace(' ', '_', $dummy_name);

        $filename = $rnd.$strip_name; //this helps to make each uploaded file unique
        $destination = './uploads/'.$filename;

        if(!move_uploaded_file($dummy_tmp_name, $destination)) {
            $errors[] = "File not uploaded";     //validates for if file is moved
        }

    }

?>