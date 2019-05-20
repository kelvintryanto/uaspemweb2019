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
        $data['title'] = 'bajuUnik.com | Shop';

        $data['item'] = $this->db->get('item')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/index', $data);
        $this->load->view('templates/footer');
    }


    public function wishlist()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Wish List';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/wishlist', $data);
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

    public function buy($id)
    {
        $item = $this->db->get_where('item', ['id' => $id])->row_array();
        $username = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('amount', 'required');
        if ($_POST['amount'] > 0) {
            $cart_item = $this->session->userdata('cart_item');
            if (count($cart_item) > 0) {
                $cart_length = count($cart_item) + 1;
                // isi data yang dikirim ke session
                $data = [
                    $cart_length => array(
                        'username_id' => $username['id'],
                        'item_id' => $item['id'],
                        'is_payment' => 0,
                        'amount' => $_POST['amount'],
                        'date_created' => time()
                    )
                ];
                $this->session->set_userdata('cart_item', $data);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Item Added to Cart!</div>');
            $cart_itemfull = $this->session->userdata('cart_item');

            redirect('shop');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Amount Required!</div>');
            redirect('shop');
        }
    }
}
