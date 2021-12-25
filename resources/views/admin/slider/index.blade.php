@extends('admin.layout')

@section('title', 'Index slider')

@section('content')
    <div class="card-header">
        <h3 class="card-title">Latest sliders</h3>
        <div class="card-tools">
            {{ $sliders->links() }}
        </div>
    </div>
    <div class="card-body table-responsive p-0">

        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Url</th>
                <th>Sort</th>
                <th>Active</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ $item->image }}" alt="" height="100"></td>
                    <td>{{ $item->url }}</td>
                    <td>{{ $item->sort_order }}</td>
                    <td>
                        @if ($item->active)
                            <span class="btn btn-success btn-xs">YES</span>
                        @else
                            <span class="btn btn-danger btn-xs">NO</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('sliders.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;|&nbsp;
                        <a href="#" onclick="removeRow({{$item->id}}, '{{ route('sliders.delete')  }}')" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-header">
        <div class="card-tools">
            {{ $sliders->links() }}
        </div>
    </div>
@endsection
