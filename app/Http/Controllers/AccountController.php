<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function accountDetail(){
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "webdev");

    // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        $info = session('status')[0];
        return view('account_detail')->with('info', $info);
    }
}
