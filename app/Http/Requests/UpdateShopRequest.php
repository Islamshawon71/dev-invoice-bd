<?php

namespace App\Http\Requests;

use App\Models\Shop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shop_edit');
    }

    public function rules()
    {
        return [
            'shop_name' => [
                'string',
                'required',
            ],
            'shop_address' => [
                'string',
                'required',
            ],
            'shop_phone_number' => [
                'string',
                'required',
            ],
        ];
    }
}
