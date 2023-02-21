<?php

namespace App\Http\Requests\Api\Products;

use App\Http\Requests\Transferable;
use Illuminate\Foundation\Http\FormRequest;

class GetProductReviewsRequest extends FormRequest implements Transferable
{
    public function rules(): array
    {
        return [
            'amount' => ['sometimes', 'integer', 'min:1'],
            'page' => ['sometimes', 'integer', 'min:1'],
            'hasPhoto' => ['sometimes', 'boolean']
        ];
    }

    public function toDTO(): array
    {
        return $this->validated();
    }
}
