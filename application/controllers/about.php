<?php
defined('BASEPATH') or exit('No direct script access allowed');


class about extends CI_Controller
{
	public function index(){

		$data['title'] = 'bajuUnik.com | Menu Management';
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		 	$this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pages/about', $data);
            $this->load->view('templates/footer');
	}
}
	