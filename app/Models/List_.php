<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

class List_ extends Model
{
    use HasFactory;
    protected $table="lists";
    protected $fillable=['title','photo','description','section_id'];

    public function section(){
    	return $this->belongsTo(Section::class,'section_id','id');
    }}
