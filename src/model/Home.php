<?php

include_once 'Connection.php';

class Home extends Connection
{
    public function displayHeaderSection()
    {
        $pdo = $this->connection();
        $query = "SELECT * FROM homepage_item;";
        $results = $pdo->query($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}