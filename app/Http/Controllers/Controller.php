<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use Config;
use Session;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        private $content_type = 'application/json';

    /*
        @purpose: customize view path
        @string path: new path of view
        @author : admin
    */
    public function view($path)
    {
        $d_path = substr(get_class($this), 0, strrpos(get_class($this), '\\'));
        $d_path = lcfirst(str_replace("\\",".",$d_path));
        return view($d_path . '.Views.'. $path) ->with('app_template' , $this->getAppTemplate());
    }
    /*
        @purpose: return app template path
        @author : admin
    */
    public function getAppTemplate()
    {
        return array(
            'admin'    => "app.Myapp.Templates.admin",
            'front'    => "app.Myapp.Templates.front",
            'partials' =>  "app.Myapp.Templates.Partials."
        );
    }
    private function sanitizeUri($uri) {
        return str_replace('$', '/', $uri);
    }
    /*
        @purpose: get api url from config/webservice.php
        @author : admin
    */
    public function getServerAddress() {
        $address = Config::get('webservice.scheme') . '://' . Config::get('webservice.hostname') . '/';
        return $address;
    }
    /*
        @purpose: set header
        @author : admin
    */
    private function translateHeaders($header, $data = null) {

        if(!isset($header['Content-Type'])) $header['Content-Type'] = 'application/json';

        if (\Auth::check()) {
            $header['xauth'] = \Auth::getProperty('access_token');
        }
        if($data){
            $header['Content-Length'] = strlen($data);
        }

        if(!isset($header['X-Forwarded-For'])) $header['X-Forwarded-For'] = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        if(!isset($header['X-Real-IP'])) $header['X-Real-IP'] = filter_var( $_SERVER['SERVER_NAME'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        if(!isset($header['Expect'])) $header['Expect'] = '';
        if(!isset($header['Origin'])) $header['Origin'] = 'Tesjor-Website';
        if(!isset($header['Accept-Encoding'])) $header['Accept-Encoding'] = 'gzip, deflate';
        if(!isset($header['User-Agent'])) $header['User-Agent'] = 'Tesjor';

        $result = array();
        foreach ($header as $key => $value) {
            $result[] = $key . ': ' . $value;
        }

        return $result;
    }
    /*
        @purpose: generate response format
        @author : admin
    */
    private function response($res, $resp) {
        $encodedResp = $resp;
        $headers = curl_getinfo($res);
        try {
            if(strpos($headers['content_type'], 'json') !== false) {
                $encodedResp = json_decode($encodedResp, true);
            } else {
                $encodedResp = $encodedResp;
            }
        }
        catch(\Exception $e) {
        }
        $result = array('headers' => $headers, 'responseText' => $encodedResp);
        curl_close($res);
        return $result;
    }
    /*
        @purpose: request api method GET
        @string uri: api end point
        @array header: request header type
        @author : admin
    */
    public function get($uri, $headers) {
        $uri = $this->getServerAddress() . $this->sanitizeUri($uri);
        $curl = curl_init();
        $options = array(
            CURLOPT_ENCODING       => "gzip",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $uri,
            CURLOPT_USERAGENT      => 'Thmey9',
            CURLOPT_HTTPHEADER     => $this->translateHeaders($headers));
        /* for verify ssl */
        $options[CURLOPT_SSL_VERIFYHOST] = 0;
        $options[CURLOPT_SSL_VERIFYPEER] = 0;

        curl_setopt_array($curl, $options);
        $resp = curl_exec($curl);
        return $this->response($curl, $resp);
    }

    /*
        @purpose: request api method POST
        @string uri: api end point
        @array data: data need to be post
        @array header: request header type
        @author : admin
    */
    public function post($uri, $data, $headers) {

        $uri = $this->getServerAddress() . $this->sanitizeUri($uri);
        if(isset($headers['Content-Type']) && ($headers['Content-Type']  == 'multipart/form-data')){
            $data = $data;

        } else {
            $data = json_encode($data);
        }
        /* Get cURL resource */
        $curl = curl_init();
        $options = array(CURLOPT_ENCODING => "gzip",CURLOPT_CUSTOMREQUEST => 'POST', CURLOPT_HTTPPROXYTUNNEL=> 1, CURLOPT_FOLLOWLOCATION=> 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => $uri, CURLOPT_USERAGENT => 'Savada', CURLOPT_POST => 1, CURLOPT_POSTFIELDS => $data, CURLOPT_HTTPHEADER => $this->translateHeaders($headers), CURLINFO_HEADER_OUT => true);

        if (strpos($uri, 'api-dev') == true){
            /* without ssh */
            $options[CURLOPT_SSL_VERIFYHOST] = 0;
            $options[CURLOPT_SSL_VERIFYPEER] = 0;
        }

        else{
            /* with ssh */
            $options[CURLOPT_SSL_VERIFYHOST] = 2;
            $options[CURLOPT_SSL_VERIFYPEER] = 2;
        }

        curl_setopt_array($curl, $options);

        /* Send the request & save response to $resp */

        $resp = curl_exec($curl);
        return $this->response($curl, $resp);
    }

    /*
        @purpose: request api method PUT (update)
        @string uri: api end point
        @array data: data need to be update
        @array header: request header type
        @author : admin
    */
    public function put($uri, $data, $headers) {
        $uri = $this->getServerAddress() . $this->sanitizeUri($uri);
        $headers['X-HTTP-Method-Override'] = 'PUT';
        $curl = curl_init();
        /* Set some options - we are passing in a useragent too here */
        curl_setopt_array($curl, array(CURLOPT_ENCODING => "gzip",CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => $uri, CURLOPT_USERAGENT => 'Savada', CURLOPT_POSTFIELDS => json_encode($data), CURLOPT_HTTPHEADER => $this->translateHeaders($headers), CURLOPT_CUSTOMREQUEST => 'PUT'));

        /* Send the request & save response to $resp */
        $resp = curl_exec($curl);
        return $this->response($curl, $resp);
    }

    /*
        @purpose: request api method DELETE
        @string uri: api end point
        @array data: data need to be send
        @array header: request header type
        @author : admin
    */
    public function delete($uri, $data, $headers) {
        $uri = $this->getServerAddress() . $this->sanitizeUri($uri);
        $headers['X-HTTP-Method-Override'] = 'DELETE';

        /*Get cURL resource*/
        $curl = curl_init();

        /* Set some options - we are passing in a useragent too here*/
        curl_setopt_array($curl, array(CURLOPT_ENCODING => "gzip",CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => $uri, CURLOPT_USERAGENT => 'Savada', CURLOPT_POSTFIELDS => json_encode($data), CURLOPT_HTTPHEADER => $this->translateHeaders($headers), CURLOPT_CUSTOMREQUEST => 'DELETE'));

        /* Send the request & save response to $resp*/
        $resp = curl_exec($curl);
        return $this->response($curl, $resp);
    }

    public function returnTokenAuthorization(){
        $user_session_id = $this->createRandomVal(19);
        $client_id       =  Config::get('webservice.client_id');
        $client_secret   = Config::get('webservice.client_secret');
        $code            = $client_id.':'.$client_secret;
        $auth            = "Bearer ".sha1($code);
        $header = array(
            "Authorization" => $auth,
            "Uses-Id"       =>  $user_session_id
        );

        $data   = array("client_id" => $client_id);
        $result = $this->post('v1/auth/authorize',$data,$header);
        $result = $result['responseText'];
        setcookie('session_user_id', $user_session_id);
        setcookie('token', $result['token']);
        setcookie('refresh_token', $result['refresh_token']);
        Session::put('session_user_id', $user_session_id);
        Session::put('token', $result['token']);
        Session::put('refresh_token', $result['refresh_token']);

        return true;
    }

    public function createRandomVal($val){
        $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,-";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i<=$val)
        {
            $num  = rand() % 33;
            $tmp  = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }

    public function headerToken(){
        if(empty(@$_COOKIE['token'])){
            $refreshtoken = $this->returnTokenAuthorization();
        }

        if(empty(@$_COOKIE['token'])){
            $token = 'Bearer '.Session::get('token');
            $user_session_id = Session::get('session_user_id');
        }else{
            $token = 'Bearer '.$_COOKIE['token'];
            $user_session_id = $_COOKIE['session_user_id'];
        }
        
        $timezone = Session::get('timezone');
        $header = array(
            'Token' => $token,
            'Uses-Id' =>  $user_session_id,
            'Local-Timezone' => $timezone
        );
        return $header;
    }

    public function headerXauth(){
        if(empty(@$_COOKIE['token'])){
          $refreshtoken = $this->returnTokenAuthorization();
        }

        $xauth = 'Bearer '.$this->getProperty('access_token');
        $user_session_id = $_COOKIE['session_user_id'];
        $timezone = Session::get('timezone');
        $header = array(
            'X-AUTH'  => $xauth,
            'Uses-Id' =>  $user_session_id,
            'Local-Timezone' => $timezone
        );
        return $header;
    }

    public function getTokenNOCookie(){
        $user_session_id = $this->createRandomVal(19);
        $client_id       =  Config::get('webservice.client_id');
        $client_secret   = Config::get('webservice.client_secret');
        $code            = $client_id.':'.$client_secret;
        $auth            = "Bearer ".sha1($code);
        $header = array(
            "Authorization" => $auth,
            "Uses-Id"       =>  $user_session_id
        );
        $data              = array("client_id" => $client_id);
        $result            = $this->post('v1/auth/authorize',$data,$header);
        $result['session'] = $user_session_id;
        return $result;
    }

    public function getProperty($item){
        $user = Session::get('user');
        if(@$user){
            return $user[$item];
        }
        return false;
    }

}
