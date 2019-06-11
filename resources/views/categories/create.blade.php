@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">New Category</h1>
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
                <form method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">

                        <select class="browser-default custom-select" name="parent_id">
                            <option selected>Select Node Type:</option>
                            <option value="0">Root</option>
                            <option value="1">sub1</option>
                            <option value="2">sub2</option>
                        </select>

                        <label for="category_name">Category Name:</label>
                        <input type="text" class="form-control" name="category_name"/>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Create Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
