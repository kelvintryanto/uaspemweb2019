<?php
$provinceID = $_POST["provinceID"];

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
$cityJSON = (json_decode($city, true))['rajaongkir']['results'];
var_dump($cityJSON);
die;
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = '<option value="">Select City</option>';
    foreach ($cityJSON as $city) {
        $result .= '<option value="' . $city['city_id'] . '">' . $city['city_name'] . '</option>';
    }
}
echo $result;
