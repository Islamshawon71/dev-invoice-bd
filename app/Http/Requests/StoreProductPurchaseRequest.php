<?php

namespace App\Http\Requests;

use App\Models\ProductPurchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductPurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_purchase_create');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'purchase_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
