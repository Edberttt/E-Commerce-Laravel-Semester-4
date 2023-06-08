<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderUpdate($get){
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

    // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        $update = "UPDATE `order` SET order_status = 1, order_updated = '".now()."' WHERE order_id = '".$get."';";
        $update = mysqli_query($conn, $update);
        return redirect()->back();
    }
    public function orderUndo($get){
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");
        // $conn = mysqli_connect("127.0.0.1", "root", "root", "ALP_HAWK");

    // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        $update = "UPDATE `order` SET order_status = 0, order_updated = '".now()."' WHERE order_id = '".$get."';";
        $update = mysqli_query($conn, $update);
        return redirect()->back();
    }
}
