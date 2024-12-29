<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

use App\Models\Laptop;
use App\Models\Course;
use App\Models\Company;

class LaptopController extends Controller
{
  public function index($course_id)
  {
    $course = Course::find($course_id);

    $laptops = ($course->code == "all")
      ? Laptop::all()
      : $laptops = Laptop::where('course_id', $course_id)->get();

    return view("laptop.index")->with(compact("laptops", 'course'));
  }

  public function admin()
  {
    $laptops = Laptop::all();
    $companies = Company::all();
    $courses = Course::all();
    return view("admin.laptops", compact("laptops", "companies", "courses"));
  }

  public function details($laptop_id)
  {
    $laptop = Laptop::find($laptop_id);
    $reviews = Review::where("laptop_id", $laptop_id)->get();
    return view("laptop.details")->with(compact("laptop", "reviews"));
  }

  public function edit($laptop_id)
  {
    $laptop = Laptop::find($laptop_id);
    $companies = Company::all();
    $courses = Course::all();
    return view("admin.laptop_details")->with(compact("laptop", "companies", "courses"));
  }

  public function create(Request $request)
  {
    $laptop = new Laptop();
    $laptop->model = $request->input("model");
    $laptop->img_url = $request->input("img_url");
    $laptop->url = $request->input("url");
    $laptop->price = $request->input("price");
    $laptop->desc = $request->input("desc");
    $laptop->company_id = $request->input("company_id");

    $company = Company::find($laptop->company_id);
    $laptop->brand = $company->name;
    $laptop->course_id = $request->input("course_id");
    $laptop->save();

    return redirect()->back()->with("success", "Laptop created successfully");
  }

  public function update(Request $request, $id)
  {
    $laptop = Laptop::find($id);
    $laptop->model = $request->input("model");
    $laptop->img_url = $request->input("img_url");
    $laptop->url = $request->input("url");
    $laptop->price = $request->input("price");
    $laptop->desc = $request->input("desc");
    $laptop->company_id = $request->input("company_id");

    $company = Company::find($laptop->company_id);
    $laptop->brand = $company->name;
    $laptop->course_id = $request->input("course_id");
    $laptop->save();

    return redirect()->route("admin.laptops")->with("success", "Laptop updated successfully");
  }

  public function destroy($id)
  {
    $feetype = Laptop::findOrFail($id);
    $feetype->delete();

    return redirect()->back()->with("success", "Laptop deleted successfully");
  }


}
