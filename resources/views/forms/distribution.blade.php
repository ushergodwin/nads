<form action="{{ isset($route) ? $route : route('distributions.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($method) ? $method : 'POST' }}" />
    <div class="form-group">
        <label for="dist_id">Distribution Id</label>
        <input type="text" class="form-control {{ $errors->has('dist_id') ? ' is-invalid' : '' }}" name="dist_id"
            id="dist_id"
            value="{{ old('dist_id', empty($model->dist_id) ? random_int(0, 999999999) : $model->dist_id) }}"
            placeholder="" maxlength="25" required="required" readonly>
        @if ($errors->has('dist_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('dist_id') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="farm_input_id">Farm Input Name</label>
        <select class="form-control {{ $errors->has('farm_input_id') ? ' is-invalid' : '' }}" name="farm_input_id"
            id="farm_input_id">
            @if (isset($farm_inputs))
                @foreach ($farm_inputs as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $model->farm_input_id ? 'selected' : '' }}>
                        {{ $data->name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('farm_input_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('farm_input_id') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="quantity"> Quantity to distribute</label>
        <div class="input-group">
            <input type="number" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                name="quantity" id="quantity"
                value="{{ old('quantity', empty($model->quantity) ? date('Y-m-d') : $model->quantity) }}"
                placeholder="" required="required">
        </div>
        @if ($errors->has('quantity'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('quantity') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="farmer_id">Farmer</label>
        <select class="form-control {{ $errors->has('farmer_id') ? ' is-invalid' : '' }}" name="farmer_id"
            id="farmer_id">
            @if (isset($farmers))
                @foreach ($farmers as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $model->farmer_id ? 'selected' : '' }}>
                        {{ $data->user->name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('farmer_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('farmer_id') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="user_id" class="sr-only">User Id</label>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    </div>

    <div class="form-group">
        <label for="dist_date">Distribution Date</label>
        <div class="input-group">
            <input type="datetime" class="form-control {{ $errors->has('dist_date') ? ' is-invalid' : '' }}"
                name="dist_date" id="dist_date"
                value="{{ old('dist_date', empty($model->dist_date) ? date('Y-m-d') : $model->dist_date) }}"
                placeholder="" required="required">
            <div class="input-group-addon">
                <label for="dist_date" class="fa fa-calendar">
                </label>
            </div>
        </div>
        @if ($errors->has('dist_date'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('dist_date') }}</strong>
            </div>
        @endif
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear" />
        <input type="submit" class="btn btn-primary" value="Save" />

    </div>
</form>
