<?php

declare(strict_types=1);

namespace App\Models\Credits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Program extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'interest_rate',
        'rule',
        'monthly_payment'
    ];
    public $timestamps = false;

    public function credits(): HasMany
    {
        return $this->hasMany(related: Credit::class);
    }
}