<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class hdaController extends Controller
{
    private $base_uri = 'http://localhost/REST-API-himatif/index.php/api/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function index()
    {
        $endpoint = 'data/anggotasemua';
        $data = $this->getDataAPI($endpoint);
        if($data != NULL){
            return view('hda.homepage', compact('data'));
        }else{
            return redirect('/');
        }
    }

    public function angkatan($tahun){
        $endpoint = 'data/angkatan/'.$tahun;
        $data = $this->getDataAPI($endpoint);
        if($data != NULL){
            return view('hda.homepage', compact('data'));
        }else{
            return redirect('/');
        }
    }

    public function bk($bk){
        if($bk == 'dpa'){
            $endpoint = 'dpa/anggotadpa';
        }else if($bk == 'be'){
            $endpoint = 'be/anggotabe';
        }else if($bk == 'mubes'){
            $endpoint = 'mubes/anggotamubes';
        }
        $data = $this->getDataAPI($endpoint);
        if($data != NULL){
            return view('hda.homepage', compact('data'));
        }else{
            return redirect('/');
        }
    }

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
