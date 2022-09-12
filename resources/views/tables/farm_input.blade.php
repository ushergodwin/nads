<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name </th>
            <th>Quantity </th>
            <th>Unit </th>
            <th>Status </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td> {{ $record->name }} </td>
                <td> {{ $record->quantity }} </td>
                <td> {{ $record->unit }} </td>
                <td> {{ $record->status }} </td>
                @if (Auth::user()->type === 'admin')
                    <td><a class="btn btn-secondary" href="{{ route('farm_inputs.show', $record->id) }}">
                            <span class="fa fa-eye"></span>
                        </a><a class="btn btn-secondary" href="{{ route('farm_inputs.edit', $record->id) }}">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                            action="{{ route('farm_inputs.destroy', $record->id) }}" method="post"
                            style="display: inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-secondary cursor-pointer">
                                <i class="text-danger fa fa-remove"></i>
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                {!! $records->render() !!}
            </td>
        </tr>
    </tfoot>
</table>
