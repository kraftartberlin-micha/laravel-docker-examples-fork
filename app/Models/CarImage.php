<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarImage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'image_path',
        'position',
    ];
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
