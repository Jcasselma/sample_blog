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
            <form method="post" action="{{ route('categories.update', $category->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name:</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" />

                    {{--THIS IS FOR CHANGING PARENT NODE--}}
                    {{--<select class="form-control" id ="parent_id" name ="parent_id">--}}
                        {{----}}
                        {{--@foreach($categories as $id => $categoryName)--}}
                            {{--<option id ="{{ $id }}" {{ $category->parent_id == $id ? 'selected' : '' }} value="{{ $categoryName }}">{{ $categoryName }}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
