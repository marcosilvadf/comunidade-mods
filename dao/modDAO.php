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

    public function listAll()
    {
        try {
            $sql = 'SELECT * FROM tb_mods';
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
            $sql = "SELECT * FROM tb_mods WHERE userId = '$id'";
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
}