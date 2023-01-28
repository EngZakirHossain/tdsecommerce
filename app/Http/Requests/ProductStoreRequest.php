<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subCategory_id' => 'required|numeric',
            'product_name' => 'required|string|max:255',
            'product_sku' => 'required|string|unique:products,product_sku',
            'product_size' => 'required|string',
            'product_stock' => 'required|numeric|min:1',
            'product_price' => 'nullable|numeric|min:0',
            'product_cost' => 'nullable|numeric|min:0',
            'product_alertQuantity' => 'required|numeric|min:1',
            'product_details' => 'required|string|max:255',
            'product_shippingDetails' => 'required|string|max:255',
            'product_thumbnail' => 'required|image|max:1024'
        ];
    }
}
