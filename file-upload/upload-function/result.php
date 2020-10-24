<?php

function upload($file, $limit_size=1, $file_extensions=null )
{
    $result =[];
    if ($file['error'] == 4 ) {
        $result['err'] = 'please select file';
    }else{
        #print_r($_FILES);
        if(is_uploaded_file($file['tmp_name'])){
            $exp = explode('.', $file['name']);
            $exp=$exp[0];

            $valid_file_extensions = $file_extensions? $file_extensions: [
                'image/jpeg',
                'image/png',
                'image/gif',
            ];

            $valid_file_size = (1024 * 1024) * $limit_size;

            $file_extension = $file['type']; 
            if(in_array($file_extension, $valid_file_extensions)){
                if($valid_file_size >= $file['size']){
                    $unique_id = uniqid();

                    $upload = move_uploaded_file($file['tmp_name'], 'upload/'. $unique_id. '.'. $exp);
                    if($upload){
                        #echo '<h2>FILE UPLOADED</h2>';
                        $result['file'] = 'upload/'. $unique_id. '.'. $exp;
                    }else{
                        $result['err'] = 'something went wrong.';
                    }
                }else{
                    $result['err'] = 'Maximum 3MB file can be uploaded';
                }
                
            }else{
                $result['err'] = 'File can only be in jpeg, png, gif format.';
            }

        }
        else{
            $result['err'] = 'Something went wrong when the file was uploaded'; 
        }
    }
     return $result; 
}

$result = upload($_FILES['file']);
if(isset($result['err'])){
    echo $result['err'];
}else{
    echo '<a href="'. $result['file']. '">Click</a>';
}

#copy($_FILES['file']['tmp_name'], 'upload/'. $_FILES['file']['name']); 

?>
