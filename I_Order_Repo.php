<?php


namespace smadduru\finalP;


interface I_Order_Repo
{

    public function saveOrder($order);
    public function getAllOrders();
    public function getOrderById($id);
    public function deleteOrder($orderId);

}