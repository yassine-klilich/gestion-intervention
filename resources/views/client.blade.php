<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link href="./css/app.css" rel="stylesheet"/>

</head>
<body>
	<div class="container-fluid p-0 body-content">
		<x-navigation/>
		<main class="p-2">
			<div class="d-flex justify-content-between">
				<h4>Gestion Clients</h4>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientModal" data-bs-whatever="add">Ajouter Client</button>
			</div>
			<div class="mt-4">
				<table id="client-table" class="table table-striped">
					<thead>
						<tr>
							<th>Director Name</th>
							<th>Company Name</th>
							<th>Email</th>
							<th>Tele</th>
							<th>Address</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($clients as $client)
					<tr id="row-{{$client["pid"]}}">
						<td>{{$client["directorName"]}}</td>
						<td>{{$client["companyName"]}}</td>
						<td>{{$client["email"]}}</td>
						<td>{{$client["tele"]}}</td>
						<td>{{$client["address"]}}</td>
						<td><button 
							class="btn btn-primary" 
							data-bs-toggle="modal" 
							data-bs-target="#clientModal" 
							data-bs-whatever="edit" 
							data-pid="{{$client["pid"]}}"
							data-director-name="{{$client["directorName"]}}"
							data-company-name="{{$client["companyName"]}}"
							data-email="{{$client["email"]}}"
							data-tele="{{$client["tele"]}}"
							data-address="{{$client["address"]}}"
						>Modifier</button></td>
						<td><button class="btn btn-danger" onclick="deleteClientAjax('{{$client["pid"]}}')">Supprimer</button></td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</main>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ajouter Client</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" id="form">
						@csrf
						<input type="hidden" name="pid" id="pid">
						<div class="mb-3">
							<label for="directorName" class="form-label">Director Name</label>
							<input type="text" class="form-control" name="directorName" id="directorName">
						</div>
						<div class="mb-3">
							<label for="companyName" class="form-label">Company Name</label>
							<input type="text" class="form-control" name="companyName" id="companyName">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" id="email">
						</div>
						<div class="mb-3">
							<label for="tele" class="form-label">Telephone</label>
							<input type="text" class="form-control" name="tele" id="tele">
						</div>
						<div class="mb-3">
							<label for="address" class="form-label">Address</label>
							<textarea class="form-control" name="address" id="address"></textarea>
						</div>
						<div class="d-flex justify-content-end">
							<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="./libs/jquery-3.6.0/jquery-3.6.0.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script src="./js/client.js"></script>

</body>
</html>