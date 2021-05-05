<?php

$connect = mysqli_connect('localhost','root','','project1');

if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}
?>