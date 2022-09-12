<div class="card card-default">
    @if (Auth::user()->type === 'admin')
        <div class="card-header">
            <div class="row">
                <div class="col-sm-9">
                    <a href="{{ route('farmers.show', $record->id) }}"> {{ $record->id }}</a>
                </div>
                <div class="col-sm-3 text-right">
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="{{ route('farmers.edit', $record->id) }}">
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
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>District</th>
                    <td>{{ $record->district }}</td>
                </tr>
                <tr>
                    <th>Town</th>
                    <td>{{ $record->town }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $record->phone_number }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $record->email }}</td>
                </tr>
                <tr>
                    <th>Date Of Birth</th>
                    <td>{{ $record->date_of_birth }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
