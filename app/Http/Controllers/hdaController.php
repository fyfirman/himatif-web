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

    public function cekSession(Request $request){
        if($request->session()->get('logged_in')){
            return true;
        }
        return false;
    }

    public function index(Request $request)
    {
        $endpoint = 'data/anggotasemua';
        $data = $this->getDataAPI($endpoint);
        if($this->cekSession($request) && $data != NULL){
            return view('hda.app', compact('data'));
        }else{
            return redirect('/')->with('login', 'first');
        }
    }

    public function angkatan($tahun, Request $request){
        $endpoint = 'data/angkatan/'.$tahun;
        $data = $this->getDataAPI($endpoint);
        if($this->cekSession($request) && $data != NULL){
            return view('hda.content', compact('data'));
        }else{
            return redirect('/')->with('login', 'first');
        }
    }

    public function bk($bk, Request $request){
        if($bk == 'dpa'){
            $endpoint = 'dpa/anggotadpa';
        }else if($bk == 'be'){
            $endpoint = 'be/anggotabe';
        }else if($bk == 'mubes'){
            $endpoint = 'mubes/anggotamubes';
        }
        $data = $this->getDataAPI($endpoint);
        if($this->cekSession($request) && $data != NULL){
            return view('hda.content', compact('data'));
        }else{
            return redirect('/')->with('login', 'first');
        }
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
    public function edit(Request $request)
    {
        $endpoint = 'data/updatedata';
        $client = new Client(['base_uri' => $this->base_uri]);
        $response = $client->put($endpoint);
        $result = json_decode($response->getBody()->getContents());
        if($result->status == 'success'){
            \Cookie::forget('anggota');
            $npm = $request->session()->get('username');
            $data = $this->getDataAnggota($npm);
            $data_json = json_encode($data);
            return redirect()->route('viewEdit')->with('update', 'success')->withCookie(cookie('anggota', $data_json, 120));
        }else{
            return redirect()->route('viewEdit')->with('update', 'failed');
        }
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
