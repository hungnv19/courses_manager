<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $author
 * @property string $quote
 * @property string $created_at
 * @property string $updated_at
 */
class Quote extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['author', 'quote', 'created_at', 'updated_at'];
}
