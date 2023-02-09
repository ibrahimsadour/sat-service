<?php

namespace App\Imports;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TagsImport implements ToCollection, WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $data=[
                'name'=>$row['name'],
                'slug'=>Str::slug($row['slug'],'-', null),
                'description'=>$row['description'],
                'seo_title'=>$row['seo_title'].' في الكويت على مدار 24 ساعة',
                'seo_keyword'=>$row['seo_keyword'],
                'seo_description'=> ' نقدم لك افضل خدمة '.$row['seo_description']. ' في جميع مدن الكويت على مدار 24 ساعة في اليوم اتصل لنصل اليك باسرع وقت',
                'active'=>'1',

            ];
            Tag::create($data);
        }
    }

    public function rules(): array
    {
        return[
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'seo_title'=>'required',
            'seo_keyword'=>'required',
            'seo_description'=>'required',

        ];
    }
}
