<?php

namespace DesafioLeo;

use PDO;
use PDOException;
use PDOStatement;

class Connection
{

    private $dbHostname = "localhost";
    private $dbName = "desafio_leo";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $conn;

    private $table;

    public function __construct(string $table)
    {
        $this->table = $table;
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->dbHostname};dbname={$this->dbName}", $this->dbUsername, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            header('Location: /error');
        }
    }

    private function execute(string $query, array $params = []): PDOStatement
    {
        try {
            $statement = $this->conn->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function insert(array $values): bool
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $this->execute($query, array_values($values));

        return $this->conn->lastInsertId();
    }

    public function select(string $where = null, string $order = null, string $limit = null, string $fields = '*'): PDOStatement
    {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }

    public function update(string $where, array $values): bool
    {
        $fields = array_keys($values);
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        $this->execute($query, array_values($values));

        return true;
    }

    public function delete(string $where): bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($query);

        return true;
    }
}
