<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserAuth extends Controller
{
  public function userLogin(Request $req)
	{
		$data = $req->input();
		$result = Users::where('username', $data["username"])->where('password', $data["password"])->first();
		if($result == NULL) {
			return redirect("login");
		}
		else {
			$req->session()->put("user", $result->userName);
			return redirect("home");
		}
	}
}
