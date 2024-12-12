<?php

declare(strict_types=1);

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Model extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $hidden = ['deleted_at'];

    public function car(): HasMany
    {
        return $this->hasMany(related: Car::class);
    }
}