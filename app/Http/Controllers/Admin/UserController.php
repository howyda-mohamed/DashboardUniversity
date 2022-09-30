<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User ;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::selection()->paginate(PAGINATION_COUNT);
        return view('admin.users.index',compact('users'));
    }
    public function destroy($id)
    {
        try{
            $users=User::find($id);
            if(!$users)
            {
                return redirect()->route('admin.users')->with(['error'=>'Please Try Again']);
            }
            else
            {
               $users->delete();
               return redirect()->route('admin.users')->with(['status'=>'Data Deleted Sucessfully']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('admin.users')->with(['error'=>'something went wrong']);
        }
    }

}
