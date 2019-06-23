<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Itemcart_Model extends CI_Model
{
    public function deleteCartUserID($userID, $cartID)
    {
        $this->db->delete('item_cart', array('username_id' => $userID, 'id' => $cartID));
    }
}
