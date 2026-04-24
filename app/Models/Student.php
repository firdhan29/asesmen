<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function surahAssessments()
    {
        return $this->hasMany(SurahAssessment::class);
    }

    public function observations()
    {
        return $this->hasMany(Observation::class);
    }
}
