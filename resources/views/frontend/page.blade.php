@extends('frontend.layout.page')
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th width="300px;">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif
        </tbody>
    </table>

    {!! $data->render() !!}

@endsection

{{--<form  action="{{ action('Core@getCat') }}" enctype="multipart/form-data" method="get">
                                --}}{{--{{ csrf_field() }}--}}{{--
                                <div class="column">
                                    --}}{{--<h3>Category 1</h3>--}}{{--
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                                <div class="column">
                                    <input type="submit" name="lst" value="Kitchen">
                                    <input type="submit" name="lst" value="Room">
                                    <input type="submit" name="lst" value="Room">
                                </div>
                            </form>--}}