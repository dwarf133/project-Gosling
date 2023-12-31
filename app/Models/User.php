<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $fio
 * @property string $email
 * @property int $department_id
 * @property int $company_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Result[] $results
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function assignedCourses(): hasMany {
        return $this->hasMany(AssignedCourse::class);
    }

    public function results(): hasMany {
        return $this->hasMany(Result::class);
    }

    public function department(): belongsTo {
        return $this->belongsTo(Department::class);
    }

    public function company(): belongsTo {
        return $this->belongsTo(Department::class);
    }

    public static function usersList() {
        $list = [];
        $courses = self::all();
        foreach ($courses as $course) {
            $list[$course->id] = $course->name;
        }
        return $list;
    }
}
