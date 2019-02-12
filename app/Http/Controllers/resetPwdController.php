<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class resetPwdController extends Controller
{
    private $baseUrl = 'http://api.himatif.org/data/v1/';

    public function reset(Request $request){
        $uname = $request->input('username');
        $email = $request->input('email');
        $client = new Client();
        try{
            $response = $client->request('POST', $this->baseUrl.'resetPwd', ['form_params' => ['username' => $uname, 'email' => $email]]);
            $result = json_decode($response->getBody()->getContents());
            if($result->status == 'New Password Created'){
                return view('content.newPWD', ['pwd' => $result->data]);
            }
        }catch (RequestException $req) {
            return redirect('/')->with('message', 'resetpw_failed');
        }
    }

    public function update(Request $request){
        $endpoint = 'update/anggota/password';
        $client = new Client(['base_uri' => $this->baseUrl]);
        $token = $request->session()->get('remember_token');
        $newpw = $request->input('newpw');
        $confirm_pw = $request->input('confirm_newPwd');
        if($newpw == $confirm_pw){
            try{
                $data = array(
                    'username' => $request->input('username'),
                    'oldpw' => $request->input('oldpw'),
                    'newpw' => $newpw,
                );
                $response = $client->request('PUT', $endpoint, ['form_params' => $data, 'headers' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
            }catch(RequestException $req){
                $result = NULL;
            }
    
            if($result != NULL && $result->status == 'Password berhasil diganti'){
                return redirect()->route('viewEdit')->with('message', 'updatepw_success');
            }else{
                return redirect()->route('viewEdit')->with('message', 'updatepw_failed');
            }
        }else{
            return redirect()->route('viewEdit')->with('message', 'updatepw_failed');
        }
    }
}
