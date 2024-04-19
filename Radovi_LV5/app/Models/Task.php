<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['naziv_rada','naziv_rada_eng','zadatak_rada','tip_studija','nastavnik_id'];

    public function users()
    {
        return $this->belongsTo(User::class,'nastavnik_id');
    }
}
