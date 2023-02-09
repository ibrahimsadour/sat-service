<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,jpeg,png,webp',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'seo_keyword'  => 'required',
            'seo_description' => 'required',
            'seo_title'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'photo.required' => 'يجب اضافة صورة',
            'photo.mimes' => 'صيغة الصورة التي تم تحميلها غير صحيحة',

        ];
    }
}
