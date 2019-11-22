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
                    return redirect('/updateProfile/'.$request->session()->get('username'))->with('message', 'update_profile_first');
                $data = $this->getFile('counter/getCounter');
                return view('keilmuan.pathways', ['dataFile' => $data]);
            }else{
                return redirect('/')->with('message', 'login_first');
            }
        }

        public function showDjournal(Request $request){
            if($this->cekSession($request)){
                if(!$this->isUpdated($request))
                    return redirect('/updateProfile/'.$request->session()->get('username'))->with('message', 'update_profile_first');
                $data = $this->getFile('djournal/getDjournal');
                return view('keilmuan.djournal', ['djournals' => $data]);
            }else{
                return redirect('/')->with('message', 'login_first');
            }
        }

        public function adminPathways(Request $request){
            if($this->cekSession($request)){
                $data = $this->getFile('counter/getCounter');
                return view('admin.pathwaysContent', ['dataFile' => $data]);
            }else{
                return redirect('/')->with('message', 'login_first');
            }
        }

        public function adminDjournal(Request $request){
          if($this->cekSession($request)){
              $data = $this->getFile('djournal/getDjournal');
              return view('admin.djournalContent', ['djournals' => $data]);
          }else{
              return redirect('/')->with('message', 'login_first');
          }
        }

        public function addPathways(Request $request){
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

        public function addDjournal(Request $request){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            try{
                $uploaded = $request->file('filename');
                $filename = $uploaded->getClientOriginalName();
                $location = URL::to('djournal/'.$filename);
                $data = array(
                    'filename' => $filename,
                    'judul' => Input::get('judul'),
                    'location' => $location
                );
                $response = $client->request('POST', 'djournal/addDjournal', ['form_params' => $data, 'header' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
                $uploaded->move(public_path('djournal/'), $filename);
            }catch(RequestException $req){
                $result = NULL;
            }
            if($result != NULL && $result->status == 'Djournal file berhasil ditambahkan'){
                return $result->status;
            }else{
                return 'failed';
            }
        }

        public function getFile($uri){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $response = $client->get($uri);
            $result = json_decode($response->getBody()->getContents());
            if($result->status == 'Authorized'){
                return $result->response;
            }else{
                return NULL;
            }
        }

        public function deletePathways(Request $request, $filename){
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

        public function deleteDjournal(Request $request, $filename){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            try{
                $data = array('filename'=>$filename);
                $response = $client->request('POST', 'djournal/delete', ['form_params' => $data, 'header' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
            }catch(RequestException $req){
                $result = NULL;
            }
            if($result != NULL && $result->status == 'Berhasil dihapus' ){
                unlink(public_path('djournal/'.$filename));
                return redirect('/admin/djournal');
            }else{
                return 'Tidak berhasil dihapus';
            }
        }

        public function updateCounter(Request $request, $filename){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            $getData = $this->searchCounter('filename', $filename, 'counter/searchCounter');
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

        public function updateDjournal(Request $request, $filename){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            $getData = $this->searchCounter('filename', $filename, 'djournal/searchDjournal');
            $getCount = $getData[0]->count;
            try{
                $getCount = $getCount + 1;
                $data = array(
                    'filename' => $filename,
                    'count' => $getCount
                );
                $response = $client->request('PUT', 'djournal/updateDjournal', ['form_params' => $data, 'header' => ['remember_token' => $token]]);
                $result = json_decode($response->getBody()->getContents());
            }catch(RequestException $req){
                return $result = NULL;
            }
            if($result->status == 'Djournal telah ditambah'){
                return redirect($getData[0]->location);
            }else{
                return 'Djournal tidak berhasil ditambahkan';
            }
        }

        public function searchCounter($type, $key, $uri){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $endpoint = $uri.'?type='.$type.'&q='.$key;
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
