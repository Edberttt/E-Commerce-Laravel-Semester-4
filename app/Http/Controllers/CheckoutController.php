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

        $query = 'SELECT c.cart_id, p.product_id, p.product_picture, p.product_name, CONCAT("Rp.", FORMAT(p.product_price, 0, "id_ID"),",-") AS product_price, c.quantity FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $cart = DB::select($query, [$cartId]);

        // $query = 'SELECT SUM(p.product_price * c.quantity) AS subtotal FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $query = 'SELECT CONCAT("Rp.", FORMAT(SUM(p.product_price * c.quantity), 0),",-") AS subtotal FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        // $query = "SELECT CONCAT('Rp.', FORMAT(SUM(p.product_price * c.quantity), 0)) AS subtotal_rupiah 
        //             FROM cart_product c 
        //             LEFT JOIN product p ON c.product_id = p.product_id 
        //             WHERE c.cart_id = ?";
        $subtotal = DB::select($query, [$cartId]);

        // Pass the cart items to the cart page view
        return view('checkout', ['cart' => $cart, 'cartId' => $cartId], compact('subtotal'));
    }
}
