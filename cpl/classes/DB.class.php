<?php

class DB
{
    private $pdo = null;
    private $stmt = null;
    public $count = null;

    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=localhost;dbname=news;charset=utf8",
                "root", "", [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    function checkLogin($sql,$args=[])
    {
        $result = false;
        try {

            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($args);
            $this->count=$this->stmt->rowCount();
            if($this->count >0) {

            }

        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;

        return $result;
    }




    function select($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();

        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;

        return $result;
    }

    function insert($sql, $info)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($info);
            $result = $this->pdo->lastInsertId();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }

    function delete($sql, $info)
    {
        $result ='deleted';
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($info);
            $this->stmt->fetchAll();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;

    }

    function update($sql, $info = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($info);
            $result = "updated";
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }
}
/*
$db =new DB();
$result=$db->select('select * from users');
print_r($result);*/
