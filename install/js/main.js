// Make this function external like I did in the video
function _(x){
	return document.getElementById(x);
}

// And all over the site from now on you can get html elements by their id by simply using
_("div1").innerHTML = "Hello World";