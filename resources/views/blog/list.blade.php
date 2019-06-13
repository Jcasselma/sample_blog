@extends('base')

@section('main')

    <div class="container-fluid">
        <h1></h1>

        <div class ="row ">

            <div class="col-md-2">

                <h2>Categories</h2>
                <a href="{{ route('blog_list.index')}}">All Categories</a> <br />
                @foreach($categories as $id => $category_name)
                    <a href="{{ route('blog_list.index')}}?category_id={{ $id }}" >{{ $category_name }}</a> <br />
                @endforeach

            </div>

            <div class="col-md-10">

                <h2>Blog List</h2>

                @foreach($posts as $post)
                    <a href="{{ route('blog_list.show', [$id=>$post->id]) }}">
                    <div class="row pb-2">

                    <div class="col-md-2">
                        <img src="{{url('/images/default_' . $post->img_name) . '.png'}}" class="thumbnail">
                    </div>

                    <div class="col-md-8">
                        {!!$post->short_description!!}
                    </div>
                </div>
                    </a>

                @endforeach

            </div>
        </div>
    </div>
@endsection


