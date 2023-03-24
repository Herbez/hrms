<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Crypt;
 
class JobTitleController extends Controller
{
    //
    function getAllJobTitle(){
        
        // return JobTitle::all();
        return view('jobTitle',['job_titles'=>JobTitle::all()]);
    }

    function saveJobTitle(Request $request){
        JobTitle::create([
            'job_title_name'=>$request->title,
            'description'=>$request->description,
            
        ]);
        return redirect('/jobTitle')->with('success','Job Added Successfully !');
    }

    function deleteJobTitle($id){
        JobTitle::findOrFail(Crypt::decrypt($id))->delete();
        return redirect('/jobTitle')->with('danger','Job Deleted Successfully !');
    }
 
    
    function editJobTitle($id){
        return view('edit-jobTitle',[
            'job_title'=>JobTitle::findOrFail(Crypt::decrypt($id))
        ]);
    }

    function updateJobTitle(Request $request){
        JobTitle::where('id',Crypt::decrypt($request->job_title_id))->update([
                'job_title_name'    =>  $request->job_title_name,
                'description'       =>  $request->description,
            ]);
            return redirect('/jobTitle')->with('info','Job Updated Successfully !');
    }
}
