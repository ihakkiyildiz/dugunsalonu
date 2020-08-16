<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZiyaretciRequest extends FormRequest
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
        if($this->getMethod()=='PATCH') return [];
        return [
            'adsoyad'=>'required|max:200',
            'email'=>'required|email',
            'mesaj'=>'required'
        ];
    }
    public function attributes()
    {
       return [
           'adsoyad'=>'Ad Soyad',
           'email'=>'Email',
           'mesaj'=>'Mesaj',
       ];
    }
}
