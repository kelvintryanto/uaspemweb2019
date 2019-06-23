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

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => array(
        //         "key: c31c4d2f47fe7e913de7f645a63fa6c9"
        //     ),
        // ));

        // $province = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     // echo $response;
        //     // echo "<br><br>";
        //     // $result = json_decode($province, true);
        //     // foreach ($result['rajaongkir']['results'] as $results) {
        //     // echo $results['province'] . " ";
        //     // }
        // }

        // $data['province'] = (json_decode($province, true))['rajaongkir']['results'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: c31c4d2f47fe7e913de7f645a63fa6c9"
            ),
        ));
        $city = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else { }
        $data['city'] = (json_decode($city, true))['rajaongkir']['results'];

        $this->form_validation->set_rules('receiver', 'Receiver', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('courier', 'Courier', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('shop/cart', $data);
            $this->load->view('templates/footer');
        } else {
            $cart_check = $this->cart->contents();
            $total_price = $this->cart->total();

            $receiver = $this->input->post('receiver');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $cityPOST = $this->input->post('city');
            $courier = $this->input->post('courier');

            // memasukkan order_id untuk satu struk yang sama
            $dataOrder = [
                'user_id' => $data['user']['id'],
                'date_order' => time(),
                'price_total' => $total_price
            ];
            $this->db->insert('orderitem', $dataOrder);

            // untuk memasukkan detailorder
            $this->load->model('order_model', 'order_model');
            $this->load->model('itemcart_model', 'itemcart_model');
            $order_id = $this->order_model->getlastOrderID($data['user']['id']);
            foreach ($cart_check as $cart) {
                $datadetailOrder = [
                    'qty' => $cart['qty'],
                    'price' => $cart['price'],
                    'order_id' => $order_id,
                    'item_id' => $cart['id']
                ];
                $this->db->insert('detail_order', $datadetailOrder);
                $this->itemcart_model->deleteCartUserID($data['user']['id'], $cart['id']);
            }
            $this->cart->destroy();


            // masukkan item shipping
            $dataShipping = [
                'order_id' => $order_id,
                'receiver' => $receiver,
                'address' => $address,
                'phone' => $phone,
                'city' => $cityPOST,
                'courier' => $courier
            ];
            $this->db->insert('item_ship', $dataShipping);

            // perhitungan cost
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=457&destination=" . $cityPOST . "&weight=1000&courier=" . $courier,
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: c31c4d2f47fe7e913de7f645a63fa6c9"
                ),
            ));

            $cost = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // echo $cost;
                $ongkir = json_decode($cost, true)['rajaongkir']['results'][0]['costs'];
                // layanan service, description, ongkos, dan estimated day
                // foreach ($ongkir as $cost) {
                //     echo "Service :" . $cost['service'] . " Description: " . $cost['description'] . " ";
                //     foreach ($cost['cost'] as $ongkos) {
                //         echo "Cost : " . $ongkos['value'] . " Estimated Day :  " . $ongkos['etd'];
                //     }
                // }
            }
            // end of perhitungan cost

            redirect('shop/payment');
        }
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

    public function history()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'bajuUnik.com | History';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/history');
        $this->load->view('templates/footer', $data);
    }
}
