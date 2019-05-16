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
}
