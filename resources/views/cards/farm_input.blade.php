<div class="card card-default">
    @if (Auth::user()->type === 'admin')
        <div class="card-header">
            <div class="row">
                <div class="col-sm-9">
                    <a href="{{ route('farminputs.show', $record->id) }}"> {{ $record->id }}</a>
                </div>
                <div class="col-sm-3 text-right">
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="{{ route('farminputs.edit', $record->id) }}">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                            action="{{ route('farminputs.destroy', $record->id) }}" method="post"
                            style="display: inline">
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
                    <th>Name</th>
                    <td>{{ $record->name }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $record->quantity }}</td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td>{{ $record->unit }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $record->status }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
