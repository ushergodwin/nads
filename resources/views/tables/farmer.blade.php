<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>District </th>
            <th>Town </th>
            <th>Phone Number </th>
            <th>Email </th>
            <th>Date Of Birth </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td> {{ $record->district }} </td>
                <td> {{ $record->town }} </td>
                <td> {{ $record->phone_number }} </td>
                <td> {{ $record->email }} </td>
                <td> {{ $record->date_of_birth }} </td>
                @if (Auth::user()->type === 'admin')
                    <td><a class="btn btn-secondary" href="{{ route('farmers.show', $record->id) }}">
                            <span class="fa fa-eye"></span>
                        </a><a class="btn btn-secondary" href="{{ route('farmers.edit', $record->id) }}">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                            action="{{ route('farmers.destroy', $record->id) }}" method="post" style="display: inline">
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
