<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistAddController extends Controller
{
    //
    public function addToWishlist(Request $request)
    {
        // Retrieve the product data from the request
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }

        // $info = session('status')[0];
        // $customerId = $info['customer_id'];

        $productId = $request->input('product_id');
        // $customerId = session('customer_id');
        // $customerId = "CEC001";
        $customerId = session('status')[0]['customer_id'];

        $query = 'INSERT INTO wishlist_product VALUES ((SELECT WISHLIST_ID FROM wishlist WHERE CUSTOMER_ID = ?), ? , 1 , 0);';
        // $query = 'SELECT * FROM wishlist_product WHERE PROD_ID = ? AND CART_ID = (SELECT CART_ID FROM cart WHERE CUST_ID = ?)';
        DB::statement($query, [$customerId, $productId]);

        $query = 'SELECT PRODUCT_PICTURE, PRODUCT_NAME, PRODUCT_PRICE FROM product WHERE PRODUCT_ID = ?';
        DB::select($query, [$productId]);

        
        

        // Store the product data in the database
        
        // $query = 'INSERT INTO wishlist_product (wishlist_id, product_id, quantity, wishlist_product_status) VALUES (?, ?, ?, 0)';
        // $query = 'SELECT * FROM wishlist_product WHERE PROD_ID = ? AND CART_ID = (SELECT CART_ID FROM cart WHERE CUST_ID = ?)';
        // $statement = $conn->prepare($query);
        // $statement->bind_param('ii', $productId, $productPicture, $productName, $productPrice);
        // $statement->bind_param($productId, $productPicture, $productName, $productPrice);
        // $statement->execute();

        
        // if(empty($wishlist_product)){
        //     $query = 'INSERT INTO wishlist_product (WISHLIST_ID, PRODUCT_ID, QUANTITY) VALUES ((SELECT PRODUCT_ID FROM PRODUCT WHERE CUST_ID = ?), ?, 1)';
        //     DB::insert($query, [$id, $prodid]);
        // }else{
        //     $query = 'UPDATE wishlist_product SET QUANTITY = QUANTITY + 1 WHERE PRODUCT_ID = ? AND WISHLIST_ID = (SELECT PRODUCT_ID FROM PRODUCT WHERE CUST_ID = ?)';
        //     DB::update($query, [$prodid, $id]);
        // }
        // #delete wishlist_product
        // $query = 'DELETE FROM wishlist_product WHERE PROD_ID = ? AND WISHLIST_ID = ?';
        // DB::delete($query, [$prodid, $wishlistid]);
        
        
        return redirect()->back()->with('success', 'Product added to wishlist.');       
    }

    // public function wishlistPage(Request $request)
    // {
    //     // Retrieve the wishlist items from the session or database
    //     // Example using the session:
    //     $wishlist = $request->session()->get('wishlist', []);

    //     // Example using the database:

    //     $id = session('customer')->CUST_ID;
    //     $query = 'SELECT * FROM wishlist WHERE CUST_ID = ?';
    //     // $wishlist = DB::select($query, [$id]);
        

    //     // Pass the wishlist items to the wishlist view
    //     // return view('wishlist', ['wishlists' => $wishlist]);
    // }


    // add product to wishlist page
    
}

    // public function addToCart(Request $request){
    //     #add wishlist to cart
    //     $id = session('customer')->CUST_ID;
    //     $prodid = request('id');
    //     $wishlistid = request('wishid');
    //     #update cart_product
    //     $query = 'SELECT * FROM cart_product WHERE PROD_ID = ? AND CART_ID = (SELECT CART_ID FROM cart WHERE CUST_ID = ?)';
    //     $cart_product = DB::select($query, [$prodid, $id]);
    //     if(empty($cart_product)){
    //         $query = 'INSERT INTO cart_product (CART_ID, PROD_ID, CART_QTY) VALUES ((SELECT CART_ID FROM cart WHERE CUST_ID = ?), ?, 1)';
    //         DB::insert($query, [$id, $prodid]);
    //     }else{
    //         $query = 'UPDATE cart_product SET CART_QTY = CART_QTY + 1 WHERE PROD_ID = ? AND CART_ID = (SELECT CART_ID FROM cart WHERE CUST_ID = ?)';
    //         DB::update($query, [$prodid, $id]);
    //     }
    //     #delete wishlist_product
    //     $query = 'DELETE FROM wishlist_product WHERE PROD_ID = ? AND WISHLIST_ID = ?';
    //     DB::delete($qfffuery, [$prodid, $wishlistid]);

    //     return redirect()->route('wishlist');
    // }
