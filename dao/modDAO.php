<?php
require_once 'connect/connect.php';

class ModDAO{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    public function saveMod(ModDTO $modDTO)
    {
        try {
            $this->pdo->beginTransaction();
            $sql = 'INSERT INTO tb_mods (titleMod, bannerMod, descMod, sizeMod, youtubeMod, downloadMod, typeMod, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $modDTO->getTitle());
            $stmt->bindValue(2, $modDTO->getBanner());
            $stmt->bindValue(3, $modDTO->getDesc());
            $stmt->bindValue(4, $modDTO->getSize());
            $stmt->bindValue(5, $modDTO->getYt());
            $stmt->bindValue(6, $modDTO->getDown());
            $stmt->bindValue(7, $modDTO->getType());
            $stmt->bindValue(8, $modDTO->getUserId());
            $stmt->execute();           
            return $this->pdo->commit();
        } catch (PDOException $e)
        {
            $this->pdo->rollBack();
            return $e->getMessage();
        }
    }

    public function alterMod(ModDTO $modDTO)
    {
        try {
            $this->pdo->beginTransaction();
            $sql = 'UPDATE tb_mods SET titleMod = ?, bannerMod = ?, descMod = ?, sizeMod = ?, youtubeMod = ?, downloadMod = ?, typeMod = ? WHERE modId = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $modDTO->getTitle());
            $stmt->bindValue(2, $modDTO->getBanner());
            $stmt->bindValue(3, $modDTO->getDesc());
            $stmt->bindValue(4, $modDTO->getSize());
            $stmt->bindValue(5, $modDTO->getYt());
            $stmt->bindValue(6, $modDTO->getDown());
            $stmt->bindValue(7, $modDTO->getType());
            $stmt->bindValue(8, $modDTO->getId());
            $stmt->execute();           
            return $this->pdo->commit();
        } catch (PDOException $e)
        {
            $this->pdo->rollBack();
            return $e->getMessage();
        }
    }

    public function listAll()
    {
        try {
            $sql = 'SELECT m.*, u.* FROM tb_mods AS m INNER JOIN tb_user AS u ON m.userId = u.id ORDER BY u.level DESC, m.countDownloads DESC';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $mods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mods;   
        } catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }        
    }

    public function listModsById($id)
    {
        try {
            $sql = "SELECT * FROM tb_mods WHERE userId = '$id' ORDER BY modId DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $mods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mods;   
        } catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }        
    }

    public function getModById($id)
    {
        try {
            $sql = "SELECT u.*, m.* FROM tb_mods AS m INNER JOIN tb_user AS u ON u.id = m.userId WHERE modId = '$id'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $mod = $stmt->fetch(PDO::FETCH_ASSOC);
            return $mod;   
        } catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }        
    }

    public function listFiveMods()
    {
        try {
            $sql = 'SELECT m.*, u.* FROM tb_mods AS m INNER JOIN tb_user AS u ON m.userId = u.id ORDER BY u.level DESC, m.countDownloads DESC LIMIT 5';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $mods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mods;   
        } catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }        
    }

    public function deleteModById($id)
    {
        try {
            $sql = "DELETE FROM tb_mods WHERE modId = $id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();   
        } catch(PDOException $e)
        {
            return false;
        }        
    }
}