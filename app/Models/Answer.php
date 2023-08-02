<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $answer
 * @property boolean $checked
 * @property integer $question_id
 * @property string $created_at
 * @property string $updated_at
 */
class Answer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['answer', 'checked', 'question_id', 'created_at', 'updated_at'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
