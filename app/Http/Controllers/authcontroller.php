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
  public function register(Request $request)
{
    // Validasi form
    $this->validate($request, [
        'customer_name' => 'required',
        'customer_email' => 'required|email',
        'customer_password' => 'required',

    ]);

    // Mengambil nilai dari form
    $name = $request->input('customer_name');
    $email = $request->input('customer_email');
    $password = $request->input('customer_password');

    // Check if customer email already exists
    $existingCustomer = Register::where('customer_email', $email)->first();
    if ($existingCustomer) {
        // Jika email sudah terdaftar, kirimkan pesan kesalahan
        return redirect()->back()->withInput()->withErrors('Email already exists');
    }

    // Mengambil customer_id terakhir
    $lastCustomerId = DB::table('customer')
        ->select('customer_id')
        ->orderBy('customer_id', 'desc')
        ->limit(1)
        ->value('customer_id');

    // Menginisialisasi nomor awal
    $newNumber = 1;

    if ($lastCustomerId) {
        // Jika ada customer sebelumnya, ambil nomor dari customer_id terakhir
        $lastNumber = (int) substr($lastCustomerId, 1);

        // Increment nomor
        $newNumber = $lastNumber + 1;
    }

    // Format nomor dengan nol di depan
    $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

    // Gabungkan dengan prefix "C" untuk customer_id baru
    $newCustomerId = 'C' . $formattedNumber;

    // Buat instansi model Customer
    $customer = new Register();
    $customer->customer_id = $newCustomerId;
    $customer->customer_name = $name;
    $customer->customer_email = $email;
    $customer->customer_password = $password;
    $customer->delete_customer = 0;

    // Simpan data pengguna ke dalam tabel "customer"
    $customer->save();

    // Redirect ke halaman sukses pendaftaran
    return redirect('/profile');
}

public function submitRegister(Request $request){
    // $dbh = new PDO('mysql:host=139.255.11.84; dbname=webdev', 'student', 'isbmantap');
    $register = $request->validate([
        'customer_firstName' => 'required',
        'customer_lastName' => 'required',
        'customer_email' => 'required|email',
        'customer_password' => 'required',
        'customer_gender' => 'required'
    ]);
    $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "webdev");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }
    $register['customer_password'] = Hash::make($register['customer_password']);
    $email = 'SELECT * FROM customer WHERE customer_email = "'.$register['customer_email'].'";';
    $email = mysqli_query($conn, $email);
    if(mysqli_num_rows($email)>0){
        return redirect()->back()->withInput()->withErrors('Email already exists');
    }
    $insert = 'INSERT INTO customer (customer_firstName, customer_lastName, customer_email, customer_password, customer_gender) VALUES ("'.$register['customer_firstName'].'","'.$register['customer_lastName'].'","'.$register['customer_email'].'","'.$register['customer_password'].'","'.$register['customer_gender'].'");';
    // dump($insert);
    mysqli_query($conn, $insert);
    mysqli_close($conn);
    return redirect('/account');
}

public function submitLogin(Request $request){
    $register = $request->validate([
        'customer_email' => 'required|email',
        'customer_password' => 'required',
    ]);
    $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "webdev");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }   
    $email = "SELECT * FROM customer WHERE customer_email = '".$register["customer_email"]."';";
    $email = mysqli_query($conn, $email);
    if(mysqli_num_rows($email)==0){
            return redirect()->back()->withInput()->withErrors('Email or password is wrong');
        }
        $email = mysqli_fetch_all($email, MYSQLI_ASSOC);
        // dump($email);
        $email = $email[0];
    $coba = Hash::check($register['customer_password'], $email['customer_password']);
    if($coba){
        session()->push('status', $email);
        return redirect('/account_detail');
    }
    else{
        return redirect()->back()->withInput()->withErrors('Email or password is wrong');
    }

} 

public function logout(){
    session()->forget('status');
    return redirect('/account');
}
}