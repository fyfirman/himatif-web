<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Http\File;
    use Illuminate\Support\Facades\URL;

    class keilmuanController extends Controller{

        private $baseUrl = 'http://api.himatif.org/data/v1/';

        public function index(Request $request){
            if($this->cekSession($request)){
                $data = $this->getFile();
                return view('admin.pathwaysContent', ['dataFile' => $data]);
            }else{
                return redirect('/')->with('message', 'login_first');
            }
        }

        public function addFile(Request $request){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            try{
                $uploaded = $request->file('filename');
                $filename = $uploaded->getClientOriginalName();
                $location = URL::to('pathways/'.$filename);
                $data = array(
                    'filename' => $filename,
                    'matkul' => Input::get('matkul'),
                    'location' => $location
                );
                $response = $client->request('POST', 'counter/addCounter', ['form_params' => $data, 'header' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
                $uploaded->move(public_path('pathways/'), $filename);
            }catch(RequestException $req){
                $result = NULL;
            }
            if($result != NULL && $result->status == 'Counter file berhasil ditambahkan'){
                return $result->status;
            }else{
                return 'failed';
            }
        }

        public function getFile(){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $response = $client->get('counter/getCounter');
            $result = json_decode($response->getBody()->getContents());
            if($result->status == 'Authorized'){
                return $result->response;
            }else{
                return NULL;
            }
        }

        public function deleteFile(Request $request, $filename){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            try{
                $data = array('filename'=>$filename);
                $response = $client->request('POST', 'counter/delete', ['form_params' => $data, 'header' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
            }catch(RequestException $req){
                $result = NULL;
            }
            if($result != NULL && $result->status == 'Berhasil dihapus' ){
                unlink(public_path('pathways/'.$filename));
                return redirect('/admin/pathways');
            }else{
                return 'Tidak berhasil dihapus';
            }
        }

        public function cekSession(Request $request){
            if($request->session()->get('logged_in')){
                return true;
            }
            return false;
        }
    }
?>