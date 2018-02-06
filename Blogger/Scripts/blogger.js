
var xhr = new XMLHttpRequest();

function submitMessage() {

	var categories = document.getElementById("categories").value;
    blogposts = tinymce.get('blogposts').getContent({format: 'raw'});
	//blogposts = document.getElementById("blogposts").value;
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

    
}
