<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $fio
 * @property string $inn
 * @property string $phone
 * @property string $organisation_name
 * @property boolean $done
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Lead extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
}
