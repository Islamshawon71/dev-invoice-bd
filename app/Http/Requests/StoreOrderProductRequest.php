<?php

namespace App\Http\Requests;

use App\Models\OrderProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_product_create');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'order_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
