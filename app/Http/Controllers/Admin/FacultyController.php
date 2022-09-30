<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use Exception;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties=Faculty::select()->paginate(PAGINATION_COUNT);
        return view('admin.faculty.index',compact('faculties'));
    }
    public function create()
    {
        return view('admin.faculty.create');
    }
    public function store(FacultyRequest $request)
    {
        try{
            if ($request->has('image'))
            {
                $file=$request->file('image');
                $ext=$file->getClientOriginalExtension();
                $file_name=time().'.'.$ext;
                $path="assets/images/faculity/".$file_name;
                $file->move('assets/images/faculity',$file_name);
            }
            $faculties=Faculty::create([
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'sub_title_ar'=>$request->sub_title_ar,
                'sub_title_en'=>$request->sub_title_en,
                'link'=>$request->link,
                'phone_ar'=>$request->phone_ar,
                'phone_en'=>$request->phone_en,
                'location_ar'=>$request->location_ar,
                'location_en'=>$request->location_en,
                'description_ar'=>$request->description_ar,
                'description_en'=>$request->description_en,
                'image'=>$path
            ]);
            if($faculties)
            {
                return redirect()->route('admin.faculties')->with(['status'=>'Data Inserted Sucessfully']);
            }
            else
            {
                return redirect()->route('admin.faculties')->with(['error'=>'Please Try Again']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('admin.faculties')->with(['error'=>'something went wrong']);
        }

    }
    public function destroy($id)
    {
        try{
            $faculties=Faculty::find($id);
            if(!$faculties)
            {
                return redirect()->route('admin.faculties')->with(['error'=>'Please Try Again']);
            }
            else
            {
                $faculties->delete();
                return redirect()->route('admin.faculties')->with(['status'=>'Data Deleted Sucessfully']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('admin.faculties')->with(['error'=>'something went wrong']);
        }
    }
}
