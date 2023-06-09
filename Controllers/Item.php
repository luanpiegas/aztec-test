<?php

require_once 'Controllers/Database.php';

class Item
{
    /**
     * @return array
     */
    public function all() 
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('SELECT * FROM items');
        $db->close();
        return json_encode($result->fetch_all(MYSQLI_ASSOC));
    }

    /**
     * @param $title
     * @param $quantity
     * @param $listIdItems
     * @return bool|mysqli_result
     */
    public function add($title, $quantity, $listIdItems)
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('INSERT INTO items (item_title, quantity, shopping_list_id) VALUES ("'. $title .'", "'. $quantity .'", "'. $listIdItems .'")');
        $db->close();
        return $result;
    }

    /**
     * @param $itemId
     * @return array
     */
    public function get($itemId)
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('SELECT * FROM items WHERE item_id = ' . $itemId);
        $db->close();
        return $result;
    }

    /**
     * @param $itemId
     * @param $quantity
     * @return bool|mysqli_result
     */
    public function update($itemId, $quantity) 
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('UPDATE items SET quantity = '. $quantity .' WHERE item_id = ' . $itemId);
        $db->close();
        return $result;
    }

    /**
     * @param $itemId
     */
    public function remove($itemId)
    {
        $db = new Database('localhost', 'root', 'root', 'aztectest');
        $db->connect();
        $result = $db->query('DELETE FROM items WHERE item_id = ' . $itemId);
        $db->close();
    }
}