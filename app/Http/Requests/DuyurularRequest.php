<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DuyurularRequest extends FormRequest
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
        $img = $this->getMethod() == 'POST' ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048':'image|mimes:jpeg,png,jpg,gif|max:2048';
        return [
            'duyurutitle'=>'required|max:150',
            'icerik'=>'required',
            'metaicerik'=>'required|max:250',
            'keyword'=>'required|max:250',
            'image'=>$img
        ];
    }

    public function attributes()
    {
       return [
           'duyurutitle'=>'Duyuru Başlığı',
           'icerik'=>'Duyuru İçeriği',
           'metaicerik'=>'Duyuru Özet',
           'keyword'=>'Anahtar Kelimeler',
           'image'=>'Resim'
       ];
    }
}
