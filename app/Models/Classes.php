<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property integer $department_id
 * @property integer $course_id
 * @property string $created_at
 * @property string $updated_at
 */
class Classes extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'department_id', 'course_id', 'created_at', 'updated_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
