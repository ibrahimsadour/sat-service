<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportExcelRequest extends FormRequest
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
            'select_file' => 'required_without:id|mimes:xls,xlsx',

        ];
    }

    public function messages()
    {
        return [
            'select_file.required' => 'يجب اضافة ملف Excel',
            'select_file.mimes' => 'صيغة الملف التي تم تحميلها غير صحيحة',
        ];
    }
}
