<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class createResidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!Auth::check()) {
            return true;
        }
      
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'birthdate' => 'required',
            'gender' => 'required',
            'contact_no' => 'required|max:11',
            'email' => 'unique:users,email',
            'isPWD' => 'required',
            'password' => 'required',
        ];
    }
}
