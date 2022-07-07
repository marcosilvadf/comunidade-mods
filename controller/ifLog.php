<?php
require_once '../dao/userDAO.php';

$userDAO = new UserDAO();

if(!empty($_COOKIE['idmods']) && is_numeric($_COOKIE['idmods']))
{
    $user = $userDAO->findById($_COOKIE['idmods']);
    $user['registrationDate'] = date('d/m/Y', strtotime($user['registrationDate']));
    $user = json_encode($user);
}else
{
    $user = json_encode('noLog');
}

echo "<script>window.sessionStorage.setItem('id', '$user')</script>";