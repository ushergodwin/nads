<?php

namespace App\Http\Requests\Distributions;

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
			'dist_id' => 'required|unique:distributions,dist_id|max:25',
			'farm_input_id' => 'required|exists:farm_inputs,id|numeric',
			'farmer_id' => 'required|exists:farmers,id|numeric',
			'user_id' => 'required|exists:users,id',
			'dist_date' => 'required|date',
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
