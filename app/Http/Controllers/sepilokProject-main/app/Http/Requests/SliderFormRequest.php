<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'annTitle' => [
                'required',
                'string',
                'max:255'
            ],

            'annDesc' => [
                'required',
                'string',
                'max:800'
            ],
            'annImg' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'annStatus' => [
                'nullable',
            ]
            
        ];
    }
}
