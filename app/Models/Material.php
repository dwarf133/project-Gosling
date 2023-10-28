<?php

namespace App\Models;

use App\Enums\MaterialType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $document_path
 * @property int $lesson_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property MaterialType $type
 */
class Material extends Model
{
    use HasFactory;

    protected $guarded = ['lesson_id', 'id'];

    protected $casts = [
        'type' => MaterialType::class,
    ];

    public function lesson(): belongsTo {
        return $this->belongsTo(Lesson::class);
    }

    public function results(): hasMany {
        return $this->hasMany(Result::class);
    }
}
