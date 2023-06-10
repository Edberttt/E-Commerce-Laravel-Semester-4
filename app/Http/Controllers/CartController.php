<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    //from product add to cart to cart product
    // public function add_to_cart(Request $request){
    //     $product_id = $request->product_id;
    //     $product_quantity = $request->product_quantity;
    //     $product_info = DB::table('tbl_products')
    //                     ->where('product_id', $product_id)
    //                     ->first();
    //     $data['id'] = $product_info->product_id;
    //     $data['name'] = $product_info->product_name;
    //     $data['qty'] = $product_quantity;
    //     $data['price'] = $product_info->product_price;
    //     $data['weight'] = '123';
    //     $data['options']['image'] = $product_info->product_image;
    //     Cart::add($data);
    //     return Redirect::to('/show-cart');
    // }
    //remove from cart
    // public function remove_from_cart($rowId){
    //     Cart::update($rowId, 0);
    //     return Redirect::to('/show-cart');
    // }

    // public function cartPage(Request $request)
    // {
        
    //     $customerId = 'CPC001';
    //     $wishlistIdResult = DB::select('SELECT wishlist_id FROM wishlist WHERE customer_id = ?', [$customerId]);
    //     $wishlistId = $wishlistIdResult[0]->wishlist_id;

    //     $query = 'SELECT w.wishlist_id, p.product_id, p.product_picture, p.product_name, p.product_price FROM wishlist_product w LEFT JOIN product p ON w.product_id = p.product_id WHERE w.wishlist_id = ?';
    //     $wishlist = DB::select($query, [$wishlistId]);

    //     // Pass the wishlist items to the wishlist view
    //     return view('wishlist-detail', compact('wishlist','wishlistId'));
    // }

    // public function cartPage(Request $request)
    // {
        
    //     $customerId = 'CPC001';
    //     $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
    //     $cartId = $cartIdResult[0]->cart_id;

    //     $query = 'SELECT c.cart_id, p.product_id, p.product_picture, p.product_name, p.product_price, c.quantity FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
    //     $cart = DB::select($query, [$cartId]);

    //     // Pass the cart items to the cart page view
    //     return view('shoping-cart', compact('cart','cartId'));
    // }

    public function cartPage(Request $request)
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
        // return view('shoping-cart','index', ['cart' => $cart, 'cartId' => $cartId], compact('subtotal'));
        return view('shoping-cart', compact('cart','cartId','subtotal'));
    }

    // public function sumSubtotal(Request $request)
    // {
    //     $customerId = 'CEC001';
    //     $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
    //     $cartId = $cartIdResult[0]->cart_id;

    //     $query = 'SELECT SUM(p.product_price * c.quantity) AS subtotal FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
    //     $subtotal = DB::select($query, [$cartId]);

    //     // Pass the cart items to the cart page view
    //     // return view('shoping-cart', ['subtotal' => $subtotal]);
    //     // return view('shoping-cart', compact('subtotal'));
    //     return view('shoping-cart', compact('subtotal'));


    // }

    public function deleteCart($id)
    {
        error_log("Masuk Delete");
        $customerId = session('status')[0]['customer_id'];
        $productId = $id;
        
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;
        
        error_log($cartId);
        error_log($productId);

        $query = 'DELETE FROM cart_product WHERE cart_id = ? AND product_id = ?';
        // $query = 'DELETE FROM wishlist_product WHERE wishlist_id = ?';
        DB::delete($query, [$cartId, $productId]);
        return redirect()->route('cart')->with('success', 'Product deleted from cart.');


        // Pass the cart items to the cart page view
        // return view('shoping-cart', ['subtotal' => $subtotal]);
        // return view('shoping-cart', compact('subtotal'));
        // return view('shoping-cart')->with('success', 'Product deleted from cart.');
        
    }
    // public function deleteCart(Request $request)
    // {
    //     error_log("Masuk Delete");
    //     $customerId = session('status')[0]['customer_id'];
    //     $productId = $request->input('product_id');
        
    //     $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
    //     $cartId = $cartIdResult[0]->cart_id;
        
    //     error_log($cartId);
    //     error_log($productId);

    //     $query = 'DELETE FROM cart_product WHERE cart_id = ? AND product_id = ?';
    //     // $query = 'DELETE FROM wishlist_product WHERE wishlist_id = ?';
    //     DB::delete($query, [$cartId, $productId]);
    //     return redirect()->route('cart')->with('success', 'Product deleted from cart.');


    //     // Pass the cart items to the cart page view
    //     // return view('shoping-cart', ['subtotal' => $subtotal]);
    //     // return view('shoping-cart', compact('subtotal'));
    //     // return view('shoping-cart')->with('success', 'Product deleted from cart.');
        
    // }

    // public function delete($cartId)
    // {
    //     // Perform the deletion query
    //     DB::table('cart')->where('id', $cartId)->delete();

    //     // Optionally, you can redirect to a specific page after the deletion
    //     return redirect()->route('cartList')->with('success', 'Cart deleted successfully.');
    // }

    public function totalQuantity(Request $request)
    {
        $customerId = session('status')[0]['customer_id'];
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;

        $query = 'SELECT SUM(quantity) AS totalQuantity FROM cart_product WHERE cart_id = ?';
        $totalQuantity = DB::select($query, [$cartId]);

        // Pass the cart items to the cart page view
        // return view('shoping-cart', ['subtotal' => $subtotal]);
        // return view('shoping-cart', compact('subtotal'));
        return view('shoping-cart', compact('totalQuantity'));
    }

    public function totalAmount(Request $request)
    {
        $customerId = session('status')[0]['customer_id'];
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;

        $query = 'SELECT SUM(p.product_price * c.quantity) AS totalAmount FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $totalAmount = DB::select($query, [$cartId]);

        // Pass the cart items to the cart page view
        // return view('shoping-cart', ['subtotal' => $subtotal]);
        // return view('shoping-cart', compact('subtotal'));
        return view('shoping-cart', compact('totalAmount'));
    }

    public function updateCart(Request $request)
    {
        $customerId = session('status')[0]['customer_id'];
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;

        $query = 'UPDATE cart_product SET quantity = ? WHERE cart_id = ? and product_id = ?';
        DB::update($query, [$request->quantity, $cartId, $request->product_id]);

        // Pass the cart items to the cart page view
        // return view('shoping-cart', ['subtotal' => $subtotal]);
        // return view('shoping-cart', compact('subtotal'));
        // return view('shoping-cart', compact('subtotal'));
        return view('shoping-cart')->with('success', 'Cart updated successfully.');
    }

    public function checkoutPage(Request $request)
    {
        $customerId = session('status')[0]['customer_id'];
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;

        $query = 'SELECT c.cart_id, p.product_id, p.product_picture, p.product_name, p.product_price, c.quantity FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $cart = DB::select($query, [$cartId]);

        // Pass the cart items to the cart page view
        return view('checkout', ['cart' => $cart, 'cartId' => $cartId]);
    }


    public function sliderCart(Request $request)
    {
        $customerId = session('status')[0]['customer_id'];
        $cartIdResult = DB::select('SELECT cart_id FROM cart WHERE customer_id = ?', [$customerId]);
        $cartId = $cartIdResult[0]->cart_id;
        
        $query = 'SELECT c.cart_id, p.product_id, p.product_picture, p.product_name, p.product_price, c.quantity FROM cart_product c LEFT JOIN product p ON c.product_id = p.product_id WHERE c.cart_id = ?';
        $cart = DB::select($query, [$cartId]);

        return view('index', ['cart' => $cart, 'cartId' => $cartId], compact('cart'));

    }
}
