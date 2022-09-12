<form action="{{ isset($route) ? $route : route('farmers.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="user_id">User </label>
        <select class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id">
            @if (isset($users))
                @foreach ($users as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $model->user_id ? 'selected' : '' }}>
                        {{ $data->name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('user_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('user_id') }}</strong>
            </div>
        @endif
    </div>
    <input type="hidden" name="_method" value="{{ isset($method) ? $method : 'POST' }}" />
    <div class="form-group">
        <label for="district">District</label>
        <input type="text" class="form-control {{ $errors->has('district') ? ' is-invalid' : '' }}" name="district"
            id="district" value="{{ old('district', $model->district) }}" placeholder="" maxlength="100"
            required="required">
        @if ($errors->has('district'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('district') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="town">Town</label>
        <input type="text" class="form-control {{ $errors->has('town') ? ' is-invalid' : '' }}" name="town"
            id="town" value="{{ old('town', $model->town) }}" placeholder="" maxlength="100" required="required">
        @if ($errors->has('town'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('town') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
            name="phone_number" id="phone_number" value="{{ old('phone_number', $model->phone_number) }}"
            placeholder="" maxlength="14" required="required">
        @if ($errors->has('phone_number'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
            id="email" value="{{ old('email', $model->email) }}" placeholder="" maxlength="60">
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="date_of_birth">Date Of Birth</label>
        <div class="input-group">
            <input type="date" class="form-control {{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}"
                name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $model->date_of_birth) }}"
                placeholder="" required="required">
            <div class="input-group-addon">
                <label for="date_of_birth" class="fa fa-calendar">
                </label>
            </div>
        </div>
        @if ($errors->has('date_of_birth'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('date_of_birth') }}</strong>
            </div>
        @endif
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear" />
        <input type="submit" class="btn btn-primary" value="Save" />
    </div>
</form>
