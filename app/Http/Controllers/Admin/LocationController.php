<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
       $locations=Location::selection()->paginate(PAGINATION_COUNT);
       return view('admin.location.index',compact('locations'));
    }
    public function create()
    {
        return view('admin.location.create');
    }
    public function store(LocationRequest $request)
    {
        try{
            if ($request->has('image'))
            {
                $file=$request->file('image');
                $ext=$file->getClientOriginalExtension();
                $file_name=time().'.'.$ext;
                $path="assets/images/locations/".$file_name;
                $file->move('assets/images/locations',$file_name);
            }
            $locations=Location::create([
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'sub_title_ar'=>$request->sub_title_ar,
                'sub_title_en'=>$request->sub_title_en,
                'link'=>$request->link,
                'phone_ar'=>$request->phone_ar,
                'phone_en'=>$request->phone_en,
                'location_ar'=>$request->location_ar,
                'location_en'=>$request->location_en,
                'image'=>$path
            ]);
            if($locations)
            {
                return redirect()->route('admin.locations')->with(['status'=>'Data Inserted Sucessfully']);
            }
            else
            {
                return redirect()->route('admin.locations')->with(['error'=>'Please Try Again']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('admin.locations')->with(['error'=>'something went wrong']);
        }

    }
    public function destroy($id)
    {
        try{
            $locations=Location::find($id);
            if(!$locations)
            {
                return redirect()->route('admin.locations')->with(['error'=>'Please Try Again']);
            }
            else
            {
               $locations->delete();
               return redirect()->route('admin.locations')->with(['status'=>'Data Deleted Sucessfully']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('admin.locations')->with(['error'=>'something went wrong']);
        }
    }
}
