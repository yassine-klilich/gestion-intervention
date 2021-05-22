<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientController extends Controller
{
	public function postClient(Request $req) {
		$data = $req->input();

		$query = DB::table("clients")->insert([
			"directorName"=>$data["directorName"],
			"companyName"=>$data["companyName"],
			"email"=>$data["email"],
			"tele"=>$data["tele"],
			"address"=>$data["address"]
		]);

		if($query) {
			return redirect("client");
		}
		else {
			return "Error";
		}
	}

	public function editClient(Request $req)
	{
		$data = $req->input();

		$query = DB::update(
			'update clients 
			set directorName = ?,
			companyName = ?,
			email = ?,
			tele = ?,
			address = ?
			where pid = ?',
			[$data["directorName"], $data["companyName"], $data["email"], $data["tele"], $data["address"], $data["pid"]]
		);

		if($query) {
			return redirect("client");
		}
		else {
			return "Error";
		}
	}
	
	public function deleteClient($pid) {
		$query = DB::table('clients')->where('pid', $pid)->delete();
	}

	public function clients(Request $req)
	{
		$data = Client::all();
		return view("client", ["clients"=>$data]);
	}

}
