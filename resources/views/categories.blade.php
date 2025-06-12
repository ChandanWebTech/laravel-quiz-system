<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Category Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        li {
            list-style: none;
        }

        ul {
            padding: 0px !important;
        }
    </style>
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>

    @if(session('category'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-3 mx-auto w-75" role="alert">
        <strong>{{ session('category') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="bg-gray-100 d-flex flex-column align-items-center mt-5 min-vh-100">
        <div class="bg-white p-5 rounded-4 shadow-lg w-100" style="max-width: 384px;">
            <h2 class="fs-4 text-center text-gray-800 mb-4">Add Category</h2>

            <form action="/add-category" method="post">
                @csrf
                <div class="mb-4">

                    <input type="text" id="admin-name" name="category" placeholder="Enter Category Name" value="{{ old('category') }}"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                    @error('category')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-4 py-2">Add</button>
            </form>
        </div>

        <div style="width: 800px;" class="mt-5">
            <h1 class="fs-4 text-primary mb-3 text-center">Category List</h1>
            <ul class="list-unstyled border p-0 m-0">
                <!-- Header row -->
                <li class="d-flex justify-content-between fw-bold border-bottom px-3 py-2 bg-light">
                    <span style="flex: 1;">ID</span>
                    <span style="flex: 3;">Name</span>
                    <span style="flex: 3;">Creator</span>
                    <span style="flex: 2;">Action</span>
                </li>

                @foreach($categories as $category)
                <li class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
                    <span style="flex: 1;">{{$category->id}}</span>
                    <span style="flex: 3;">{{$category->name}}</span>
                    <span style="flex: 3;">{{$category->creator}}</span>
                    <span style="flex: 2;">
                        <a href="category/delete/{{$category->id}}" class="text-dark">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>