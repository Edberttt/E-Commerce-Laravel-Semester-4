<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function accountDetail(){
        $id = session('status')[0]['customer_id'];
        $info = Customer::where('customer_id', $id)->get()->first()->getAttributes();
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        $orders = 'SELECT * FROM `order` WHERE customer_id = "'.$info['customer_id'].'";';
        $orders = mysqli_query($conn, $orders);
        $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        // dump($orders);

        return view('account_detail')->with('info', $info)->with('orders', $orders);



    }

    public function accountUpdate(Request $request){
        $this->validate($request, [
            'customer_firstName' => 'required',
            'customer_lastName' => 'required',
            'customer_email' => 'required|email',
            'customer_gender' => 'required',
        ]);
        $register = $request->all();
        // dump($request['submit']);
        // $conn = new mysqli("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

        // // Periksa koneksi
        // if (mysqli_connect_errno()) {
        //     echo "Koneksi database gagal: " . mysqli_connect_error();
        //     exit();
        // }
        if($register['customer_password']==null){
            $update = $register;
            foreach($update as $key => $u){
                if($u == null) unset($update[$key]);
            }
            unset($update['_token']);
            unset($update['submit']);
            // dump($update);
            Customer::where('customer_id', $register['submit'])->update($update, ['timestamps'=>false]);
            $info = Customer::where('customer_id', $register['submit'])->first()->getAttributes();
            session()->forget('status');
            session()->push('status', $info);
            // dump($info);
            return redirect()->back()->with('info', $info);
        }
        else{
            $update = $register;
            foreach($update as $key => $u){
                if($u == null) unset($update[$key]);
            }
            unset($update['_token']);
            unset($update['submit']);
            $update['customer_password'] = Hash::make($update['customer_password']);
            // dump($update);
            Customer::where('customer_id', $register['submit'])->update($update, ['timestamps'=>false]);
            $info = Customer::where('customer_id', $register['submit'])->first()->getAttributes();
            session()->forget('status');
            session()->push('status', $info);
            // dump($info);
            return redirect()->back();
        }
    }
}
