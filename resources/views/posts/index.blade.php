@extends('base')

@section('main')
    <div class="row">
        <h1 class="display-3">Blog Posts</h1>
        <div class="col-sm-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Category</td>
                    <td>Short Desc.</td>
                    <td>Long Desc.</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('posts.create')}}" class="btn btn-primary">New post</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <form method="get" action="{{ route('posts.index') }}">
                    <div class= "col-md-3">
                        <select class="browser-default custom-select" id ="category_id" name ="category_id">
                            <option id ="0"  value="">All Categories</option>

                            @foreach($categories as $id => $category_name)
                                <option id ="{{ $id }}" {{ $categoryId == $id ? 'selected' : '' }} value="{{ $id }}">{{ $category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    </form>
                </div>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user_id}}</td>
                        <td>{{$post->category_id}}</td>
                        <td>{{$post->short_description}}</td>
                        <td>{{$post->long_description}}</td>
                        <td>
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>

            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-2">
            <h1>Categories</h1>
            @foreach($categories as $id => $category_name)
                <a href="{{ route('posts.index')}}?category_id={{ $id }}" >{{ $category_name }}</a> <br />
            @endforeach
        </div>
    </div>
@endsection
