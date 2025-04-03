<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Practise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Products</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-align-left">
            <a href="product/create" class="btn btn-dark mt-2">New Product</a>
        </div>
        <h1>Products</h1>
    </div>

    <div class="container">
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->index +1 }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        <img src="products/{{ $product->image }}" class="rounded-circle" width="30" height="30" />
                    </td>
                    <td>
                        <a href="product/{{ $product ->id }}/edit" class="btn btn-dark btn-small">Edit</a>
                        <form method="POST" action="product/{{ $product ->id }}/delete" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>