<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GetDeliveryPriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cityId' => ['required', 'integer', 'min:1']
        ];
    }
}
