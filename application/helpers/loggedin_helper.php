<?php
function is_logged_in()
{
    // untuk mengambil library yang ada di dalam CI
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where(
            'user_access',
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );

        if ($userAccess->num_rows() < 1) {
            $ci->load->view('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

// activate user
function check_activeuser($user_id)
{
    $ci = get_instance();

    $ci->db->where('id', $user_id);
    $result = $ci->db->get('user')->row_array();

    $is_activate = $result['is_active'];
    if ($is_activate == 1) {
        return "checked='checked'";
    }
}

function check_activesubmenu($submenu_id)
{
    $ci = get_instance();

    $ci->db->where('id', $submenu_id);
    $result = $ci->db->get('user_sub_menu')->row_array();

    $is_activate = $result['is_active'];
    if ($is_activate == 1) {
        return "checked='checked'";
    }
}

function checkCart()
{
    $ci = get_instance();
    $data['user'] = $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();
    $data['cart'] = $ci->db->get_where('item_cart', ['username_id' => $data['user']['id']])->result_array();
    $data['item'] = $ci->db->get('item')->result_array();

    $cart_check = $ci->cart->contents();

    //jika ada data di item_cart
    if ($data['cart'] > 0) {
        // jika di cart kosong
        if (empty($cart_check)) {
            foreach ($data['cart'] as $cart) {
                $data = [
                    'id' => $cart['id'],
                    'qty' => $cart['qty'],
                    'price' => $cart['price'],
                    'name' => $cart['name'],
                    'image' => $cart['image'],
                    'description' => $cart['description']
                ];
                $ci->cart->insert($data);
            }
        }
    }
}
