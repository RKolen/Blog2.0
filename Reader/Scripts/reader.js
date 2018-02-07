var currentContent = "";
var xhr = new XMLHttpRequest();

 window.onload = function() {

		var blogcategories = document.getElementById("categories").value;
    	var blogScreen = document.getElementById("blogpost");
    	xhr.open("GET", "reader.php?", false);
		xhr.send();
		returnblog = JSON.parse(xhr.response);
		returnblog.reverse();

		jQuery('#blogpost').html('');
		for (var i = 0 ; i < returnblog.length ; i++) {
			var b = returnblog[i];
			document.getElementById("blogpost").innerHTML += "<div class='new-post'>"+ b[2] + "</div>" + "<br>";
   			
  
   			
		}
}

function getBlogpost () {

    	var blogcategories = document.getElementById("categories").value;
    	var blogScreen = document.getElementById("blogpost");
    	xhr.open("GET", "reader.php?", false);
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