<?php 

#mime_content_type()

#mime_content_type('result.php');

?>

<form action="result.php" method="POST" enctype="multipart/form-data">
    Select File : 
    <input type="file" name="files[]" multiple>
    <br>
    <button type="submit">
        Upload
    </button>

</form>