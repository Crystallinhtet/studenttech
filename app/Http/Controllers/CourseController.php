<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Laptop;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        // return redirect()->route("user.index")->with(compact("users"));
        return view("study_field", compact("courses"));
    }

    public function findLaptop($course_id)
    {
        $course = Course::find($course_id);
        $laptops = Laptop::where('course_id', $course_id)->get();
        return view("laptop.index")->with(compact("laptops", 'course'));
   }

   public function admin()
   {
       $courses = Course::all(); 
       return view("admin.courses", compact("courses"));
   }

   
   public function create(Request $request)
   {
       $company = new Course();
       $company->code = $request->input("code");
       $company->name = $request->input("name");
       $company->save();

       return redirect()->back()->with("success", "");
   }

   public function update(Request $request, $id)
   {
       $company = Course::findOrFail($id);
       $company->code = $request->input("code");
       $company->name = $request->input('name');
       $company->save();

       return redirect()->back()->with("success", "");
   }

   public function delete($id)
   {
       $feetype = Course::findOrFail($id);
       $feetype->delete();

       return redirect()->back()->with("success", "");
   }

}
