<?php

namespace Modules\Proprietors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Proprietors\Database\Factories\ApplicationFactory;

use App\Models\{PrvInsCategory,TRequirement};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\{User,Lga,City};
class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    //protected $fillable = ['user_id','meta'];
    // Enable mass assignment
    protected $fillable = [
        'owner_id',
        'meta',
        'current_reviewer_role','current_application_status_id'
    ];

    // Cast 'meta' JSON column to array automatically
    protected $casts = [
        'meta' => 'array',
    ];

    //public $with=['applicationStatus'];

    public function getCategoryAttribute(){
    	try {
    		$m=$this->meta??[];
    		$f=(int)$m['type_id'];
    		return PrvInsCategory::where('id',$f)->first();
    	} catch (Exception $e) {
    		\Log::info('d',[$e->getMessage()]);
    	}
    	return collect();
    }


    public function getOwnerMetaAttribute(){
        try {
            $m=$this->meta??[];
            $f=(int)$m['type_id'];

            //Lga,City
            $df['lga']=Lga::find($f['owner_address_lga']??0);
            $df['city']=City::find($f['owner_address_city']??0);

            return $df;
        } catch (Exception $e) {
            \Log::info('d',[$e->getMessage()]);
        }
        return collect();
    }
    public function getSchoolMetaAttribute(){
        try {
            $m=$this->meta??[];
            $f=(int)$m['type_id'];

            //Lga,City
            $df['lga']=Lga::find($f['school_address_lga']??0);
            $df['city']=City::find($f['school_address_city']??0);

            return $df;
        } catch (Exception $e) {
            \Log::info('d',[$e->getMessage()]);
        }
        return collect();
    }

    //
    public function applicationStatus()
    {
        return $this->hasOne(ApplicationStatus::class,'id', 'current_application_status_id');
    }

    public function remarks()
    {
        return $this->hasMany(ApplicationComment::class,'application_id', 'id');
    }

    public function progress()
    {
        return $this->hasMany(ApplicationProgress::class,'application_id', 'id');
    }
    public function applicationPayments()
    {
        return $this->hasMany(ApplicationPayment::class,'application_id', 'id');
    }
    public function latestApplicationPayment()
	{
	    return $this->hasOne(ApplicationPayment::class,'application_id', 'id')->latestOfMany();
	}
    
 
    public function approvalPayments()
    {
        return $this->hasMany(ApprovalPayment::class,'application_id', 'id');
    }
    public function latestApprovalPayment()
    {
        return $this->hasOne(ApprovalPayment::class,'application_id', 'id')->latestOfMany();
    }


    /**
     * Get the user that owns this model.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
 

    // protected static function newFactory(): ApplicationFactory
    // {
    //     // return ApplicationFactory::new();
    // }
}
