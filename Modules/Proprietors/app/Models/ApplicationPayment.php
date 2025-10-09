<?php

namespace Modules\Proprietors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Proprietors\Database\Factories\ApplicationPaymentFactory;

use Modules\Registrations\Models\Registration;
use App\Models\{Payment,User};
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ApplicationPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'registration_id','meta','status',
        'user_id'
    ];
    protected $casts = [
        'meta' => 'array',
       	'status' => 'string',
    ];
    public function totalPaid()
	{
	    return $this->payments()
	        ->whereIn('status', ['completed', 'approved'])
	        ->sum(\DB::raw("json_extract(meta, '$.amount')"));  // or use ->pluck + sum
	}

	public $with=['payments'];
    public function application(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    /**
     * Get the user that owns this model.
     */
    public function owner()//: BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    /**
     * Payments belonging to this application payment
     */
    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    // protected static function newFactory(): ApplicationPaymentFactory
    // {
    //     // return ApplicationPaymentFactory::new();
    // }
}
