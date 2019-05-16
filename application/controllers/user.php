<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
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
        $data['title'] = 'bajuUnik.com | My Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Edit Profile';
        $email = $this->input->post('email');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/editprofile', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit'])) {
            // cek gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048'; //dalam ukuran kb
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' .  $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" style="text-align: center" role="alert">Profile Account has been updated!</div>');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | Change Password';

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[6]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'New Password', 'required|trim|min_length[6]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');
            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" style="text-align: center" role="alert">Wrong Current Password!</div>');
                redirect('user/changepassword');
            } else {
                if ($newPassword == $currentPassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" style="text-align: center" role="alert">New Password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah tidak sama dengan current
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" style="text-align: center" role="alert">Password Updated!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
