<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //mencegah hacking url
        is_logged_in();
    }

    //shop default
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Item Shop';

        $data['item'] = $this->db->get('item')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/index', $data);
        $this->load->view('templates/footer');
    }

    public function payment()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Payment';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/payment', $data);
        $this->load->view('templates/footer');
    }

    public function cart()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Cart';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/cart', $data);
        $this->load->view('templates/footer');
    }

    public function deleteCart()
    {
        $rowid = $_POST['rowid'];
        $id = $_POST['cart_id'];
        $this->cart->remove($rowid);
        $this->db->delete('item_cart', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item Cart Removed!</div>');
        redirect('shop/cart');
    }

    public function addtoCart($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $item = $this->db->get_where('item', ['id' => $id])->row_array();

        $this->form_validation->set_rules('amount', 'required');
        if ($_POST['amount'] > 0) {
            $datas = [
                'id' => $item['id'],
                'qty' => $_POST['amount'],
                'price' => $item['price'],
                'name' => $item['name'],
                'image' => $item['image'],
                'description' => $item['description']
            ];

            $this->cart->insert($datas);

            $database = [
                'item_id' => $item['id'],
                'username_id' => $data['user']['id'],
                'qty' => $_POST['amount'],
                'price' => $item['price'],
                'name' => $item['name'],
                'image' => $item['image'],
                'description' => $item['description']
            ];

            $this->db->insert('item_cart', $database);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">new Item Added to Cart!</div>');
            redirect('shop');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Amount Required!</div>');
            redirect('shop');
        }
    }
}
