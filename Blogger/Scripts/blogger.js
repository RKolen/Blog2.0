var xhr = new XMLHttpRequest();
var request = new XMLHttpRequest();

function submitMessage() {

	var categories = document.getElementById("categories").value;
   // blogposts = tinymce.get('blogposts').getContent({format: 'raw'});
	blogposts = document.getElementById("blogposts").value;
	xhr.open("POST", "blogger.php?categories=" + categories + "&blogposts=" + blogposts, false);
	xhr.send();
}

shortcuts = {
    "ccg" : "Collectible Card Game",
    "nfl" : "National Football League",
    "nl"  : "Nederland",
    "cg"  : "CodeGorilla",
    "gn"  : "Groningen",
    "swe" : "Zweden",
    "uk"  : "Verenigd Koninkrijk",
    "bg"  : "Board Game",
    "rpg" : "roleplaying Game",
    "ed"  : "Eredivisie",
    "pl"  : "Premier League"
}


window.onload = function() {
    var ta = document.getElementById("blogposts");
    var timer = 0;
    var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");
    

    
    update = function() {
        ta.value = ta.value.replace(re, function($0, $1) {
            return shortcuts[$1.toLowerCase()];
        });
    }
    
    ta.onkeydown = function() {
        clearTimeout(timer);
        timer = setTimeout(update, 200);

    }

    var blogScreen = document.getElementById("blogpost");
        xhr.open("GET", "getAllPosts.php?", false);
        xhr.send();
        
        returnblog = JSON.parse(xhr.response);
        returnblog.sort();
        request.open("GET", "getcomments.php?", false);
        request.send();
        //console.log(returnblog);
        returncomments = JSON.parse(request.response);

        jQuery('#blogpost').html('');
        for (var i = 0 ; i < returnblog.length ; i++) {
            //buitenste array
            var b = returnblog[i];
        
                document.getElementById("blogpost").innerHTML += "<div class='new-post'>"+ b[2] + "</div>" + "<br>";
                document.getElementById("blogpost").innerHTML += "<div class='comment'><a href='commentsection.php?blogid=" + b[0] + "'>Comment</a></div>" + "<br>";

                for (var j = 0 ; j < returncomments.length ; j++) {
                //buitenste array
                var c = returncomments[j];
                
                if (c[2] == b[0]) {
                    document.getElementById("blogpost").innerHTML += "<div class='new-comment'>"+c[1]+"</div>" + "<form action='deletecomment.php?commentid=" + c[0] +"' method ='POST'>" + "<input type='submit' value='Delete'></div>" +"<br>";//add a delete button here
                }
            }
            
        }
}
function loadBlogForm(){ // displays de blogform page and closes the blog overview page
        document.getElementById("input-post").style.display = "block";
        document.getElementById("blogpost").style.display = "none";
    }

function getBlog(){ // displays de blogform page and closes the blog overview page
        document.getElementById("input-post").style.display = "none";
        document.getElementById("blogpost").style.display = "block";
    }
