<?php

namespace Modules\Proprietors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Proprietors\Database\Factories\ApplicationCommentFactory;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class ApplicationComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */ 
    protected $fillable = [
        'application_id',
        'application_status_id',
        'reviewer_id',
        'reviewer_role',
        'meta',
        'status',
    ];

    protected $casts = [
        'meta' => 'array',
        'status' => 'string',
    ];

    /**
     * Get the application this review belongs to.
     */
    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    /**
     * Get the current status of the application.
     */
    public function applicationStatus(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    /**
     * Get the reviewer (user) who performed the review.
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id')->select('id','name');
    } 

    // protected static function newFactory(): ApplicationCommentFactory
    // {
    //     // return ApplicationCommentFactory::new();
    // }
}
