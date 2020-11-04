<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\List_;
class Section extends Model
{
    use HasFactory;
    protected $table="sections";
    protected $fillable=['title','description'];

    public function lists(){
    	return $this->hasMany(List_::class,'section_id','id');
    }
}
