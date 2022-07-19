<?php
require_once 'connect/connect.php';
require_once '../dto/denunDTO.php';
require_once '../dto/modDTO.php';
require_once '../dto/userDTO.php';
require_once '../dto/adminDTO.php';

class AdminDAO{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    public function login(AdminDTO $adminDTO)
    {
        try
        {
            $sql = "SELECT * FROM tb_admin WHERE name = ? AND pass = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $adminDTO->getName());
            $stmt->bindValue(2, $adminDTO->getPass());
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e)
        {
            return false;
        }
    }

    public function listAllMods()
    {
        try
        {
            $sql = "SELECT m.*, u.* FROM tb_mods AS m INNER JOIN tb_user AS u ON m.userId = u.id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $mods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($mods))
            {
                $resMods[0] = true;
                $resMods[1] = $mods;
                return $resMods;
            }else
            {
                $resMods[0] = true;
                $resMods[1] = 'Conjunto vazio!';
                return $resMods;
            }
        } catch (PDOException $e)
        {
            $resMods[0] = false;
            $resMods[1] = $e->getMessage();
            return $resMods;
        }
    }

    public function listAllUsers()
    {
        try
        {
            $sql = "SELECT * FROM tb_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($users))
            {
                $resUsers[0] = true;
                $resUsers[1] = $users;
                return $resUsers;
            }else
            {
                $resUsers[0] = true;
                $resUsers[1] = 'Conjunto vazio!';
                return $resUsers;
            }
        } catch (PDOException $e)
        {
            $resUsers[0] = false;
            $resUsers[1] = $e->getMessage();
            return $resUsers;
        }
    }

    public function listAllDenun()
    {
        try
        {
            $sql = "SELECT d.*, u.*, us.name AS nameD, us.profile AS profileD FROM tb_denunciation AS d INNER JOIN tb_user AS u ON d.tb_user_id = u.id INNER JOIN tb_user AS us ON d.tb_mods_userId = us.id ORDER BY status";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $denun = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($denun))
            {
                $resDenun[0] = true;
                $resDenun[1] = $denun;
                return $resDenun;
            }else
            {
                $resDenun[0] = true;
                $resDenun[1] = 'Conjunto vazio!';
                return $resDenun;
            }
        } catch (PDOException $e)
        {
            $resDenun[0] = false;
            $resDenun[1] = $e->getMessage();
            return $resDenun;
        }
    }

    public function toggleStatus(DenunDTO $denunDTO)
    {
        try
        {
            $sql = "UPDATE tb_denunciation SET status = ? WHERE tb_denunciation.tb_user_id = ? AND tb_denunciation.tb_mods_modId = ? AND tb_denunciation.tb_mods_userId = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $denunDTO->getStatus());
            $stmt->bindValue(2, $denunDTO->getUserId());
            $stmt->bindValue(3, $denunDTO->getModId());
            $stmt->bindValue(4, $denunDTO->getUserModId());
            $resAlter[0] = $stmt->execute();
            return $resAlter;
        } catch (PDOException $e)
        {
            $resAlter[0] = false;
            $resAlter[1] = $e->getMessage();
            return $resAlter;
        }
    }
}