<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
           
            'name' => 'required|string',
            'email' => 'required|email|unique:Users',  
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'group_id' => 'required',
        ];
    }
}
