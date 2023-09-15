<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Review
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $rating
 * @property string $headline
 * @property string|null $body
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Review extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'ticket_id',
        'rating',
        'headline',
        'body',
        'user_id',
    ];

    /**
     * Get the ticket that owns the review.
     *
     * @return BelongsTo
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the user that owns the review.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
