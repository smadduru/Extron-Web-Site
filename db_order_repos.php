<?php

namespace smadduru\finalP;


require_once 'I_Order_Repo.php';
require_once 'Order.php';

class db_order_repos implements I_Order_Repo
{


    private $dbfile = 'order_db_pdo.sqlite';
    private $db;

    public function __construct(){

        $this->db = new \PDO('sqlite:' . $this->dbfile);


        $this->db->exec("CREATE TABLE IF NOT EXISTS orders (Id INTEGER PRIMARY KEY, Title TEXT, Quantity TEXT, Fullname TEXT)");
    }


    public function saveOrder($order)
    {

        if ($order->getId() != '') {

            $stmh = $this->db->prepare("UPDATE orders SET Title = :title, Quantity =:quantity, Fullname = :name WHERE id = :id ");
            $stmh->bindParam(':title', $order->getTitle());
            $stmh->bindParam(':quantity', $order->getQuantity());
            $stmh->bindParam(':id', $order->getId());
            $stmh->bindParam(':name', $order->getFullname());
            $stmh->execute();

        } else {

            $stmh = $this->db->prepare("INSERT INTO orders (Title, Quantity, Fullname) VALUES (:title, :quantity, :name)");
            $stmh->bindParam(':title', $order->getTitle());
            $stmh->bindParam(':quantity', $order->getQuantity());
            $stmh->bindParam(':name', $order->getFullname());
            $stmh->execute();

        }
    }
    public function getAllOrders()
    {
        // TODO: Implement getAllOrders() method.
        $orderlist = array();
        $result = $this->db->query('SELECT * FROM orders');
        foreach($result as $row) {
            $aOrder = new Order();
            $aOrder->setTitle($row['Title']);
            $aOrder->setQuantity($row['Quantity']);
            $aOrder->setFullname($row['Fullname']);
            $aOrder->setId($row['Id']);
            $orderlist[$aOrder->getId()] = $aOrder;
        }
        return $orderlist;
    }

    public function getOrderById($id)
    {
        // TODO: Implement getOrderById() method.
        $orderList = $this->getAllOrders();
        if (array_key_exists($id, $orderList)) {
            return $orderList[$id];
        }

    }

    public function deleteOrder($orderId)
    {
        // TODO: Implement deleteCourse() method.

        $stmh = $this->db->prepare("DELETE FROM orders WHERE id = :id");
        $stmh->bindParam(':id', intval($orderId));
        $stmh->execute();
    }


}