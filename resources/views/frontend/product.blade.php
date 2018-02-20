@extends('frontend.layout.template')
@section('content')
    <div class="w3-container" style="margin-top: 52px">
        <div class="w3-row" >
            <div class="w3-row">
            @foreach($data as $item)
                <span style="color: #616161;margin-left: 10px">
                    <span style="float: left"><a  href="{{ route('home') }}">Home</a></span>
                    <span style="float: left">&nbsp;>&nbsp;Category&nbsp;>&nbsp;</span>
                    <span style="float: left"><a style="text-transform: capitalize;"  href="{{  url()->previous() }}">{{ $item->cat_name }}</a></span>
                </span>
            @endforeach
            </div>
                <div  class="w3-col l2 s1">
                    <div style="min-height: 470px;border: 1px solid #e9e9e9;margin: 8px;padding: 10px;"> &nbsp;</div>
                </div>
                <div  class="w3-col l5 m5" style="float:left;">
                    <div class="w3-row">
                        <div style="min-height: 470px;border: 1px solid #e9e9e9;margin: 8px;    padding: 7px 7px 2px 7px;;display: inline-block;">
                             <div class="w3-col l2 s2 ">
                                 @php
                                     $k =0;
                                 @endphp
                                 @foreach($data1 as $item)
                                     @if(!empty($item->img))
                                         @php
                                             $k =++$k;
                                         @endphp
                                         <div class="w3-row">
                                             <span style="border:1px solid #e9e9e9;display: block;margin: 0px 7px 7px 0px;">
                                                 <img class="demo "  src="/media/{{ $item->img }}" style="width:100%" onmouseover="currentDiv({{$k}})">
                                             </span>
                                         </div>
                                     @endif
                                 @endforeach
                            </div>
                            <div class="w3-col l10 s10">
                                @foreach($data1 as $item)
                                    @if(!empty($item->img))
                                        <img style="width:100%;border:1px solid #e9e9e9;display: block;margin-bottom: 5px;" class="mySlides" alt="vsdv"  src="/media/{{ $item->img }}" onclick="myFun()">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 s12" style="float: left">
                    <div class="" style="min-height: 470px;border: 1px solid #e9e9e9;margin: 8px;padding: 10px;">
                    @foreach($data as $item)
                        <h4 style="border-bottom: 1px solid #e9e9e9;margin: 0px;line-height: 26px; ">{{ $item->post_name }}</h4>
                        <h4 style="color: #f60;">PRISE:{{$item->price}}</h4>
                    @if(!empty($item->sex1) || !empty($item->sex))
                        <div style="display: table;padding-bottom: 7px">
                            <i class="{{ $item->sex1 }}" style="float:left"></i><i class="{{ $item->sex }}" style="float:left"></i>
                        </div>
                    @endif
                    @endforeach
                            <ul class="w3-ul" style="display: inline-block;">
                                <li style="float: left;">COLORS:</li>
                                @foreach($data1 as $item)
                                    @if(!empty($item->color))
                                        <li style="float: left;">
                                            <i style="border:1px solid black;background-color: {{$item->color}};width: 16px;display: inline-block;border-radius: 50%;height: 16px;"></i>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        <br>

                            <ul class="w3-ul " style="display: inline-block;">
                                <li style="float: left;">SIZE:</li>
                                @foreach($data1 as $item)
                                    @if(!empty($item->size))
                                        <li style="float: left;">{{ $item->size }}</li>
                                    @endif
                                @endforeach
                            </ul>
                    <div>
                        @foreach($data as $item)
                            @if(empty($item->post_star))
                                @for($k=0;$k<5 ;$k++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            @else
                            @for($i=0;$i< $item->post_star;$i++)
                                <i class="fa fa-star " style="color: #f60"></i>
                            @endfor
                            @for($k=0;$k<5- $item->post_star ;$k++)
                                <i class="fa fa-star-o"></i>
                            @endfor
                            @endif
                        @endforeach
                    </div>
                        <div>
                            <ul>
                                @foreach($data as $item)
                                <form method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <li style="float: left;display: flex;width: auto;margin-top: 10px;">
                                        <a  style="padding: 5px;border-radius: 5px;background-color: #ff5400;margin-right:7px;font-size: 14px;">
                                            <i class="	fa fa-cart-arrow-down" style="font-size: 27px;"></i>Order Now</a>
                                    </li>
                                    <li style="float: left;display: flex;width: auto;margin-top: 10px;">
                                        <input id="input2" name="input2" type="hidden" value="{{$item->id}}">
                                        <input class="btn2" name="sub2" type="submit" value="Add to Wish List" style="padding: 8px;border-radius: 5px;background-color: #fd9729;font-size: 14px;border: none">
                                            {{--<i class="fa fa-cart-plus"style="position: relative;top: -6px;left: 16px;font-size: 14px;"></i><i class="fa fa-heart-o" style="font-size: 27px;position: relative;right: 3px;top:0px"></i>Add to Wish List</input>--}}
                                    </li>
                                </form>
                                @endforeach
                            </ul>
                        </div>
                        <span id="info"></span>
                    </div>
                </div>
            <div class="w3-col l2 m2" style="float: left">
                <div style="min-height: 470px;border: 1px solid #e9e9e9;margin: 8px;padding: 10px;">2</div>
            </div>
        </div>
        <div class="w3-row" >
                <div class="w3-col l6 m6" style="float:left">
                    <div style="min-height: 30px;border: 1px solid #e9e9e9;margin: 2px 8px;padding: 10px;"> &nbsp;</div>
                </div>
                <div class="w3-col l6 m6" style="float:left;">
                    <div class="w3-row">
                        <div style="border: 1px solid #e9e9e9;margin: 2px 8px;padding: 7px 0px 7px 7px;display: inline-block;">
                            <div class="w3-center" style="display: block;border-bottom: 1px solid #e9e9e9;margin-bottom: 7px;margin-right: 8px;">
                                <span>Similar products</span>
                            </div>
                                @foreach($results as $result)
                                <div class="w3-col l3 s3" style="">
                                    <div class="" style="border: 1px solid #e9e9e9;margin-right: 8px;display: inline-block;">
                                    <a href="{!!  route('product/id=', ['id' => $result->id])  !!}">
                                        <img src="/media/{{$result->post_img}}" style="width: 100%">
                                        <h5 style="overflow: hidden;/*font-size: small;*/text-overflow: ellipsis;display: -webkit-box;line-height: 23px;max-height: 26px;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{$result->post_name}}</h5>
                                        <div style="/*font-size: small*/"><b style="color: #f60;">{{$result->price}}</b><span>/piece</span></div>
                                    </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal" onclick="this.style.display='none'">

        <!-- The Close Button -->
        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01" style="width: 100%;">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>

<script>


    var slideIndex = 1;
    var imgsrc;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
            x[i].removeAttribute("id");

        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex-1].style.display = "block";
        x[slideIndex-1].setAttribute("id", "myImg");
        imgsrc = x[slideIndex-1].src;
        dots[slideIndex-1].className += " w3-opacity-off";
    }
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    var img = document.getElementById("myImg");
    function myFun() {
        modal.style.display = "block";
        modalImg.src = imgsrc;
        /*captionText.innerHTML = img.alt;*/
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
@endsection