@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sendSms.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.send-sms.update", [$sendSms->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.sendSms.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('order_id') ? old('order_id') : $sendSms->order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sendSms.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_number">{{ trans('cruds.sendSms.fields.customer_number') }}</label>
                <input class="form-control {{ $errors->has('customer_number') ? 'is-invalid' : '' }}" type="text" name="customer_number" id="customer_number" value="{{ old('customer_number', $sendSms->customer_number) }}" required>
                @if($errors->has('customer_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sendSms.fields.customer_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sms_content">{{ trans('cruds.sendSms.fields.sms_content') }}</label>
                <input class="form-control {{ $errors->has('sms_content') ? 'is-invalid' : '' }}" type="text" name="sms_content" id="sms_content" value="{{ old('sms_content', $sendSms->sms_content) }}" required>
                @if($errors->has('sms_content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sms_content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sendSms.fields.sms_content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.sendSms.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $sendSms->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sendSms.fields.status_helper') }}</span>
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