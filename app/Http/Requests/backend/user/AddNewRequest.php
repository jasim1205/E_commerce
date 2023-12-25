<?php

namespace App\Http\Requests\Backend\user;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'userName_en'=>'required|max:255',
            'roleId'=> 'required|max:2',
            'contactNumber_en'=>'required|unique:users,contact_no_en',
            'EmailAddress'=>'required|unique:users,email',
            'password'=>'required'
        ];
    }
}
