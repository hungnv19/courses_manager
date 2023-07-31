<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

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
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['title', 'image', 'description', 'language_id', 'level_id', 'category_id', 'created_at', 'start_date',  'end_date', 'updated_at'];

    protected $appends = [

        'start_date_format',
        'end_date_format'
    ];

    protected function serializeDate($date)
    {
        return $date->format('Y/m/d');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function language()
    {
        return $this->belongsTo(Category::class);
    }
    public function level()
    {
        return $this->belongsTo(Category::class);
    }
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function getStartDateFormatAttribute()
    {
        return Carbon::parse($this->start_date)->format('Y/m/d ');
    }

    public function getEndDateFormatAttribute()
    {
        return Carbon::parse($this->end_date)->format('Y/m/d ');
    }
}
