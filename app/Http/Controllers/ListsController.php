<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_;
use App\Http\Requests\ListsRequest;
use App\Http\Traits\JSONTrait;
use Carbon\Carbon;
use App\Http\Traits\ImagesTrait;
use Illuminate\Support\Facades\File;

class ListsController extends Controller
{
	  use JSONTrait,ImagesTrait;

	  public function index(){
	  	$lists=List_::all();
	  	//paginate(PAGINATION_COUNT);
	  	 
	  	/*return view('categories.index')->with(
	  		$this->returnData($categories,"all categories"));
	  	*/return $this->returnData($lists,"all lists");
	  }
    public function create(){
    	return view('lists.create');
    }
    public function store(ListsRequest $request){
  	$photo_name=null;
  	$list=List_::last();
 	if($request->has('photo') )
  	{	if(!$list)
  		$photo_name=1;
  		else $photo_name=$list->id + 1;
  		$photo_name=$photo_name.'.'.$request->photo->getClientOriginalExtension();
  		$this->saveImage($photo_name,$request->photo,lists_path);
  	}
    	List_::create([
    		'title'=>$request->title,
    		'photo'=>$photo_name,
    		'description'=>$request->description,
            'section_id'=>$request->section_id,
    		'created_at'=>Carbon::now(),
    		'updated_at'=>Carbon::now(),
    	]);
    	return $this->returnSuccessMessage("list created successfully.");
    }
    public function destroy($id){
    	$list=List_::find($id);
    	if(!$list)
    	return $this->returnError("list does not exist");
        		File::delete(lists_path.$list->photo);
		$list->delete();    		
    	return $this->returnSuccessMessage("list deleted successfully.");
    }    
    public function edit(){
    	return view('lists.edit');
    }
    public function update(ListsRequest $request,$id){
    	$list=List_::find($id);
    	if(!$list)
    	return $this->returnError("list does not exist");
    	$photo=lists_path.$list->photo;
    	if($request->has('photo')){
    		File::delete($photo);
    		$photo_name=$list_id.'.'.$request->photo->getClientOriginalExtension();
  		$this->saveImage($photo_name,$request->photo,lists_path);
 
    	}
    	$list->update([
    		'title'=>$request->title,
    		'photo'=>$photo_name,
    		'description'=>$request->description,
            'section_id'=>$request->section_id,
            
    		'updated_at'=>Carbon::now()]);
    	return $this->returnSuccessMessage("list updated successfully.");
    }    
}
