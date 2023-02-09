<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class HomePageUsRequest extends FormRequest
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
            'title' => 'required',
            'h2title' => 'required',
            'call_us' => 'required',
            'description' => 'required',
            'seo_keyword'  => 'required',
            'seo_description' => 'required',
            'seo_title'  => 'required',
            'facebook_link'  => 'required',
            'instagram_link'  => 'required',
            'twitter_link'  => 'required',
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
// 'logo' => 'required_without:id|mimes:jpg,jpeg,png,webp',
// 'background' => 'required_without:id|mimes:jpg,jpeg,png,webp',
// 'default_seo_image' => 'required_without:id|mimes:jpg,jpeg,png,webp',
// 'ads_sidebar' => 'required_without:id|mimes:jpg,jpeg,png,webp',