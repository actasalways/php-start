<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app.js"></script>

    <style>
    #successful{
        padding: 10px;
        background-color:green ;
        color: whitesmoke;
        display: none;
    }
    #err{
        padding: 10px;
        background-color:red ;
        color: black;
        display: none;
    }
    </style>
</head>
<body>
    
    <div id="err"> </div>
    <div id="successful"> </div>

    <form action="" method="POST" id="contact-form" onsubmit="return false;">
    Name Surname: <br>
    <input type="text" placeholder="Name Surname" id="namesurname" name="namesurname"><br><br>
    E-mail: <br>
    <input type="text" name="email" id="email" placeholder="E-Mail"><br><br>
    Message :<br> 
    <textarea placeholder="Message to be sent" name="message" id="message" cols="30" rows="10"></textarea><br><br>
    
    <input type="hidden" name="submit" value="1">
    <button type="submit" id="btn-send">Send</button>



    </form>

</body>
</html>