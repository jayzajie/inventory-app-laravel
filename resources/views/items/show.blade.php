<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Item Details</h1>

        <div class="card">
            <div class="card-header bg-primary text-white">
                Details of {{ $item->name }}
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Name:</strong> {{ $item->name }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $item->quantity }}</p>
                <p class="card-text"><strong>Price:</strong> Rp{{ number_format($item->price, 0, ',', '.') }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
