<?php

function form_filter($get)
{
    return is_array($get) ? array_map('form_filter', $get) : htmlspecialchars(trim($get));
}

$_GET = array_map('form_filter', $_GET);
$_REQUEST = array_map('form_filter', $_REQUEST);

function get($name)
{
    if (isset($_GET[$name]))
        return $_GET[$name];
}
function request($name)
{
    if (isset($_REQUEST[$name]))
        return $_REQUEST[$name];
}


$id = (int) get('id');
if(!is_int($id) || !$id ){
    echo 'ID must be integer';
    exit;
}

echo request('id');


?>


<form action="get-request-method.php?id=8" method="get">
    Search:
        <input type="text" value="<?php echo get('word') ?>" name="word">
        <hr>

<?php 



?>
</form>