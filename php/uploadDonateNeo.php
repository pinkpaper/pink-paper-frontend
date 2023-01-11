<?php
require "connection.php";
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['post_uuid'])) {
    session_start();    
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");  
    $from_ip= $_SERVER['REMOTE_ADDR'];
    $from_browser= $_SERVER['HTTP_USER_AGENT'];

    function guidv4($data)
    {
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    $donate_uid = guidv4(openssl_random_pseudo_bytes(16));
    $post_uid = mysqli_real_escape_string($link, $_POST['post_uuid']);
    $from_address = mysqli_real_escape_string($link, $_POST['from_address']);
    $to_address = mysqli_real_escape_string($link, $_POST['to_address']);
    $eth_price = mysqli_real_escape_string($link, $_POST['eth_price']);
    $transaction_hash = mysqli_real_escape_string($link, $_POST['transation_hash']);
    $current_chain_id = mysqli_real_escape_string($link, $_POST['current_chain_id']);
    $current_txn_url = 'https://n3t5.neotube.io/transaction/';
    $current_user_url='https://n3t5.neotube.io/address/';
    $current_coin_symble='NEO';
    $_SESSION['transaction_hash'] = $transaction_hash;

    $query = "INSERT INTO `donate_eth`(`donate_uid`,`donate_chain_network`,`txn_network_url`,`user_address_url`,`current_coin_symble`, `post_uid`, `from_user_address`, `to_user_address`, `eth_price`, `transation_hash`, `from_ip`, `from_time`, `from_browser`) VALUES ('$donate_uid','$current_chain_id','$current_txn_url','$current_user_url','$current_coin_symble','$post_uid','$from_address','$to_address','$eth_price','$transaction_hash','$from_ip','$date_now','$from_browser')";                  
    if (mysqli_query($link, $query) ) {
        $data['status'] = 201;
        $data['success'] = "Donation added";
        $data['transaction_hash'] = $transaction_hash;
        $data['transaction_url'] = $current_txn_url.$transaction_hash;
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
        }            
?>