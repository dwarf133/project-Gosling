<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $description
 * @property string $name
 * @property int $parent_id
 * @property int $company_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Company $company
 */
class Department extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'company_id'];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
