<?php

if ($_FILES['file']['error'] == 4 ) {
    echo 'please select file';
}else{
    #print_r($_FILES);
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $exp = explode('.', $_FILES['file']['name']);
        $exp=$exp[0];

        $valid_file_extensions = [
            'image/jpeg',
            'image/png',
            'image/gif',
        ];

        $valid_file_size = (1024 * 1024 * 3);

        $file_extension = $_FILES['file']['type']; 
        if(in_array($file_extension, $valid_file_extensions)){
            if($valid_file_size >= $_FILES['file']['size']){
                $unique_id = uniqid();

                $upload = move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'. $unique_id. '.'. $exp);
                if($upload){
                    echo '<h2>FILE UPLOADED</h2>';
                    echo '<img src="upload/'. $unique_id. '.'. $exp.  '">';
                }else{
                    echo 'something went wrong.';
                }
            }else{
                echo 'Maximum 3MB file can be uploaded';
            }

        }else{
            echo 'File can only be in jpeg, png, gif format.';
        }

    }
    else{
        echo 'Something went wrong when the file was uploaded'; 
    }
}


#copy($_FILES['file']['tmp_name'], 'upload/'. $_FILES['file']['name']); 

?>