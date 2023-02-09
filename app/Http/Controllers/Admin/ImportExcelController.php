<?php

namespace App\Http\Controllers\Admin;
use App\Imports\TagsImport;
use Maatwebsite\Excel\Excel as ExcelExcel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportExcelRequest;
use App\Http\Requests\TagsRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function import(Request $req){

        $validator = $this->validate($req, [
            'select_file'=>'required|mimes:csv,txt'
            ],
            [
                'select_file.required' => 'هذا الحقل مطلوب',
                'select_file.mimes' => 'يجب تكون صيغة الملف فقط CSV'
            ]
        );
        if($validator) {
            Excel::import(new TagsImport,$req->file('select_file'),ExcelExcel::CSV);
            return back();
        }



    }
}
