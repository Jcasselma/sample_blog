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
                        <label for="user_id">Author:</label>
                        <input type="text" class="form-control" placeholder=" {{ $authorName }}" name="user_id" readonly/>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select class="browser-default custom-select" id ="category_id" name ="category_id">
                            @foreach($categories as $id => $category_name)
                                <option id ="{{ $id }}"  value="{{ $id }}">{{ $category_name }}</option>
                            @endforeach
                        </select>
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
