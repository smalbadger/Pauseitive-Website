function check_passwords(){
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. Set the color to the good color and inform the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match. Set the color to the bad color and notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}

// Remove all DOM-tree child elements from the parent (by id string).
function clear(parentId) {
	var parent = $(parentId);
	if (parent)
		for (var c = parent.firstChild; c; c = parent.firstChild)
			parent.removeChild(c);
}

// Callback function for successful reply.
// (Merge AJAX response into current page.)
function ajaxCompleted(ajax) {
	var resp = JSON.parse(ajax.responseText);
	console.log(ajax.responseText);
	console.log(resp);
	console.log(resp.User_Name);
	var stat = "";
	if (resp.User_Name){
		stat = "Name " + resp.User_Name + " is in use.";
		$("username_status").textContent = stat;
		$("username_status").style.color = "#ff6666";
		$("username").style.backgroundColor="#ff6666";
		$("submit").disabled = true;
	}
	else{
		$("username_status").textContent = stat;
		$("username_status").style.color = "#ffffff";
		$("username").style.backgroundColor="#ffffff";
		$("submit").disabled = false;
	}
}

// Callback function if AJAX fails or results are unreadable.
// If it did not work, show why.
function ajaxFailed(ajax) {
    console.log(ajax);
	$('errors').textContent = ajax.status + " " + ajax.statusText;
    $('errors').style.color = "red";
}

function ajaxExcept(ajax) {
    console.log(ajax);
	$('errors').textContent = ajax.status + " " + ajax.statusText;
    $('errors').style.color = "red";
}

function check_username_availability(event) {
	// Input has changed so erase prior status
	clear("username_status");
	clear("errors");

	// read username
	var U_name = $("username").value;

	// Only bother making a query if something is entered:
	if (U_name) {
		/*
		 * Set up and launch the Ajax request using the prototype.js
		 * helper class.  The parameters field consists of stuff to POST.
		 */
		new Ajax.Request(
			"database.php",
			{
				onSuccess: ajaxCompleted,
				//onFailure: ajaxFailed,
				//onException: ajaxExcept,
				parameters:
				{
					name: U_name
				}
			}
		);
	}
}
