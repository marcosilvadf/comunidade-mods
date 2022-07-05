<?php
require_once 'connect/connect.php';

class UserDAO{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    public function login(UserDTO $userDTO)
    {
        try
        {
            $sql = 'SELECT * FROM tb_user WHERE name = ? AND password = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $userDTO->getName());
            $stmt->bindValue(2, $userDTO->getPass());
            $stmt->execute();
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }

    public function save(UserDTO $userDTO)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO tb_user (name, profile, password, recovery) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $userDTO->getName());
            $stmt->bindValue(2, $userDTO->getProfile());
            $stmt->bindValue(3, $userDTO->getPass());
            $stmt->bindValue(4, $userDTO->getKeyForPass());
            $stmt->execute();
            $id = $this->pdo->lastInsertId();
            $this->pdo->commit();
            return $id;
        } catch (PDOException $e)
        {
            $this->pdo->rollBack();
            return $e;
        }
    }
    
    public function listAll()
    {
        try
        {
            $sql = "SELECT * FROM tb_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e)
        {
            return $e;
        }
    }

    public function findById($id)
    {
        try
        {
            $sql = "SELECT u.*, count(m.modId) AS qtdMods FROM tb_user AS u INNER JOIN tb_mods AS m ON u.id = m.userId WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }

    public function findByName($name)
    {
        try
        {
            $sql = "SELECT * FROM tb_user WHERE name = '$name'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }
}