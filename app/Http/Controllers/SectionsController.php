<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Requests\SectionsRequest;
use App\Http\Traits\JSONTrait;
use Carbon\Carbon;

class SectionsController extends Controller
{
    	  use JSONTrait;
	  public function index(){
	  	$sections=Section::paginate(PAGINATION_COUNT);
	  	//paginate(PAGINATION_COUNT);
	  	 
	  	/*return view('categories.index')->with(
	  		$this->returnData($categories,"all categories"));
	  	*/return $this->returnData($sections,"all sections");
	  }
    public function create(){
    	return view('sections.create');
    }
    public function store(SectionsRequest $request){
    	Section::create([
    		'title'=>$request->title,
    		'description'=>$request->description,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("section created successfully.");
    }
    public function destroy($id){
    	$section=Section::find($id);
    	if(!$section)
    	return $this->returnError("section does not exist");
		$section->delete();    		
    	return $this->returnSuccessMessage("section deleted successfully.");
    }    
    public function edit(){
    	return view('sections.edit');
    }
    public function update(SectionsRequest $request,$id){
    	$section=Section::find($id);
    	if(!$section)
    	return $this->returnError("section does not exist");

    	$section->update([
    		'name'=>$request->name,
    		'description'=>$request->description,    		
    		'updated_at'=>Carbon::now()]);
    	return $this->returnSuccessMessage("section updated successfully.");
    }
}
