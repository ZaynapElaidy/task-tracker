<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Task;

class TasksController extends controller {
	public function __construct(){
		$this->middleware("auth");
	}
	public function index(){
		//return DB::$table("Task")->all();
	    $Tasks=Task::where('user_id', Auth::id())->get();
		return view("Tasks",compact('Tasks'));
	}

	public function add( Request $request){
       //dd($request->all());
		$this->validate($request,[
			"name"=>'required|min:3'
			]);
		$name=$request->input('name');
		$Task=new Task();
		$Task->name=$name;
		$Task->user_id=Auth::id();
		$result=$Task->save();
		
		return back();
       
      // dd($request->get('name'));
       
	}
	
	public function delete($id){
       $Task= Task::find($id);
       $Task->delete();
       return back();
	}
	public function edit($id){
		$task =Task::find($id);

		return view("edit" , compact("task"));

	}
	public function update(request $request){
		
		$Task=Task::find($request->id);
		$Task->name=$request->name;
		$Task->save();
		return redirect("/");
	}




}