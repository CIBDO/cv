<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    public function cv(){
        return $this->hasMany(Cv::class, 'id_employee','employee_id');
    }
}
