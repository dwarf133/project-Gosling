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
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'user_id'];

    public function author(): hasOne {
        return $this->hasOne(User::class);
    }

    public function lessons(): hasMany {
        return $this->hasMany(Lesson::class);
    }

}
