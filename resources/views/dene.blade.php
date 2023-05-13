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
        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;
        }
        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }
        .jumbotron {
            background-color: #f4511e;
            color: #fff;
            padding: 100px 25px;
            font-family: Montserrat, sans-serif;
        }
        .container-fluid {
            padding: 60px 50px;
        }
        .bg-grey {
            background-color: #f6f6f6;
        }
        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }
        .logo {
            color: #f4511e;
            font-size: 200px;
        }
        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }
        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }
        .carousel-control.right, .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }
        .carousel-indicators li {
            border-color: #f4511e;
        }
        .carousel-indicators li.active {
            background-color: #f4511e;
        }
        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }
        .item span {
            font-style: normal;
        }
        .panel {
            border: 1px solid #f4511e;
            border-radius:0 !important;
            transition: box-shadow 0.5s;
        }
        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0,0,0, .2);
        }
        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }
        .panel-heading {
            color: #fff !important;
            background-color: white !important;
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
        .panel-footer h3 {
            font-size: 32px;
        }
        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }
        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }
        .navbar {
            margin-bottom: 0;
            background-color: #f4511e;
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
            color: #f4511e !important;
            background-color: #fff !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }
        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #f4511e;
        }
        .slideanim {visibility:hidden;}
        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
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
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }
            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }
        @media screen and (max-width: 480px) {
            .logo {
                font-size: 150px;
            }
        }
    </style>
</head>
<body

    id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container" style="display: flex;align-items: center; justify-content: center">
        <form style="margin-top:10px">
            <div class="input-group">
                <input type="text" name="Arama" id="Arama" class="form-control" size="30" placeholder="Ara" required>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-danger">Ara</button>
                </div>
            </div>
        </form>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>Bilgisayar Hanem</h1>
    <p>Sizin İçin En Uygun Fiyatlar...</p>

</div>

<!-- select -->

<input type="checkbox" class="myCheckbox" value="thor"> test 1 (thor)
<input type="checkbox" class="myCheckbox" value="spiderman"> test 2 (spiderman)
<input type="checkbox" class="myCheckbox" value="superman"> test 3 (superman)

<div id="content"></div>

<!-- Container (Pricing Section) -->
<div  class="container-fluid">
    <div class="text-center">
        <h2>Dizüstü Bilgisayarlar</h2>
        <h4>Aradığınız Her Bilgisayar En uygun Fiyatlarla Elinizin Altında  {{$marka}}</h4>
    </div>

    <div class="row slideanim">
        @foreach ($veriler as $key => $Bilgi)

        <div class="col-lg-4 col-md-6 col-sm-12" >
            <div class="panel panel-default text-center" style="height:645px" >
                <div class="panel-heading" style="height:360px" >

                    <a href="/Özellik/?ID={{$Bilgi->ID}}" > <button style="background-color: white" class="btn btn-lg"> <img  src="{{$Bilgi->resimlinki}}" alt="..." class="img-fluid" width="60%"/> </button></a>
                </div>
                <div class="panel-body " style="height:120px; display: flex; align-items: center; justify-content: center" >
                    <p>{{strtoupper($Bilgi->ad)}}</p>
                </div>
                <div class=" panel-footer  " style="height:160px" >
                    <div class="row">
                        <div class="col-12" >
                            <p style="font-size:20px; color: black"><b>{{$Bilgi->fiyat}} TL</b></p>
                            <a href="{{$Bilgi->link}}" target="_blank"><button class="btn btn-lg"> {{$Bilgi->magaza}}</button></a>
                        </div>



                    </div>
                </div>


            </div>
        </div>
        @endforeach
    </div>

            </div>
        </div>
    </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">İletişim</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>7/24 Bizimle İletişime Geçebilirsiniz.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Kocaeli,Türkiye</p>
            <p><span class="glyphicon glyphicon-phone"></span>  5438819502</p>
            <p><span class="glyphicon glyphicon-envelope"></span> hilmiunal99@gmail.com</p>

            <p><span class="glyphicon glyphicon-phone"></span>  5455122861</p>
            <p><span class="glyphicon glyphicon-envelope"></span> dursunmehmetsamet@gmail.com</p>

        </div>
        <div class="col-sm-7 slideanim">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    $(document).ready(function(){
        $('#select_id').change(function(){
            window.location.href = "http://localhost:8000/?scrap=0&marka="+$(this).val();
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
</script>

<script>
    data = ["batman","thor","superman","spiderman","ironman"];
    table = d3.select("#content")
        .append("table")
        .property("border","1px");
    d3.selectAll(".myCheckbox").on("change",update);
    update();


    function update(){
        var choices = [];
        d3.selectAll(".myCheckbox").each(function(d){
            cb = d3.select(this);
            if(cb.property("checked")){
                choices.push(cb.property("value"));
            }
        });

        if(choices.length > 0){
            newData = data.filter(function(d,i){return choices.includes(d);});
        } else {
            newData = data;
        }

        newRows = table.selectAll("tr")
            .data(newData,function(d){return d;});
        newRows.enter()
            .append("tr")
            .append("td")
            .text(function(d){return d;});
        newRows.exit()
            .remove();
    }

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
