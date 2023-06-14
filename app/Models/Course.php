<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $language_id
 * @property integer $level_id
 * @property integer $category_id
 * @property string $created_at
 * @property string $updated_at
 */
class Course extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'language_id', 'level_id', 'category_id', 'created_at', 'updated_at'];
}
