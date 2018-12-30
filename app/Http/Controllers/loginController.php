<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class loginController extends Controller{
    private $base_uri = 'http://localhost/REST-API-himatif/index.php/api/';

    public function login(Request $request){
        $uname = $request->input('username');
        $pwd = $request->input('password');
        $client = new Client();
        $response = $client->request('POST', $this->base_uri.'user/verify', ['form_params' => ['username' => $uname, 'password' => $pwd]]);
        $result = json_decode($response->getBody()->getContents());
        if($result->status == 1){
            $data = array(
                'username' => $uname,
                'logged_in' => 1
            );
            $request->session()->put($data);
            $npm = $request->session()->get('username');
            $data = $this->getDataAnggota($npm);
            $data_json = json_encode($data);
            return redirect('/')->withCookie(cookie('anggota', $data_json, 120));
        }else{
            return redirect('/')->with('login', 'invalid');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/')->withCookie(\Cookie::forget('anggota'));
    }

    public function getDataAnggota($npm){
        $endpoint = 'data/anggota/'.$npm;
        return $this->getDataAPI($endpoint);
    }

    public function getDataAPI($endpoint){
        $client = new Client(['base_uri' => $this->base_uri]);
        $response = $client->get($endpoint);
        $result = json_decode($response->getBody()->getContents());
        if($result->status == true){
            return $result->data;
        }else{
            return NULL;
        }
    }
}
