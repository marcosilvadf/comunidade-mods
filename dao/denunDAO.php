<?php
require_once 'connect/connect.php';

class DenunDAO{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    public function saveDenun(DenunDTO $denunDTO)
    {
        try {
            $sql = "INSERT INTO tb_denunciation (tb_user_id, tb_mods_modId, tb_mods_userId, titleD, descD) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $denunDTO->getUserId());
            $stmt->bindValue(2, $denunDTO->getModId());
            $stmt->bindValue(3, $denunDTO->getUserModId());
            $stmt->bindValue(4, $denunDTO->getTitle());
            $stmt->bindValue(5, $denunDTO->getDesc());
            return $stmt->execute();
        } catch (PDOException $e)
        {
            return false;
        }
    }

    public function deleteByModId($id)
    {
        try
        {
            $sql = "DELETE FROM tb_denunciation WHERE tb_mods_modId  = $id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function deleteByUserId($id)
    {
        try
        {
            $sql = "DELETE FROM tb_denunciation WHERE tb_mods_userId = $id OR tb_user_id = $id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}