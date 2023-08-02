<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $quiz_header_id
 * @property integer $section_id
 * @property integer $question_id
 * @property integer $answer_id
 * @property boolean $correct
 * @property string $created_at
 * @property string $updated_at
 */
class Quiz extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'quiz_header_id', 'section_id', 'question_id', 'answer_id', 'correct', 'created_at', 'updated_at'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function quizHeader()
    {
        return $this->belongsTo(QuizHeader::class);
    }
}
