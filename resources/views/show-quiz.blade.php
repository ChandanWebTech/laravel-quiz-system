<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Category Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <x-navbar name={{$name}}></x-navbar>




    <div class="bg-gray-100 d-flex flex-column align-items-center mt-5 min-vh-100">

        <h2 class="fs-4 text-center text-gray-800 mb-4">All Current Quiz's MCQs</h2>
        <a href="/add-quiz" class="text-decoration-none text-warning">Back</a>




        <div style="width: 800px;" class="mt-5">
            
            <ul class="list-unstyled border p-0 m-0">
                <!-- Header row -->
                <li class="d-flex justify-content-between fw-bold border-bottom px-3 py-2 bg-light">
                    <span style="flex: 1;">MCQ ID</span>
                    <span style="flex: 3;">Question</span>
                    
                </li>

                @foreach($mcqs as $mcq)
                <li class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
                    <span style="flex: 1;">{{$mcq->id}}</span>
                    <span style="flex: 3;">{{$mcq->question}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>