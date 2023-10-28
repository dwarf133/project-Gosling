<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $material_id
 * @property array $products_bukkit
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Test extends Model
{
    use HasFactory;

    protected $casts = ['test' => 'array'];
    protected $guarded = ['material_id', 'id'];

    public function material(): hasOne {
        return $this->hasOne(Material::class);
    }
}
