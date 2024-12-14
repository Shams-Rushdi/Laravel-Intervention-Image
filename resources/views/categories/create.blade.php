<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <h1>Add Category</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Category Name:</label>
            <input type="text" name="category_name" id="category_name" required>
        </div>
        <div>
            <label for="image">Category Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>
        <button type="submit">Save Category</button>
    </form>
</body>
</html>
