<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class Annonces extends Model
{
    // use HasFactory;
    protected $fillable = [
        'adress_company','type_of_employment','company_type','job_type','number_of_recruitments','full_name','recruiter_function','comapny_size','user_id','continent','country','city','company_name','company_description','post_disponible_teletravail','IsCabinet','emplacement_option','info_canal'
    ];
}
