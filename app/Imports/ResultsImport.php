<?php

namespace App\Imports;

use App\Models\GlobalDetails\Sresult;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResultsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Sresult([
            's_registration_number' => $row['student_registration_number'],
            's_name' => $row['student_name'],
            's_mobile_number' => $row['registered_mobile_number'],
            's_class_section' => $row['class_section'],
            's_subject_1' => $row['subject_01'],
            's_subject_2' => $row['subject_02'],
            's_subject_3' => $row['subject_03'],
            's_subject_4' => $row['subject_04'],
            's_subject_5' => $row['subject_05'],
            's_subject_6' => $row['subject_06'],
            's_percentage' => $row['percentage'],
            's_other_message' => $row['other_message'],
        ]);
    }
}
