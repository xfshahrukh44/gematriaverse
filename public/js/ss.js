function OpenImg(impName) {
	window.scrollTo(0, 0);
	var imageURL,imgName, wnd
	let thisMark
	element = document.getElementById("printBreakTable")

	if ( jQuery(element).length == 0) {return}
	html2canvas(jQuery(element)[0], {allowTaint: true, scale: 1, backgroundColor: null, width: jQuery(element).outerWidth() + 0, height: jQuery(element).outerHeight()} ).then((canvas) => {

	    imageURL = canvas.toDataURL("image/png");
	    imgName = impName + ".png"

	    wnd = window.open("");
	    wnd.document.body.innerHTML = "<div style='max-height: 100%; max-width: 100%; position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%,-50%); transform: translate(-50%,-50%);'><center><br><a href='" + imageURL + "' download='" + imgName + "' style='font-family: arial, sans-serif; color: #dedede' >Download</a></center><br><img id='markit' src=" + canvas.toDataURL("image/png") + ">";
	    wnd.document.body.style.backgroundColor = "RGB(34, 34, 34)";
	    wnd.document.title = impName + " | Gematrinator 85";
	});
}

function OpenHistoryImg() {
	window.scrollTo(0, 0);

	var imageURL,imgName, wnd
	element = document.getElementById("printHistoryTable")

	if ( jQuery(element).length == 0) {return}
	html2canvas(jQuery(element)[0], {allowTaint: true, scale: 1, backgroundColor: null, width: jQuery(element).outerWidth() + 0, height: jQuery(element).outerHeight()} ).then((canvas) => {
	    
	    imageURL = canvas.toDataURL("image/png");
	    imgName = "history_" + getTimestamp()+".png";

	    wnd = window.open("");
	    wnd.document.body.innerHTML = "<div style='max-height: 100%; max-width: 100%; position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%,-50%); transform: translate(-50%,-50%);'><center><br><a href='" + imageURL + "' download='" + imgName + "' style='font-family: arial, sans-serif; color: #dedede' >Download</a></center><br><img src=" + canvas.toDataURL("image/png") + "></div>";
	    wnd.document.body.style.backgroundColor = "RGB(34, 34, 34)";
	    wnd.document.title = "Gematria History Table | Gematrinator 85";
	});
}

function getTimestamp() {
	var ts = new Date().toISOString()
	var regexp = new RegExp("\\..*?$", 'g')
	ts = ts.replace("T", "_").replaceAll(/:/g, "-").replace(regexp, "")
	return ts
}