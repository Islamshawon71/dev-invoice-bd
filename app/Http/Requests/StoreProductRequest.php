<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'product_name' => [
                'string',
                'required',
            ],
            'product_code' => [
                'string',
                'required',
                'unique:products',
            ],
            'product_price' => [
                'string',
                'required',
            ],
            'product_photo' => [
                'required',
            ],
        ];
    }
}
