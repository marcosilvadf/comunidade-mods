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
}