<ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Pathways</a>
                <div class="collapsible-body">
                    <ul>
                        <li class="active"><a class="waves-effect">File</a></li>
                        <li><a class="waves-effect">Matkul</a></li>
                </div>
            </li> 
        </ul>
        <ul>
            <li>
                <a href="#">Read Djournal</a>
            </li> 
        </ul>
    </li>
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
<script src="{{asset('js/hda.js')}}"></script>