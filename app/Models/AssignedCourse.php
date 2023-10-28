<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class AssignedCourse extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'course_id', 'user_id'];

    public function user(): belongsTo {
        return $this->belongsTo(User::class);
    }

    public function course(): belongsTo {
        return $this->belongsTo(Course::class);
    }
}
