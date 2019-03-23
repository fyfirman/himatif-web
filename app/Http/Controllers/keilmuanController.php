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

        public function index(Request $request){
            if($this->cekSession($request)){
                if(!$this->isUpdated($request))
                    return redirect('/updateProfile')->with('message', 'update_profile_first');
                $data = $this->getFile();
                return view('keilmuan.pathways', ['dataFile' => $data]);
            }else{
                return redirect('/')->with('message', 'login_first');
            }
        }

        public function adminIndex(Request $request){
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

        public function updateCounter(Request $request, $filename){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            $getData = $this->searchCounter('filename', $filename);
            $getCount = $getData[0]->count;
            try{
                $getCount = $getCount + 1;
                $data = array(
                    'filename' => $filename,
                    'count' => $getCount
                );
                $response = $client->request('PUT', 'counter/updateCounter', ['form_params' => $data, 'header' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
            }catch(RequestException $req){
                return $result = NULL;
            }
            if($result->status == 'Counter telah ditambah'){
                return redirect($getData[0]->location);
            }else{
                return 'Counter tidak berhasil ditambahkan';
            }
        }

        public function searchCounter($type, $key){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $endpoint = 'counter/searchCounter?type='.$type.'&q='.$key;
            $response = $client->get($endpoint);
            $result = json_decode($response->getBody()->getContents());
            if($result->status == 'Authorized'){
                return $result->response;
            }else{
                return NULL;
            }
        }
    }
?>