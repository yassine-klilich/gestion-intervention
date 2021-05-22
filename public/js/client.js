let myTable;

$(document).ready(function() {
	myTable = $('#client-table').DataTable();
});

var clientModal = document.getElementById('clientModal');
clientModal.addEventListener('show.bs.modal', function (event) {
  const directorName = document.getElementById("directorName");
	const companyName = document.getElementById("companyName");
	const email = document.getElementById("email");
	const tele = document.getElementById("tele");
	const address = document.getElementById("address");
	const pid = document.getElementById("pid");
	const submitBtn = document.getElementById("submit-btn");
	const form = document.getElementById("form");

	var button = event.relatedTarget;
  var recipient = button.getAttribute('data-bs-whatever');
	
	switch (recipient) {
		case "add": {
			form.setAttribute("action", "newClient");
			submitBtn.textContent = "Ajouter";
			directorName.value = "";
			companyName.value = "";
			email.value = "";
			tele.value = "";
			address.value = "";
		} break;

		case "edit": {
			form.setAttribute("action", "editClient");
			submitBtn.textContent = "Modifier";
			pid.value = button.dataset.pid;
			directorName.value = button.dataset.directorName;
			companyName.value = button.dataset.companyName;
			email.value = button.dataset.email;
			tele.value = button.dataset.tele;
			address.value = button.dataset.address;
		} break;
	}
})

function deleteClientAjax(id) {
	if(confirm("Are you sure you want to delete this ?") == true) {
		fetch("/deleteClient/" + id, {
			method: "DELETE",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})
		.then(()=>{
			myTable.row("#row-" + id).remove().draw();
		})
		.catch((err)=>{
			console.error(err);
		})
	}

}