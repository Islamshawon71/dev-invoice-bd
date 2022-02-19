<?php

namespace App\Http\Requests;

use App\Models\ProductPurchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductPurchaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_purchases,id',
        ];
    }
}
