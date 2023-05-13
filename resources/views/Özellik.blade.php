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
            color: #818181;
        }

        .jumbotron {
            background-color: burlywood;
            color: #fff;
            padding: 50px 25px;
            font-family: Montserrat, sans-serif;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .panel {
            border: 1px solid burlywood;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: center;
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
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
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

        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: burlywood;
        }

        .slideanim {
            visibility: hidden;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 2s;
            -webkit-animation-duration: 2s;
            visibility: visible;
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

                margin-bottom: 35px;
            }
        }

    </style>

</head>

<body id="Anasayfa" data-spy="scroll" data-target=".navbar" data-offset="60" style="background-color:#718096">

<div class="jumbotron text-center">
    <h1>Bilgisayar Hanem</h1>
    <p>Sizin İçin En Uygun Fiyatlar...</p>
</div>

<div class="container-fluid ">
    <div class="text-center">
        <h2 style="font-size:48px; color:#fff; margin-bottom:80px; margin-top:0px">Ürün Özellikleri</h2>
    </div>

    <div class="row slideanim">
        @foreach ($Id_Tut as $key => $Bilgi)

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-default text-center" style="height:750px">

                    <div class="panel-heading" style="height:100px">
                        <h1>{{$Bilgi->marka}}</h1>
                    </div>
                    <div class="panel-body "
                         style="height:500px; display: flex; align-items: center; justify-content: center">
                        @if($Bilgi->magaza!="Teknosa")
                            <img src="{{$Bilgi->resimlinki}}" alt="..." class="img-fluid" width="350px" height="350px"/>
                        @else
                            <img src="{{$Bilgi->resimlinki}}" alt="..." class="img-fluid" width="60%"/>
                        @endif
                    </div>
                    <div class=" panel-footer  " style="height:130px">
                        <div class="row">
                            <div class="col-12">
                                <h3 style="color: black; font-size: 32px"><b>{{$Bilgi->fiyat}} TL</b></h3>
                                <a href="{{$Bilgi->link}}" target="_blank">
                                    <button class="btn btn-lg"> {{$Bilgi->magaza}}</button>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-default " style="height:750px">

                    <div class="panel-heading" style="height:100px">
                        <h1 class="text-center">Özellikler</h1>
                    </div>
                    <div class="panel-body"
                         style="height:500px; display: flex; align-items: start; justify-content: start">
                        <p>
                            <br> <b style="color: black">Adı:</b> {{$Bilgi->ad}} <br>
                            <br> <b style="color: black">Model: </b> {{$Bilgi->modelno}}<br>
                            <br> <b style="color: black">İşletim Sistemi:</b> {{$Bilgi->isletimsistemi}}<br>
                            <br> <b style="color: black">İşlemci Tipi:</b> {{$Bilgi->islemcitipi}}<br>
                            <br> <b style="color: black">İşlemci Nesli:</b> {{$Bilgi->islemcinesli}}<br>
                            <br> <b style="color: black">Ram:</b> {{$Bilgi->ram}}<br>
                            <br> <b style="color: black">Ekran Boyutu:</b> {{$Bilgi->ekran}} "<br>
                            <br> <b style="color: black">Ekran Kartı:</b> {{$Bilgi->ekrankarti}}<br>
                        </p>
                    </div>


                </div>
            </div>
        @endforeach
    </div>
</div>

<footer class="container-fluid text-center">
    <a href="#Anasayfa" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {


        $(".navbar a, footer a[href='#Bilgisayar Hanem']").on('click', function (event) {

            if (this.hash !== "") {

                event.preventDefault();


                var hash = this.hash;


                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {


                    window.location.hash = hash;
                });
            }
        });

        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>

</body>

</html>
