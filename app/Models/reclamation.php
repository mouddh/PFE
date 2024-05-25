<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'description', 'attachement','user_id','status','engineer_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function engineer()
    {
        return $this->belongsTo(User::class, 'engineer_id');
    }
}
