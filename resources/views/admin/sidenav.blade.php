<ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo">
        <a id="logo-container" href="{{ url('admin') }}" class="brand-logo">
            <img src="{{ asset('img/himatif-logo-256x256.png') }}" alt="" style="vertical-align:middle">
            <span>Himatif Admin</span>
        </a>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Database</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect">User</a></li>
                        <li><a class="waves-effect">Status Update</a></li>
                </div>
            </li> 
        </ul>
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Pathways</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect">Content</a></li>
                    </ul>
                </div>
            </li> 
        </ul>
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Djournal</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect">Content</a></li>
                    </ul>
                </div>
            </li> 
        </ul>
    </li>
    </ul>
</ul>

<script>
//Collapsible
$(document).ready(function(){
    $('.collapsible').collapsible();
});

$(document).ready(function(){
    $('.sidenav').sidenav();
});
</script>
<script src="{{asset('js/admin-user.js')}}"></script>