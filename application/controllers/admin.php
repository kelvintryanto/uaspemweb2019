<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //mencegah hacking url
        is_logged_in();
    }

    public function index()
    {
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Administrator Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function userlist()
    {
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | User List';

        $data['users'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/userlist', $data);
        $this->load->view('templates/footer');
    }

    public function report()
    {
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Report';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('templates/footer');
    }

    public function manageItem()
    {
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Manage Item';
        $data['item'] = $this->db->get('item')->result_array();

        $this->form_validation->set_rules('itemName', 'Item Name', 'required|trim');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manageItem', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->session->userdata('username');

            //upload image to folder
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048'; //dalam ukuran kb
                $config['upload_path'] = './assets/img/item/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'name' => $this->input->post('itemName'),
                'stock' => $this->input->post('stock'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
                'image' => $upload_image,
                'username' => $username
            ];

            $this->db->insert('item', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" style="text-align: center" role="alert">New Item Added!</div>');
            redirect('admin/manageitem');
        }
    }

    public function addNewItem()
    { }

    public function role()
    {
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Role Management';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        // untuk mengambil data spesifik user
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Role Access';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        //untuk menghilangkan role access admin
        $this->db->where('id!=1');
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access', $data);
        } else {
            $this->db->delete('user_access', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" style="text-align: center" role="alert">Access Changed!</div>');
    }
}
