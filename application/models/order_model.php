<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_Model extends CI_Model
{
    public function getlastOrderID($user_id)
    {
        $query = "SELECT order_id from `orderitem` where user_id=" . $user_id . " order by order_id desc limit 1";

        $exec = $this->db->query($query)->row_array();
        if ($exec > 0) {
            return $exec['order_id'];
        }
    }

    public function getOrder()
    {
        $query = "SELECT ";
    }

    public function getOrderPaymentApproval(){
        $query = "SELECT * from `orderitem` where paymentstatus"
    }
}
