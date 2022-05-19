<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller{
	public function acMain(){
		$data = DB::table("animals")->where("name", "schastie_i_zdorovie")->first();
		$posts = DB::table("animals")->orderBy('id','desc')->where("name", "=", $data->name)->limit(3)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $posts,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acBlog(){
		$data = DB::table("animals")->where("name", "ovcharka")->first();
		$posts = DB::table("animals")->orderBy('id','desc')->where("name", "=", $data->name)->limit(3)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $posts,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acPorodi(){
		$data = DB::table("animals")->where("name","=", "porodicats")->first();
		$attachdata = DB::table("animals")->where("parent", "=", $data->id)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("porodi")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acAllprocats(){
		$data = DB::table("animals")->where("name", "Cats")->first();
		$attachdata = DB::table("animals")->where("name", "=", $data->name)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("allprocats")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acDogs(){
		$data = DB::table("animals")->where("name", "kotIDog")->first();
		$attachdata = DB::table("animals")->where("name", "=", $data->name)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acAquarium(){
		$data = DB::table("animals")->where("name", "akvarium")->first();
		$attachdata = DB::table("animals")->where("name", "=", $data->name)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acTerrarium(){
		$data = DB::table("animals")->where("name", "vvedTer")->first();
		$attachdata = DB::table("animals")->where("name", "=", $data->name)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acBirds(){
		$data = DB::table("animals")->where("name", "popug")->first();
		$attachdata = DB::table("animals")->where("name", "=", $data->name)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acInteractive(){
		$data = DB::table("animals")->where("name", "dysha")->first();
		$attachdata = DB::table("animals")->where("name", "=", $data->name)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("interactive")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acInteractivePhoto(){
		$data = DB::table("animals")->where("name","=", "funanimals")->first();
		echo $data->id;
		$attachdata = DB::table("animals")->where([
			"parent" => $data->id

		])->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("photoanimals")->with([
			"data" 			=> $data, 
			"attachdata" 	=> $attachdata,
			"menu" 			=> $menu, 
			"attachmenu"	=> $attachmenu
		]);
	}

	public function acAboutsites(){
		$data = DB::table("animals")->where("name", "absite")->first();
		$attachdata = DB::table("animals")->where("parent", "=", $data->id)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("aboutsites")->with(["data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acNewPage($name){
		$data = DB::table("animals")->where("name","=", $name)->first();
		$attachdata = DB::table("animals")->where("parent", "=", $data->id)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("newPage")->with(['name'=>$name,"data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acNewRazdel($name, $razdel){
		$data = DB::table("animals")->where("name","=", $razdel)->first();
		$attachdata = DB::table("animals")->where("parent", "=", $data->id)->get();
		$menu = DB::table("animals")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("animals")->where("parent", "!=", 0)->get();
		return view("newPage")->with(['name'=>$razdel,"data" => $data, "attachdata" => $attachdata,"menu" => $menu, "attachmenu" => $attachmenu]);
	}
}

?>