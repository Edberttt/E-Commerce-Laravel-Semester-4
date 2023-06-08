<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use App\Models\Customer;


class AuthController extends Controller
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
        // $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");
        // $conn = mysqli_connect("localhost", "root", "", "webdev");

        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

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
        // $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");
        // $conn = mysqli_connect("localhost", "root", "", "webdev");
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

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
        // $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");
        // $conn = mysqli_connect("localhost", "root", "", "webdev");
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

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
    
        $sql = 'SELECT *
                FROM customers
                INNER JOIN user_tokens ON user_id = customers.customer_id
                WHERE selector = ? AND
                    expiry > now()
                LIMIT 1';
        // $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");
        // $conn = mysqli_connect("localhost", "root", "", "webdev");
        $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

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

    public function token_is_valid(string $token): bool { // parse the token to get the selector and validator 
        [$selector, $validator] = $this->parse_token($token);

        $tokens = $this->find_user_token_by_selector($selector);
        if (!$tokens) {
            return false;
        }
        
        return password_verify($validator, $tokens['hashed_validator']);
    }

    public function remember_me(string $user_id, int $day = 7)
    {
        [$selector, $validator, $token] = $this->generate_tokens();
    
        // remove all existing token associated with the user id
        $this->delete_user_token($user_id);
    
        // set expiration date
        $expired_seconds = time() + 60 * 60 * 24 * $day;
    
        // insert a token to the database
        $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s', $expired_seconds);
    
        if ($this->insert_user_token($user_id, $selector, $hash_validator, $expiry)) {
            setcookie('remember_me', $token, $expired_seconds);
        }
    }
    public function is_user_logged_in(): bool
    {
        // check the session
        if (isset($_SESSION['status'])) {
            return true;
        }
    
        // check the remember_me in cookie
        $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_SANITIZE_STRING);
    
        if ($token && $this->token_is_valid($token)) {
    
            $user = $this->find_user_by_token($token);
    
            if ($user) {
                return $this->log_user_in($user);
            }
        }
        return false;
    }

    /**
     * log a user in
     * @param array $user
     * @return bool
     */
    public function log_user_in(array $user): bool
    {
        // prevent session fixation attack
            // set username & id in the sessiond
            $info = Customer::where('customer_id', $user['user_id'])->first()->getAttributes();
            session()->push('status', $info);
            return true;
    }

public function submitRegister(Request $request){
    // $dbh = new PDO('mysql:host=139.255.11.84; dbname=ALP_HAWK', 'student', 'isbmantap');
    $register = $request->validate([
        'customer_firstName' => 'required',
        'customer_lastName' => 'required',
        'customer_email' => 'required|email',
        'customer_password' => 'required',
        'customer_gender' => 'required'
    ]);
    // $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");
    // $conn = mysqli_connect("localhost", "root", "", "webdev");
    $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }
    $register['customer_password'] = Hash::make($register['customer_password']);
    $email = 'SELECT * FROM customers WHERE customer_email = "'.$register['customer_email'].'";';
    $email = mysqli_query($conn, $email);
    if(mysqli_num_rows($email)>0){
        return redirect()->back()->withInput()->withErrors('Email already exists');
    }
    $insert = 'INSERT INTO customers (customer_firstName, customer_lastName, customer_email, customer_password, customer_gender) VALUES ("'.$register['customer_firstName'].'","'.$register['customer_lastName'].'","'.$register['customer_email'].'","'.$register['customer_password'].'","'.$register['customer_gender'].'");';
    // dump($insert);
    mysqli_query($conn, $insert);
    mysqli_close($conn);
    return redirect('/account')->with('success_register', 'Register successful!');
}

public function submitLogin(Request $request){
    $register = $request->validate([
        'customer_email' => 'required|email',
        'customer_password' => 'required',
        'remember_me' => ''
    ]);
    // $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");
    // $conn = mysqli_connect("localhost", "root", "", "webdev");
    $conn = mysqli_connect("139.59.237.132", "student", "isb-20232", "ALP_HAWK");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }   

    
    $email = "SELECT * FROM customers WHERE customer_email = '".$register["customer_email"]."';";
    $email = mysqli_query($conn, $email);
    if(mysqli_num_rows($email)==0){
        return redirect()->back()->withInput()->withErrors('Email or password is wrong');
    }
    $email = mysqli_fetch_all($email, MYSQLI_ASSOC);
    // dump($email);
    $email = $email[0];
    $coba = Hash::check($register['customer_password'], $email['customer_password']);
    if(isset($register['remember_me'])){
        $this->remember_me($email['customer_id']); // ini untuk mbuat token di browser supaya remember me
    }
    if($coba){
        session()->push('status', $email);
        return redirect('/');
    }
    else{
        return redirect()->back()->withInput()->withErrors('Email or password is wrong');
    }

} 

public function logout(){
    // dump(session('status'));
    $this->delete_user_token(session('status')[0]['customer_id']); // destroy remember me
    session()->forget('status');
    \Cookie::queue(\Cookie::forget('myCookie')); // forget buat di browser masing masing
    return redirect('/account');
}

// dua fungsi di bawah untuk otomatis log in kalau sudah remember me 
public function account(){
    if($this->is_user_logged_in()) return redirect('/');
    return view('account');
}

public function home(){
    $this->is_user_logged_in();
    return view('index');
}
}