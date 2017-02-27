<?php
var_dump($_REQUEST);
file_put_contents('test.txt', print_r($_REQUEST,true),FILE_APPEND);
?>