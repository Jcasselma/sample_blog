@extends('base')

@section('main')

    <div class="container-fluid">

        <div class="row pt-lg-5">


            <div class="col-3">
                <img src="{{url('/images/default_' . $post->img_name) . '.png'}}" class="article">
            </div>

            <div class="col-9 my-auto">
                <h1>{{$post->title}}</h1>
            </div>

            <div class="col-lg-12 main-body pt-3 border m-3">
                {!! $post->long_description !!}
            </div>

        </div>

    </div>


@endsection
