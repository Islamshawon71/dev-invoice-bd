<?php

namespace App\Http\Requests;

use App\Models\SendSms;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSendSmsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('send_sms_edit');
    }

    public function rules()
    {
        return [
            'customer_number' => [
                'string',
                'required',
            ],
            'sms_content' => [
                'string',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
