<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartAddController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        // Retrieve the product data from the request
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        $productId = $request->input('product_id');
        // $customerId = session('customer_id');
        $customerId = session('status')[0]['customer_id'];

        $query = 'INSERT INTO cart_product VALUES ((SELECT CART_ID FROM cart WHERE CUSTOMER_ID = ?), ? , 1 , 0);';
        // $query = 'SELECT * FROM wishlist_product WHERE PROD_ID = ? AND CART_ID = (SELECT CART_ID FROM cart WHERE CUST_ID = ?)';
        DB::statement($query, [$customerId, $productId]);

        $query = 'SELECT PRODUCT_PICTURE, PRODUCT_NAME, PRODUCT_PRICE FROM product WHERE PRODUCT_ID = ?';
        DB::select($query, [$productId]);

        return redirect()->back()->with('success', 'Product added to Cart.');
        
        
    }
}
