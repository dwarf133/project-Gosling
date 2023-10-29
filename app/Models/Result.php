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
 * @property string $file_path
 * @property string $text
 * @property int $score
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Result extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(): belongsTo {
        return $this->belongsTo(User::class);
    }

    public function course(): belongsTo {
        return $this->belongsTo(Course::class);
    }
}
