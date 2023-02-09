<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
            'name' => 'required|unique:tags,name,' . $this->id,
            'slug' => 'required|unique:tags,slug,' . $this->id,
            'description' => 'required',
            'seo_title' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'unique'=>'تم ادخال هذه العيارة مسبقا'
        ];
    }
}
