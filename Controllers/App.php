<?php

require_once 'Database.php';
require_once 'ShoppingList.php';
require_once 'Item.php';

class App {
    private $request_method;

    public function __construct()
    {
        // HTTP Request Method
        $this->request_method = $_SERVER["REQUEST_METHOD"];
    }

    public function run()
    {
        switch($this->request_method) {
            case 'GET':
                if(!empty($_GET["listId"])) {
                    $list = new ShoppingList();
                    $response = $list->get($_GET['listId']);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                else if(!empty($_GET["itemId"])) {
                    $item = new Item();
                    $response = $item->get($_POST['itemId']);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                else {
                    $list = new ShoppingList();
                    $response = $list->all();
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                break;

            case 'POST':
                // criar lista
                if(!empty($_POST['title'])) {
                    $list = new ShoppingList();
                    $list->add($_POST['title']);
                }
                // duplicar lista
                else if(!empty($_GET['listIdDuplicate'])) {
                    $list = new ShoppingList();
                    $list->duplicate($_GET['listIdDuplicate']);
                }
                // adicionar item em uma lista existente
                else if(!empty($_POST['item_title'])) {
                    $item = new Item();
                    var_dump($_POST);
                    $item->add($_POST['item_title'], $_POST['quantity'], $_GET['listIdItems']);
                }
                // Metodo não permitido
                else {
                    header("HTTP/1.0 400 Bad Request");
                }
                break;

            case 'PUT':
                // atualizar a quantidade de um item
                $itemId = $_GET['itemId'];
                parse_str(file_get_contents('php://input'), $_PUT);
                $item = new Item();
                $item->update($itemId, intval($_PUT['quantity']));
                break;

            case 'DELETE':
                // remover item
                $item = new Item();
                $item->remove($_GET['itemId']);
                break;

            default:
                header("HTTP/1.0 405 Method Not Allowed");
            break;
        }
    }
}