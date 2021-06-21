<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
            'total' => 'required|numeric',
            'currency' => 'required|string',
            'note' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
