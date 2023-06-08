<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishlistPage(Request $request)
    {
        
        $customerId = session('status')[0]['customer_id'];
        $wishlistIdResult = DB::select('SELECT wishlist_id FROM wishlist WHERE customer_id = ?', [$customerId]);
        $wishlistId = $wishlistIdResult[0]->wishlist_id;

        $query = 'SELECT w.wishlist_id, p.product_id, p.product_picture, p.product_name, CONCAT("Rp.", FORMAT(p.product_price, 0, "id_ID"),",-") AS product_price FROM wishlist_product w LEFT JOIN product p ON w.product_id = p.product_id WHERE w.wishlist_id = ?';
        // $query = 'SELECT w.wishlist_id, p.product_id, p.product_picture, p.product_name, p.product_price FROM wishlist_product w LEFT JOIN product p ON w.product_id = p.product_id WHERE w.wishlist_id = ?';
        $wishlist = DB::select($query, [$wishlistId]);

        // $productPrice = DB::select($query2, [$wishlistId]);
        // $query = 'SELECT w.wishlist_id, p.product_id, p.product_picture, p.product_name, CONCAT("Rp.", FORMAT(p.product_price, 0),",-") AS subtotal FROM wishlist_product w LEFT JOIN product p ON w.product_id = p.product_id WHERE w.wishlist_id = ?';
        // $subtotal = DB::select($query, [$wishlistId]);

        // Pass the wishlist items to the wishlist view
        return view('wishlist-detail', compact('wishlist','wishlistId'));
    }

    // public function deleteWishlist(Request $request)
    // {
    //     $productId = $request->input('product_id');
    //     $customerId = 'CPC001';
    //     $wishlistIdResult = DB::select('SELECT wishlist_id FROM wishlist WHERE customer_id = ?', [$customerId]);
    //     $wishlistId = $wishlistIdResult[0]->wishlist_id;

    //     $query = 'DELETE FROM wishlist_product WHERE wishlist_id = ? AND product_id = ?';
    //     DB::delete($query, [$wishlistId, $productId]);

    //     return redirect()->back()->with('success', 'Product deleted from wishlist.');
    // }

    public function addToCart(Request $request){
        // $customerId = session('status')[0]['customer_id'];
        $customerId = 'CPC001';
        $wishlistIdResult = DB::select('SELECT wishlist_id FROM wishlist WHERE customer_id = ?', [$customerId]);
        $wishlistId = $wishlistIdResult[0]->wishlist_id;
        
        // $cartId = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $query = 'SELECT product_id FROM wishlist_product WHERE wishlist_id = ?';
        // $wishlist = DB::select($query, [$wishlistId]);
        $productId = $request->input('product_id');
        // foreach($wishlist as $item){
        // }

        // if(DB::select('SELECT * FROM cart_product WHERE cart_id = (SELECT cart_id FROM cart WHERE customer_id = ?) AND product_id = ?', [$customerId, $productId])){
        //     return redirect()->back()->with('error', 'Product already in cart.');
        // }
        if(DB::select('SELECT * FROM cart_product WHERE cart_id = (SELECT cart_id FROM cart WHERE customer_id = ?) AND product_id = ?', [$customerId, $productId])){
            $query = 'UPDATE cart_product SET quantity = quantity + 1 WHERE cart_id = (SELECT cart_id FROM cart WHERE customer_id = ?) AND product_id = ?';
            DB::update($query, [$customerId, $productId]);
        }
        else{
            $query = 'INSERT INTO cart_product (cart_id, product_id, quantity) VALUES ((SELECT cart_id FROM cart WHERE customer_id = ?), ?, 1)';
            DB::insert($query, [$customerId, $productId]);
        }

        // $query = 'DELETE FROM wishlist_product WHERE wishlist_id = ? AND product_id = ?';
        // DB::delete($query, [$wishlistId, $productId]);
        $query = 'DELETE FROM wishlist_product WHERE wishlist_id = ? AND product_id = ?';
        DB::delete($query, [$wishlistId, $productId]);

        return redirect()->back()->with('success', 'Product added to cart.');

        // if(empty($wishlist_product)){
            //     $query = 'INSERT INTO wishlist_product (WISHLIST_ID, PRODUCT_ID, QUANTITY) VALUES ((SELECT PRODUCT_ID FROM PRODUCT WHERE CUST_ID = ?), ?, 1)';
            //     DB::insert($query, [$id, $prodid]);
            // }else{
            //     $query = 'UPDATE wishlist_product SET QUANTITY = QUANTITY + 1 WHERE PRODUCT_ID = ? AND WISHLIST_ID = (SELECT PRODUCT_ID FROM PRODUCT WHERE CUST_ID = ?)';
            //     DB::update($query, [$prodid, $id]);
    }

    public function deleteWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $customerId = session('status')[0]['customer_id'];
        $wishlistIdResult = DB::select('SELECT wishlist_id FROM wishlist WHERE customer_id = ?', [$customerId]);
        $wishlistId = $wishlistIdResult[0]->wishlist_id;

        $query = 'DELETE FROM wishlist_product WHERE wishlist_id = ? AND product_id = ?';
        DB::delete($query, [$wishlistId, $productId]);

        return redirect()->back()->with('success', 'Product deleted from wishlist.');
    }
}