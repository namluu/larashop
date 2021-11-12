<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ProductFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'price_discount' => 'max:'.(int)$this->input('price')
        ];
    }

    public function isValid(): bool
    {
        if ($this->input('price_discount') >= $this->input('price')) {
            Session::flash('error', 'Discount must small than price');
            return false;
        }
        return true;
    }
}
