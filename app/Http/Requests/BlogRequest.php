<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'application_name' => 'required',
            'logo' => 'image| mimes:jpeg,jpg,png',
            'title' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'getway' => 'required',
            'hobby' => 'required',
            'gender' => 'required',
        ];
    }
    public function messages() {
        return [
            'application_name.required' => 'Please Enter Application Name',           
            'logo.image' => 'Selected file must be image',        
            'title.required' => 'Please Enter Title',           
            'address.required' => 'Please Enter Address',
            'email.required' => 'Please Enter Email',
            'getway.required' => 'Please Select Getway',
            
        ];
    }
}
