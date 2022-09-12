<div class="card card-default mt-3">
    @if (Auth::user()->type === 'admin')
        <div class="card-header">
            <div class="row">
                <div class="col-sm-9">
                    <a href="{{ route('distributions.show', $record->id) }}"> View More Details</a>
                </div>
                <div class="col-sm-3 text-right">

                </div>
            </div>
        </div>
    @endif
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>Distribution Id</th>
                    <td>{{ $record->dist_id }}</td>
                </tr>
                <tr>
                    <th>Farm Input</th>
                    <td>{{ $record->farmInput->name }} ( {{ $record->quantity }} {{ $record->farmInput->unit }})</td>
                </tr>
                <tr>
                    <th>Farmer </th>
                    <td>{{ $record->farmer->user->name }}</td>
                </tr>
                <tr>
                    <th>Distributed By</th>
                    <td>{{ $record->user->name }}</td>
                </tr>
                <tr>
                    <th>Distribution Date</th>
                    <td>{{ date('l d M, Y', strtotime($record->dist_date)) }}</td>
                </tr>

            </tbody>
        </table>

        @if (Route::is('distributions.show'))
            <hr />
            <h5>Farmer Details</h5>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $record->farmer->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $record->farmer->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>District </th>
                        <td>{{ $record->farmer->district }}</td>
                    </tr>
                    <tr>
                        <th>Town</th>
                        <td>{{ $record->farmer->town }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ date(' d M, Y', strtotime($record->farmer->date_of_birth)) }}</td>
                    </tr>

                </tbody>
            </table>
        @endif
    </div>
</div>
