<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $cost
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Fares extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
}
