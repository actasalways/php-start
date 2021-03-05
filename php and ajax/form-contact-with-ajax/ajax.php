<?php

require 'db.php';

//if(isset($_POST['submit'])){ // or 

$result = [];

if (isset($_POST['type'])) {
    if($_POST['type'] == 'contact'){

        $namesurname = $_POST['namesurname'] ?? false;
        $email = $_POST['email'] ?? false;
        $message = $_POST['message'] ?? false;

        if(!$namesurname){
            $result['err'] = 'Name Surname field cannot be empty ';
            $result['target'] = 'namesurname';
        }elseif (!$email) {
            $result['err'] = 'E-Mail field cannot be empty ';
            $result['target'] = 'email';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result['err'] = 'Invalid e-mail format ';
            $result['target'] = 'email';
        }elseif (!$message) {
            $result['err'] = 'Message field cannot be empty ';
            $result['target'] = 'message';
        }else{
            //insert

            $query = $db ->prepare('INSERT INTO contact set 
            contact_namesurname=:namesurname, contact_email=:email, contact_message=:message ');
            $insert_result = $query->execute([
                'namesurname' => $namesurname,
                'email' => $email,
                'message' => $message 
            ]);

            if($insert_result){
                $result['successful'] = 'Your message has been sent, thanks.';
            }else{
                $result['err'] = 'Something went wrong.'; 
            }

        }

    }
}

echo json_encode($result);

