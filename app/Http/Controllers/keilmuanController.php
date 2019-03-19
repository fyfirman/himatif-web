<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Http\File;

    class keilmuanController extends Controller{

        private $baseUrl = 'http://api.himatif.org/data/v1/';

        public function index(){
            return view('admin.pathwaysContent');
        }

        public function addFile(Request $request){
            $client = new Client(['base_uri' => $this->baseUrl]);
            $token = $request->session()->get('remember_token');
            try{
                $uploaded = $request->file('filename');
                $filename = $uploaded->getClientOriginalName();
                $data = array(
                    'filename' => $filename,
                    'matkul' => Input::get('matkul')
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
    }
?>