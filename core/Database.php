<?php

namespace Core;

class Database
{
    private $pdo;
    private $sql = '';


    public function connect(){ //connect to database;
        require "private/connection.php";
        $pdo = null;
        try {
            $pdo = new \PDO("mysql:host=$servername; dbname=$db; charset=utf8", $username, $password);
        } catch (PDOException $e) {
            print 'ERROR: ' . $e->getMessage();
        }
        $this->pdo = $pdo;
        //debug($this->pdo);
    }

    public function select($fields = '*'){ //pasirenkam ka selectinsim
        $this->sql .='SELECT '.$fields;
        return $this;
    }

    public function from($table){
        $this->sql .= ' FROM ' .$table;
        return $this;
    }

    public function insert($table, $fields, $values){
        $this->sql .= 'INSERT INTO ' .$table. '(' .$fields. ')' . ' VALUES ' . '(' . $values . ')';
        return $this;
//        die($this->sql);
    }

    public function update($table, $setContent){
        $this->sql .= "UPDATE $table SET $setContent";
        return $this;
    }

    public function andWhere($field, $value){
        $this->sql .= " AND $field = '$value'";
        return $this;
    }

    public function delete(){
        $this->sql .= 'DELETE ';
        return $this;
    }

    public function execute(){
        $this->connect();
        $sql = $this->sql;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->sql='';
        return $stmt;
    }

    public function getAll()
    {
        $stmt = $this->execute();
        $data = [];
        while($row = $stmt->fetchObject()){
            $data[] = $row;
        }
        return $data;
    }

    public function get()
    {
        $stmt = $this->execute();
        return $stmt->fetchObject();
    }

    public function where($fieldanme, $value){
        $this->sql .= " WHERE $fieldanme = '$value'";
        return $this;
    }

    public function whereLike($fieldanme, $value){
        $this->sql .= " WHERE $fieldanme LIKE '%$value%'";
        return $this;
    }
}