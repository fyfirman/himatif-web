{{-- To toogle sub menu on nav --}}
<script src="{{asset('js/nav-submenu.js')}}"></script>
<nav class="navbar-fixed white pushpin">
    <script>
        $(document).ready(function(){
            $('.pushpin').pushpin();
            // jJqNA3Gm
            var message = "{{ Session::get('message') }}";
            switch(message){
                case "login_invalid":
                    alert('NPM/Password is Invalid', 'error');
                    break;
                case "login_first":
                    alert('Please Login First', 'warning');
                    break;
                case "updatedata_success":
                    alert('Update Data Success', 'success');
                    break;
                case "updatedata_failed":
                    alert('Update Data Failed', 'error');
                    break;
                case "updatepw_success":
                    alert('Update Password Succesfully!', 'success');
                    break;
                case "updatepw_failed":
                    alert('Update Password Failed. Please re-check your old/newpassword!', 'error');
                    break;
                case "resetpw_failed":
                    alert('NPM/Email for Reset Password is Invalid/Not Registered yet!', 'error');
                    break;
            }
        });

        function alert(title, type){
            Swal.fire({
                title: title,
                type: type
            })
        }
    </script>
    <div class="nav-wrapper">
        <a id="nav-mobile-btn" href="#" data-target="slide-out" class="sidenav-trigger teal-text"><i class="material-icons">menu</i></a>
        <a href="/" class="brand-logo grey-text text-darken-1">
            {{-- @hasSection('brand-logo') --}}
                @yield('brand-logo')
            {{-- @else
                <img src="{{ asset('img/himatif-logo-256x256.png') }}" alt="" style="vertical-align:middle">
                <span>Himatif Apps</span>   
            @endif --}}
        </a>

        {{-- Search bar buat di HDA --}}
        @yield('search-bar')

        <ul id="nav-mobile" class="right">
            <li class="hide-on-small-only"><a onclick="toogleAppsMenu({{Session::get('logged_in')}})" class="apps-menu-btn"><i class="material-icons">apps</i></a></li>
            <li>
                {{-- Kondisi ketika sudah masuk --}}
                @if(session('logged_in'))
                    @php $anggota = Cookie::get('anggota'); $anggota=json_decode($anggota); @endphp
                    @foreach ($anggota as $data)
                        <a id="user-btn" class="nav-button" onclick="toogleAuth(1)">
                            <img class="user-thumb" src="{{ $data->url_foto }}" style="vertical-align:middle"/>
                        </a>
                    @endforeach
                {{-- Kondisi ketika belum masuk --}}
                @else
                    <a id="btnLogin" class="deep-btn login-btn btn-small" onclick="toogleAuth(0)">Login</a>
                @endif
                
            </li>
            
        </ul>
    </div>
    @yield('admin-tab')
</nav>

{{-- Apps Menu Content --}}
<div id="apps-wrapper" class="apps-wrapper">
    <div class="row">
        <a href="{{ url('/hda') }}" class="col m4 apps-btn">
            <img src="{{ asset('svg/logo-hda.svg') }}" alt=""><br>
            <label>Himatif Database</label>
        </a>
        <a href="{{ url('/keilmuan') }}" class="col m4 apps-btn">
            <img src="{{ asset('svg/logo-keilmuan.svg') }}" alt=""><br>
            <label>Keilmuan</label>
        </a>
        @php
        $superuser = true;
        @endphp
        @if ($superuser)
            <a href="{{ route('admin') }}" class="col m4 apps-btn">
                <img src="{{ asset('svg/logo-admin.svg') }}" alt=""><br>
                <label>Admin</label>
            </a>
        @endif
    </div>
    
</div>


{{-- Login Content --}}
@if(!session('logged_in'))
<div id="login-form" class="login-form">
    <form action="login" autocomplete="off" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col m12 inline" >
                <input name="username" id="a" type="text" class="validate" required>
                <label for="a">Nomor Pokok Mahasiswa</label>
            </div>
            <div class="input-field col m12 inline" >
                <input name="password" id="password" type="password" class="validate" required>
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
                <a style="cursor:pointer" onclick="showReset()">Forgot Password</a>
            </div>
        </div>
    </form>
</div>
@endif

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
        <a href="{{ route('logout') }}" class="btn-small deep-btn logout-btn">Logout</a>
        <a href="{{ route('viewEdit') }}" class="btn-small deep-btn edit-btn">Edit Profile</a>
    </div>
</div>
@endif

{{-- ResetPassword Content --}}
@if(!session('logged_in'))
<div id="reset-form" class="login-form" style="display:none">
    <form action="{{ route('reset') }}" autocomplete="off" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col m12 inline" >
                <input name="username" id="npm" type="text" class="validate" required>
                <label for="npm">Nomor Pokok Mahasiswa</label>
            </div>
            <div class="input-field col m12 inline">
                <input type="email" name="email" id="email" class="validate" required>
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row valign-wrapper">
            <div class="col m6">
                <button class="btn-small login-btn deep-btn" type="submit">
                    Reset
                </button>
            </div>
            <div class="col m6">
                <a style="cursor:pointer" onclick="showReset()">Back to Login</a>
            </div>
        </div>
    </form>
</div>
@endif