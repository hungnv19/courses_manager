<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property string $active
 * @property string $details
 * @property string $created_at
 * @property string $updated_at
 */
class Section extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'description', 'active', 'details', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // public function quizHeaders()
    // {
    //     return $this->hasMany(QuizHeader::class);
    // }
}
