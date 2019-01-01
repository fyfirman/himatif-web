<ul id="slide-out" class="sidenav sidenav-fixed">
    <li><a id="tentang" href="{{ url('hda') }}" class="waves-effect">Tentang</a></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Angkatan</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a id="btn2012" class="waves-effect">Circle 2012</a></li>
                        <li><a id="btn2013" class="waves-effect">Pascal 2013</a></li>
                        <li><a id="btn2014" class="waves-effect">Assembly 2014</a></li>
                        <li><a id="btn2015" class="waves-effect">Binary 2015</a></li>
                        <li><a id="btn2016" class="waves-effect">Cyber 2016</a></li>
                        <li><a id="btn2017" class="waves-effect">Delphi 2017</a></li>
                        <li><a id="btn2018" class="waves-effect">Eclipse 2018</a></li>
                    </ul>
                </div>
            </li> 
        </ul>
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Badan Kelengkapan</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a id="btnBE" class="waves-effect">Badan Eksekutif</a></li>
                        <li><a id="btnDPA" class="waves-effect">Dewan Perwakilan Anggota</a></li>
                        <li><a id="btnMubes" class="waves-effect">Presidium</a></li>
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
<script src="{{asset('js/hda.js')}}"></script>