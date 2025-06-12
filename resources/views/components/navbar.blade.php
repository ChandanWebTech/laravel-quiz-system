<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        .hover-text-primary:hover {
            color: var(--bs-primary) !important;
        }
    </style>
</head>

<body>
    <nav class="bg-white shadow-sm px-4 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="fs-3 text-secondary hover-text-primary cursor-pointer">
                Quiz System
            </div>
            <div class="d-flex gap-3">
                <a href="/dashboard" class="text-secondary text-decoration-none hover-text-primary">Dashboard</a>
                <a href="/admin-categories" class="text-secondary text-decoration-none hover-text-primary">Categories</a>
                <a href="/add-quiz" class="text-secondary text-decoration-none hover-text-primary">Quiz</a>
                <a href="" class="text-secondary text-decoration-none hover-text-primary">Welcome {{$name}}</a>
                <a href="/admin-logout" class="text-secondary text-decoration-none hover-text-primary">Logout</a>
            </div>
        </div>
    </nav>
</body>

</html>