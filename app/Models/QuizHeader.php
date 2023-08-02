<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $section_id
 * @property boolean $completed
 * @property integer $quiz_size
 * @property string $questions_taken
 * @property float $score
 * @property string $created_at
 * @property string $updated_at
 */
class QuizHeader extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'section_id', 'completed', 'quiz_size', 'questions_taken', 'score', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
