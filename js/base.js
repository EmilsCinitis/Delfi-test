
function clearErrors(){ //Notīra visas iepriekšējās kļūdas, kuras apzīmē ar klasi "error"
	$(".error").remove();
}

function renderErrors(errors) {
	for(let i = 0; i < errors.length; i++){
		$("#errors").append("<div class='error'> &raquo; " + errors[i] + "</div>").show(); //Katrai kļūdai pievieno klasi "error"
	}
}

function validateForm() {
	//Noņemts mainīgais result, jo tas netiek izmantots
	const errors = [];

	//Padarīts pārskatāmāks
	const fullName = $("#full-name").val();
	let cellNr = $("#cell-nr").val();
	const message = $("#message").val();

	//Mainīts uz jQuery parastā JavaScript vietā
	if ( !fullName ) errors.push("Lauks 'Vārds, Uzvārds' ir jānorāda obligāti"); //Labots teksts
	if ( !cellNr ) errors.push("Lauks 'Telefona numurs' ir jānorāda obligāti");
	if ( !message ) errors.push("Lauks 'Ziņojums' ir jānorāda obligāti");
	if ( cellNr.length != 8 ) errors.push("Laukā 'Telefona numurs' ir jābūt numuram ar 8 cipariem!"); // Pievienota jauna kļūda
	
	cellNr = parseInt(cellNr);
	if( cellNr < 20000000 || cellNr > 69999999 ) errors.push("Laukā 'Telefona numurs' ir jābūt pareizam telefona numuram!"); // Pievienota jauna kļūda

	if (!errors.length) { //Mainīts masīva pārbaudes veids, ja garums ir 0, tad nav kļūdu, ja garums nav 0, tad ir kļūdas
		return true;
	} else {
		clearErrors(); //Notīra kļūdas pirms pievieno jaunās kļūdas
		renderErrors(errors);
		return false;
	}
}

//Noņemts window.onload, jo tas bija lieks un tas neko nedarīja