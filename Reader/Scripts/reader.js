var currentContent = "";
var xhr = new XMLHttpRequest();
var request = new XMLHttpRequest();





 window.onload = function() {

    	var blogScreen = document.getElementById("blogpost");
    	xhr.open("GET", "getAllPosts.php?", false);
		xhr.send();
		
		returnblog = JSON.parse(xhr.response);
		
		request.open("GET", "getcomments.php?", false);
		request.send();

		returncomments = JSON.parse(request.response);

		jQuery('#blogpost').html('');
		for (var i = 0 ; i < returnblog.length ; i++) {
			//buitenste array
			var b = returnblog[i];

			console.log(b);
			//var c = returncomments[j];

			document.getElementById("blogpost").innerHTML += "<div class='new-post'>"+ b[2] + "</div>" + "<br>";
			document.getElementById("blogpost").innerHTML += "<div class='comment'><a href='commentsection.php?blogid=" + b[0] + "'>Comment</a></div>" + "<br>";

			for (var j = 0 ; j < returncomments.length ; j++) {
			//buitenste array
			var c = returncomments[j];
			console.log(c);
			if (c[2] == b[0]) {
				document.getElementById("blogpost").innerHTML += "<div class='new-comment'>"+c[1]+"</div>" + "<br>";
			}
		}
	}
}

function getBlogpost () {

    	var blogcategories = document.getElementById("categories").value;
    	var blogScreen = document.getElementById("blogpost");
    	xhr.open("GET", "getPostsbyCategory.php?", false);
		xhr.send();
		returnblog = JSON.parse(xhr.response);
		returnblog.reverse();

		console.log(xhr);

		jQuery('#blogpost').html('');
		for (var i = 0 ; i < returnblog.length ; i++) {
			//buitenste array
			var b = returnblog[i];

			if (blogcategories == b[1]) {
		
   				document.getElementById("blogpost").innerHTML += "<div class='new-post'>"+ b[2] + "</div>" + "<br>";
   				document.getElementById("blogpost").innerHTML += "<div class='comment'><a href='commentsection.php?blogid=" + b[0] + "'>Comment</a></div>" + "<br>";

	   			for (var j = 0 ; j < returncomments.length ; j++) {
				//buitenste array
				var c = returncomments[j];
				console.log(c);
				if (c[2] == b[0]) {
					document.getElementById("blogpost").innerHTML += "<div class='new-comment'>"+c[1]+"</div>" + "<br>";
				}
			}
   			}
		}
}

