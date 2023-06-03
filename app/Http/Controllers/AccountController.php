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
    public function generate_tokens(): array
    {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));
    
        return [$selector, $validator, $selector . ':' . $validator];
    }

    public function parse_token(string $token): ?array
    {
        $parts = explode(':', $token);
    
        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }

    public function insert_user_token(string $user_id, string $selector, string $hashed_validator, string $expiry): bool
    {
        $sql = 'INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
                VALUES(?, ?, ?, ?)';
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

        // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }
        $statement = $conn->prepare($sql);
        $statement->bind_param('ssss', $user_id, $selector, $hashed_validator, $expiry);
    
        return $statement->execute();
    }

    public function find_user_token_by_selector(string $selector)
    {
    
        $sql = 'SELECT id, selector, hashed_validator, user_id, expiry
                    FROM user_tokens
                    WHERE selector = ? AND
                        expiry >= now()
                    LIMIT 1';
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

        // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $selector);
    
        $statement->execute();
    
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    public function delete_user_token(string $user_id): bool
    {
        $sql = 'DELETE FROM user_tokens WHERE user_id = ?';
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

        // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $user_id);
    
        return $statement->execute();
    }

    public function find_user_by_token(string $token)
    {
        $tokens = $this->parse_token($token);
    
        if (!$tokens) {
            return null;
        }
    
        $sql = 'SELECT users.id, username
                FROM users
                INNER JOIN user_tokens ON user_id = users.id
                WHERE selector = ? AND
                    expiry > now()
                LIMIT 1';
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

        // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $tokens[0]);
        $statement->execute();
    
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    public function accountDetail(){
        $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

    // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        $info = session('status')[0];
        // dump($info);
        
        $query = 'select * from `order` where customer_id = "'.$info['customer_id'].'";';
        $query = mysqli_query($conn, $query);
        $query = mysqli_fetch_all($query, MYSQLI_ASSOC);
        // dump($query);
        return view('account_detail')->with('info', $info)->with('orders', $query);
    }

    public function token_is_valid(string $token): bool { // parse the token to get the selector and validator 
        [$selector, $validator] = $this->parse_token($token);

        $tokens = $this->find_user_token_by_selector($selector);
        if (!$tokens) {
            return false;
        }
        
        return password_verify($validator, $tokens['hashed_validator']);
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
        // $conn = new mysqli("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

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
