<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn2").click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            var id = $("#input2").val();
            $.ajax({
                type: 'POST',
                url: '/set',
                data: {post_id: id},
                success: function functionSuccess(data){
                    $("#info").text(data);
                    $("#cc").css("color","red");
                }
            });
        });
        $(".order").click(function send(id){
            id.preventDefault();
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({
                type: 'POST',
                url: '/del',
                data: {cookie_id: id},
                success: function functionSuccess(data){
                    $("#info").text(data);
                     $(".hidden").css("transition-delay","2s");
                     $(".hidden").css("display","none");
                }
            });
        });
    });
</script>
<style>
    body,h1,h2,h3,h4,h5 {/*font-family: "Raleway", sans-serif*/}
    .w3-quarter img{margin-bottom: -6px; cursor: pointer}
    .w3-quarter img:hover{opacity: 0.6; transition: 0.3s}

</style>
<body class="" style="background-color: white;color: black">
@section('navbar')
    <!-- Navbar (sit on top) -->
<div class="w3-top">
        <div class="w3-bar w3-card-2 navbar">
            <div class="w3-col l4 m3">
                <a  class="w3-hide-small">aaa</a>
            </div>
            <div class="w3-col l6 m9">
                <div class="navbar w3-hide-small">
                    <a class="w3-hide-small" href="{{route('home')}}">Home</a>
                    <a href="#news">News</a>
                    <div class="dropdown">

                            <a href="#" class="dropbtn">Products
                                <i class="fa fa-caret-down"></i>
                            </a>

                        <div class="dropdown-content">
                            <div class="row">
                                <div class="column">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                                <div class="column">
                                    <a href="{{ route('category',['name'=>'tshirt']) }}">T-Shirt</a>
                                    <a href="{{ route('category',['name'=>'trousers']) }}">Trousers</a>
                                    <a href="{{ route('category',['name'=>'shose']) }}">Shose</a>
                                </div>
                                <div class="column">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#news">Contact us</a>
                    <div class="cart">
                        <a href="{{route('cart')}}" style="float: right"  id="cc"><i class="fa fa-shopping-cart" style="position: relative;top: -6px;left: 15px;font-size: 15px;"></i><i class="fa fa-heart-o" style="font-size: 32px;position: relative;right: 7px;"></i></a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-hide  w3-hide-medium w3-col" {{--style="margin-top:46px"--}}>
        <div class="navbar ">
            <div class=w3-col">
                <div class="w3-col s2" style="">
                    <a  class="">aaa</a>
                </div>
                <div class="w3-col s8">
                    <a class="" href="#home">Home</a>
                </div>
                <div class="w3-col s2">
                    <div id="btnDemo" class="w3-right">
                        <a class="w3-bar-item  w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu">
                        <i class="fa fa-remove"></i></a>
                    </div>
                </div>
            </div>
            <a class="" href="#news">News</a>
            <div class="dropdown">
                <button class="dropbtn">Products
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <div class="row">
                        <div class="column">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                            <a href="{{ route('category',['name'=>'tshirt']) }}">T-Shirt</a>
                            <a href="{{ route('category',['name'=>'trousers']) }}">Trousers</a>
                            <a href="{{ route('category',['name'=>'shose']) }}">Shose</a>
                        </div>
                        <div class="column">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#news">Contact us</a>
        </div>
    </div>
    <div id="btnDemo" class="w3-right ">
        <div id="btnHid" class="">
         <a class="w3-bar-item w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu">
         <i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>
@show

@section('content')
<div class="w3-container" style="margin-top: 52px">
    <div class="w3-row">
        <div class="w3-col l6 m6">
            1
        </div>
        <div class="w3-col l3 s3">
            <div class="w3-col">
                <div class="w3-col l6 s6">
                    1
                </div>
                <div class="w3-col l6 s6">
                    2
                </div>
            </div>
            <div class="w3-col">
                <div class="w3-col l6 s6">
                    3
                </div>
                <div class="w3-col l6 s6">
                    4
                </div>
            </div>
        </div>
        <div class="w3-col l3 s3">
            3
        </div>
    </div>
</div>
@show
@section('footer')
    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-grey">
        <div class="w3-row-padding">
            <div class="w3-third">
                <h3>INFO</h3>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
            </div>

            <div class="w3-third">
                <h3>BLOG POSTS</h3>
                <ul class="w3-ul">
                    <li class="w3-padding-16 w3-hover-black">
                        {{--<img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">--}}
                        <span class="w3-large">Lorem</span><br>
                        <span>Sed mattis nunc</span>
                    </li>
                    <li class="w3-padding-16 w3-hover-black">
                       {{-- <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">--}}
                        <span class="w3-large">Ipsum</span><br>
                        <span>Praes tinci sed</span>
                    </li>
                </ul>
            </div>

            <div class="w3-third">
                <h3>POPULAR TAGS</h3>
                <p>
                    <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">London</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">DIY</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Family</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Shopping</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Games</span>
                </p>
            </div>
        </div>
    </footer>

    <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

    <!-- End page content -->
</div>
@show


<script>
    // Script to open and close sidebar
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
        var x = document.getElementById("navDemo");
        var y = document.getElementById("btnHid");
        if (x.className.indexOf("w3-show") == -1 ) {
            x.className += " w3-show";
            y.className += "w3-hid";
        } else {
            x.className = x.className.replace("w3-show", "");
            y.className = y.className.replace("w3-hid", "");
        }
    }
</script>

</body>
</html>
