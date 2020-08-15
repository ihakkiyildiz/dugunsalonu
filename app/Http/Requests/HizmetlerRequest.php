<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HizmetlerRequest extends FormRequest
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
        $img = $this->getMethod() == 'POST' ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'image|mimes:jpeg,png,jpg,gif|max:2048';
        return [
            'sayfatitle' => 'required|max:200',
            'metaicerik'=>'required',
            'icerik'=>'required',
            'sira'=>'required|numeric',
            'image' => $img,
            'keyword'=>'required'
        ];
    }
    public function attributes()
    {
        return [
            'sayfatitle' => 'Sayfa Başlığı',
            'metaicerik'=>'Özet İçerik',
            'icerik'=>'Sayfa İçeriği',
            'sira'=>'Sayfa Sıra Numarası',
            'image' => 'Resim',
            'keyword'=>'Anahtar Kelimeler'
        ];
    }
}
