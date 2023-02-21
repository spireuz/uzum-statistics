<?php

namespace App\Http\Requests\Api\Delivery;

use App\Http\Requests\Transferable;
use Illuminate\Foundation\Http\FormRequest;

class GetDeliveryTimeRequest extends FormRequest implements Transferable
{
    public function rules(): array
    {
        return [
            'cityId' => ['required', 'integer', 'min:1'],
            'eco' => ['sometimes', 'boolean'],
            'courier' => ['sometimes', 'boolean']
        ];
    }

    public function toDTO(): array
    {
        return $this->validated();
    }
}
