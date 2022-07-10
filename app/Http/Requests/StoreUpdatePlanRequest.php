<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlanRequest extends FormRequest
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
            'name' => "required|min:5|max:255|unique:plans,name,{$this->name},name",
            'description' => 'nullable|min:5|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
