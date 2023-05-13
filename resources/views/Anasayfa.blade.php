<!DOCTYPE html>
<html lang="en">
<head>

    <title>Bilgisayar Hanem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: burlywood;
        }

        .jumbotron {
            background-color: burlywood;
            color: #fff;
            padding: 100px 25px;
            font-family: Montserrat, sans-serif;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .panel {
            border: 1px solid burlywood;
            border-radius:0 !important;
            transition: box-shadow 0.5s;
        }

        .panel-heading {
            color: #fff !important;
            background-color: burlywood !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0,0,0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid burlywood;
            background-color: #fff !important;
            color: burlywood;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: burlywood;
            color: #fff;
        }

        .navbar {
            margin-bottom: 0;
            background-color: burlywood;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }

        .navbar li a, .navbar .navbar-brand {
            color: #fff !important;
        }
        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: burlywood !important;
            background-color: #fff !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }
        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: burlywood;
        }
        .slideanim {visibility:hidden;}

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 2s;
            -webkit-animation-duration: 2s;
            visibility: visible;
        }
        .filtre-btn{
            background-color: burlywood;
            color: white;
        }

        .filtre-btn:hover{
            color:#718096;
        }

        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }
        @media screen and (max-width: 768px) {
            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }
        @media screen and (max-width: 480px) {

        }
    </style>
</head>

<body id="Anasayfa" data-spy="scroll" data-target=".navbar" data-offset="60" style="background-color: #718096">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container" style="display: flex;align-items: center; justify-content: center">
        <form style="margin-top:10px">
            <div class="input-group">
                <input type="text" name="Arama" id="Arama" class="form-control" size="30" placeholder="Ara" required>
                <div class="input-group-btn">
                    <button type="button" class="btn " style="background-color: #718096; color: white">Ara</button>
                </div>
            </div>
        </form>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>Bilgisayar Hanem</h1>
    <p>Sizin İçin En Uygun Fiyatlar...</p>
</div>

