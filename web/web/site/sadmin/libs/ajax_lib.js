Element.prototype.remove = function () {

	this.parentElement.removeChild(this);

}



window.ajaxCount = 0;



NodeList.prototype.remove = HTMLCollection.prototype.remove = function () {

	for (var i = 0, len = this.length; i < len; i++) {

		if (this[i] && this[i].parentElement) {

			this[i].parentElement.removeChild(this[i]);

		}

	}

}



function insertAfter(elem, refElem) {

	var parent = refElem.parentNode;

	var next = refElem.nextSibling;

	if (next) {

		return parent.insertBefore(elem, next);

	} else {

		return parent.appendChild(elem);

	}

}



function extractDomain(url) {

	var domain;

	if (url.indexOf("://") > -1) {

		domain = url.split('/')[2];

	} else {

		domain = url.split('/')[0];

	}

	domain = domain.split(':')[0];

	return domain;

}





NodeList.prototype.remove = HTMLCollection.prototype.remove = function () {

	for (var i = 0, len = this.length; i < len; i++) {

		if (this[i] && this[i].parentElement) {

			this[i].parentElement.removeChild(this[i]);

		}

	}

}





function ChangeCategory(catText, catId) {

	document.getElementById("search_cat").innerHTML = catText;

	document.getElementById("cat").value = catId;

	var searchData = document.getElementById("searchData").value;

	checkTime(searchData);

}





function searchProduct(searchData) {

	var ss_list = document.querySelector(".search-prod-list-custom");  // Search Suggestions list
	var ss_list = document.querySelector(".search-res");  // Search Suggestions list
	var ss_container = document.querySelector(".fs-search-result-wrapper"); //Search Suggestions container

	if (searchData.length >= 3) {
		var searchDataCat = 0;
		var data = new FormData();
		data.append('searchProduct', 1);
		data.append('searchData', searchData);
		data.append('searchDataCat', searchDataCat);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 200) {
					$("#serch_result_url").attr("href", "/search?q=" + searchData);
					var result = xmlhttp.responseText;
					ss_list ? ss_list.innerHTML = result : null;
					ss_container ? ss_container.classList.add("active") : null;
				}
			}
		}

		xmlhttp.open("POST", window.location.protocol + "//" + window.location.hostname + "/site/search-short");
		xmlhttp.send(data);
	} else {
		ss_list ? ss_list.innerHTML = "" : null;
		ss_container ? ss_container.classList.remove("active") : null;
	}
}
function searchProductM(searchData) {

	var ss_list = document.querySelector(".search-prod-list-custom");  // Search Suggestions list
	var ss_list = document.querySelector(".fs-mobile-search-result-block");  // Search Suggestions list
	var ss_container = document.querySelector(".fs-search-result-wrapper"); //Search Suggestions container

	if (searchData.length >= 3) {
		var searchDataCat = 0;
		var data = new FormData();
		data.append('searchProduct', 1);
		data.append('searchData', searchData);
		data.append('searchDataCat', searchDataCat);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 200) {

					var result = xmlhttp.responseText;
					ss_list ? ss_list.innerHTML = result : null;
					ss_container ? ss_container.classList.add("active") : null;
				}
			}
		}
		document.getElementById("mobsearch").setAttribute("href", "/search?q=" + searchData);
		xmlhttp.open("POST", window.location.protocol + "//" + window.location.hostname + "/site/search-short-mobile");
		xmlhttp.send(data);
	} else {
		ss_list ? ss_list.innerHTML = "" : null;
		ss_container ? ss_container.classList.remove("active") : null;
	}
}



function DICTIONCLASS_NEW() {

	

	var DICTIONCLASS_NAMEID = document.getElementById("DICTIONCLASS_NAMEID").value;

	var DICTION_DICTIONTYPE = document.getElementById("DICTION_DICTIONTYPE").value;

	

	var data = new FormData();

	

	

	if (window.DICTIONCLASSVAL_EDIT_ID > 0) {

		data.append('DICTIONCLASS_EDIT', true);

		data.append('DICTIONCLASSVAL_EDIT_ID', window.DICTIONCLASSVAL_EDIT_ID);

		window.DICTIONCLASSVAL_EDIT_ID = 0;

	} else {

		data.append('DICTIONCLASS_NEW', true);

	}

	

	data.append('DICTIONCLASS_NAMEID', DICTIONCLASS_NAMEID);

	data.append('DICTION_DICTIONTYPE', DICTION_DICTIONTYPE);

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				console.log(xmlhttp.responseText);

				/*location.reload();*/

			}

		} else {

		

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}



function uploadAttuchFiles(FilesContainer, lang, onModul) {

	var fileInput = FilesContainer;

	var data = new FormData();

	

	for (var counter = 0; counter <= fileInput.files.length; counter++) {

		data.append('ATTIMG[]', fileInput.files[counter]);

	}

	data.append('uploadAttuchFiles', true);

	

	data.append('LANGID', lang);

	data.append('ONMODUL', onModul);

	

	data.append('filesCounter', fileInput.files.length);

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				var storValueTable = document.getElementById("storValueTable");

				var result = JSON.parse(xmlhttp.responseText);

				var newHTML = '';

				counter = 0;

				

				while (result[counter]) {

					

					newHTML = newHTML + "<td>1</td><td>" + result[counter]['LINK'] + "</td><td><img src='../ico/mn_btAdd.gif'></td>";

					

					var newTR = document.createElement('tr');

					newTR.innerHTML = newHTML;

					newTR.className = 'popUpGridData';

					storValueTable.appendChild(newTR);

					

					newHTML = '';

					counter = counter + 1;

				}

				

				document.getElementById("popUpGridFuller").remove();

				

				newHTML = newHTML + "<td>Ընդհանուր ՝ <span id='sumCounterLayout'>1</span></td><td></td><td></td>";

				

				var newTR = document.createElement('tr');

				newTR.innerHTML = newHTML;

				newTR.className = 'popUpGridTitle';

				newTR.id = 'popUpGridFuller';

				storValueTable.appendChild(newTR);

				

				newHTML = '';

			}

		} else {

		

		}

	}

	

	xmlhttp.open("POST", "../engine.php");

	xmlhttp.send(data);

	

	

}





function DICPRODVAL_NEW() {

	

	var DICPRODVAL_GID = document.getElementById("DICPRODVAL_GID").value;

	var DICPRODVAL_NAMEID = document.getElementById("DICPRODVAL_NAMEID").value;

	if (DICPRODVAL_NAMEID.length > 1) {

		var data = new FormData();

		

		if (window.DICPRODVAL_EDIT_ID > 0) {

			data.append('DICPRODVAL_EDIT', true);

			data.append('DICPRODVAL_EDIT_ID', window.DICPRODVAL_EDIT_ID);

			window.DICPRODVAL_EDIT_ID = 0;

		} else {

			data.append('DICPRODVAL_NEW', true);

		}

		

		data.append('DICPRODVAL_GID', DICPRODVAL_GID);

		data.append('DICPRODVAL_NAMEID', DICPRODVAL_NAMEID);

		

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

					location.reload();

				}

			} else {

			

			}

		}

		

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	} else {

		alert('Name can not be empty');

	}

}



function CATEGORIES_NEW() {

	

	var CATEGORIES_NAMEID = document.getElementById("CATEGORIES_NAMEID").value;

	var CATEGORIES_PARENTID = document.getElementById("CATEGORIES_PARENTID").value;

	var SUBCATEGORIES_PARENTID = document.getElementById("SUBCATEGORIES_PARENTID").value;

	var SUBSUBCATEGORIES_PARENTID = document.getElementById("SUBSUBCATEGORIES_PARENTID").value;

	var SUBSUBSUBCATEGORIES_PARENTID = document.getElementById("SUBSUBSUBCATEGORIES_PARENTID").value;

	if (CATEGORIES_NAMEID.length > 1) {

		var data = new FormData();

		

		if (window.CATEGORIES_EDIT_ID > 0) {

			data.append('CATEGORIES_EDIT', true);

			data.append('CATEGORIES_EDIT_ID', window.CATEGORIES_EDIT_ID);

			window.CATEGORIES_EDIT_ID = 0;

		} else {

			data.append('CATEGORIES_NEW', true);

		}

		

		if (parseInt(SUBSUBSUBCATEGORIES_PARENTID) > 0) {

			data.append('CATEGORIES_PARENTID', SUBSUBSUBCATEGORIES_PARENTID);

		} else {

			if (parseInt(SUBSUBCATEGORIES_PARENTID) > 0) {

				data.append('CATEGORIES_PARENTID', SUBSUBCATEGORIES_PARENTID);

			} else {

				if (parseInt(SUBCATEGORIES_PARENTID) > 0) {

					data.append('CATEGORIES_PARENTID', SUBCATEGORIES_PARENTID);

				} else {

					data.append('CATEGORIES_PARENTID', CATEGORIES_PARENTID);

				}

			}

		}

		data.append('CATEGORIES_NAMEID', CATEGORIES_NAMEID);

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

					location.reload();

				}

			} else {

			

			}

		}

		

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	} else {

		alert('Name can not be empty');

	}

}



function isValidEmailAddress(emailAddress) {

	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

	return pattern.test(emailAddress);

}

;



function changeOrderStat(ORDERID, STAT) {

	

	var data = new FormData();

	data.append('changeOrderStat', true);

	data.append('ORDERID', ORDERID);

	data.append('STAT', STAT);

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

			}

		} else {

		}

	}

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}



function saveLangVal(VALUE, LANGID, TEXTID, DICID = 0) {

	

	var data = new FormData();

	

	data.append('saveLangVal', true);

	

	data.append('VALUE', VALUE);

	data.append('LANGID', LANGID);

	data.append('TEXTID', TEXTID);

	data.append('DICID', DICID);

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

			}

		} else {

		

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

	

	

}



function BRAND_NEW() {

	

	var BRAND_NAMEID = document.getElementById("BRAND_NAMEID").value;

	var data = new FormData();

	

	

	if (window.BRAND_EDIT_ID > 0) {

		data.append('BRAND_EDIT', true);

		data.append('BRAND_EDIT_ID', window.BRAND_EDIT_ID);

		window.BRAND_EDIT_ID = 0;

	} else {

		data.append('BRAND_NEW', true);

	}

	

	

	data.append('BRAND_NAMEID', BRAND_NAMEID);

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				location.reload();

			}

		} else {

		

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

	

}





function MEASUR_NEW() {

	

	var BRAND_NAMEID = document.getElementById("BRAND_NAMEID").value;

	var data = new FormData();

	

	

	if (window.BRAND_EDIT_ID > 0) {

		data.append('MEASUR_EDIT', true);

		data.append('MEASUR_EDIT_ID', window.BRAND_EDIT_ID);

		window.BRAND_EDIT_ID = 0;

	} else {

		data.append('MEASUR_NEW', true);

	}

	

	

	data.append('MEASUR_NAMEID', BRAND_NAMEID);

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				location.reload();

			}

		} else {

		

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

	

}



function DICPRODGROUP_IMG_CHANGE(IMG, CID) {

	

	var data = new FormData();

	data.append('DICPRODGROUP_IMG_CHANGE', true);

	

	if (IMG === undefined) {

	

	} else {

		data.append('IMG', IMG.files[0]);

		data.append('ID', CID);

	}

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				var result = JSON.parse(xmlhttp.responseText);

				if (result == 1) {

					location.reload();

				} else {

					

					console.log(result);

				}

			}

		} else {

		

		}

	}

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}





function CATEGORIE_IMG_CHANGE(IMG, CID) {

	

	var data = new FormData();

	data.append('CATEGORIE_IMG_CHANGE', true);

	

	if (IMG === undefined) {

	

	} else {

		data.append('IMG', IMG.files[0]);

		data.append('ID', CID);

	}

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				var result = JSON.parse(xmlhttp.responseText);

				if (result == 1) {

					location.reload();

				} else {

					

					console.log(result);

				}

			}

		} else {

		

		}

	}

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}





function BRAND_IMG_CHANGE(IMG, CID) {

	

	var data = new FormData();

	data.append('BRAND_IMG_CHANGE', true);

	

	if (IMG === undefined) {

	

	} else {

		data.append('IMG', IMG.files[0]);

		data.append('ID', CID);

	}

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				var result = JSON.parse(xmlhttp.responseText);

				if (result == 1) {

					location.reload();

				} else {

		

					console.log(result);

				}

			}

		} else {

		

		}

	}

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}





function MEASUR_CON_CHANGE(CON, CID) {

	

	var data = new FormData();

	data.append('MEASUR_CON_CHANGE', true);

	

	if (CON === undefined) {

	

	} else {

		data.append('CON', CON);

		data.append('ID', CID);

	}

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				var result = JSON.parse(xmlhttp.responseText);

				if (result == 1) {

					location.reload();

				} else {

					

					console.log(result);

				}

			}

		} else {

		

		}

	}

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}





function updateGrid(gridCharID, forGrid, upDateForID) {

	forGrid = typeof forGrid !== 'undefined' ? forGrid : 'gridData';

	upDateForID = typeof upDateForID !== 'undefined' ? upDateForID : 'none';

	var xmlhttp;

	

	xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			document.getElementById(forGrid).innerHTML = xmlhttp.responseText;

		} else {

		}

	}

	xmlhttp.open("GET", "engine.php?get" + gridCharID + "Grid=1&requestId=" + upDateForID, true);

	xmlhttp.send();

}





function appSendMail(serial) {

	var newSerial = parseInt(serial);

	

	if (!isNaN(newSerial)) {

		var FROM = document.getElementById("FROM" + newSerial).value;

		var TO = document.getElementById("TO" + newSerial).value;

		var SENDERNAME = document.getElementById("SENDERNAME" + newSerial).value;

		var SENDERPHONE = document.getElementById("SENDERPHONE" + newSerial).value;

		var MAILBODY = document.getElementById("MAILBODY" + newSerial).value;

		var SUBJECT = document.getElementById("SUBJECT" + newSerial).value;

		

		

		var data = new FormData();

		

		data.append('appSendMail', true);

		data.append('FROM', FROM);

		data.append('TO', TO);

		data.append('SENDERNAME', SENDERNAME);

		data.append('SENDERPHONE', SENDERPHONE);

		data.append('MAILBODY', MAILBODY);

		data.append('SUBJECT', SUBJECT);

		

		var xmlhttp;

		

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				alert("Նամակը հաջողությամբ ուղղարկված է");

				document.getElementById("FROM" + newSerial).value = '';

				document.getElementById("TO" + newSerial).value = '';

				document.getElementById("SENDERNAME" + newSerial).value = '';

				document.getElementById("SENDERPHONE" + newSerial).value = '';

				document.getElementById("MAILBODY" + newSerial).value = '';

				document.getElementById("SUBJECT" + newSerial).value = '';

			} else {

			}

		}

		xmlhttp.open("POST", "mainadmin/engine.php");

		xmlhttp.send(data);

	}

	

	

}





function subscribeMail() {

	

	var mail = $("#subsMail").val();

	

	if (mail.length > 0 && isValidEmailAddress(mail)) {

		

		var data = new FormData();

		data.append('subscribeMail', true);

		data.append('mail', mail);

		

		var xmlhttp;

		

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				$("#subsMail").removeClass("sbscr-error");

				$(".subscription-cont").addClass("hide");

				$(".subscription-msg").removeClass("hide");

				$("#subsMail").val("");

			} else {

			}

		}

		xmlhttp.open("POST", window.location.protocol + "//" + window.location.hostname + "/mainadmin/engine.php");

		xmlhttp.send(data);

	} else {

		$("#subsMail").addClass("sbscr-error");

	}

	

}





function saveWebConfig() {

	

	var CURDOLLAR = document.getElementById("CURDOLLAR").value;

	var WEBMAIL = document.getElementById("WEBMAIL").value;

	var NEWSPAGGER = document.getElementById("NEWSPAGGER").value;

	var FACEPAGE = document.getElementById("FACEPAGE").value;

	var LINKPAGE = document.getElementById("LINKPAGE").value;

	var SKYPELOGIN = document.getElementById("SKYPELOGIN").value;

	

	

	var YOUPAGE = document.getElementById("YOUPAGE").value;

	var TVITTPAGE = document.getElementById("TVITTPAGE").value;

	

	

	var VKPAGE = document.getElementById("VKPAGE").value;

	var OKPAGE = document.getElementById("OKPAGE").value;

	var GPLUSPAGE = document.getElementById("GPLUSPAGE").value;

	

	

	var GMAP = document.getElementById("GMAP").value;

	var GMAP2 = document.getElementById("GMAP2").value;

	

	var data = new FormData();

	

	

	data.append('saveWebConfig', true);

	data.append('CURDOLLAR', CURDOLLAR);

	data.append('WEBMAIL', WEBMAIL);

	data.append('NEWSPAGGER', NEWSPAGGER);

	data.append('FACEPAGE', FACEPAGE);

	data.append('LINKPAGE', LINKPAGE);

	data.append('SKYPELOGIN', SKYPELOGIN);

	data.append('YOUPAGE', YOUPAGE);

	data.append('TVITTPAGE', TVITTPAGE);

	

	

	data.append('VKPAGE', VKPAGE);

	data.append('OKPAGE', OKPAGE);

	data.append('GPLUSPAGE', GPLUSPAGE);

	

	

	data.append('GMAP', GMAP);

	data.append('GMAP2', GMAP2);

	

	

	var xmlhttp;

	

	xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			alert("Կարգավորումները պահպանված են");

		} else {

		}

	}

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}



function DICPRODGROUP_DEL(ID) {

	var r = confirm("Delete Products Fields Group ?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?DICPRODGROUP_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

	}

}



function DICPRODVAL_DEL(ID) {

	var r = confirm("Delete Products Field?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?DICPRODVAL_DEL=1&ID=" + ID, true);

		xmlhttp.send();

	}

}





function waffenProduct(lastUsedID, mode) {

	var result;

	

	if (lastUsedID != '0') {

		if (mode == 1) {

			var r = confirm("Hide product?");

		} else {

			var r = true;

		}

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?waffenProduct=1&mode=" + mode + "&productID=" + lastUsedID, true);

			xmlhttp.send();

			

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function deleteProduct(lastUsedID) {

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete product?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteProduct=1&productID=" + lastUsedID, true);

			xmlhttp.send();

			

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}



function deleteOrderList(lastUsedID) {

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete product?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteOrderList=1&productID=" + lastUsedID, true);

			xmlhttp.send();

			

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}



function deleteMail(lastUsedID) {

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete Subscribed user?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteMail=1&ID=" + lastUsedID, true);

			xmlhttp.send();

			

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}



function deleteOrder() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete order?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('Orders');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteOrder=1&orderID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function deleteCustomer(lastUsedID) {

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete customer?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteCustomer=1&customerID=" + lastUsedID, true);

			xmlhttp.send();

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}



function deletePayment(lastUsedID) {

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete payment?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deletePayment=1&paymentID=" + lastUsedID, true);

			xmlhttp.send();

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}



function deleteArticle() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete Article?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('Articles');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteArticle=1&articleID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function removeVIMG() {

	document.getElementById('VIMG').value = 0;

	document.getElementById('VIMG_IMG').style.display = 'none';

}





function selectPrducts_Cur(CAT_SEARCH, NAME_SEARCH, REL_DATA_CONT, BLABLE, SLABLE) {

	var data = new FormData();

	data.append('selectPrducts_Cur', true);

	data.append('CAT_SEARCH', CAT_SEARCH);

	data.append('NAME_SEARCH', NAME_SEARCH);

	

	

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				

				if (xmlhttp.responseText.length > 0) {

					try {

						var result = JSON.parse(xmlhttp.responseText);

					} catch (e) {

					

						console.log(xmlhttp.responseText);

						return 0;

					}

				} else {

					result = [];

				}

				

				var locCounter = 0;

				var tableContent = '<h4>Product List</h4>';

				while (locCounter < result.length) {

					

					if (BLABLE == 'wendor') {

						tableContent = tableContent + "<div class='addnewtag'><input class='" + BLABLE + "_list_cont' value='" + result[locCounter]['ID'] + "' type='checkbox'>(" + result[locCounter]['ARTICLE'] + ") " + result[locCounter]['NAME'] + "<span class='price'>" + result[locCounter]['PRICE'] + "AMD</span><input type='hidden' id='" + SLABLE + "Name_" + result[locCounter]['ID'] + "' value='(" + result[locCounter]['ARTICLE'] + ") " + result[locCounter]['NAME'] + "'><input type='hidden' id='" + SLABLE + "Price_" + result[locCounter]['ID'] + "' value='" + result[locCounter]['PRICE'] + "'></div>";

					} else {

						tableContent = tableContent + "<div class='addnewtag'><input class='" + BLABLE + "_list_cont' value='" + result[locCounter]['ID'] + "' type='checkbox'>" + result[locCounter]['NAME'] + "<span class='price'>" + result[locCounter]['PRICE'] + "AMD</span><input type='hidden' id='" + SLABLE + "Name_" + result[locCounter]['ID'] + "' value='" + result[locCounter]['NAME'] + "'><input type='hidden' id='" + SLABLE + "Price_" + result[locCounter]['ID'] + "' value='" + result[locCounter]['PRICE'] + "'><input type='hidden' id='" + SLABLE + "Cat_" + result[locCounter]['ID'] + "' value='" + result[locCounter]['CATID'] + "'><input type='hidden' id='" + SLABLE + "CatName_" + result[locCounter]['ID'] + "' value='" + result[locCounter]['CNAME'] + "'></div>";

					}

					locCounter++;

				}

				

				REL_DATA_CONT.innerHTML = tableContent;

				

				/*document.getElementById("smartWaitingCont").style.display = "none";*/

			}

		} else {

			/*document.getElementById("smartWaitingCont").style.display = "block";*/

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}





function selectPrducts_CurOrder(CAT_SEARCH, NAME_SEARCH, REL_DATA_CONT, BLABLE, SLABLE, AVV = 0) {

	var data = new FormData();

	data.append('selectPrducts_Cur', true);

	data.append('CAT_SEARCH', CAT_SEARCH);

	data.append('NAME_SEARCH', NAME_SEARCH);

	data.append('AVV', AVV);

	

	

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				

				if (xmlhttp.responseText.length > 0) {

					try {

						var result = JSON.parse(xmlhttp.responseText);

					} catch (e) {

		

						console.log(xmlhttp.responseText);

						return 0;

					}

				} else {

					result = [];

				}

				

				var locCounter = 0;

				var tableContent = '<h4>Product List</h4>';

				while (locCounter < result.length) {

					

					tableContent = tableContent + "<div class='addnewtag'><input class='copy_list_cont' name='copyList' value='" + result[locCounter]['ID'] + "' type='radio'>" + result[locCounter]['NAME'] + "<span class='price'>" + result[locCounter]['PRICE'] + "AMD</span></div>";

					locCounter++;

				}

				

				REL_DATA_CONT.innerHTML = tableContent;

				

				/*document.getElementById("smartWaitingCont").style.display = "none";*/

			}

		} else {

			/*document.getElementById("smartWaitingCont").style.display = "block";*/

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

}





function deleteNews() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Հեռացնե՞լ Նորությունը");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('News');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteNews=1&newsID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function deleteMenu(menuID) {

	var lastUsedID = menuID;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete page?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteMenu=1&menuID=" + lastUsedID, true);

			xmlhttp.send();

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function deleteVacancie(menuID) {

	var lastUsedID = menuID;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete Vacancie?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteVacancie=1&menuID=" + lastUsedID, true);

			xmlhttp.send();

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}



function deleteContractType() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Հեռացնե՞լ Արտադրողին");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('ContractType');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteContractType=1&ContractTypeID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function CATEGORIES_DEL(ID) {

	

	var r = confirm("Delete Category?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?CATEGORIES_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

	}

	

}





function BRAND_DEL(ID) {

	

	var r = confirm("Delete Brand?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?BRAND_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

	}

}



function MEASUR_DEL(ID) {

	

	var r = confirm("Delete Measurement?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?MEASUR_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

	}

}



function DICCLASS_DEL(ID) {

	

	var r = confirm("Delete group?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?DICCLASS_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

	}

}



function VALUE_DEL(ID) {

	

	var r = confirm("Delete value?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?VALUE_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

	}

}



function COLORS_NEW() {

	

	var COLORS_NAMEID = document.getElementById("COLORS_NAMEID").value;

	var COLORS_CODEID = document.getElementById("COLORS_CODEID").value;

	

	var data = new FormData();

	if (window.COLOR_EDIT_ID > 0) {

		data.append('COLORS_EDIT', true);

		data.append('COLORS_EDIT_ID', window.COLOR_EDIT_ID);

		window.COLOR_EDIT_ID = 0;

	} else {

		data.append('COLORS_NEW', true);

	}

	

	

	data.append('COLORS_NAMEID', COLORS_NAMEID);

	data.append('COLORS_CODEID', COLORS_CODEID);

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				location.reload();

			}

		} else {

		

		}

	}

	

	xmlhttp.open("POST", "engine.php");

	xmlhttp.send(data);

	

}





function CATDETVAL_CHANGE(SELECTED, TAGID) {

	

	var url_string = document.URL;

	var url = new URL(url_string);

	var CATID = url.searchParams.get("cid");

	var result;

	

	if (CATID > 0) {

		var data = new FormData();

		

		data.append('CATDETVAL_CHANGE', true);

		data.append('CATID', CATID);

		data.append('TAGID', TAGID);

		

		if (SELECTED.checked == true) {

			data.append('SELECTED', 1);

		} else {

			data.append('SELECTED', 0);

		}

		

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

				

				}

			} else {

			

			}

		}

		

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	} else {

		document.getElementById("errors_and_nots").innerHTML = "<strong>Category</strong> is not selected.";

		document.getElementById("errors_and_nots").style.display = 'block';

	}

	

	

}



function CATACT_CHANGE(SELECTED, CATID) {

	

	if (CATID > 0) {

		var data = new FormData();

		

		data.append('CATACT_CHANGE', true);

		data.append('CATID', CATID);

		

		if (SELECTED.checked == true) {

			data.append('SELECTED', 1);

		} else {

			data.append('SELECTED', 0);

		}

		

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

				

				}

			} else {

			

			}

		}

		

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	}

}



function DICTION_CHANGE(SELECTED, DICID) {

	if (DICID > 0) {

		var data = new FormData();

		data.append('DICTION_CHANGE', true);

		data.append('DICID', DICID);

		

		if (SELECTED.checked == true) {

			data.append('SELECTED', 1);

		} else {

			data.append('SELECTED', 0);

		}

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

				

				}

			} else {

			

			}

		}

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	}

}



function DICPRODVALVIS_CHANGE(SELECTED, CATID) {

	

	if (CATID > 0) {

		var data = new FormData();

		

		data.append('DICPRODVALVIS_CHANGE', true);

		data.append('CATID', CATID);

		

		if (SELECTED.checked == true) {

			data.append('SELECTED', 1);

		} else {

			data.append('SELECTED', 0);

		}

		

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

				

				}

			} else {

			

			}

		}

		

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	}

}



function DICTION_TYPE_ADD(SELECTED, DICCHAR) {

	

	

	if (window.dicchar_IDTOUPD > 0) {

		document.getElementById("errors_and_nots").style.display = 'none';

		var data = new FormData();

		data.append('DICTION_TYPE_ADD', true);

		data.append('ID', window.dicchar_IDTOUPD);

		data.append('DICCHAR', DICCHAR);

		

		if (SELECTED.checked == true) {

			data.append('SELECTED', 1);

		} else {

			data.append('SELECTED', 0);

		}

		

		

		var xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4) {

				if (xmlhttp.status == 200) {

					

					$("input[data-type-cont='allDictionType']").each(function () {

						if ($(this)[0]['dataset']['dicchar'] != DICCHAR) {

							$(this).prop('checked', false);

						}

					});

					

				}

			} else {

			

			}

		}

		

		xmlhttp.open("POST", "engine.php");

		xmlhttp.send(data);

	} else {

		document.getElementById("errors_and_nots").innerHTML = "<strong>Products Field</strong> is not selected.";

		document.getElementById("errors_and_nots").style.display = 'block';

	}

	

	

}





function deleteFaqs() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Հեռացնե՞լ Հարցը");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('Faqs');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteFaqs=1&faqsID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function saveProductBasket(PRODID, QUANTITY, REDIR, OFFERID, ONLYSHOP, JOIN) {

	if (PRODID) {

		QUANTITY = typeof QUANTITY !== 'undefined' ? QUANTITY : 1;

		OFFERID = typeof OFFERID !== 'undefined' ? OFFERID : 0;

		ONLYSHOP = typeof ONLYSHOP !== 'undefined' ? ONLYSHOP : 0;

		JOIN = typeof JOIN !== 'undefined' ? JOIN : 0;

		if (QUANTITY < 1) {

			QUANTITY = 1;

		}

		if (QUANTITY > 10) {

			QUANTITY = 10;

		}

		if (ONLYSHOP == 1) {

			$('#onlyshop').modal('show');

			return false;

		}

		

		if (JOIN > 0) {

			window.location.href = "http://" + window.location.hostname + "/personal/requests/?add=" + JOIN;

			return false;

		}

		

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				if ($('.fs-open-prod-window[data-prodid="' + PRODID + '"]').length > 0) {

					let thisProd = $('.fs-open-prod-window[data-prodid="' + PRODID + '"]').closest('.fs-product-card');

					let prodClone = thisProd[0].cloneNode(true);

					let viewportOffset = thisProd[0].getBoundingClientRect();

					let top = viewportOffset.top;

					let left = viewportOffset.left;

					let elWidth = viewportOffset.width;

					let elHeight = viewportOffset.height;

					let fixedCartEl = document.createElement('div');

					

					fixedCartEl.classList.add('fixed_card_el');

					fixedCartEl.style.top = (top / 10) + 'rem';

					fixedCartEl.style.left = (left / 10) + 'rem';

					fixedCartEl.style.width = (elWidth / 10) + 'rem';

					fixedCartEl.style.height = (elHeight / 10) + 'rem';

					fixedCartEl.style.backgroundColor = '#fff';

					fixedCartEl.style.position = 'fixed';

					fixedCartEl.style.zIndex = '99';

					fixedCartEl.appendChild(prodClone);

					

					document.querySelector('body').appendChild(fixedCartEl);

					

					setTimeout(function () {

						fixedCartEl.classList.add('to_cart_icon');

						$('.fs-added-product-notification').addClass('active');

					}, 10);

					

					setTimeout(function () {

						fixedCartEl.remove();

						$('.fs-added-product-notification').removeClass('active');

					}, 2000);

				}

				

				if (xmlhttp.getResponseHeader("result") == "200OK") {

					if (REDIR == 1) {

						window.location.href = "http://" + window.location.hostname + "/basket/";

					}

					

					var curProds = $('#orderListCountCont').attr('data-prod-list');

					

					if (curProds.search("-" + PRODID + "-") === -1) {

						var curCount = parseInt($('#orderListCountCont').attr('data-prod-count'));

						curCount = curCount + 1;

						$('#orderListCountCont').attr('data-prod-count', curCount);

						$('#orderListCountCont').attr('data-prod-list', curProds + '-' + PRODID + '-');

					}

				} else {



				}

			} else {

			

			}

		}

		xmlhttp.open("GET", window.location.protocol + "//" + window.location.hostname + "/sadmin/engine.php?saveProductBasket=1&PRODID=" + PRODID + "&QUANTITY=" + QUANTITY + "&OFFERID=" + OFFERID, true);

		xmlhttp.send();

		$('.fs-added-product-notification').addClass('active');

		setTimeout(function () {

			$('.fs-added-product-notification').removeClass('active');

		}, 2000);

		return true;

	}

}





function saveProductWishlist(PRODID, REDIR, CURCONT) {

	if (PRODID) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				if (xmlhttp.getResponseHeader("result") == "200OK") {

					if (REDIR == 1) {

						window.location.href = "http://" + window.location.hostname + "/wishlist/";

					}

					

					let map = window.location.href.split('/');

					map = map[map.length - 2];

					

					if (map === 'wishlist') {

						location.reload();

					}

					

					

				} else {

					console.log(xmlhttp.responseText);

				}

			} else {

			

			}

		}

		xmlhttp.open("GET", window.location.protocol + "//" + window.location.hostname + "/sadmin/engine.php?saveProductWishlist=1&PRODID=" + PRODID, true);

		xmlhttp.send();

		return true;

	}

}





function saveProductComparelist(PRODID, REDIR, CURCONT) {

	var curCount = parseInt(document.getElementById('compareListCountCont').innerHTML);

	var mode = $(CURCONT).data("compare");

	if (curCount == 3 && mode == 0) {

		$(".max3compare").show().delay(2000).queue(function (n) {

			$(this).hide();

			n();

		});

	} else {

		if (PRODID) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					if (xmlhttp.getResponseHeader("result") == "200OK") {

						if (REDIR == 1) {

							window.location.href = "http://" + window.location.hostname + "/compare/";

						}

						if (mode == 0) {

							curCount = curCount + 1;

							if (curCount == 1) {

								document.getElementById('compareListCountContHREF').href = 'http://' + window.location.hostname + '/compare/';

								$("#compareListCountContHREF").addClass("active");

								document.getElementById('compareListCountCont').style.display = 'block';

							}

							document.getElementById('compareListCountCont').innerHTML = curCount;

							

							$("a[data-compItem='" + PRODID + "']").each(function () {

								$(this).addClass("choosed");

							});

							

							$(CURCONT).data("compare", 1);

							

						} else {

							curCount = curCount - 1;

							if (curCount == 0) {

								$("#compareListCountContHREF").removeAttr("href");

								$("#compareListCountContHREF").removeClass("active");

								document.getElementById('compareListCountCont').style.display = 'none';

							}

							document.getElementById('compareListCountCont').innerHTML = curCount;

							

							$("a[data-compItem='" + PRODID + "']").each(function () {

								$(this).removeClass("choosed");

							});

							

							$(CURCONT).data("compare", 0);

						}

					}

				} else {

				

				}

			}

			xmlhttp.open("GET", window.location.protocol + "//" + window.location.hostname + "/mainadmin/engine.php?saveProductComparelist=1&PRODID=" + PRODID, true);

			xmlhttp.send();

			return true;

		}

		

	}

}



function setStars(PRODID, STARS) {

	if (PRODID > 0 && STARS > 0) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				if (xmlhttp.getResponseHeader("result") == "200OK") {

				

				} else {

	

				}

			} else {

			

			}

		}

		xmlhttp.open("GET", window.location.protocol + "//" + window.location.hostname + "/mainadmin/engine.php?setStars=1&PRODID=" + PRODID + "&STARS=" + STARS, true);

		xmlhttp.send();

		return true;

	}

}





function deleteWorker() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Հեռացնե՞լ Աշխատակցին");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('Worker');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteWorker=1&workerID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function updateQueryStringParameter(uri, key, value) {

	var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");

	var separator = uri.indexOf('?') !== -1 ? "&" : "?";

	if (uri.match(re)) {

		return uri.replace(re, '$1' + key + "=" + value + '$2');

	} else {

		return uri + separator + key + "=" + value;

	}

}



function changeSortType_loc(mode) {

	var url = '';

	url = updateQueryStringParameter(window.location.pathname, "search", "filters");

	url = updateQueryStringParameter(url, 'sort', mode);

	window.history.pushState("object or string", "Title", url);

	

	

	var xmlhttp;

	xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			if (xmlhttp.getResponseHeader("result") == "200OK") {

			

			} else {

			}

		} else {

		

		}

	}

	xmlhttp.open("GET", window.location.protocol + "//" + window.location.hostname + "/mainadmin/engine.php?sortSet=ss&sort=" + mode, true);

	xmlhttp.send();

	

	

}





function updateProdList(elemToSelect) {

	

	var url = '';

	url = updateQueryStringParameter(window.location.pathname, "search", "filters");

	var urlCounters = 0;

	var paramName = '';

	var paramValus = [];

	

	

	if (elemToSelect.length > 0) {

		if ($("#" + elemToSelect)[0]['dataset']['searchSelected'] == 0) {

			$("#" + elemToSelect)[0]['dataset']['searchSelected'] = 1;

			$("#" + elemToSelect).addClass("selected");

			if (elemToSelect.indexOf("color_") >= 0) {

				$("#" + elemToSelect).addClass("active");

			}

			

		} else {

			$("#" + elemToSelect)[0]['dataset']['searchSelected'] = 0;

			$("#" + elemToSelect).removeClass("selected");

			if (elemToSelect.indexOf("color_") >= 0) {

				$("#" + elemToSelect).removeClass("active");

			}

		}

	}

	

	var data = new FormData();

	data.append('updateProdList', true);

	

	var CATID = 0;

	

	if ($("#mainCatInfo").data("catselected")) {

		var CATID = $("#mainCatInfo").data("catselected");

	} else {

		var version = detectIE();

		

		if (version === false) {

			var url_string = document.URL;

			var url = new URL(url_string);

			CATID = url.searchParams.get("cid");

		} else {

			CATID = getParameterByName("cid");

		}

	}

	

	if (CATID > 0) {

		data.append('cid', CATID);

	} else {

		data.append('cid', 0);

	}

	

	data.append('PRICE', $("#amount").val());

	

	data.append('byNEW', $("#byNEW").val());

	data.append('bySTAT', $("#bySTAT").val());

	data.append('byPRICE', $("#byPRICE").val());

	

	/*url = updateQueryStringParameter(url, 'byPRICE', $( "#byPRICE" ).val());*/

	

	/*-----*/

	

	paramName = '';

	paramValus = [];

	urlCounters = 0;

	$("span[data-search='search']").each(function () {

		if ($(this)[0]['dataset']['searchSelected'] == 1) {

			

			if (paramValus.length > 0 && paramName != ('searchData_' + $(this)[0]['dataset']['searchType'])) {

				paramValus = JSON.stringify(paramValus);

				url = updateQueryStringParameter(url, paramName, paramValus);

				paramName = '';

				paramValus = [];

				urlCounters = 0;

			}

			paramName = 'searchData_' + $(this)[0]['dataset']['searchType'];

			paramValus[urlCounters] = $(this)[0]['dataset']['searchValue'];

			data.append('searchData_' + $(this)[0]['dataset']['searchType'] + '[]', $(this)[0]['dataset']['searchValue']);

			urlCounters++;

		}

	});

	

	if (paramValus.length > 0) {

		paramValus = JSON.stringify(paramValus);

		url = updateQueryStringParameter(url, paramName, paramValus);

		urlCounters = 0;

	}

	

	/*-----*/

	

	/*-----*/

	paramName = '';

	paramValus = [];

	urlCounters = 0;

	$("input[data-search='search']").each(function () {

		if ($(this)[0]['dataset']['searchSelected'] == 1) {

			

			if (paramValus.length > 0 && paramName != ('searchData_' + $(this)[0]['dataset']['searchType'])) {

				paramValus = JSON.stringify(paramValus);

				url = updateQueryStringParameter(url, paramName, paramValus);

				paramName = '';

				paramValus = [];

				urlCounters = 0;

			}

			

			paramName = 'searchData_' + $(this)[0]['dataset']['searchType'];

			paramValus[urlCounters] = $(this)[0]['dataset']['searchValue'];

			data.append('searchData_' + $(this)[0]['dataset']['searchType'] + '[]', $(this)[0]['dataset']['searchValue']);

			urlCounters++;

		}

	});

	

	if (paramValus.length > 0) {

		paramValus = JSON.stringify(paramValus);

		url = updateQueryStringParameter(url, paramName, paramValus);

		urlCounters = 0;

	}

	

	/*-----*/

	

	/*-----*/

	

	paramName = '';

	paramValus = [];

	urlCounters = 0;

	$("a[data-search='search']").each(function () {

		if ($(this)[0]['dataset']['searchSelected'] == 1) {

			

			if (paramValus.length > 0 && paramName != ('searchData_' + $(this)[0]['dataset']['searchType'])) {

				paramValus = JSON.stringify(paramValus);

				url = updateQueryStringParameter(url, paramName, paramValus);

				paramName = '';

				paramValus = [];

				urlCounters = 0;

			}

			

			paramName = 'searchData_' + $(this)[0]['dataset']['searchType'];

			paramValus[urlCounters] = $(this)[0]['dataset']['searchValue'];

			data.append('searchData_' + $(this)[0]['dataset']['searchType'] + '[]', $(this)[0]['dataset']['searchValue']);

			urlCounters++;

		}

	});

	

	if (paramValus.length > 0) {

		paramValus = JSON.stringify(paramValus);

		url = updateQueryStringParameter(url, paramName, paramValus);

		urlCounters = 0;

	}

	

	/*-----*/

	

	window.history.pushState("object or string", "Title", url);

	

	var xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4) {

			if (xmlhttp.status == 200) {

				if (xmlhttp.responseText.length > 0) {

					try {

						var result = JSON.parse(xmlhttp.responseText);

					} catch (e) {

						console.log(xmlhttp.responseText);

						return 0;

					}

				} else {

					result = [];

				}

				

				$(".listitem").each(function () {

					$(this).remove();

				});

				

				if (result.length > 0) {

					$(".alert-danger").fadeOut("slow", function () {

					

					});

					var locCounter = 0;

					while (locCounter <= result.length) {

						$(".product-list").append(result[locCounter]);

						locCounter++;

					}

				} else {

					$(".alert-danger").fadeIn("slow", function () {

					

					});

				}

				imgSliderProd();

				starsActive();

				lazyloadfunc();

			}

		} else {

		

		}

	}

	xmlhttp.open("POST", window.location.protocol + "//" + window.location.hostname + "/mainadmin/engine.php");

	xmlhttp.send(data);

}





function deletePartner() {

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Հեռացնե՞լ Գործընկերոջը");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					updateGrid('Partners');

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deletePartner=1&PartnerID=" + document.getElementById('selectedDataID').value, true);

			xmlhttp.send();

			

			

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function COLOR_DEL(ID) {

	

	var r = confirm("Delete Color?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?COLOR_DEL=1&ID=" + ID, true);

		xmlhttp.send();

		

		

	}

}





function deleteSlider(SliderID) {

	var r = confirm("Delete Slider?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?deleteSlider=1&SliderID=" + SliderID, true);

		xmlhttp.send();

	}

}



function deleteAddr(AddrID) {

	var r = confirm("Delete Store?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.href = "mainFrame.php?m=stores";

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?deleteAddr=1&AddrID=" + AddrID, true);

		xmlhttp.send();

	}

}



function deleteGroup(GroupID) {

	var r = confirm("Delete Group?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.href = "mainFrame.php?m=discount";

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?deleteGroup=1&GroupID=" + GroupID, true);

		xmlhttp.send();

	}

}



function deleteGroupL(GroupID) {

	var r = confirm("Delete Group?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.href = "mainFrame.php?m=customlabels";

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?deleteGroupL=1&GroupID=" + GroupID, true);

		xmlhttp.send();

	}

}



function removeSliderImg(SliderID, TAGID) {

	var r = confirm("Delete Data?");

	if (r == true) {

		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				location.reload();

			} else {

			

			}

		}

		xmlhttp.open("GET", "engine.php?removeSliderImg=1&SliderID=" + SliderID + "&TAGID=" + TAGID, true);

		xmlhttp.send();

	}

}





function deleteUser(lastUsedID) {

	var result;

	

	if (lastUsedID != '0') {

		var r = confirm("Delete User?");

		if (r == true) {

			var xmlhttp;

			xmlhttp = new XMLHttpRequest();

			

			xmlhttp.onreadystatechange = function () {

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					location.reload();

				} else {

				

				}

			}

			xmlhttp.open("GET", "engine.php?deleteUser=1&userID=" + lastUsedID, true);

			xmlhttp.send();

		}

		

	}

	if (lastUsedID == '0') {

		result = false;

	}

}





function storValueRowAdd() {

	

	var xmlhttp;

	

	xmlhttp = new XMLHttpRequest();

	

	xmlhttp.onreadystatechange = function () {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			

			var StorageValueParams = xmlhttp.responseText;

			

			var lastRowID = document.getElementById('lastAddedID').value; /*Вычисление нового идентификатора*/

			

			lastRowID = parseInt(lastRowID, 10);

			var parentElem = document.getElementById('S' + lastRowID);

			var newRowID = lastRowID + 1;

			document.getElementById('lastAddedID').value = newRowID;

			

			

			var newRowData = "<td><select name='MATERIALID[]' style='width:200px;'>" + StorageValueParams + "</select></td><td><input type='text' name='QUANTITY[]'></td><td onclick='prodDataSelecter(" + newRowID + ")'><img src='../ico/mn_btAdd.gif'></td>";

			

			var newTR = document.createElement('tr');

			newTR.innerHTML = newRowData;

			newTR.className = 'popUpGridData';

			newTR.id = 'S' + newRowID;

			

			parentElem.parentNode.insertBefore(newTR, parentElem.nextSibling);

			

			

			/*Пополнение счетчика*/

			var sumCounter = document.getElementById('sumCounter').value;

			sumCounter = parseInt(sumCounter, 10);

			sumCounter = sumCounter + 1;

			document.getElementById('sumCounter').value = sumCounter;

			document.getElementById('sumCounterLayout').innerHTML = sumCounter;

			/*Пополнение счетчика*/

			

		} else {

			/*Действие При Ожидании*/

		}

	}

	xmlhttp.open("GET", "../engine.php?getStorageValueParams=1", true);

	xmlhttp.send();

	

	

}



function storValueRowDel() {

	var lastUsedTRID = document.getElementById('seceltedRowID').value;

	var lastUsedID = document.getElementById('selectedDataID').value;

	var trToRemove = document.getElementById(lastUsedTRID);

	var result;

	

	if (lastUsedID != '0') {

		if (document.getElementById('sumCounter').value == '1') {

			alert('Մինիմալ տողը պարտադիր է');

		} else {

			var parentElem = document.getElementById('storValueTable');

			var rowToRemove = document.getElementById(lastUsedTRID);

			parentElem.removeChild(rowToRemove);

			

			/*Вычисление нового идентификатора*/

			var lastRowID = document.getElementById('lastAddedID').value;

			if (lastUsedID == lastRowID) {

				lastRowID = parseInt(lastRowID, 10);

				lastRowID = lastRowID - 1;

				document.getElementById('lastAddedID').value = lastRowID;

				

			}

			/*Вычисление нового идентификатора*/

			

			

			/*Вычисление Нового Счетчика*/

			var sumCounter = document.getElementById('sumCounter').value;

			sumCounter = parseInt(sumCounter, 10);

			sumCounter = sumCounter - 1;

			document.getElementById('sumCounter').value = sumCounter;

			document.getElementById('sumCounterLayout').innerHTML = sumCounter;

			/*Вычисление Нового Счетчика*/

			

			

			/*Онулирование выделения*/

			document.getElementById('seceltedRowID').value = '0';

			document.getElementById('selectedDataID').value = '0';

			/*Онулирование выделения*/

		}

	}

	if (lastUsedID == '0') {

		result = false;

	}

}









