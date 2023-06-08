<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    public function checkoutPage(Request $request)
    {
        
        $customerId = session('status')[0]['customer_id'];
        
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;

        $query = 'SELECT c.cart_id, p.product_id, p.product_picture, p.product_name, CONCAT("Rp", FORMAT(p.product_price, 0, "id_ID"),",-") AS product_price, c.quantity FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $cart = DB::select($query, [$cartId]);

        // $query = 'SELECT SUM(p.product_price * c.quantity) AS subtotal FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $query = 'SELECT CONCAT("Rp", FORMAT(SUM(p.product_price * c.quantity), 0),",-") AS subtotal FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        // $query = "SELECT CONCAT('Rp.', FORMAT(SUM(p.product_price * c.quantity), 0)) AS subtotal_rupiah 
        //             FROM cart_product c 
        //             LEFT JOIN product p ON c.product_id = p.product_id 
        //             WHERE c.cart_id = ?";
        $subtotal = DB::select($query, [$cartId]);

        $query = 'SELECT customer_address FROM customers WHERE customer_id = ?';
        $customerAddressResult = DB::select($query, [$customerId]);
        $customerAddress = $customerAddressResult[0]->customer_address;

        // $query = 'SELECT '

        // Pass the cart items to the cart page view
        return view('checkout', ['cart' => $cart, 'cartId' => $cartId], compact('subtotal', 'customerAddress'));
    }

    // public function dataCheckout(Request $request)
    // {
    //     $customerId = session('status')[0]['customer_id'];
    //     $query = 'SELECT customer_address FROM customer WHERE customer_id = ?';
    //     $customerAddress = DB::select($query, [$customerId]);
    //     return view('checkout', ['customerAddress' => $customerAddress]);

    // }

    // public function checkoutAll(Request $request){
    //     $customerId = session('status')[0]['customer_id'];
    //     $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
    //     $cartId = $cartIdResult[0]->cart_id;

    //     // $query = 'SELECT c.cart_id, p.product_id, p.product_picture, p.product_name, CONCAT("Rp", FORMAT(p.product_price, 0, "id_ID"),",-") AS product_price, c.quantity FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
    //     $query = 'INSERT INTO order (order_id, customer_id, shipper_id, product_id, quantity, price) SELECT ?, product_id, quantity, price FROM cart_product WHERE cart_id = ?';
    // }

    public function checkoutAll(Request $request){
        $customerId = session('status')[0]['customer_id'];
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;

        $query = 'INSERT INTO order (order_id, customer_id, shipper_id, shipper_date, shipper_address product_id, quantity, price) SELECT ?, ?, ?, product_id, quantity, price FROM cart_product WHERE cart_id = ?';
        DB::statement($query, [1, $customerId, 1, $cartId]);

        $query = 'DELETE FROM cart_product WHERE cart_id = ?';
        DB::statement($query, [$cartId]);

        return redirect()->back()->with('success', 'Checkout Success.');
    }
}