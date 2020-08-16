<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|max:50',
            'surname'=>'required|max:50',
            'email'=>'email|required',
            'password'=>'required|min:6|max:12',
        ];
    }
    public function attributes()
    {
      return [
          'name'=>'Adı',
          'surname'=>'Soyadı',
          'email'=>'E-Posta',
          'password'=>'Şifre',
      ];
    }
}
