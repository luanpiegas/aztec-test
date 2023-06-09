<?php

require_once 'Controllers/Database.php';

class ShoppingList
{
    /**
     * @return array
     */
    public function all() 
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('SELECT * FROM shopping_lists');
        $db->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $title
     * @return bool|mysqli_result
     */
    public function add($title) 
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('INSERT INTO shopping_lists (list_title) VALUES ("' . $title . '")');
        $db->close();
        return $result;
    }

    /**
     * @param $listId
     * @return array
     */
    public function get($listId)
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('SELECT * FROM shopping_lists WHERE list_id = '.$listId.'');
        $db->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $listId
     * @return bool|mysqli_result
     */
    public function duplicate($listId)
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('INSERT INTO shopping_lists (list_title) SELECT list_title FROM shopping_lists WHERE list_id = '.$listId.'');
    }
}