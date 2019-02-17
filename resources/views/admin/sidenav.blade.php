<ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo">
        <a id="logo-container" href="{{ url('') }}" class="brand-logo">
            <img src="{{ asset('svg/logo-admin.svg') }}" alt="" style="vertical-align:middle">
            <span>Admin</span>
        </a>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Database</a>
                <div class="collapsible-body">
                    <ul>
                        <li class="active"><a href="{{ url('admin/user') }}" class="waves-effect"><i class="material-icons">people</i>User</a></li>
                        <li><a href="{{ url('admin/config') }}"class="waves-effect"><i class="material-icons">settings</i>Configuration</a></li>
                </div>
            </li> 
        </ul>
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Pathways</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect"><i class="material-icons">create</i>Content</a></li>
                    </ul>
                </div>
            </li> 
        </ul>
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Djournal</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect"><i class="material-icons">library_books</i>Content</a></li>
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