<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <x-navbar name={{$name}}></x-navbar>

    <div class="bg-gray-100 d-flex flex-column align-items-center mt-5 min-vh-100">
        <div class="bg-white p-5 rounded-4 shadow-lg w-100" style="max-width: 384px;">
            @if(!session('quizDetails'))
            <h2 class="fs-4 text-center text-gray-800 mb-4">Add Quiz</h2>

            <form action="/add-quiz" method="get">

                <div class="mb-4">

                    <input type="text" id="admin-name" name="quiz" placeholder="Enter Quiz Name" value="{{ old('category') }}"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                    @error('category')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="form-label">Select a Category</label>
                    <select name="category_id" id="category" class="form-control px-3 py-2 border rounded-4 border-gray-300" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary w-100 rounded-4 py-2">Add</button>
            </form>
            @else
            <span class="text-success bold">Quiz : {{session('quizDetails')->name}}</span>
            <h2 class="fs-4 text-center text-gray-800 mb-4">Add MCQs</h2>
            <form action="" method="get">
                <div class="mb-4">

                    <textarea class="form-control px-3 py-2 border rounded-4 border-gray-300" rows="4" placeholder="Enter your question..."></textarea>

                </div>
                <div class="mb-4">
                    <input type="text" id="admin-name" name="quiz" placeholder="Enter First Option" value="{{ old('category') }}"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                </div>

                <div class="mb-4">
                    <input type="text" id="admin-name" name="quiz" placeholder="Enter Second Option" value="{{ old('category') }}"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                </div>

                <div class="mb-4">
                    <input type="text" id="admin-name" name="quiz" placeholder="Enter Third Option" value="{{ old('category') }}"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                </div>

                <div class="mb-4">
                    <input type="text" id="admin-name" name="quiz" placeholder="Enter Fourth Option" value="{{ old('category') }}"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                </div>

                <div class="mb-4">
                    <select name="right answer"
                        class="form-control px-3 py-2 border rounded-4 border-gray-300" autocomplete="off">
                        <option value="">Select Right Answer</option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                        <option value="">D</option>

                    </select>
                </div>

                <div class="mb-4">

                    <button type="submit" class="btn btn-primary w-100 rounded-4 py-2">Add More</button>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-success w-100 rounded-4 py-2">Add and Submit</button>
                </div>

            </form>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>