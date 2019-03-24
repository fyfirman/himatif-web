<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Input;

class adminController extends hdaController
{
    // private $baseUrl = 'http://api.himatif.org/data/v1/';

    public function index(Request $request){
        if($this->cekSession($request)){
            $privilege = $request->session()->get('privilege');
            switch ($privilege) {
                case 1: //normal user
                    return redirect('/')->with('message', 'cant_access_this_page');
                case 2: //admin pathways
                    return redirect('/admin/pathways');
                    break;
                case 3: //superuser, koor, dsb
                    return redirect('/admin/user');
                    break;
                case 4: //admin
                    return redirect('/admin/user');
                    break;
                default:
                    return redirect('/')->with('message', 'cant_access_this_page');
                    break;
            }
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    public function user(Request $request){
        if($this->cekSession($request)){
            return view('admin.userContent');
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }

    public function config(Request $request){
        $endpoint = 'user/search?type=default&q=default';
        
        if($this->cekSession($request)){
            $data = $this->getDataAPI($endpoint);
            return view('admin.config', ['data' => $data]);
        }else{
            return redirect('/')->with('message', 'login_first');
        }
    }


}