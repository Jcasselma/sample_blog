@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update Categories</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('categories.update', $post->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $post->title }} />
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" name="author" value={{ $post->author }} />
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" name="category" value={{ $post->category }} />
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description:</label>
                    <textarea id="shortdesc" class="form-control" name="short_description"> {{ $post->short_description }} </textarea>
                </div>
                <div class="form-group">
                    <label for="long_description">Long Description:</label>
                    <textarea id="longdesc" class="form-control" name="long_description"> {{ $post->long_description }} </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
