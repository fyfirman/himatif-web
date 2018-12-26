<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class hdaController extends Controller
{
    private $base_uri = 'http://localhost/Himatif_Apps/REST-API-himatif/index.php/api/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client(['base_uri' => $this->base_uri]);
        $response = $client->get('data/anggotasemua');
        $result = json_decode($response->getBody()->getContents());
        if($result->status == true){
            $data = $result->data;
        }
        return view('hda.homepage', compact('data'));
    }

    public function angkatan($ang){
        $client = new Client(['base_uri' => $this->base_uri]);
        $response = $client->get('data/angkatan/'.$ang);
        $result = json_decode($response->getBody()->getContents());
        if($result->status == true){
            $data = $result->data;
        }
        return view('hda.homepage', compact('data'));
    }

    public function bk($bk){
        $client = new Client(['base_uri' => $this->base_uri]);
        if($bk == 'dpa'){
            $response = $client->get('dpa/anggotadpa');
        }else if($bk == 'be'){
            $response = $client->get('be/anggotabe');
        }else if($bk == 'mubes'){
            $response = $client->get('mubes/anggotamubes');
        }
        $result = json_decode($response->getBody()->getContents());
        if($result->status == true){
            $data = $result->data;
        }
        return view('hda.homepage', compact('data'));
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
            return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
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
