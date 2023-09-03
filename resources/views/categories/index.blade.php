<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Ajax Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <style type="text/css">
        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        main>.container {
            padding: 60px 15px 0;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Fixed navbar</a>
            </div>
        </nav>
    </header>


    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <form data-action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                id="add-category-form">
                <div id="body-form">
                    @csrf

                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input category" type="checkbox" value="{{ $category->title }}"
                                id="category_{{ $category->id }}" name="category_{{ $category->id }}" onchange="callAjax(event)" >
                            <label class="form-check-label" for="category_{{ $category->id }}">
                                {{ $category->title }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </form>

        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/categories.js') }}" defer></script>

</body>

</html>
