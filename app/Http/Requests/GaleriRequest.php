<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriRequest extends FormRequest
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
            'aciklama' => 'required|max:20',
            'link'=>'nullable',
            'yer'=>'required|in:galeri,alt,liste,site_ici',
            'sira'=>'required|numeric',
            'resim' => $img
        ];
    }

    public function attributes()
    {
        return [
            'aciklama' => 'Açıklama',
            'link'=>'Link',
            'yer'=>'Yer',
            'sira'=>'Resim Sıra',
            'resim' => 'Resim'
        ];

    }
}
