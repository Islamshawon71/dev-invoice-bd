@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sendSms.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.send-sms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sendSms.fields.id') }}
                        </th>
                        <td>
                            {{ $sendSms->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendSms.fields.order') }}
                        </th>
                        <td>
                            {{ $sendSms->order->invoice_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendSms.fields.customer_number') }}
                        </th>
                        <td>
                            {{ $sendSms->customer_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendSms.fields.sms_content') }}
                        </th>
                        <td>
                            {{ $sendSms->sms_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendSms.fields.status') }}
                        </th>
                        <td>
                            {{ $sendSms->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.send-sms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection