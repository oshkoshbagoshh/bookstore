{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text h2">{{ $stats['total_books'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text h2">{{ $stats['total_users'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text h2">{{ $stats['total_categories'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Low Stock</h5>
                        <p class="card-text h2">{{ $stats['low_stock_books'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Books</h5>
                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">
                    Add New Book
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recent_books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>${{ number_format($book->price, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $book->stock < 5 ? 'danger' : 'success' }}">
                                            {{ $book->stock }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
