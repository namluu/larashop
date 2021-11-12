@extends('admin.layout')

@section('title', 'Index product')

@section('content')
    <div class="card-header">
        <h3 class="card-title">Latest products</h3>
        <div class="card-tools">
            {{ $products->links() }}
        </div>
    </div>
    <div class="card-body table-responsive p-0">

        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Menu</th>
                <th>Active</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ $item->thumb }}" alt="" height="100"></td>
                    <td>
                        @if ($item->price_discount)
                            <span class="text-muted"><s>{{ $item->price }}</s></span> <span class="font-weight-bold">{{ $item->price_discount }}</span>
                        @else
                            <span class="font-weight-bold">{{ $item->price }}</span>
                        @endif
                    </td>
                    <td>{{ $item->menu_name }}</td>
                    <td>
                        @if ($item->active)
                            <span class="btn btn-success btn-xs">YES</span>
                        @else
                            <span class="btn btn-danger btn-xs">NO</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('products.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;|&nbsp;
                        <a href="#" onclick="removeRow({{$item->id}}, '{{ route('products.delete')  }}')" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-header">
        <div class="card-tools">
            {{ $products->links() }}
        </div>
    </div>
@endsection
