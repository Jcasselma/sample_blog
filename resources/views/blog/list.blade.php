@extends('base')

@section('main')

    <div class="container-fluid">
            <h1></h1>

        <div class ="row ">
                {{--SIDEBAR LEFT SIDE--}}

                <div class="col-md-2">

                    <h2>Categories</h2>
                    @foreach($categories as $id => $category_name)
                        <a href="{{ route('blog_list.index')}}?category_id={{ $id }}" >{{ $category_name }}</a> <br />
                    @endforeach

                </div>

                {{--BLOG LIST--}}

                <div class="col-md-10">

                    <h2>Blog List</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Thumbnail</td>
                                <td>Description</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>

                                <td>{{$post->img}}</td>
                                <td>{{$post->short_description}}</td>

                                    //

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection


