<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $describe
 * @property string $created_at
 * @property string $updated_at
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'image', 'describe', 'created_at', 'updated_at'];
}
