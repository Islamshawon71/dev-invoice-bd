@extends('layouts.admin')
@section('content')
    <form method="POST" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Customer Details
                    </div>

                    <div class="card-body">

                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('shop') ? 'has-error' : '' }}">
                                    <label for="shop_id">{{ trans('cruds.order.fields.shop') }}</label>
                                    <select class="form-control select2" name="shop_id" id="shop_id">
                                        @foreach($shops as $id => $entry)
                                            <option value="{{ $id }}" {{ old('shop_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('shop'))
                                        <span class="help-block" role="alert">{{ $errors->first('shop') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.shop_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required"
                                        for="invoice_number">{{ trans('cruds.order.fields.invoice_number') }}</label>
                                    <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}"
                                        type="text" name="invoice_number" id="invoice_number"
                                        value="{{ old('invoice_number', '') }}" required>
                                    @if ($errors->has('invoice_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('invoice_number') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.order.fields.invoice_number_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required"
                                        for="customer_name">{{ trans('cruds.customer.fields.customer_name') }}</label>

                                    <input class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}"
                                        type="text" name="customer_name" id="customer_name"
                                        value="{{ old('customer_name', '') }}" required>
                                    @if ($errors->has('customer_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('customer_name') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.customer.fields.customer_name_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required"
                                        for="customer_phone">{{ trans('cruds.customer.fields.customer_phone') }}</label>
                                    <input class="form-control {{ $errors->has('customer_phone') ? 'is-invalid' : '' }}"
                                        type="text" name="customer_phone" id="customer_phone"
                                        value="{{ old('customer_phone', '') }}" required>
                                    @if ($errors->has('customer_phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('customer_phone') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.customer.fields.customer_phone_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_address">{{ trans('cruds.customer.fields.customer_address') }}</label>
                            <textarea class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}"
                                name="customer_address" id="customer_address">{{ old('customer_address') }}</textarea>
                            @if ($errors->has('customer_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_address') }}
                                </div>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.customer.fields.customer_address_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('courier') ? 'has-error' : '' }}">
                            <label for="courier_id">{{ trans('cruds.order.fields.courier') }}</label>
                            <select class="form-control select2" name="courier_id" id="courier_id">
                                @foreach($couriers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('courier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('courier'))
                                <span class="help-block" role="alert">{{ $errors->first('courier') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.courier_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('courier_tracking_number') ? 'has-error' : '' }}">
                            <label for="courier_tracking_number">{{ trans('cruds.order.fields.courier_tracking_number') }}</label>
                            <input class="form-control" type="text" name="courier_tracking_number" id="courier_tracking_number" value="{{ old('courier_tracking_number', '') }}">
                            @if($errors->has('courier_tracking_number'))
                                <span class="help-block" role="alert">{{ $errors->first('courier_tracking_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.courier_tracking_number_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                                id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                                    {{ trans('global.pleaseSelect') }}</option>
                                @foreach (App\Models\Order::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('status', 'Processing') === (string) $key ? 'selected' : '' }}>
                                        {{ $label }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Order Details
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered " id="productTable">
                                    <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_id">Products</label>
                            <select class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" id="product_id">
                            </select>
                            @if ($errors->has('product_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product_id') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-0"></div>
                            <div class="col-lg-6 col-12">
                                <div class="row mb-2">
                                    <label for="subtotal" class="col-sm-4 col-form-label">Subtotal</label>
                                    <div class="col-sm-8">
                                        <input class="form-control {{ $errors->has('subtotal') ? 'is-invalid' : '' }}"
                                            type="number" name="subtotal" id="subtotal" readonly="readonly"
                                            value="{{ old('subtotal', '') }}" step="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-0"></div>
                            <div class="col-lg-6 col-12">
                                <div class="row mb-2">
                                    <label for="delivery_charge"
                                        class="col-sm-4 col-form-label">{{ trans('cruds.order.fields.delivery_charge') }}</label>
                                    <div class="col-sm-8">
                                        <input
                                            class="form-control {{ $errors->has('delivery_charge') ? 'is-invalid' : '' }}"
                                            type="number" name="delivery_charge" id="delivery_charge"
                                            value="{{ old('delivery_charge', '0') }}" step="1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-0"></div>
                            <div class="col-lg-6 col-12">
                                <div class="row mb-2">
                                    <label for="discount"
                                        class="col-sm-4 col-form-label">{{ trans('cruds.order.fields.discount') }}</label>
                                    <div class="col-sm-8">
                                        <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                            type="number" name="discount" id="discount" value="{{ old('discount', '0') }}"
                                            step="1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-0"></div>
                            <div class="col-lg-6 col-12">
                                <div class="row mb-2">
                                    <label for="total_bill"
                                        class="col-sm-4 col-form-label">{{ trans('cruds.order.fields.total_bill') }}</label>
                                    <div class="col-sm-8">
                                        <input class="form-control {{ $errors->has('total_bill') ? 'is-invalid' : '' }}"
                                            type="number" name="total_bill" id="total_bill"
                                            value="{{ old('total_bill', '0') }}" step="1" readonly="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="form-group mb-0">
                            <button class="btn btn-danger btn-block" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>


@endsection

@section('scripts')
@parent
<script>
    $(function () {
        var _token = $('input[name="_token"]').val();
        $("#product_id").select2({
                placeholder: "Select a Product",
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var $state = $(
                        '<span><img width="30px" src="' +
                        state.product_photo +
                        '" class="img-flag" /> ' +
                        state.text +
                        "</span>"
                    );
                    return $state;
                },
                ajax: {
                    url: "{{ route('admin.orders.products') }}",
                    headers: {'x-csrf-token': _token},
                    method: 'POST',
                    processResults: function (data) {
                        var data = $.parseJSON(data);
                        return {
                            results: data.data
                        };
                    }
                }
            }).trigger("change").on("select2:select", function (e) {
                console.log(e);

                $("#productTable tbody").append(
                    "<tr>" +
                    '<td  style="display: none"><input type="text" name="product['+e.params.data.id+'][product_id]" style="width:80px;" value="' + e.params.data.id + '"></td>' +
                    '<td><input type="hidden" name="product['+e.params.data.id+'][product_code]" value="' + e.params.data.product_code + '"><span class="product_code">' + e.params.data.product_code + '</span></td>' +
                    '<td><input type="hidden" name="product['+e.params.data.id+'][product_name]" value="' + e.params.data.text + '"><span class="product_name">' + e.params.data.text + '</span></td>' +
                    '<td><input type="number" name="product['+e.params.data.id+'][quantity]" class="product_quantity form-control" style="width:80px;" value="1"></td>' +
                    '<td><input type="hidden" name="product['+e.params.data.id+'][price]" value="' + e.params.data.product_price + '"><span class="product_price">' + e.params.data.product_price + '</span></td>' +
                    '<td><button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>\n' +
                    "</tr>"
                );
                calculation();
            });

            $(document).on("click", ".delete-btn", function () {
                $(this).closest("tr").remove();
                calculation();
            });

            $(document).on("change", ".product_quantity", function () {
                calculation();
            });
            $(document).on("input", "#delivery_charge", function () {
                calculation();
            });
            $(document).on("input", "#discount", function () {
                calculation();
            });

            function calculation() {
                var subtotal = 0;
                var delivery_charge = +$("#delivery_charge").val();
                var discount = +$("#discount").val();
                 $("#productTable tbody tr").each(function (index) {
                    subtotal = subtotal + +$(this) .find(".product_price") .text() *  +$(this).find(".product_quantity").val();
                });
                $("#subtotal").val(subtotal);
                $("#total_bill").val(subtotal + delivery_charge - discount);
            }

    });
</script>

@endsection
