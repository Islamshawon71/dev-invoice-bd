<?php

namespace App\Http\Requests;

use App\Models\SendSms;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySendSmsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('send_sms_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:send_sms,id',
        ];
    }
}
