@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="invoice_number">{{ trans('cruds.order.fields.invoice_number') }}</label>
                <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $order->invoice_number) }}" required>
                @if($errors->has('invoice_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.invoice_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_charge">{{ trans('cruds.order.fields.delivery_charge') }}</label>
                <input class="form-control {{ $errors->has('delivery_charge') ? 'is-invalid' : '' }}" type="number" name="delivery_charge" id="delivery_charge" value="{{ old('delivery_charge', $order->delivery_charge) }}" step="1">
                @if($errors->has('delivery_charge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_charge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delivery_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_bill">{{ trans('cruds.order.fields.total_bill') }}</label>
                <input class="form-control {{ $errors->has('total_bill') ? 'is-invalid' : '' }}" type="number" name="total_bill" id="total_bill" value="{{ old('total_bill', $order->total_bill) }}" step="1">
                @if($errors->has('total_bill'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_bill') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_bill_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.order.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $order->discount) }}" step="1">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.order.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $order->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
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
