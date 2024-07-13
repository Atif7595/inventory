<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class QaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0]!= 'question'){
            $question = Question::insertGetId([
                'name'=> $row[0],
            ]);
            for($i =1 ; $i< count($row)-1; $i++)
            {
                if($row[$i] != NULL){
                     $is_correct=0;
                    if($row[7]== $row[$i]){
                        $is_correct= 1;
                    }

                    Answer::create([
                        'name'=> $row[$i],
                        'question_id'=> $question,
                        'is_correct'=>$is_correct,
                    ]);
                }

            }
        }
        // return new Question([
        //     //
        // ]);
    }
}
