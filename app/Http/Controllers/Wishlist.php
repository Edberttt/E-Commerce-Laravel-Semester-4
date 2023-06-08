<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Wishlist extends Model
{
    use HasFactory;

    public static function countWishlist($product_id)
    {
        $countWishlist = Wishlist::where('product_id', $product_id)->count();
        return $countWishlist;
    }

    public function addToCart(Request $request)
    {
        $id_barang = $request->idBarang;

        // Query to insert $id_barang into the database

        $productImage = $request->input('productImage');
        $productName = $request->input('productName');
        $productPrice = $request->input('productPrice');

        // Process the $productImage, $productName, and $productPrice as needed

        // Add the product to the cart or perform any other necessary actions

        // Return a response or redirect the user
    }
    
        public function wishlistDetail()
        {
            $customer = Customer::where('id', session('id'))->first();
            $wishlist = DB::table('wishlist')
                ->join('product', 'wishlist.product_id', '=', 'product.id')
                ->select('wishlist.*', 'product.*')
                ->where('wishlist.customer_id', session('id'))
                ->get();
            return view('wishlist-detail', ['customer' => $customer, 'wishlist' => $wishlist]);
        }
    
        public function addToWishlist(Request $request)
        {
            $customer_id = session('id');
            $product_id = $request->product_id;
            $countWishlist = Wishlist::where('product_id', $product_id)->count();
            if ($countWishlist == 0) {
                $wishlist = new Wishlist;
                $wishlist->customer_id = $customer_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
                return redirect('/wishlist-detail');
            } else {
                return redirect('/wishlist-detail');
            }
        }
    
        public function deleteWishlist($id)
        {
            $wishlist = Wishlist::find($id);
            $wishlist->delete();
            return redirect('/wishlist-detail');
        }
    
        public function checkout()
        {
            $customer = Customer::where('id', session('id'))->first();
            $wishlist = DB::table('wishlist')
                ->join('product', 'wishlist.product_id', '=', 'product.id')
                ->select('wishlist.*', 'product.*')
                ->where('wishlist.customer_id', session('id'))
                ->get();
            return view('checkout', ['customer' => $customer, 'wishlist' => $wishlist]);
        }
    
        public function checkoutProcess(Request $request)
        {
            $customer = Customer::where('id', session('id'))->first();
            $wishlist = DB::table('wishlist')
                ->join('product', 'wishlist.product_id', '=', 'product.id')
                ->select('wishlist.*', 'product.*')
                ->where('wishlist.customer_id', session('id'))
                ->get();
            $order = new Order;
            $order->customer_id = session('id');
            $order->customer_name = $customer->name;
            $order->customer_email = $customer->email;
            $order->customer_phone = $customer->phone;
            $order->customer_address = $customer->address;
        }
}

?>