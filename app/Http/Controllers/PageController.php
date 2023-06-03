<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // ini udah dipencet load more jadi bakal nampilin sampe 1 juta data
    public function product(Request $request){
        if(isset($request['submit']))
        return view('product')->with('load', 1000000);
        return redirect()->back();
    }

    public function productDetail($get){
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }   

        $product = "SELECT * FROM product WHERE product_id = '".$get."';";
        $product = mysqli_query($conn, $product);
        $product = mysqli_fetch_all($product, MYSQLI_ASSOC);
        $product = $product[0];

        $related = "SELECT * FROM product WHERE category_id = '".$product['category_id']."';";
        $related = mysqli_query($conn, $related);
        $related = mysqli_fetch_all($related, MYSQLI_ASSOC);
        $dump = array();
        $count = 0;
        foreach($related as $r){
            if($count>7) break;
            $dump[] = $r;
        }
        // dump($dump);

        return view('product-detail')->with('product', $product)->with('related', $related);
    }

    public function productCategory($get){
        if($get == 'Women') $cat = 'F';
        else if($get == 'Men') $cat = 'M';
        else $cat = 'U';
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }   

        $product = "SELECT * FROM product WHERE category_id = '".$cat."';";
        $product = mysqli_query($conn, $product);
        $product = mysqli_fetch_all($product, MYSQLI_ASSOC);
        
        return view('product-category')->with('cat', $cat)->with('get', $get);
    }
    
}
