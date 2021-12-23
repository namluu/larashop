@foreach($categories as $item)
    @if ($item->parent_id == $parent_id)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $char . $item->name }}</td>
            <td>{{ Str::of($item->description)->words(15, '...') }}</td>
            <td>
                @if ($item->active)
                    <span class="btn btn-success btn-xs">YES</span>
                @else
                    <span class="btn btn-danger btn-xs">NO</span>
                @endif
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;|&nbsp;
                <a href="#" onclick="removeRow({{$item->id}}, '{{ route('categories.delete')  }}')" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @unset($categories[$loop->index])
        @include('admin.category.multiple', ['categories' => $categories, 'parent_id' => $item->id, 'char' => '|-- '])
    @endif
@endforeach
