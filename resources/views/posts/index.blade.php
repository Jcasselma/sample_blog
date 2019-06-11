@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Blog Posts</h1>
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
                <div>
                    <a style="margin: 19px;" href="{{ route('posts.create')}}" class="btn btn-primary">New post</a>
                </div>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}
                        <td>{{$post->author}}</td>
                        <td>{{$post->category}}</td>9
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
    </div>
@endsection
