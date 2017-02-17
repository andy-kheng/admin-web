<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller{
    public function postLogin(Request $request){
        $header = $this->headerToken();
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        // $password = base64_encode(hash('sha256',$pass, true));

        $result = $this->post('v1/oauth/signin',$data,$header);

        if($result['headers']['http_code'] == 200){
            Session::put('user', $result['responseText']);
            return 'logined';
        }else{
            return redirect()->back()->withInput()->with('error-message',@$result['responseText']['message']);
        }
    }

    public function dashboard(){
        return view('layout.master');
    }

    public function test(){
        // $header        = $this->headerToken();
		$headerXauth    = $this->headerXauth();
        dd($headerXauth);
    }
}