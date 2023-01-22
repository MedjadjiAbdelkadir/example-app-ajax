<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'prix' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'desc.required' => 'A description is required',
            'prix.required' => 'A desc is required',

            'name.string' => 'A name of offer must be string',
            'desc.string' => 'A description must be string',
            'prix.numeric' => 'A prix of offer must be numeric',

        ];
    }
}
