{{-- To toogle sub menu on nav --}}
<script src="{{asset('js/nav-submenu.js')}}"></script>
<nav class="navbar-fixed white">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo grey-text text-darken-1">
            <img src="{{ asset('img/himatif-logo-256x256.png') }}" alt="" style="vertical-align:middle">
            <span>Himatif Apps</span>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>@if (session('login') == 'invalid')
                    <span class="red-text">NPM/Password is Invalid.</span>
                @elseif(session('login') == 'first')
                    <span class="orange-text">Please Login First!</span>
                @elseif(session('update') == 'success')
                    <span class="orange-text">Update Data Succes.</span>
                @elseif(session('update') == 'failed')
                    <span class="red-text">Update Data Failed!</span>
                @endif
            </li>
            <li><a onclick="toogleAppsMenu({{Session::get('logged_in')}})" class="apps-menu-btn"><i class="material-icons">apps</i></a></li>
            <li>
                {{-- Kondisi ketika sudah masuk --}}
                @if(session('logged_in'))
                    @php $anggota = Cookie::get('anggota'); $anggota=json_decode($anggota); @endphp
                    @foreach ($anggota as $data)
                        <a class="nav-button" onclick="toogleAuth(1)">
                            <img class="user-thumb" src="{{ $data->url_foto }}" style="vertical-align:middle"/>
                            @php $arr = explode(" ", $data->nama); $nickname = $arr[0];@endphp
                            <span style="margin-left:5px;color:grey;font-weight:bold">Welcome, {{ $nickname }}</span>
                        </a>
                    @endforeach
                {{-- Kondisi ketika belum masuk --}}
                @else
                    <a id="btnLogin" class="deep-btn login-btn btn-small" onclick="toogleAuth(0)">Login</a>
                @endif
                
            </li>
            
        </ul>
    </div>
</nav>

{{-- Apps Menu Content --}}
<div id="apps-wrapper" class="apps-wrapper row">
    <a href="{{ url('/hda') }}" class="col m4 apps-btn">
        <img src="https://dummyimage.com/100x100/000000/ffffff&text=HDA" alt=""><br>
        <label>Himatif Database</label>
    </a>
    <a href="{{ url('/pathways') }}" class="col m4 apps-btn">
        <img src="https://dummyimage.com/100x100/000000/ffffff&text=Pathways" alt=""><br>
        <label>Pathways</label>
    </a>
    <a href="{{ url('/jurnal') }}" class="col m4 apps-btn">
        <img src="https://dummyimage.com/100x100/000000/ffffff&text=Read Djournal" alt=""><br>
        <label>Read Djournal</label>
    </a>
</div>


{{-- Login Content --}}
<div id="login-form" class="login-form">
    <form action="login" autocomplete="off" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col m12 inline" >
                <input name="username" id="a" type="text" class="validate">
                <label for="a">Nomor Pokok Mahasiswa</label>
            </div>
            <div class="input-field col m12 inline" >
                <input name="password" id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row valign-wrapper">
            <div class="col m6">
                <button class="btn-small login-btn deep-btn" type="submit">
                    Login
                </button>
            </div>
            <div class="col m6">
                <a href="">Forgot Password</a>
            </div>
        </div>
    </form>
</div>

{{-- Logout Content --}}
@if(session('logged_in'))
<div id="logout-form" class="logout-form">
    @foreach ($anggota as $data)
        <div class="row">
            <div class="col m5 text-center">
                <img class="user-thumb" src="{{ $data->url_foto }}" style="vertical-align:middle"/>
            </div>
            <div class="col m7">
                <div class="info-wrapper">
                    <div class="row user-name">
                        {{ $data->nama }}
                    </div>
                    <div class="row">
                        {{ $data->npm }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <a href="logout" class="btn-small deep-btn logout-btn">Logout</a>
        <a href="{{ route('viewEdit') }}" class="btn-small deep-btn edit-btn">Edit Profile</a>
    </div>
</div>
@endif