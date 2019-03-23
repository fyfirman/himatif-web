<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Input;

class hdaController extends Controller
{
    private $baseUrl = 'http://api.himatif.org/data/v1/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function cekSession(Request $request){
        if($request->session()->get('logged_in')){
            return true;
        }
        return false;
    }

    public function isUpdated(Request $request){
        if($request->session()->get('is_updated'))
            return true;
        return false;
    }

    public function index(Request $request)
    {
        
        if($this->cekSession($request)){
            if(!$this->isUpdated($request))
                return redirect('/updateProfile/'.$request->session()->get('username'))->with('message', 'update_profile_first');
            return view('hda.app');
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    public function admin(Request $request){
        if($this->cekSession($request)){
            if(!$this->isUpdated($request))
                return redirect('/updateProfile/'.$request->session()->get('username'))->with('message', 'update_profile_first');
            return view('admin.userContent');
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    public function angkatan($tahun, Request $request){
        $endpoint = 'anggota/search?type=angkatan&q='.$tahun;
        $data = $this->getDataAPI($endpoint);
        if($this->cekSession($request) && $data != NULL){
            return $data;
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    public function bk($bk, Request $request){
        $endpoint = $bk;
        $data = $this->getDataAPI($endpoint);
        if($this->cekSession($request) && $data != NULL){
            return $data;
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    public function getDataAnggota($npm){
        $endpoint = 'anggota/search?type=npm&q='.$npm;
        return $this->getDataAPI($endpoint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($key)
    {
        $endpoint = 'anggota/search?type=default&q='.$key;
        return $this->getDataAPI($endpoint);
    }

    public function viewEdit($npm,Request $request){
        $admin = $request->session()->get('privilege');
        $npmOnSession = $request->session()->get('username');
        
        // Mencegah sembarang user ngedit profile orang lain
        if($admin==4 || $npm == $npmOnSession)
            $anggota = $this->getDataAnggota($npm);
        else
            return redirect('/updateProfile/'.$npmOnSession)->with('message', 'cant_access_this_page');

        if($this->cekSession($request)){
            $dataKep = $this->getKepanitiaan($request);
            $dataOrg = $this->getOrganisasi($request);
            $data = array(
                'kep' => $dataKep,
                'org' => $dataOrg,
                'anggota' => $anggota
            );
            return view('content.editProfile')->with('dataOrgKep', $data);
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $endpoint = 'update/anggota/data';
        $client = new Client(['base_uri' => $this->baseUrl]);
        $token = $request->session()->get('remember_token');
        try{
            $data = array(
                'nama' => Input::get('nama'),
                'npm' => Input::get('npm'),
                'jk' => Input::get('jk'),
                'agama' => Input::get('agama'),
                'goldar' => Input::get('goldar'),
                'tempat_lahir' => Input::get('tempat_lahir'),
                'tanggal_lahir' => Input::get('tanggal_lahir'),
                'alamat_rumah' => Input::get('alamat_rumah'),
                'alamat_kos' => Input::get('alamat_kos'),
                'no_hp' => Input::get('no_hp'),
                'line' => Input::get('line'),
                'bidang_minat' => Input::get('bidang_minat'),
                'status' => Input::get('status'),
                'angkatan' => Input::get('angkatan'),
                'nama_ayah' => Input::get('nama_ayah'),
                'nama_ibu' => Input::get('nama_ibu'),
                'no_tlp_ortu' => Input::get('no_tlp_ortu'),
                'email' => Input::get('email'),
                'fb' => Input::get('fb'),
                'twitter' => Input::get('twitter'),
                'instagram' => Input::get('instagram'),
                'hobi' => Input::get('hobi')
            );
            $response = $client->request('PUT', $endpoint, ['form_params' => $data, 'headers' => ['remember_token' => $token]]);
            $result = json_decode($response->getBody()->getContents());
        }catch(RequestException $req){
            $result = NULL;
        }
        if($result != NULL && $result->status == 'Update Success'){
            $this->replaceSession($request); //kurang efisen. karena ini dijalanin setiap ubah profile baik diri sendiri MAUPUN ORANG LAIN 
            $npm = Input::get('npm');
            
            return redirect()->route('viewEdit')->with('message', 'updatedata_success');
            
            /* OLD CODE -- Gak berani dihapus soalnya old code dia ngerefresh cookies dgn yg baru, sedangkan yg baru enggak.
            \Cookie::forget('anggota');
            $npm = $request->session()->get('username');
            $data = $this->getDataAnggota($npm);
            $data_json = json_encode($data);
            return redirect()->route('viewEdit')->with('message', 'updatedata_success')->withCookie(cookie('anggota', $data_json, 120));
            */
        }else{
            return redirect()->route('viewEdit')->with('message', 'updatedata_failed');
        }
    }

    public function replaceSession($request){
        $request->session()->put('is_updated', 1);
    }

    public function addKepanitiaan(Request $request){
        $client = new Client(['base_uri' => $this->baseUrl]);
        $token = $request->session()->get('remember_token');
        try{
            $data = array(
                'npm' => $request->session()->get('username'),
                'nama_kep' => Input::get('nama_kep'),
                'jabatan' => Input::get('jabatan'),
                'tahun' => Input::get('tahun')
            );
    
            $response = $client->request('POST', 'panitia', ['form_params' => $data, 'headers' => ['remember_token' => $token]]);
            $result = json_decode($response->getBody()->getContents());
        }catch(RequestException $req){
            $result == NULL;
        }
        if($result != NULL && $result->status == 'Kepanitiaan berhasil ditambahkan'){
            return 'success';
        }else{
            return 'failed';
        }
    }

    public function getKepanitiaan(Request $request){
        $npm = $request->session()->get('username');
        $endpoint = 'panitia/search?type=npm&q='.$npm;
        return $this->getDataAPI($endpoint);
    }

    public function deleteKepanitiaan(Request $request, $id){
        $client = new Client(['base_uri' => $this->baseUrl]);
        $token = $request->session()->get('remember_token');
        $data=array('id'=>$id);
        $response = $client->request('DELETE', 'panitia', ['form_params' => $data, 'headers' => ['remember_token' => $token]]);
        $result = json_decode($response->getBody()->getContents());
        return redirect()->back();
    }

    public function addOrganisasi(Request $request){
        $client = new Client(['base_uri' => $this->baseUrl]);
        $token = $request->session()->get('remember_token');
        try{
            $data = array(
                'npm' => $request->session()->get('username'),
                'nama_org' => Input::get('nama_org'),
                'jabatan' => Input::get('jabatan'),
                'tahun' => Input::get('tahun')
            );
    
            $response = $client->request('POST', 'organisasi', ['form_params' => $data, 'headers' => ['remember_token' => $token]]);
            $result = json_decode($response->getBody()->getContents());
        }catch(RequestException $req){
            $result == NULL;
        }
        if($result != NULL && $result->status == 'Data Organisasi berhasil ditambahkan'){
            return 'success';
        }else{
            return 'failed';
        }
    }

    public function getOrganisasi(Request $request){
        $npm = $request->session()->get('username');
        $endpoint = 'organisasi/search?type=npm&q='.$npm;
        return $this->getDataAPI($endpoint);
    }

    public function deleteOrganisasi(Request $request, $id){
        $client = new Client(['base_uri' => $this->baseUrl]);
        $token = $request->session()->get('remember_token');
        $data=array('id'=>$id);
        $response = $client->request('DELETE', 'organisasi', ['form_params' => $data, 'headers' => ['remember_token' => $token]]);
        $result = json_decode($response->getBody()->getContents());
        return redirect()->back();
    }
}
