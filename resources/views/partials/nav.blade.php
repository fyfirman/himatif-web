<nav class="navbar-fixed white">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo grey-text text-darken-1">
            <img src="{{ asset('img/himatif-logo-256x256.png') }}" alt="" style="vertical-align:middle">
            <span>Himatif Web</span>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#"><i class="material-icons grey-text text-lighten-1">apps</i></a></li>
            <li>
                <a class="nav-button" onclick="showLogin()">
                    <img class="user-thumb" src="{{ asset('img/user-profile-dummy.jpg') }}" style="vertical-align:middle"/>
                    <span class="grey-text">{{ Session::get('username') }}</span>
                </a>
            </li>
            
        </ul>
    </div>
</nav>


{{-- Dropdown Content --}}
<div id="login-form" class="login-form">
    <form action="login" autocomplete="off" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col m12 inline" >
                <input name="username" id="a" type="text" class="validate">
                <label for="a">Nomor Pokok Mahasiswa</label>
            </div>
        {{-- </div>
        <div class="row"> --}}
            <div class="input-field col m12 inline" >
                <input name="password" id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row valign-wrapper">
            <div class="col m6">
                <button class="btn waves-effect waves-light" type="submit">
                    Login
                </button>
            </div>
            <div class="col m6">
                <a href="">Forgot Password</a>
            </div>
        </div>
    </form>
</div>

<div id="logout-form" class="login-form">
    <a href="logout" class="btn waves-effect waves-light red right">Logout</a>
</div>

<script>
    function showLogin() {
        var l = "{{ Session::get('logged_in')}}";
        var x = document.getElementById("login-form");
        var y = document.getElementById('logout-form');
        if(l == 1){
            if (y.style.display == "none" || y.style.display == '') {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }else{
            if (x.style.display == "none" || x.style.display == '') {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    }
</script>
{{-- Dropdown Content --}}
{{-- <div id="login-form" class="login-form">
    <form action="" autocomplete="off">
        <div class="input-field col s12">
            <input id="npm" type="text" class="validate">
            <label for="npm">Nomor Pokok Mahasiswa</label>
        </div>
        <div class="input-field col s12">
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">
            Login
        </button>
    </form>
</div> --}}