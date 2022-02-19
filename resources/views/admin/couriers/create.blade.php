@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.courier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.couriers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="courier_name">{{ trans('cruds.courier.fields.courier_name') }}</label>
                <input class="form-control {{ $errors->has('courier_name') ? 'is-invalid' : '' }}" type="text" name="courier_name" id="courier_name" value="{{ old('courier_name', '') }}" required>
                @if($errors->has('courier_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('courier_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.courier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.courier.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Courier::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shop_id">{{ trans('cruds.courier.fields.shop') }}</label>
                <select class="form-control select2 {{ $errors->has('shop') ? 'is-invalid' : '' }}" name="shop_id" id="shop_id">
                    @foreach($shops as $id => $entry)
                        <option value="{{ $id }}" {{ old('shop_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('shop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.shop_helper') }}</span>
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