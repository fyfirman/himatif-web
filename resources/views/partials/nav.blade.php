{{-- To toogle sub menu on nav --}}
<script src="{{asset('js/nav-submenu.js')}}"></script>

<nav class="navbar-fixed white">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo grey-text text-darken-1">
            <img src="{{ asset('img/himatif-logo-256x256.png') }}" alt="" style="vertical-align:middle">
            <span>Himatif Web</span>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a onclick="toogleAppsMenu()" class="apps-menu-btn"><i class="material-icons">apps</i></a></li>
            <li>
                {{-- Kondisi ketika sudah masuk --}}
                @if(session('logged_in'))
                    <a class="nav-button" onclick="toogleAuth(1)">
                        <img class="user-thumb" src="{{ asset('img/user-profile-dummy.jpg') }}" style="vertical-align:middle"/>
                    </a>
                {{-- Kondisi ketika belum masuk --}}
                @else
                    <a class="deep-btn login-btn btn-small" onclick="toogleAuth(0)">Login</a>
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
<div id="logout-form" class="logout-form">
    <div class="row">
        <div class="col m5 text-center">
            <img class="user-thumb" src="{{ asset('img/user-profile-dummy.jpg') }}" style="vertical-align:middle"/>
        </div>
        <div class="col m7">
            <div class="info-wrapper">
                <div class="row user-name">
                    Firmansyah Yanuar
                </div>
                <div class="row">
                    {{Session::get('username')}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="logout" class="btn-small deep-btn logout-btn">Logout</a>
        <a href="logout" class="btn-small deep-btn edit-btn">Edit Profile</a>
    </div>
</div>