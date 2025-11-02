<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSubmission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'form_data',
        'blockchain_hash',
        'transaction_id',
        'validation_status',
        'ai_confidence_score',
        'validation_notes',
    ];

    protected $casts = [
        'form_data' => 'encrypted',
        'ai_confidence_score' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function blockchainTransactions(): HasMany
    {
        return $this->hasMany(BlockchainTransaction::class);
    }
}
