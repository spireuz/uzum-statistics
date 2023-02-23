<?php

namespace App\Http\Requests\Api\Products;

use App\Http\Requests\Transferable;
use Illuminate\Foundation\Http\FormRequest;

class GetSimilarProductsRequest extends FormRequest implements Transferable
{
    public function rules(): array
    {
        return [
            'size' => ['sometimes', 'integer', 'min:1'],
        ];
    }

    public function toDTO(): array
    {
        return $this->validated();
    }
}
