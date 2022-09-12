<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Dist Id </th>
            <th>Farm Input Id </th>
            <th>Farmer Id </th>
            <th>User Id </th>
            <th>Dist Date </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td> {{ $record->dist_id }} </td>
                <td> {{ $record->farm_input_id }} </td>
                <td> {{ $record->farmer_id }} </td>
                <td> {{ $record->user_id }} </td>
                <td> {{ $record->dist_date }} </td>
                @if (Auth::user()->type === 'admin')
                    <td>
                        <a class="btn btn-secondary" href="{{ route('distributions.show', $record->id) }}">
                            <span class="fa fa-eye"></span>
                        </a>
                        <a class="btn btn-secondary" href="{{ route('distributions.edit', $record->id) }}">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                            action="{{ route('distributions.destroy', $record->id) }}" method="post"
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
