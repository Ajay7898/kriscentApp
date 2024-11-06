<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User,Profession};

class Consultation extends Model 
{
    use HasFactory;

    protected $fillable = ['user_id','consultation_id','profession_id','notes','appointment_date'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function user_consult()
    {
        return $this->belongsTo(User::class,'consultation_id','id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class,'profession_id','id');
    }
}
