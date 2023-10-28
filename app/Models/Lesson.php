<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $course_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Lesson extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'course_id'];

    public function course(): hasOne {
        return $this->hasOne(Course::class);
    }

    public function materials(): hasMany {
        return $this->hasMany(Material::class);
    }
}
