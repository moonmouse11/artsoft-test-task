<?php

declare(strict_types=1);

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Car extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'photo',
        'brand_id',
        'model_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'brand_id',
        'model_id'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(related: Brand::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(related: Model::class);
    }
}