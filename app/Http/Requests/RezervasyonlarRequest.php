<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RezervasyonlarRequest extends FormRequest
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
        if($this->getMethod()=='PATCH')
            return [];
        return [
            //
            'adsoyad'=>'required|max:200',
            'not'=>'required',
            'tarih'=>'date|required',
            'telefon'=>'max:14|required',
            'salon_id'=>'required|numeric'
        ];
    }
    public function attributes()
    {
      return [
          'adsoyad'=>'Ad ve Soyad',
          'not'=>'Not',
          'tarih'=>'Tarih',
          'telefon'=>'Telefon',
          'salon_id'=>'Salon İsmi'
      ];
    }
}
