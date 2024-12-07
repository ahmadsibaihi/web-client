@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h1 class="h5 fw-bold">Daftar Item</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Item
    </a>
</div>

@if(session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0 rounded-4 overflow-hidden">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 5%;">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center" style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->description }}</td>
                    <td class="text-center">Rp. {{ number_format($item->price, 2) }}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-link text-dark p-0 m-0" type="button" id="dropdownMenuButton{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                <li>
                                    <a href="{{ route('items.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger" type="submit" onclick="return confirm('Oke untuk menghapus?')">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-3">No items found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
