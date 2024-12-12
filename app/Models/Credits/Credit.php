<?php

declare(strict_types=1);

namespace App\Models\Credits;

use App\Models\Cars\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Credit extends Model
{
    protected $table = 'credit_requests';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'program_id',
        'car_id',
        'initial_payment',
        'loan_term',
    ];

     public function program(): BelongsTo
    {
        return $this->belongsTo(related: Program::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(related: Car::class);
    }
}
