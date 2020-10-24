<?php

function multi_upload($files){

    $result = [];

    foreach($files['error'] as $index => $error ){
        if($error == 4){
            $result['error'] = 'Please Select File';

        }elseif($error != 0){
            $result['error'][] = 'Something Went Wrong'. $files['name'][$index] ;
        }
    }
    if(!isset($sonuc['error'])){
        global $valid_file_extensions;

        foreach($files['types'] as  $index => $type){
            if(!in_array($type, $valid_file_extensions )){
                $result['error'][] = 'File can only be in jpeg, png format#'. $files['name'][$index]; 
            }
        }

        if(!isset($sonuc['error'])){
            $max_size = (1024 * 1024 * 3 );

            foreach ($files['size'] as $index => $size){
                if($size > $max_size){
                    $result['error'][] = 'Maximum 3MB file can be uploaded#'. $files['name'][$index];
                }
            }
        }
        if(!isset($sonuc['error'])){
            foreach($files['tmp_name'] as $index => $tmp){
                $file_name = $files['name'][$index];
                $upload = move_uploaded_file($tmp, 'upload/'. $file_name);
                if($upload){
                    $result['file'][] = 'upload/'. $file_name;
                }else{
                    $result['error'][] = 'File could not be uploaded#'. $file_name;
                }
            }
        }



    }
    return $result;
}

$valid_file_extensions= [
    'image/jpeg',
    'imge/png',
    'text/plain'
];

$result = multi_upload($_FILES['files']); 

if(isset($result['file'])){
    print_r($result['file']);
    if(isset($result['error'])){
        print_r($result['error']);
    }

}elseif (isset($result['error'])) {
    if(is_array($result['error'])){
        echo implode('<br>', $result['error']);
    }else{
        echo $result['error'];
    }
}


print_r($_FILES);


?>
