@extends('frontend.layout.template')

@section('content')
    <div class="w3-container" style="margin-top: 52px">
        <div class="w3-row" >
            <ul style="list-style-type:none;border: 1px solid #e9e9e9;margin: 2px 8px;padding: 7px 0px 7px 7px;display: flow-root;">
            @if(!empty($results) && $results->count())
            @foreach($results as $result)
                <li class="w3-col l3 s6" style="float:left;">
                    <div class="dd" style="width: -webkit-fill-available;border: 1px solid #e9e9e9;margin-right: 8px;display: inline-block;min-height: 320px;margin-bottom: 8px">
                        <a href="{!!  route('product/id=', ['id' => $result->id])  !!}">
                            <img src="/media/{{$result->post_img}}" style="width: 100%">
                            <div style="padding: 5px 15px;">
                                <h4 style="font-size:17px; margin-bottom: 10px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;line-height: 23px ;max-height: 55px; -webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{ $result->post_name }}</h4>
                                <b style="color: #f60;font-weight: 700;font-size: 16px;">US {{$result->price}}</b><span style="font-size: 13px;color: #999;font-weight: 400;">/piece</span>
                            </div>
                        </a>
                    </div>
                </li>
            @endforeach
            @else
                <h1 class="w3-center">There are no data.</h1>
            @endif
            </ul>
        </div>
        <div class="w3-col">
            <div class="w3-center paginat">
                {!! $results->links() !!}
            </div>
        </div>

    </div>
<br>
@endsection