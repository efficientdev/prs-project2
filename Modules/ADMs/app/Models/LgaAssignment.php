<?php

namespace Modules\ADMs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ADMs\Database\Factories\LgaAssignmentFactory;
 
class LgaAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'lga_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lga()
    {
        return $this->belongsTo(Ward::class, 'lga_id', 'lga_id');
    }
    
    // protected static function newFactory(): LgaAssignmentFactory
    // {
    //     // return LgaAssignmentFactory::new();
    // }
}
