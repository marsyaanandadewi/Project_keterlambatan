<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayon extends Model
{
    use HasFactory;

    protected $table = 'rayons';
    
    protected $fillable = [
        'rayon',
        'user_id',
    ];

    public function User(){
    return $this->belongsTo(User::class);
    // return $this->hasOne(User::class, 'name', "id");
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

}
