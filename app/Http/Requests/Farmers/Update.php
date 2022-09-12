<?php

namespace App\Http\Requests\Farmers;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest 
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
			'district' => 'required|max:100',
			'town' => 'required|max:100',
			'phone_number' => 'required|max:14',
			'email' => 'nullable|max:60',
			'date_of_birth' => 'required|date',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
     
        ];
    }

}
