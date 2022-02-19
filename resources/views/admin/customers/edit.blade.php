@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customer_name">{{ trans('cruds.customer.fields.customer_name') }}</label>
                <input class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $customer->customer_name) }}" required>
                @if($errors->has('customer_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.customer_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_phone">{{ trans('cruds.customer.fields.customer_phone') }}</label>
                <input class="form-control {{ $errors->has('customer_phone') ? 'is-invalid' : '' }}" type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', $customer->customer_phone) }}" required>
                @if($errors->has('customer_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.customer_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_address">{{ trans('cruds.customer.fields.customer_address') }}</label>
                <textarea class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" name="customer_address" id="customer_address">{{ old('customer_address', $customer->customer_address) }}</textarea>
                @if($errors->has('customer_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.customer_address_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection