<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $question
 * @property string $explanation
 * @property boolean $status
 * @property integer $section_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question', 'explanation', 'status', 'section_id', 'user_id', 'created_at', 'updated_at'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // public function answers()
    // {
    //     return $this->hasMany(Answer::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
