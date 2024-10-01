var arrC1 = []; arrC2 = []; arrC3 = [];
var impArr = [];
var lastWidth = 0

function Open_NumProps() {
	Open_Properties(3)
}

function Open_Content(impLink) {
	window.open(impLink)
}

function Header_Load() {
	Get_Links()
}

function Get_Links() {
	var cVal

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			cVal = xhttp.responseText;
			impArr = cVal.split("|&|");
			Populate_Recent();
		}
	};
}

function Populate_Recent() {
	var x = 0;
	var z = 0;

	if (arrC1.length > 1) {
		return
	}

	for (x = 0; x < impArr.length; x++) {
		switch (z) {
			case 0:
				z++
				arrC1.push(impArr[x])
				break;
			case 1:
				z++
				arrC2.push(impArr[x])
				break;
			case 2:
				z = 0
				arrC3.push(impArr[x])
				break;
		}
	}

	var RSpot = document.getElementById("RecentLinks");
	var y, yStr, yCat;

	yStr = "";

	for (y = 0; y < arrC1.length; y++) {
		if (arrC3[y] == "Blog Post") {
			yCat = "Blog";
		} else {
			yCat = arrC3[y];
		}
		yStr += '<div class="' + yCat + '"><a href="javascript:Open_Content(' + "'" + arrC1[y] + "'" + ')">' + arrC2[y] + '</a></div>';
	}

	RSpot.innerHTML = yStr;
}

function setSliders (){
	if (window.innerWidth !== lastWidth) {
		if (window.matchMedia("(max-width: 991px)").matches) {
		    var x = document.getElementById('tablesContainer');
		    var y = document.getElementById('functionsContainer');
		    x.style.left = "-305px";
		    y.style.right = "-305px";
		} else {
		    var x = document.getElementById('tablesContainer');
		    var y = document.getElementById('functionsContainer');
		    x.style.left = "-30%";
		    y.style.right = "-30%";
		}
	}
	lastWidth = window.innerWidth
}

window.addEventListener('resize', setSliders)

/*
window.addEventListener('resize', function(event) {
	if (window.matchMedia("(max-width: 991px)").matches) {
	    var x = document.getElementById('tablesContainer');
	    var y = document.getElementById('functionsContainer');
	    x.style.left = "-305px";
	    y.style.right = "-305px";
	} else {
	    var x = document.getElementById('tablesContainer');
	    var y = document.getElementById('functionsContainer');
	    x.style.left = "-30%";
	    y.style.right = "-30%";
	}
});
*/

//Header_Load();

// window.addEventListener('load', (event) => Page_Launch());

window.addEventListener("beforeunload", function() {
    Update_Options()
    //Update_History()
    Send_Ciphers()
});
