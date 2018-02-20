@extends('frontend.layout.template')
@section('content')
    <div class="w3-container" style="margin-top: 52px">
        <div class="w3-col">
            @if(!empty($data) && $data->count())
                <div class="w3-col l6 m6">
                    @foreach($data as $item)
                        <div class="w3-col">
                        <ul style="list-style-type:none;border: 1px solid #e9e9e9;margin: 2px 8px;padding: 7px 0px 7px 7px;display: flow-root;">
                            <li class="w3-col l3 m3" style="float:left;">
                                <div class="dd" style="width: -webkit-fill-available;border: 1px solid #e9e9e9;margin-right: 8px;display: inline-block;margin-bottom: 8px">
                                    <a href="{!!  route('product/id=', ['id' => $item->id])  !!}">
                                        <img src="/media/{{$item->post_img}}" style="width: 100%">
                                    </a>
                                </div>
                            </li>
                            <li class="w3-col l8 m8" style="float:left;">
                                <div class="">
                                    <a href="{!!  route('product/id=', ['id' => $item->id])  !!}">
                                        <div style="padding: 5px 15px;">
                                            <h4 style="font-size:17px; margin-bottom: 10px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;line-height: 23px ;max-height: 26px; -webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{ $item->post_name }}</h4>
                                            <b style="color: #f60;font-weight: 700;font-size: 16px;">US {{$item->price}}</b><span style="font-size: 13px;color: #999;font-weight: 400;">/piece</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="w3-col l1 m1" style="float:left;">
                                <div class="w3-col">
                                    <a href="{!!  route('del-cookies/id=', ['id' => $item->id])  !!}">
                                        <div style="padding: 0px 7px;float:right">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="w3-col" style="padding-bottom: 0px;">
                                        <div style="padding-bottom: 0px;float:right">

                                            {{--<a href="{!! route('order/id=',['id' => $item->id]) !!}">--}}
                                            <i class="order" id="{{ $item->id }}" class="fa fa-envelope" onclick="send(this.id)" ></i>
                                        </div>
                                </div>
                            </li>
                        </ul>
                        </div>
                        @endforeach
                    </div>
                <div class="w3-col l6 m6">
                    <div>
                        <div id="panel" class="w3-modal">
                            <div class="w3-modal-content w3-animate-left w3-card-4">
                                <header class="w3-container w3-teal">
                                    <span onclick="document.getElementById('panel').style.display='none'"
                                        class="w3-button w3-display-topright">&times;</span>
                                    <h2>Modal Header</h2>
                                </header>
                                <div class="w3-container">
                                    <p id="proid"></p>

                                    <ul style="list-style-type:none;border: 1px solid #e9e9e9;margin: 2px 8px;padding: 7px 0px 7px 7px;display: flow-root;">
                                        @if(!empty($data2) && $data2->count())
                                            @foreach($data2 as $item2)
                                                <li>{{ $item2->post_name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <footer class="w3-container w3-teal">
                                    <p>Modal Footer</p>
                                </footer>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
                <div class="w3-col">
                    <div class="w3-center paginat">
                        {!! $data->render() !!}
                    </div>
                </div>
        @else
            <h1 class="w3-center">There are no data.</h1>
        @endif
    </div>
    <br>

    <script>
        function send(clicked_id){
            var panel = document.getElementById("panel");
            var proid = document.getElementById("proid");
            panel.style.display = "block";
            proid.innerHTML = clicked_id;

        }
    </script>
@endsection
