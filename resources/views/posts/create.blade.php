@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a post</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>

                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" class="form-control" name="author"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Category:</label>
                        <input type="text" class="form-control" name="category"/>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea id="shortdesc" class="form-control" name="short_description">This is a short description</textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea id="longdesc" class="form-control" name="long_description">This is a long description</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary-outline">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