<div  class="container-fluid">
    <div class="text-center">
        <h2 style="font-size:48px; color: white; margin-bottom: 50px">Dizüstü Bilgisayarlar</h2>
    </div>



    <div class="row slideanim" style="margin-bottom: 80px">
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <h3 style="color: white">Marka</h3>
            <select onchange="test()" id="select_marka">
                <option value="">-Hepsi-</option>
                @for($i=0;$i<count($markalar);$i++)
                    <option value="{{$markalar[$i]}}" {{$marka == "$markalar[$i]"?'selected':''}}>{{$markalar[$i]}}</option>
                @endfor
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <h3 style="color: white">Ram</h3>
            <select onchange="test()" id="select_ram">
                <option value="">-Hepsi-</option>
                @for($i=0;$i<count($Ramler);$i++)
                    <option value="{{$Ramler[$i]}}" {{$Ram == "$Ramler[$i]"?'selected':''}}>{{$Ramler[$i]}}</option>
                @endfor
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <h3 style="color: white">İşletim Sistemi</h3>
            <select onchange="test()" id="select_is">
                <option value="">-Hepsi-</option>
                @for($i=0;$i<count($Isletim_Sistemleri);$i++)
                    <option value="{{$Isletim_Sistemleri[$i]}}" {{$Isletim_Sistemi == "$Isletim_Sistemleri[$i]"?'selected':''}}>{{$Isletim_Sistemleri[$i]}}</option>
                @endfor
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <h3 style="color: white">Ekran Boyutu</h3>
            <select onchange="test()" id="select_ek">
                <option value="">-Hepsi-</option>
                @for($i=0;$i<count($Ekran_Boyutlari);$i++)
                    <option value="{{$Ekran_Boyutlari[$i]}}" {{$Ekran_Boyutu == "$Ekran_Boyutlari[$i]"?'selected':''}}>{{$Ekran_Boyutlari[$i]}}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row slideanim" style="margin-bottom:80px; margin-top:50px;">
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <a href="http://localhost:8000/?scrap=0&Artan=1&Azalan=0&marka=" ><button class="btn btn-lg filtre-btn"> Artan Fiyata Göre Sırala</button></a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <a href="http://localhost:8000/?scrap=0&Artan=0&Azalan=1&marka=" ><button class="btn btn-lg filtre-btn"> Azalan Fiyata Göre Sırala</button></a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <a href="http://localhost:8000/?scrap=0&P_Artan=1&P_Azalan=0&marka=" ><button class="btn btn-lg filtre-btn"> Artan Puana Göre Sırala</button></a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <a href="http://localhost:8000/?scrap=0&P_Artan=0&P_Azalan=1&marka=" ><button class="btn btn-lg filtre-btn"> Azalan Puana Göre Sırala</button></a>
        </div>
    </div>



    <div class="row slideanim">
        <ul type="none" id="Bilgisayarlar" >
        @foreach ($veriler as $key => $Bilgi)
                <li>
            <div class="col-lg-4 col-md-6 col-sm-12" >
                <div class="panel panel-default text-center" style="height:645px" >
                    <div class="panel-heading "  style="height:133px" >
                         <h1 style="margin-top:-20px">{{$Bilgi->marka}}</h1>
                         <h4>{{$Bilgi->ad}}</h4>

                    </div>
                    <div class="panel-body " style="height:360px; display: flex; align-items: center; justify-content: center" >
                        @if(($Bilgi->magaza=="Teknosa"))
                        <a href="/Özellik/?ID={{$Bilgi->ID}}" > <button style="background-color: white" class="btn btn-lg"> <img  src="{{$Bilgi->resimlinki}}" alt="..." class="img-fluid" width="60%" /> </button></a>
                        @endif
                            @if(($Bilgi->magaza!="Teknosa"))
                                <a href="/Özellik/?ID={{$Bilgi->ID}}" > <button style="background-color: white" class="btn btn-lg"> <img  src="{{$Bilgi->resimlinki}}" alt="..." class="img-fluid" width="300px" height="300px" /> </button></a>
                            @endif
                    </div>
                    <div class=" panel-footer  " style="height:160px" >
                        <div class="row">
                            <div class="col-12" >
                                <p style="font-size:20px; color: black"><b>{{$Bilgi->fiyat}} TL</b></p>
                                <p style="font-size:15px; color: black"><b>{{$Bilgi->rating}} &starf; </b></p>


                                <a href="{{$Bilgi->link}}" target="_blank"><button class="btn btn-lg"> {{$Bilgi->magaza}}</button></a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
                </li>
        @endforeach
        </ul>
    </div>


</div>




<footer class="container-fluid text-center">
    <a href="#Anasayfa" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    $(document).ready(function(){
        $('#select_marka,#select_ram,#select_is,#select_ek').change(function(){
            window.location.href = "http://localhost:8000/?scrap=0&Artan=0&Azalan=0&marka="+$('#select_marka').val()+"&Isletim_Sistemi="+$('#select_is').val()+"&Ram="+$('#select_ram').val()+"&Ekran_Boyutu="+$('#select_ek').val();
        })

        $(".navbar a, footer a[href='#Bilgisayar Hanem']").on('click', function(event) {

            if (this.hash !== "") {

                event.preventDefault();


                var hash = this.hash;


                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){


                    window.location.hash = hash;
                });
            }
        });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })



    jQuery.expr[':'].contains = function(a, i, m) {
        return jQuery(a).text().toUpperCase()
            .indexOf(m[3].toUpperCase()) >= 0;
    };

    $(document).ready(function () {


        $("#Arama").keyup(function(){


            var value = $("#Arama").val();


            if(value.length==0){

                $("#Bilgisayarlar li").show();


            }else{

                $("#Bilgisayarlar li").hide();
                $("#Bilgisayarlar li:contains("+value+")").show();

            }

        });

    });
</script>

</body>
</html>
