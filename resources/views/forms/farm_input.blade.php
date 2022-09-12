<form action="{{ isset($route) ? $route : route('farminputs.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($method) ? $method : 'POST' }}" />
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
            id="name" value="{{ old('name', $model->name) }}" placeholder="" maxlength="100" required="required">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity"
            id="quantity" value="{{ old('quantity', $model->quantity) }}" placeholder="" required="required">
        @if ($errors->has('quantity'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('quantity') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="unit">Unit</label>
        <input type="text" class="form-control {{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit"
            id="unit" value="{{ old('unit', $model->unit) }}" placeholder="" maxlength="10" required="required">
        @if ($errors->has('unit'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('unit') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status"
            id="status" value="{{ old('status', $model->status) }}" placeholder="" maxlength="5"
            required="required">
        @if ($errors->has('status'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('status') }}</strong>
            </div>
        @endif
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear" />
        <input type="submit" class="btn btn-primary" value="Save" />

    </div>
</form>
