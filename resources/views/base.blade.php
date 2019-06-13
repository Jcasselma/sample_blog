<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Blog</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tiny.cloud/1/rd4rnemv9hvvm3qsj9nfewz1zzly21pgjird79uspnfzuhz6/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#shortdesc'
        });
    </script>
    <script>
        tinymce.init({
            selector: '#longdesc'
        });
    </script>
</head>
<body>

    <div class="row p-2 bg-dark">
        <div class="col-2">
            <h1 class="text-white">My Sample Blog</h1>
        </div>
        <div class="col-9">
            <a class="btn btn-light" href="{{ route('posts.index')}}" role="button">Post Index</a>
            <a class="btn btn-light" href="{{ route('categories.index')}}" role="button">Category Index</a>
            <a class="btn btn-light" href="{{ route('blog_list.index')}}" role="button">Blog Posts</a>
        </div>

    </div>

<div class="container">

    @yield('main')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
