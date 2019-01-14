<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class loginController extends Controller{
    private $baseUrl = 'http://localhost:8000/api/v1/';

    public function login(Request $request){
        $uname = $request->input('username');
        $pwd = $request->input('password');
        $client = new Client();
        try {
            $response = $client->request('POST', $this->baseUrl.'user/login', ['form_params' => ['username' => $uname, 'password' => $pwd]]);
            $result = json_decode($response->getBody()->getContents());
            if($result->status == 'Login Berhasil'){
                $data = array(
                    'username' => $result->user->username,
                    'remember_token' => $result->user->remember_token, 
                    'logged_in' => 1
                );
                $request->session()->put($data);
                $npm = $request->session()->get('username');
                $data = $this->getDataAnggota($npm);
                $data_json = json_encode($data);
                return redirect('/')->withCookie(cookie('anggota', $data_json, 1440));
            }
        } catch (RequestException $req) {
            return redirect('/')->with('login', 'invalid');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/')->withCookie(\Cookie::forget('anggota'));
    }

    public function getDataAnggota($npm){
        $endpoint = 'anggota/search?type=npm&q='.$npm;
        return $this->getDataAPI($endpoint);
    }

    public function getDataAPI($endpoint){
        $client = new Client(['base_uri' => $this->baseUrl]);
        $response = $client->get($endpoint);
        $result = json_decode($response->getBody()->getContents());
        if($result->status == 'Authorized'){
            return $result->response;
        }else{
            return NULL;
        }
    }
}
