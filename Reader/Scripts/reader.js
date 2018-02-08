var currentContent = "";
var xhr = new XMLHttpRequest();





 window.onload = function() {

    	var blogScreen = document.getElementById("blogpost");
    	xhr.open("GET", "reader.php?", false);
		xhr.send();
		returnblog = JSON.parse(xhr.response);
		returnblog.reverse();

		jQuery('#blogpost').html('');
		for (var i = 0 ; i < returnblog.length ; i++) {
			var b = returnblog[i];

			document.getElementById("blogpost").innerHTML += "<div class='new-post'>"+ b[1] + "</div>" + "<br>";
			
		}

}

function getBlogpost () {

    	var blogcategories = document.getElementById("categories").value;
    	var blogScreen = document.getElementById("blogpost");
    	xhr.open("GET", "reader2.php?", false);
		xhr.send();
		returnblog = JSON.parse(xhr.response);
		returnblog.reverse();

		jQuery('#blogpost').html('');
		for (var i = 0 ; i < returnblog.length ; i++) {
			//buitenste array
			var b = returnblog[i];

			if (blogcategories == b[1]) {
		
   				document.getElementById("blogpost").innerHTML += "<div class='new-post'>"+ b[2] + "</div>" + "<br>";
   			
   			}
		}
}

/*function commentBlogpost(e){
	if(e.target.classList.contains('commentbutton')){
		commentAddFormDiv.style.display = "block";
}*/











/*function editEntry(e){
		// Remove old entry from the addressbook
		if(e.target.classList.contains('editbutton')){
			var editcontact = e.target.getAttribute('contactedit');
			localStorage['addbook'] = JSON.stringify(addressBook);
			document.getElementById("fullname").value = addressBook[e.target.getAttribute("contactedit")].fullname;
			document.getElementById("phone").value = addressBook[e.target.getAttribute("contactedit")].phone;
			document.getElementById("address").value = addressBook[e.target.getAttribute("contactedit")].address;
			document.getElementById("email").value = addressBook[e.target.getAttribute("contactedit")].fullname;
			// adds new entry to the addressbook has to be completely filled
			contactAddFormDiv.style.display = "block";
			// to make the cancel button dissappear for editing it causes errors otherwise
			Cancel.style.display = "none";
			addressBook.splice(editcontact,1);
			document.getElementById("fullname").innerHTML = fullname.value;
		}
	}*/