@extends('layouts.admin')
@section('content')

<style>
    .form-group{
        position: relative;
    }
    .number-suggestion {
        position: absolute;

        width: 100%;
        z-index: 1;
    }
    .number-suggestion div {
        padding: 5px 15px;
        border-bottom: 1px solid var(--bs-gray-500);
        background: var(--bs-gray-400);
        cursor: pointer;
    }
    .number-suggestion div:hover {
        background: var(--bs-light);
    }
</style>
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sendSms.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.send-sms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="display:none">
                <label for="order_id">{{ trans('cruds.sendSms.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('customer_number') ? 'is-invalid' : '' }}" type="text" name="customer_number" id="customer_number" value="{{ old('customer_number', '') }}" required>
                <div class="number-suggestion"></div>
                @if($errors->has('customer_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sendSms.fields.customer_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sms_content">{{ trans('cruds.sendSms.fields.sms_content') }}</label>
                <input class="form-control {{ $errors->has('sms_content') ? 'is-invalid' : '' }}" type="text" name="sms_content" id="sms_content" value="{{ old('sms_content', '') }}" required>
                @if($errors->has('sms_content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sms_content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sendSms.fields.sms_content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.sendSms.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
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
@section('scripts')
@parent
<script>
    $(function () {
        var _token = $('input[name="_token"]').val();

        let number_input = true;
        $(document).on('keypress', '#customer_number', function(){
            $number = $(this).val();
            if(!$number){
                $('.number-suggestion').empty();
            }else{
                getCustomerNumber($(this).val());
            }
        });

        function getCustomerNumber(number){

            $.ajax({
                type : "POST",
                headers: {'x-csrf-token': _token},
                url: "{{ url('admin/send-sms/getCustomerNumber') }}",
                data: { number: number },
                success : function(response){
                    let html = '';
                    response.forEach((element) => {
                        html = html + '<div data-number="'+element.customer_phone+'" >'+element.customer_name+'</div>';
                    });
                    $('.number-suggestion').empty().append(html);
                }
            });
        }
        $(document).on('click', '.number-suggestion div', function(){
            // alert($(this).data('number'));
            $('#customer_number').val($(this).data('number'));
            $('.number-suggestion').empty();
        });


    });
</script>

@endsection
