<?php 
function checkPrivilege($uri = false) {
    $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
    if(empty($_SESSION['id_admin']['privileges'])){
        return false;
    }
    $privileges = $_SESSION['id_admin']['privileges'];

    $privileges = implode("|", $privileges);
    preg_match('/dashboard\.php$|Quan_ly_admin.admin_privilege\.php.action=save$|Quan_ly_thong_bao.messages\.php$|' .$privileges.'/', $uri ,$matches);
    return !empty($matches);

};

