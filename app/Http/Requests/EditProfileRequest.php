<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProfileRequest extends Request
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
                        'name'=>'required|max:255',
                        'email' =>'unique:users|max:255',
                        'fullname'=>'required',
                        'name'=>'required',
                        'password'=>'max:255',
                        'confirm_password'=> 'same:password'
                ];
    }
}
