<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	
	public function acConsole () {
		$data = DB::table("animals")->where("parent", "=", 0)->get();
		$attachdata = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("console.index")->with(["data" => $data, "attachdata" => $attachdata]);
	}
	

	public function acConsoleFormUpdate ($id) {
		$flag = 0;
		$data = DB::table("animals")->where("id", "=", $id)->first();
		$attachdata = DB::table("animals")->where("parent", "=", $data->id)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(["data" => $data,"attachdata" => $attachdata,'flag'=>$flag,"menu"=> $menu,'attachmenu' => $attachmenu]);
	}

	public function acConsoleFormAdd (Request $request) {
		$flag = 0;
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(['parent'=> $request->input("parent"),'flag'=>$flag,'menu'=>$menu, 'attachmenu' => $attachmenu]);
	}

	public function acAddPage () {
		$flag = 1;
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(['flag'=>$flag, 'menu'=>$menu, 'attachmenu' => $attachmenu]);
	}

	public function acSection (Request $request) {
		$flag = 2;
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(['parent'=> $request->input("parent"),'flag'=>$flag, 'menu'=>$menu, 'attachmenu' => $attachmenu]);
	}
	
	//admin/modification
	public function acDataModification (Request $request) {

		if ($request->input("parent") != "0" && $request->input("menu") == "2" && $request->input("id") == null) {	
			$id = DB::table("animals")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => '',
					'menu' =>  $request->input('menu'),
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'img' => ''
				]
			);
		
		}
		elseif ($request->input("parent") != "0" && $request->input("menu") == "2") {
			$id = $request->input("id");

			DB::table("animals")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => '',
					'menu' =>  $request->input('menu'),
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'img' => ''
				]
			);
		
		}
		elseif ($request->input("parent") == "0" && $request->input("id") == null) {
			$id = DB::table("animals")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => '',
					'menu' =>  $request->input('menu'),
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'img' => ''
				]
			);
		
		}
		elseif ($request->input("parent") == "0" && $request->input("id") != null) {
			$id = $request->input("id");

			DB::table("animals")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => '',
					'menu' =>  $request->input('menu'),
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'img' => ''
				]
			);
		
		}elseif ($request->input("id") != null) {
			
			if ($request->hasFile('image')) {
				$image = $request->file('image')->getClientOriginalName();
				$request->file('image')->move("img/asset/", $image);
			} else $image = $request->input('path');
			
			$id = $request->input("id");
			DB::table("animals")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'name' => $request->input('name'),
					'menu' =>  $request->input('menu'),
					'img' => $image
				]
			);
		}
		else{
			
			if ($request->hasFile('image')) {
				$image = $request->file('image')->getClientOriginalName();
				$request->file('image')->move("img/asset/", $image);
			} else $image = '';	
			
			$id = DB::table("animals")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'name' => $request->input('name'),
					'img' => $image,
					'parent' => $request->input('parent'),
					'menu' =>  $request->input('menu')
				]
			);
		
		}
		return redirect ('/console/update/'.$id);
	}

	function acDataDelete ($id) {
		DB::table("animals")->where("id", $id)->delete();
		DB::table("animals")->where("parent", $id)->delete();
		return back();
	}
	
}