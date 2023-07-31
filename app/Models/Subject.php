<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property integer $class_id
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 */
class Subject extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'class_id', 'start_date', 'end_date', 'created_at', 'updated_at'];

    protected $appends = [
        'start_date_format',
        'end_date_format'
    ];

    public function getStartDateFormatAttribute()
    {
        return Carbon::parse($this->start_date)->format('Y/m/d ');
    }

    public function getEndDateFormatAttribute()
    {
        return Carbon::parse($this->end_date)->format('Y/m/d ');
    }

}
