<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'username' => 'required|min:3|max:16|unique:posts',
            'email' => 'required|email|unique:posts',
            'phone' => 'required|min:10|max:10',
            'dateofbirth' => 'required|date|before:-13 years',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ];
    }
    public function messages()
    {
        return [
            // 'image.mime' => 'olny jpg, png, jpeg, gif and svg file format is supported',
            // 'image.dimensions' => 'please upload file with minimum 100x100 and maximum 1000x1000 px.',
            // 'image.max' => 'max image size is 2MB supported',
            'username.unique' => 'This username is already taken, Please try with another :0',
            'phone.min' => 'Phone number should be exact 10 digits',
            'dateofbirth' => 'You must be at least 13 years old',
            'password.regex' => 'Password must be alphanumeric having lowercase characters, uppercase characters, numbers and symbols',
        ];
    }
}
