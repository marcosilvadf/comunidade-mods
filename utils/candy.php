<?php 

class Cookie{
  public function saveLogin($login){
    define('SERVERPATH', str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']));
    $userprofile = '..' . str_replace(SERVERPATH, '', $login['profile']);
    setcookie('usermods', $login['name'], time() + (86400 * 30), "/");
    setcookie('idmods', $login['id'], time() + (86400 * 30), "/");
    setcookie('userprofile', $userprofile, time() + (86400 * 30), "/");
  }

  public function logout(){
    setcookie('usermods', 'teste', time() - (86400 * 30), "/");
    setcookie('idmods', 'teste', time() - (86400 * 30), "/");
    setcookie('userprofile', 'teste', time() - (86400 * 30), "/");
  }
}