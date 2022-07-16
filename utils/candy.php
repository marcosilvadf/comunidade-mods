<?php 

class Cookie{
  public function saveLogin($login){
    setcookie('usermods', $login['name'], time() + (86400 * 30), "/");
    setcookie('idmods', $login['id'], time() + (86400 * 30), "/");
    setcookie('userprofile', $login['profile'], time() + (86400 * 30), "/");
    setcookie('usermodlevel', $login['level'], time() + (86400 * 30), "/");
  }

  public function logout(){
    setcookie('usermods', 'teste', time() - (86400 * 30), "/");
    setcookie('idmods', 'teste', time() - (86400 * 30), "/");
    setcookie('userprofile', 'teste', time() - (86400 * 30), "/");    
    setcookie('usermodlevel', 'teste', time() - (86400 * 30), "/");
  }
}