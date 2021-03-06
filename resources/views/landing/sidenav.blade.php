<ul class="sidenav" id="slide-out">
    <li><a href="{{ url('/hda') }}">Himatif Database</a></li>
    <ul class="collapsible collapsible-accordion ">
        <li class="active">
            <a class="collapsible-header">Keilmuan</a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="{{ url('/keilmuan/pathways') }}" class="waves-effect">Pathways</a></li>
                    <li><a href="#" style="color:grey" class="waves-effect">Read Djournal <span style="color:red">(Coming Soon)</span></a></li>
                    {{-- <li><a href="{{ url('/keilmuan/djournals') }}" class="waves-effect">Read Djournal</a></li> --}}
                </ul>
            </div>
        </li> 
    </ul>
    @php
        $privilege = Session::get('privilege');
    @endphp
    @if ($privilege == 2 || $privilege == 3 || $privilege == 4 )
        <li><a href="{{ url('/admin') }}">Admin</a></li>
    @endif
</ul>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>