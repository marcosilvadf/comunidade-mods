<?php
require_once '../dao/userDAO.php';

$name = $_GET['name'];
$userDAO = new UserDAO();

$user = $userDAO->findByName($name);

if(!empty($user))
{
    $user = 'false';
}else
{
    $user = 'true';
}

print_r($user);
echo "<script>window.sessionStorage.setItem('id', '$user')</script>";