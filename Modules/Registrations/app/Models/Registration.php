<?php

namespace Modules\Registrations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Registrations\Database\Factories\RegistrationFactory;
use Modules\Proprietors\Models\{ApplicationPayment,ApprovalPayment};
use Modules\Registrations\Services\ApprovalService;
use App\Models\{User,Lga,City};

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\{PrvInsCategory,TRequirement};

class Registration extends Model
{
    use HasFactory;

 
    /**
     * The attributes that are mass assignable. 'emis_code', 
     */
    protected $fillable = ['owner_id','data','status','cies_reports','submitted','submitted_at','prs_4_report'];
 

    protected $casts = [
        'data' => 'array',
        'cies_reports'=>'array',
        'submitted'=>'boolean',
        'prs_4_report'=>'array',
    ];

    /**
     * Get a section’s data (or default).
     */
    public function getProprietorSection(string $section)
    {
        $data = $this->data ?? [];
        return $data[$section] ?? null;
    }

    /**
     * Set a section’s data.
     */
    public function setProprietorSection(string $section, array $data)
    {
        $all = $this->data ?? [];
        $all[$section] = $data;
        $this->data = $all;
    }

    /**
     * Get a section’s data (or default).
     */
    public function getSection(string $section)
    {
        $data = $this->cies_reports ?? [];
        return $data[$section] ?? null;
    }

    /**
     * Set a section’s data.
     */
    public function setSection(string $section, array $data)
    {
        $all = $this->cies_reports ?? [];
        $all[$section] = $data;
        $this->cies_reports = $all;
    }


    /**
     * Get a section’s data (or default).
     */
    public function getPrs1(string $section)
    {
        $data = $this->prs_4_report ?? [];
        return $data[$section] ?? null;
    }

    /**
     * Set a section’s data.
     */
    public function setPrs1(string $section, array $data)
    {
        $all = $this->prs_4_report ?? [];
        $all[$section] = $data;
        $this->prs_4_report = $all;
    }
//

    public function getCategoryAttribute(){
        try {
            $m=$this->data??[];
            $f=(int)$m['type_id'];
            return PrvInsCategory::where('id',$f)->first();
        } catch (Exception $e) {
            \Log::info('d',[$e->getMessage()]);
        }
        return collect();
    }
    public function approvals()
    {
        return $this->hasMany(RegistrationApproval::class,'registration_id');
    }


    /*public function posts()
    {
        return $this->hasMany(Post::class);
    }*/

    public function latestStage()
    {
        return $this->hasOne(RegistrationApproval::class,'registration_id')->latestOfMany();
    }

    public function pendingApprovalPay()
    {
        return $this->hasOne(RegistrationApproval::class,'registration_id')->where('status', 'pending')->where('registration_approval_stage_id',ApprovalService::$firstLetter);
    }

    public function currentApproval()
    {
        return $this->approvals()->where('status', 'pending')->orderBy('registration_approval_stage_id')->first();
    } 
    public function currentApprova()
    {
        return $this->approvals()->where('status', 'pending')->orderBy('registration_approval_stage_id')->first();
    } 
 

	public function currentStage() {
	    return $this->approvals()->whereNull('decision_at')->orderBy('stage_order')->first();
	}

    
    public function registrationPayment()
    {
        return $this->hasOne(ApplicationPayment::class,'registration_id', 'id');
    }

    public function approvedRegistrationPayment()
    {
        return $this->hasOne(ApplicationPayment::class,'registration_id', 'id')->where('status','approved');
    }

    public function approvalPayment()
    {
        return $this->hasOne(ApprovalPayment::class,'registration_id', 'id');
    }

    /**
     * Get the user that owns this model.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // protected static function newFactory(): RegistrationFactory
    // {
    //     // return RegistrationFactory::new();
    // }
}
