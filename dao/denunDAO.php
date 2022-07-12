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

}