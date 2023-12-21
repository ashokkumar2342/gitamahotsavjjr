<?php

namespace App\Model\Exam;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
	protected $table ='user_question_answer';
	protected $guarded = [];
	public $timestamps = false;
    
}
