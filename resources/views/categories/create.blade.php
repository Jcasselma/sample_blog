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

                        <select class="browser-default custom-select" id ="parent_id" name ="parent_id">
                            <option id ="0"  value="0">Root Category</option>

                            @foreach($categories as $id => $category_name)
                                {{ $category_name }}
                                <option id ="{{ $id }}"  value="{{ $id }}">{{ $category_name }}</option>
                            @endforeach
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
