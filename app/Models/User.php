<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $position
 * @property string $description
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $image
 * @property string $date_birth
 * @property string $email_verified_at
 * @property string $password
 * @property boolean $level
 * @property boolean $status
 * @property boolean $role
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'name', 'position', 'description', 'phone', 'address', 'email', 'image', 'date_birth', 'email_verified_at', 'password', 'level', 'status', 'role', 'class_id', 'remember_token', 'created_at', 'updated_at'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Section::class);
    }

    public function quizHeaders()
    {
        return $this->hasMany(QuizHeader::class);
    }

}
