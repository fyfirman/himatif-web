<ul id="slide-out" class="sidenav sidenav-fixed">
    <li><a id="tentang" href="{{ url('hda') }}" class="waves-effect">Tentang</a></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Angkatan</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url('hda/angkatan/2012') }}" class="waves-effect">Circle 2012</a></li>
                        <li><a href="{{ url('hda/angkatan/2013') }}" class="waves-effect">Pascal 2013</a></li>
                        <li><a href="{{ url('hda/angkatan/2014') }}" class="waves-effect">Assembly 2014</a></li>
                        <li><a href="{{ url('hda/angkatan/2015') }}" class="waves-effect">Binary 2015</a></li>
                        <li><a href="{{ url('hda/angkatan/2016') }}" class="waves-effect">Cyber 2016</a></li>
                        <li><a href="{{ url('hda/angkatan/2017') }}" class="waves-effect">Delphi 2017</a></li>
                        <li><a href="{{ url('hda/angkatan/2018') }}" class="waves-effect">Eclipse 2018</a></li>
                    </ul>
                </div>
            </li> 
        </ul>
        <ul class="collapsible collapsible-accordion">
            <li class="active">
                <a class="collapsible-header">Badan Kelengkapan</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url('hda/anggota/be') }}" class="waves-effect">Badan Eksekutif</a></li>
                        <li><a href="{{ url('hda/anggota/dpa') }}" class="waves-effect">Dewan Perwakilan Anggota</a></li>
                        <li><a href="{{ url('hda/anggota/mubes') }}" class="waves-effect">Presidium</a></li>
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

//
$(function() {
    var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
    
    //collapsible menu
    $(".collapsible-body li a").each(function(){
        let ahref = $(this).attr("href").split('/').pop();
        if(ahref == pgurl)
            $(this).parent().addClass("active");
    })

    $(".sidenav > li > a").each(function(){
        let id = $(this).attr("id");
        if(id == pgurl || pgurl == ''|| pgurl == 'hda')
            $(this).parent().addClass("active");
    })
});
</script>