@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.id') }}
                        </th>
                        <td>
                            {{ $shop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.shop_name') }}
                        </th>
                        <td>
                            {{ $shop->shop_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.shop_address') }}
                        </th>
                        <td>
                            {{ $shop->shop_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.shop_phone_number') }}
                        </th>
                        <td>
                            {{ $shop->shop_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.shop_logo') }}
                        </th>
                        <td>
                            @if($shop->shop_logo)
                                <a href="{{ $shop->shop_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $shop->shop_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shop.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Shop::STATUS_SELECT[$shop->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection