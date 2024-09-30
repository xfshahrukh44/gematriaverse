function NumberSuffix(impVal) {
	let sVal = String(impVal)
	let sVal2 = Number(sVal.substring(sVal.length - 2))

	switch (sVal2) {
		case 11:
		case 12:
		case 13:
			return "th"; break;
		default:
			switch (Number(sVal.substring(sVal.length - 1))) {
				case 0:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
					return "th"; break
				case 1:
					return "st"; break
				case 2:
					return "nd"; break
				case 3:
					return "rd"; break
			}
	}
}

function StandardizeSeqItems() {
	for (let x = 0; x < seqItems.length; x++) {
		seqItems[x] = seqItems[x].replaceAll("_", " ")
	}
}

function PrimeFactors() {
	let factArr = [[primeArr[0], 1]], strArr = [], rStr = ""

	for (x = 1; x < primeArr.length; x++) {
		thisFact = primeArr[x]
		if (thisFact == factArr[factArr.length - 1][0]) {
			factArr[factArr.length - 1][1]++
		} else {
			factArr.push([thisFact, 1])
		}
	}

	for (let thisFactor of factArr) {
		if (thisFactor[1] > 1) {
			strArr.push(String(thisFactor[0]) + String(thisFactor[1]).sup())
		} else {
			strArr.push(String(thisFactor[0]))
		}
	}
	
	return strArr.join(" × ")
}

function HighlightLink(impNum) {
	return '<a class="RegularLink" href="javascript:Open_Properties(' + impNum + ')">' + impNum + '</a>'
}

function NavNumber(impNum = document.getElementById("NumberField").value) {
	if (impNum > 0 && impNum < 1000000) {window.location = '?number=' + impNum}
}

function CheckEnter(impEvent) {
	if (impEvent.key == "Enter") {
		NavNumber()
	}
}

function Open_Properties(impNum) {
	let iHTML = ""
    if (impNum > 0 && impNum < 10000000) {
        document.getElementById("NumberField").value = impNum
        NavNumber()
    }
}