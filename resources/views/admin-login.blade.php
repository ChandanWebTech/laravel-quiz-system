<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        .bg-gray-100 {
            background-color: #f3f4f6;
        }

        .text-gray-800 {
            color: #1f2937;
        }

        .text-gray-600 {
            color: #4B5563;
        }

        .border-gray-300 {
            border-color: #D1D5DB;
        }
    </style>
</head>

<body class="bg-gray-100 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-white p-5 rounded-4 shadow-lg w-100" style="max-width: 384px;">
        <h2 class="fs-4 text-center text-gray-800 mb-4">Admin Login</h2>

        @error('session')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror

        <form action="/admin-login" method="post">
            @csrf
            <div class="mb-4">
                <label for="admin-name" class="form-label text-gray-600">Admin name</label>
                <input type="text" id="admin-name" name="name" placeholder="Enter Admin name"
                    class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">

                @error('login')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Admin password"
                    class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-4 py-2">Login</button>
        </form>
    </div>
</body>

</html>