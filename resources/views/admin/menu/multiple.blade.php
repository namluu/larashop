@foreach($menus as $item)
    @if ($item->parent_id == $parent_id)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $char . $item->name }}</td>
            <td>{{ Str::of($item->description)->words(15, '...') }}</td>
            <td>{{ $item->active }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ route('menus.edit', $item->id)  }}"><i class="fas fa-edit"></i></a>&nbsp;|&nbsp;
                <a href="#" onclick="removeRow({{$item->id}}, '{{ route('menus.delete')  }}')"><i class="fas fa-trash text-danger"></i></a>
            </td>
        </tr>
        @unset($menus[$loop->index])
        @include('admin.menu.multiple', ['menus' => $menus, 'parent_id' => $item->id, 'char' => '--'])
    @endif
@endforeach
