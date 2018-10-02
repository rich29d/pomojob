<?php

$msg = file_get_contents('template.php');
$msg = str_replace(array("[nome]","[data]"), array(strtoupper(htmlspecialchars($_GET['nome'])),$_GET['data']), $msg);

echo $msg;

?>