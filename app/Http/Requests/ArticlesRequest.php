<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
            'name' => 'required|unique:articles,name,' . $this->id,
            'slug' => 'required|unique:articles,slug,' . $this->id,
            'seo_keyword' => 'required|unique:articles,seo_keyword,' . $this->id,
            'seo_description' => 'required|unique:articles,seo_description,' . $this->id,
            'seo_title' => 'required|unique:articles,seo_title,' . $this->id,

        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'photo.required' => 'يجب اضافة صورة',
            'photo.mimes' => 'صيغة الصورة التي تم تحميلها غير صحيحة',
            'unique'=>'تم ادخال هذه العيارة مسبقا'

        ];
    }
}
