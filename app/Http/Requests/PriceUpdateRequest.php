<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amounts'=>'required|numeric|max:1000000',
            'description'=>'sometimes|max:300',
        ];
    }
}
