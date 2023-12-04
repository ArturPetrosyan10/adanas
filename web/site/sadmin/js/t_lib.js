function isInt(n) {

   return n % 1 === 0;

}



function youtubeReload(){

	var iframe = document.getElementById('overViewCont');

	iframe.src = iframe.src;

}



function changeCreditRull(prodID){

	var curText = document.getElementById('prodCurCreditRullCont'+prodID).innerHTML;

	if(curText.length > 10){

		document.getElementById('creditRullsMainCont').innerHTML = curText;

	}

}

 

  

function changeClass(tag){

	

	if($( tag ).hasClass( "closedSub" )){

		$( tag ).removeClass( "closedSub" );

		$( tag ).addClass( "openedSub" );

	}

	else{

		$( tag ).removeClass( "openedSub" );

		$( tag ).addClass( "closedSub" );

	}

} 

 

 

function getParameterByName(name, url) {

    if (!url) url = window.location.href;

    name = name.replace(/[\[\]]/g, "\\$&");

    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),

        results = regex.exec(url);

    if (!results) return null;

    if (!results[2]) return '';

    return decodeURIComponent(results[2].replace(/\+/g, " "));

}

 

 

 

function detectIE() {

  var ua = window.navigator.userAgent;



  // Test values; Uncomment to check result …



  // IE 10

  // ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';

  

  // IE 11

  // ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';

  

  // Edge 12 (Spartan)

  // ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';

  

  // Edge 13

  // ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586';



  var msie = ua.indexOf('MSIE ');

  if (msie > 0) {

    // IE 10 or older => return version number

    return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);

  }



  var trident = ua.indexOf('Trident/');

  if (trident > 0) {

    // IE 11 => return version number

    var rv = ua.indexOf('rv:');

    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);

  }



  var edge = ua.indexOf('Edge/');

  if (edge > 0) {

    // Edge (IE 12+) => return version number

    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);

  }



  // other browser

  return false;

}

 

 

function changeSimilarValue(DID, LANG){

	

	var SelectedIndexX = $("#"+DID+"_"+LANG)[0].selectedIndex;

	

	if(LANG == 1){

		$("#"+DID+"_2")[0].selectedIndex = SelectedIndexX;

		$("#"+DID+"_3")[0].selectedIndex = SelectedIndexX;

	}

	if(LANG == 2){

		$("#"+DID+"_1")[0].selectedIndex = SelectedIndexX;

		$("#"+DID+"_3")[0].selectedIndex = SelectedIndexX;

	}

	if(LANG == 3){

		$("#"+DID+"_1")[0].selectedIndex = SelectedIndexX;

		$("#"+DID+"_2")[0].selectedIndex = SelectedIndexX;

	}

}





function resetStandart(){

	document.getElementById('creditRullsMainCont').innerHTML = document.getElementById('creditRullsMainContStandart').innerHTML;

}



function checkAndOrder(){

	

	var GETTYPE = $('input[name=GETTYPE]:checked').val();

	var CREGION = $( "#CREGION" ).val();

	var CADDRES = $( "#CADDRES" ).val();

	var CPHONE = $( "#CPHONE" ).val();

	var CNAME = $( "#CNAME" ).val();

	var CSNAME = $( "#CSNAME" ).val();

	var CMAIL = $( "#CMAIL" ).val();

	var STORE = $( "#STORE" ).val();

	var ISOKTERMS = $( "#ISOKTERMS" ).prop( "checked" );

		

	var haveError = 0;

	

	if(GETTYPE == 1 && STORE == 0){

		$( "#STORE_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		

		$( "#STORE_CONT" ).removeClass("has-error");

	}

	

	

	if(CADDRES.length < 1 && GETTYPE == 2){

		$( "#CADDRES_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CADDRES_CONT" ).removeClass("has-error");

	}

	

	if(CREGION == 0 && GETTYPE == 2){

		$( "#CREGION_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CREGION_CONT" ).removeClass("has-error");

	}

	

	if(CPHONE.length < 1){

		$( "#CPHONE_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CPHONE_CONT" ).removeClass("has-error");

	}

	

	if(CMAIL.length < 1){

		$( "#CMAIL_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CMAIL_CONT" ).removeClass("has-error");

	}

	

	if(CNAME.length < 1){

		$( "#CNAME_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CNAME_CONT" ).removeClass("has-error");

	}

	

	if(CSNAME.length < 1){

		$( "#CSNAME_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CSNAME_CONT" ).removeClass("has-error");

	}

	

	$( "#orderErrorText" ).hide();

	

	if(ISOKTERMS == false){

		alert("Pls Accept the terms");

		haveError = 1;

		

	}

	

	if(haveError == 1){

		return 0;

	}

	else{

		

		document.getElementById('shopOnlineBaskForm').submit();

		

		/*var data = new FormData();

		data.append('checkstock', 1);

		var  xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange=function()

		{

			if (xmlhttp.readyState==4){

				if(xmlhttp.status==200){

					if(xmlhttp.getResponseHeader("result") == "200OK"){

						document.getElementById('shopOnlineBaskForm').submit();

					}

					else{

						

						console.log(xmlhttp.responseText);

						

						$( "#quantity-error" ).show();

						

						var result = JSON.parse(xmlhttp.responseText);

						var rowID = 0;

						var locCounter = 0;

						while(result[locCounter] > 0){

							rowID = result[locCounter];

							$( "#prodBy"+rowID+"ID" ).addClass( "error" );

							locCounter++;

						}

						

					}

					

				}

			}

			else{

				

			}

		}

		xmlhttp.open("POST", window.location.protocol+"//"+window.location.hostname+"/mainadmin/engine.php");

		xmlhttp.send(data);*/

		

	}

}





function checkAndPreOrder(){

	

	var GETTYPE = $('input[name=GETTYPE]:checked').val();

	var CREGION = $( "#CREGION" ).val();

	var CADDRES = $( "#CADDRES" ).val();

	var CPHONE = $( "#CPHONE" ).val();

	var CNAME = $( "#CNAME" ).val();

	var CSNAME = $( "#CSNAME" ).val();

	var CMAIL = $( "#CMAIL" ).val();

	var STORE = $( "#STORE" ).val();

	var ISOKTERMS = $( "#ISOKTERMS" ).prop( "checked" );

		

	var haveError = 0;

	

	if(GETTYPE == 1 && STORE == 0){

		$( "#STORE_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		

		$( "#STORE_CONT" ).removeClass("has-error");

	}

	

	

	if(CADDRES.length < 1 && GETTYPE == 2){

		$( "#CADDRES_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CADDRES_CONT" ).removeClass("has-error");

	}

	

	if(CREGION == 0 && GETTYPE == 2){

		$( "#CREGION_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CREGION_CONT" ).removeClass("has-error");

	}

	

	if(CPHONE.length < 1){

		$( "#CPHONE_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CPHONE_CONT" ).removeClass("has-error");

	}

	

	if(CMAIL.length < 1){

		$( "#CMAIL_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CMAIL_CONT" ).removeClass("has-error");

	}

	

	if(CNAME.length < 1){

		$( "#CNAME_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CNAME_CONT" ).removeClass("has-error");

	}

	

	if(CSNAME.length < 1){

		$( "#CSNAME_CONT" ).addClass("has-error");

		$( "#orderErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#CSNAME_CONT" ).removeClass("has-error");

	}

	

	$( "#orderErrorText" ).hide();

	

	if(ISOKTERMS == false){

		alert("Pls Accept the terms");

		haveError = 1;

		

	}

	

	if(haveError == 1){

		return 0;

	}

	else{

		document.getElementById('shopOnlineBaskForm').submit();

	}

}



function checkAndFeedBack(){

	

	var NAMEFROM = $( "#NAMEFROM" ).val();

	var EMAILFROM = $( "#EMAILFROM" ).val();

	var TEXTFROM = $( "#TEXTFROM" ).val();

		

	var haveError = 0;

	

	if(NAMEFROM.length < 1){

		$( "#NAMEFROM" ).addClass("error");

		$( "#feedBackErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#NAMEFROM" ).removeClass("error");

	}

	

	if(EMAILFROM.length < 1){

		$( "#EMAILFROM" ).addClass("error");

		$( "#feedBackErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#EMAILFROM" ).removeClass("error");

	}

	

	if(TEXTFROM.length < 1){

		$( "#TEXTFROM" ).addClass("error");

		$( "#feedBackErrorText" ).show();

		haveError = 1;

	}

	else{

		$( "#TEXTFROM" ).removeClass("error");

	}

	

	if(haveError == 1){

		return 0;

	}

	else{ 

		document.getElementById('feedBackForm').submit();

	}

}



function changePayType(payType){

	

	if(payType == 'cash'){

		document.getElementById("orderPayType").value = 1;

		document.getElementById("payType_cash").checked = true;

		document.getElementById("payType_bank").checked = false;

	}

	

	if(payType == 'bank'){

		document.getElementById("orderPayType").value = 2;

		document.getElementById("payType_cash").checked = false;

		document.getElementById("payType_bank").checked = true;

	}

	

}



$( document ).ready(function() {

  

   

   

   $( ".remove-all" ).click(function() {

		var avrill = $( this ).data( "catidfordelete" );

		$( "#catID_"+avrill ).remove();

		document.getElementById('getEditProduct').submit();

	});

   

});



function activateOrderBUT(DT){

	

	if($('#ISOKTERMS').prop('checked') == true){

		$( "#buyBut" ).removeClass( "disabled" );

		$( "#buyBut" ).click(function(){ checkAndOrder(); });

		$( "#agreeerror" ).hide();

	}

	else{

		$( "#buyBut" ).addClass( "disabled" );	

		$( "#buyBut" ).prop('onclick',null).off('click');

		$( "#agreeerror" ).show();

	}

	

}



function activatePreOrderBUT(DT){

	

	if($('#ISOKTERMS').prop('checked') == true){

		$( "#buyBut" ).removeClass( "disabled" );

		$( "#buyBut" ).click(function(){ checkAndPreOrder(); });

	}

	else{

		$( "#buyBut" ).addClass( "disabled" );	

		$( "#buyBut" ).prop('onclick',null).off('click');

	}

	

}





function changeCountOfDetails(mode){

	

	if(mode == 'up'){

		var countOfProd = parseInt(document.getElementById("prodCount").value);

		if(countOfProd < 9999){

			countOfProd = countOfProd + 1;

			document.getElementById("prodCount").value = countOfProd;

		}

	}

	if(mode == 'down'){

		var countOfProd = parseInt(document.getElementById("prodCount").value);

		if(countOfProd > 1){

			countOfProd = countOfProd - 1;

			document.getElementById("prodCount").value = countOfProd;

		}

	}

	

	

	

}



function changeCountOfCorz(onOrderRow, mode){

	if(mode === 'up'){

	 /*var fullPriceOfOrder = parseInt(document.getElementById("fullPriceOfOrder").value);

	 var PriceOfOrder = parseInt(document.getElementById("PriceOfOrder").value);

	 window.oldPrice = fullPriceOfOrder;*/



	 var curCount = parseInt(document.getElementById("ID"+onOrderRow+"COUNT").value);

	 curCount  = curCount+1;





	if(curCount > 9999){return 0;}

		/*  var priceOne =	parseInt(document.getElementById("ID"+onOrderRow+"PRICE").value);

         var newPrice = priceOne*curCount;



        document.getElementById("ID"+onOrderRow+"ALLPRICE").innerHTML = accounting.formatNumber(newPrice);

        document.getElementById("ID"+onOrderRow+"ALLCOUNT").value = curCount;

        document.getElementById("ID"+onOrderRow+"COUNT").value = curCount;



            if(PriceOfOrder <= parseInt(document.getElementById("FREEDELIVERY").value) && (PriceOfOrder+priceOne) > parseInt(document.getElementById("FREEDELIVERY").value)){

                if($( "#CCOUNTRY" ).val() == "Yerevan"){

                    if($('input[name=DELTYPE]:checked').val() == "FAST"){

                        fullPriceOfOrder = fullPriceOfOrder-parseInt(document.getElementById("DELPRICECITY_FAST").value);

                    }

                    else{

                        fullPriceOfOrder = fullPriceOfOrder-parseInt(document.getElementById("DELPRICECITY").value);

                    }

                }

                else{

                    if($('input[name=DELTYPE]:checked').val() == "FAST"){

                        fullPriceOfOrder = fullPriceOfOrder-parseInt(document.getElementById("DELPRICE_FAST").value);

                    }

                    else{

                        fullPriceOfOrder = fullPriceOfOrder-parseInt(document.getElementById("DELPRICE").value);

                    }

                }

            }



            fullPriceOfOrder = fullPriceOfOrder+priceOne;

            PriceOfOrder = PriceOfOrder+priceOne;

            document.getElementById("fullPriceOfOrder").value = fullPriceOfOrder;

            document.getElementById("PriceOfOrder").value = PriceOfOrder;

            document.getElementById("fullPriceOfOrderText").innerHTML = accounting.formatNumber(fullPriceOfOrder);

        */

		var xmlhttp;

		xmlhttp=new XMLHttpRequest();

		xmlhttp.onreadystatechange=function(){

					if (xmlhttp.readyState==4 && xmlhttp.status==200){

							if(xmlhttp.getResponseHeader("result") == "200OK"){

								location.reload();



							

							}

							else{alert(xmlhttp.responseText);}}

					else{}

				}

		xmlhttp.open("GET",window.location.protocol+"//"+window.location.hostname+"/sadmin/engine.php?changeBasketCount=1&BID="+onOrderRow+"&NEWCOUNT="+curCount,true);

		xmlhttp.send();

		

		

	}

	if(mode === 'down'){

	/* var fullPriceOfOrder = parseInt(document.getElementById("fullPriceOfOrder").value);

	 var PriceOfOrder = parseInt(document.getElementById("PriceOfOrder").value);

	 window.oldPrice = fullPriceOfOrder;*/

	 var curCount = parseInt(document.getElementById("ID"+onOrderRow+"COUNT").value);

		curCount  = curCount-1;

		if(curCount>0){

			/*var priceOne =	parseInt(document.getElementById("ID"+onOrderRow+"PRICE").value);

			var newPrice = priceOne*curCount;

		 

			document.getElementById("ID"+onOrderRow+"ALLPRICE").innerHTML = accounting.formatNumber(newPrice);

			document.getElementById("ID"+onOrderRow+"ALLCOUNT").value = curCount;

			document.getElementById("ID"+onOrderRow+"COUNT").value = curCount;

			

			if(PriceOfOrder > parseInt(document.getElementById("FREEDELIVERY").value) && (PriceOfOrder-priceOne) <= parseInt(document.getElementById("FREEDELIVERY").value)){

				if($( "#CCOUNTRY" ).val() == "Yerevan"){

					if($('input[name=DELTYPE]:checked').val() == "FAST"){

						fullPriceOfOrder = fullPriceOfOrder+parseInt(document.getElementById("DELPRICECITY_FAST").value);

					}

					else{

						fullPriceOfOrder = fullPriceOfOrder+parseInt(document.getElementById("DELPRICECITY").value);

					}

				}

				else{

					if($('input[name=DELTYPE]:checked').val() == "FAST"){

						fullPriceOfOrder = fullPriceOfOrder+parseInt(document.getElementById("DELPRICE_FAST").value);

					}

					else{

						fullPriceOfOrder = fullPriceOfOrder+parseInt(document.getElementById("DELPRICE").value);

					}

				}

			}

			

			

			fullPriceOfOrder = fullPriceOfOrder-priceOne;

			PriceOfOrder = PriceOfOrder-priceOne;

			document.getElementById("fullPriceOfOrder").value = fullPriceOfOrder;

			document.getElementById("PriceOfOrder").value = PriceOfOrder;

			document.getElementById("fullPriceOfOrderText").innerHTML = accounting.formatNumber(fullPriceOfOrder);

			*/

			var xmlhttp;

			xmlhttp=new XMLHttpRequest();

			xmlhttp.onreadystatechange=function(){

						if (xmlhttp.readyState==4 && xmlhttp.status==200){

								if(xmlhttp.getResponseHeader("result") == "200OK"){

										location.reload();

								}

							else{alert(xmlhttp.responseText);}}

						else{}

					}

			xmlhttp.open("GET",window.location.protocol+"//"+window.location.hostname+"/sadmin/engine.php?changeBasketCount=1&BID="+onOrderRow+"&NEWCOUNT="+curCount,true);

			xmlhttp.send();

			

		}

		

		

		

		

	}

	if(mode === 'change'){



	 var curCount = parseInt(document.getElementById("ID"+onOrderRow+"ALLCOUNT").value);



		var xmlhttp;

		xmlhttp=new XMLHttpRequest();

		xmlhttp.onreadystatechange=function(){

			if (xmlhttp.readyState==4 && xmlhttp.status==200){

				if(xmlhttp.getResponseHeader("result") == "200OK"){

					location.reload();

				}

				else{alert(xmlhttp.responseText);}}

			else{}

		}

		xmlhttp.open("GET",window.location.protocol+"//"+window.location.hostname+"/sadmin/engine.php?changeBasketCount=1&BID="+onOrderRow+"&NEWCOUNT="+curCount,true);

		xmlhttp.send();





	}

}





function changeCountOfPreOrder(onOrderRow, mode){

	if(mode == 'up'){

	 var fullPriceOfOrder = parseInt(document.getElementById("fullPriceOfOrder").value);

	 window.oldPrice = fullPriceOfOrder;

	 var curCount = parseInt(document.getElementById("ID"+onOrderRow+"COUNT").value);

	 curCount  = curCount+1;

	 if(curCount > 10){return 0;}

	 var priceOne =	parseInt(document.getElementById("ID"+onOrderRow+"PRICE").value);

	 var newPrice = priceOne*curCount;

	 

		document.getElementById("ID"+onOrderRow+"ALLPRICE").innerHTML = accounting.formatNumber(newPrice);

		document.getElementById("ID"+onOrderRow+"ALLCOUNT").value = curCount;

		document.getElementById("ID"+onOrderRow+"COUNT").value = curCount;

		

		fullPriceOfOrder = fullPriceOfOrder+priceOne;

		document.getElementById("fullPriceOfOrder").value = fullPriceOfOrder;

		document.getElementById("fullPriceOfOrderText").innerHTML = accounting.formatNumber(fullPriceOfOrder);

		

		

		

		

	}

	if(mode == 'down'){

	 var fullPriceOfOrder = parseInt(document.getElementById("fullPriceOfOrder").value);

	 window.oldPrice = fullPriceOfOrder;

	 var curCount = parseInt(document.getElementById("ID"+onOrderRow+"COUNT").value);

	curCount  = curCount-1;

		if(curCount>0){

				var priceOne =	parseInt(document.getElementById("ID"+onOrderRow+"PRICE").value);

				var newPrice = priceOne*curCount;

			 

				document.getElementById("ID"+onOrderRow+"ALLPRICE").innerHTML = accounting.formatNumber(newPrice);

				document.getElementById("ID"+onOrderRow+"ALLCOUNT").value = curCount;

				document.getElementById("ID"+onOrderRow+"COUNT").value = curCount;

				fullPriceOfOrder = fullPriceOfOrder-priceOne;

				document.getElementById("fullPriceOfOrder").value = fullPriceOfOrder;

				document.getElementById("fullPriceOfOrderText").innerHTML = accounting.formatNumber(fullPriceOfOrder);

				

		}

		

		

		

		

	}



}





 

function performClick(elemId) {

   var elem = document.getElementById(elemId);

   if(elem && document.createEvent) {

      var evt = document.createEvent("MouseEvents");

      evt.initEvent("click", true, false);

      elem.dispatchEvent(evt);

   }

}



$('input#GIMG').change(function(){

    var files = $(this)[0].files;

    if(files.length > 10){ 

		$("#uploaderText").html("Here should be multiple file uploader");

        alert("you can select max 10 files.");

    }else{

        $("#uploaderText").html(files.length+" files are selected, click here to change");

    }

});



function editWindow(link){	

			var win = window.open(link, '_blank');

			win.focus();

		}

	

	

function editMiniWindow(link){	

			var popUp;

			var name = "";

			var	left = ( screen.width - 800 ) / 2

			var	top = ( screen.height - 600 ) / 2

			var windowConf = "width=800, height=600, left="+left+", top="+top+"";	

			miniPopUp =  window.open(link, name, windowConf);

			miniPopUp.focus();

		}	



	

function hideQue(data, ofType){

			var xmlhttp;

			xmlhttp=new XMLHttpRequest();

			xmlhttp.onreadystatechange=function(){

			if (xmlhttp.readyState==4 && xmlhttp.status==200){

				document.getElementById("queSel").innerHTML = xmlhttp.responseText;

			}

			else{

			}

			}

			xmlhttp.open("GET","../engine.php?getQueList=1&ofType="+ofType+"&PARENT="+data,true);

			xmlhttp.send();

}

	

	

function WFORMOPENER(forDiv, Hide1, Hide2, mode){

	if(mode == 1){

		document.getElementById(Hide1).style.display = "none";

		document.getElementById(Hide2).style.display = "none";

		document.getElementById(forDiv).style.display = "block";

	}

	if(mode == 0){

		document.getElementById(forDiv).style.display = "none";

		document.getElementById(Hide1).style.display = "";

		document.getElementById(Hide2).style.display = "";

	}

}	

	



function menuPageSetter(type){

		if(type == '2'){

			document.getElementById('FILENAME').readOnly = true;

			document.getElementById('FILENAME').value = 'http://'+window.location.hostname+'/index.php?m=pages';

		}

		if(type == '1'){

			document.getElementById('FILENAME').readOnly = false;

			document.getElementById('FILENAME').value = '';

		}

}	

	

function recheckDicValsConn(dicchar, IDTOUPD){

	

		if(window.dicchar_IDTOUPD > 0){

			$("div[data-row-did='"+window.dicchar_IDTOUPD+"']").removeClass('active');

		}

	

		window.dicchar_IDTOUPD = IDTOUPD;

		

		$("div[data-row-did='"+IDTOUPD+"']").addClass('active');

		

		$("input[data-type-cont='allDictionType']").each(function() {

			if($( this )[0]['dataset']['dicchar'] == dicchar){

				$( this ).prop('checked', true);

			}

			else{

				$( this ).prop('checked', false);

			}

		});

}



function bigEditWindow(link)

		{	

			var name = "editWindow";

			var	left = ( screen.width - 1200 ) / 2

			var windowConf = "width=1200, height=600, left="+left+", top=10";

			

			

			

			

			window.open(link, name, windowConf);



		

		}



function langChanger(){

	window.location.href = window.location.protocol+'//'+window.location.hostname+'/switch.php?lang='+document.getElementById('langChanger').value;

}



function storDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedRowID').value;

			if(lastUsedData == '0'){

				var rowID = "S"+ storData;

				document.getElementById('seceltedRowID').value = rowID;

				document.getElementById('selectedDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			

			}

			else{

				document.getElementById(lastUsedData).className = "gridDataRow";

				var rowID = "S"+ storData;

				document.getElementById('seceltedRowID').value = rowID;

				document.getElementById('selectedDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			}

}







function getAllSubCats(parentCatID, tagToUpdate){

				var xmlhttp;



				xmlhttp=new XMLHttpRequest();

				

				xmlhttp.onreadystatechange=function()

				{

					if (xmlhttp.readyState==4 && xmlhttp.status==200)

						{

							

							document.getElementById(tagToUpdate).innerHTML = xmlhttp.responseText;

							

						}

					else{

							document.getElementById(tagToUpdate).innerHTML = '<option>Updating</option>';

					}

				}

			xmlhttp.open("GET","engine.php?getAllSubCats=1&parentCatID="+parentCatID,true);

			xmlhttp.send();



}





function changeSortType(mode){

	if(mode == 'byNEW'){

		$('#byNEW').val('1');

			$( "#byNEWTAG" ).addClass( "selected" );

		$('#bySTAT').val('0');

			$( "#bySTATTAG" ).removeClass( "selected" );

		$('#byPRICE').val('0');

			$( "#byPRICETAG" ).removeClass( "selected" );

	}

	if(mode == 'bySTAT'){

		$('#byNEW').val('0');

			$( "#byNEWTAG" ).removeClass( "selected" );

		$('#bySTAT').val('1');

			$( "#bySTATTAG" ).addClass( "selected" );

		$('#byPRICE').val('0');

			$( "#byPRICETAG" ).removeClass( "selected" );

	}

	if(mode == 'byPRICE'){

		$('#byNEW').val('0');

			$( "#byNEWTAG" ).removeClass( "selected" );

		$('#bySTAT').val('0');

			$( "#bySTATTAG" ).removeClass( "selected" );

		$('#byPRICE').val('1');

			$( "#byPRICETAG" ).addClass( "selected" );

	}

	updateProdList('');

}





function chageCarModelList2(carTypeId, tagNameToEdit)

{

				var xmlhttp;



				xmlhttp=new XMLHttpRequest();

				

				xmlhttp.onreadystatechange=function()

				{

					if (xmlhttp.readyState==4 && xmlhttp.status==200)

						{

							

							document.getElementById(tagNameToEdit).innerHTML = xmlhttp.responseText;

							

						}

					else{

							document.getElementById(tagNameToEdit).innerHTML = '<option>Updating</option>';

					}

				}

			xmlhttp.open("GET","mainadmin/engine.php?getCarMOdelofCarType2=1&ofCarType="+carTypeId,true);

			xmlhttp.send();



}







function countryDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedCountryRowID').value;

			if(lastUsedData == '0'){

				window.storData = storData;

				var rowID = "CCC"+ storData;

				document.getElementById('seceltedCountryRowID').value = rowID;

				document.getElementById('selectedCountryDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

				updateGrid('CarModel', 'gridRegionData', storData);

			

			}

			else{

				window.storData = storData;

				document.getElementById(lastUsedData).className = "gridDataRow";

				var rowID = "CCC"+ storData;

				document.getElementById('seceltedCountryRowID').value = rowID;

				document.getElementById('selectedCountryDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

				updateGrid('CarModel', 'gridRegionData', storData);

			}

}













function regionDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedRegionRowID').value;

			if(lastUsedData == '0'){

				var rowID = "RRR"+ storData;

				document.getElementById('seceltedRegionRowID').value = rowID;

				document.getElementById('selectedRegionDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			

			}

			else{

				document.getElementById(lastUsedData).className = "gridDataRow";

				var rowID = "RRR"+ storData;

				document.getElementById('seceltedRegionRowID').value = rowID;

				document.getElementById('selectedRegionDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			}

}





function districtDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedDistrictRowID').value;

			if(lastUsedData == '0'){

				var rowID = "DDD"+ storData;

				document.getElementById('seceltedDistrictRowID').value = rowID;

				document.getElementById('selectedDistrictDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			

			}

			else{

				document.getElementById(lastUsedData).className = "gridDataRow";

				var rowID = "DDD"+ storData;

				document.getElementById('seceltedDistrictRowID').value = rowID;

				document.getElementById('selectedDistrictDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			}

}







function streetDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedStreetRowID').value;

			if(lastUsedData == '0'){

				var rowID = "SSS"+ storData;

				document.getElementById('seceltedStreetRowID').value = rowID;

				document.getElementById('selectedStreetDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			

			}

			else{

				document.getElementById(lastUsedData).className = "gridDataRow";

				var rowID = "SSS"+ storData;

				document.getElementById('seceltedStreetRowID').value = rowID;

				document.getElementById('selectedStreetDataID').value = storData;

				document.getElementById(rowID).className = "selectedGridDataRow";

			}

}







function prodDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedRowID').value;

			if(lastUsedData == '0'){

				var rowID = "S"+ storData;

				document.getElementById('seceltedRowID').value = rowID;

				document.getElementById('selectedDataID').value = storData;

				document.getElementById(rowID).className = "popSectedGridDataRow";

			

			}

			else{

				document.getElementById(lastUsedData).className = "popUpGridData";

				var rowID = "S"+ storData;

				document.getElementById('seceltedRowID').value = rowID;

				document.getElementById('selectedDataID').value = storData;

				document.getElementById(rowID).className = "popSectedGridDataRow";

			}

}





function materialEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addMaterial.inc.php?eddingMaterial=1&editMaterial='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function departmentEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addDepartment.inc.php?eddingDepartment=1&editDepartment='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}







function userEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addUsers.inc.php?eddingUser=1&editUser='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function userAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	

		editWindow('exec/addUsers.inc.php?newWorker=1', 'editWindow');

		result = true;

 return result;

}







function workerEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addWorker.inc.php?eddingWorker=1&editWorker='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function workerAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addWorker.inc.php?newWorker=1', 'editWindow');

		result = true;	

 return result;

}



function projectEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addProject.inc.php?eddingProject=1&editProject='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function partnerEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addPartner.inc.php?eddingPartner=1&editPartner='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function colorEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addColor.inc.php?eddingColor=1&editColor='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function sliderEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addSlider.inc.php?eddingSlider=1&editSlider='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function projectAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addProject.inc.php?newProject=1', 'editWindow');

		result = true;	

 return result;

}



function partnerAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addPartner.inc.php?newPartner=1', 'editWindow');

		result = true;	

 return result;

}



function colorAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addColor.inc.php?newColor=1', 'editWindow');

		result = true;	

 return result;

}





function sliderAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addSlider.inc.php?newSlider=1', 'editWindow');

		result = true;	

 return result;

}





function funcOnProjectEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addFuncOnProject.inc.php?eddingFuncOnProject=1&editFuncOnProject='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}

function funcOnProjectAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addFuncOnProject.inc.php?newFuncOnProject=1', 'editWindow');

		result = true;	

 return result;

}

function serviceEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addService.inc.php?eddingService=1&editService='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}

function serviceAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addService.inc.php?newService=1', 'editWindow');

		result = true;	

 return result;

}

function historyEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addHistory.inc.php?eddingHistory=1&editHistory='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}

function historyAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addHistory.inc.php?newHistory=1', 'editWindow');

		result = true;	

 return result;

}



function newsAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addNews.inc.php?newNews=1', 'editWindow');

		result = true;	

 return result;

}



function newsEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addNews.inc.php?eddingNews=1&editNews='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function menuAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addMenu.inc.php?newMenu=1', 'editWindow');

		result = true;	

 return result;

}



function menuEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addMenu.inc.php?eddingMenu=1&editMenu='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function contractTypeAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addContractType.inc.php?newContractType=1', 'editWindow');

		result = true;	

 return result;

}





function contractTypeEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addContractType.inc.php?eddingContractType=1&editContractType='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function countryAdd(){

	var lastUsedID = document.getElementById('selectedCountryDataID').value;

	var result;

		editWindow('exec/addCountry.inc.php?newCountry=1', 'editWindow');

		result = true;	

 return result;

}





function countryEdit(){

	var lastUsedID = document.getElementById('selectedCountryDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addCountry.inc.php?eddingCountry=1&editCountry='+document.getElementById('selectedCountryDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function carTypeAdd(){

	var lastUsedID = document.getElementById('selectedCountryDataID').value;

	var result;

		editWindow('exec/addCarType.inc.php?newCarType=1', 'editWindow');

		result = true;	

 return result;

}





function carTypeEdit(){

	var lastUsedID = document.getElementById('selectedCountryDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addCarType.inc.php?eddingCarType=1&editCarType='+document.getElementById('selectedCountryDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}









function carModelAdd(){

	var lastUsedID = document.getElementById('selectedRegionDataID').value;

	var result;

		editWindow('exec/addCarModel.inc.php?newCarModel=1', 'editWindow');

		result = true;	

 return result;

}





function carModelEdit(){

	var lastUsedID = document.getElementById('selectedRegionDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addCarModel.inc.php?eddingCarModel=1&editCarModel='+document.getElementById('selectedRegionDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function regionAdd(){

	var lastUsedID = document.getElementById('selectedRegionDataID').value;

	var result;

		editWindow('exec/addRegion.inc.php?newRegion=1', 'editWindow');

		result = true;	

 return result;

}



function COLOR_EDIT(ID){

	document.getElementById('COLORS_NAMEID').value = document.getElementById('COLORNTEXT_'+ID).value;

	document.getElementById('COLORS_CODEID').value = document.getElementById('COLORNCODE_'+ID).value;

	window.COLOR_EDIT_ID = ID;

}



function BRAND_EDIT(ID){

	document.getElementById('BRAND_NAMEID').value = document.getElementById('BRANDNTEXT_'+ID).value;

	window.BRAND_EDIT_ID = ID;

}



function DICPRODGROUP_EDIT(ID){

	document.getElementById('DICPRODVAL_NAMEID').value = document.getElementById('DICPRODGROUPNTEXT_'+ID).value;

	window.DICPRODVAL_EDIT_ID = ID;

}





function DICPRODVAL_EDIT(ID, GID){

	document.getElementById('DICPRODVAL_NAMEID').value = document.getElementById('DICPRODVALNTEXT_'+ID).value;

	window.DICPRODVAL_EDIT_ID = ID;

	document.getElementById('DICPRODVAL_GID').value = GID;

}



function CATEGORIES_EDIT(ID){

	document.getElementById('CATEGORIES_NAMEID').value = document.getElementById('CATEGORIESNTEXT_'+ID).value;

	window.CATEGORIES_EDIT_ID = ID;

}



function CATEGORIESPARENT_EDIT(ID, PID){

	document.getElementById('CATEGORIES_NAMEID').value = document.getElementById('CATEGORIESNTEXT_'+ID).value;

	window.CATEGORIES_EDIT_ID = ID;

	document.getElementById('CATEGORIES_PARENTID').value = PID;

}



function DICTIONCLASS_EDIT(ID){

	document.getElementById('DICTIONCLASS_NAMEID').value = document.getElementById('DICTIONCLASSNTEXT_'+ID).value;

	window.DICTIONCLASSVAL_EDIT_ID = ID;

	document.getElementById('DICTION_DICTIONTYPE').value = 'NA';

}



function DICTIONCLASSVAL_EDIT(ID, GID){

	document.getElementById('DICTIONCLASS_NAMEID').value = document.getElementById('DICTIONCLASSVALNTEXT_'+ID).value;

	window.DICTIONCLASSVAL_EDIT_ID = ID;

	document.getElementById('DICTION_DICTIONTYPE').value = GID;

}







function streetAdd(){

	var lastUsedID = document.getElementById('selectedStreetDataID').value;

	var result;

		editWindow('exec/addStreet.inc.php?newStreet=1', 'editWindow');

		result = true;	

 return result;

}





function streetEdit(){

	var lastUsedID = document.getElementById('selectedStreetDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addStreet.inc.php?eddingStreet=1&editStreet='+document.getElementById('selectedStreetDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}













function categoryAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addCategory.inc.php?newCategory=1', 'editWindow');

		result = true;	

 return result;

}



function categoryEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addCategory.inc.php?eddingCategory=1&editCategory='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function categoryArtAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addACategory.inc.php?newArtCategory=1', 'editWindow');

		result = true;	

 return result;

}



function categoryArtEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addACategory.inc.php?eddingArtCategory=1&editArtCategory='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}









function customerAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addCustomer.inc.php?newCustomer=1', 'editWindow');

		result = true;	

 return result;

}







function customerEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addCustomer.inc.php?eddingCustomer=1&editCustomer='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function productAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addProduct.inc.php?newProduct=1', 'editWindow');

		result = true;	

 return result;

}







function productEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addProduct.inc.php?eddingProduct=1&editProduct='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function orderAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addOrder.inc.php?newOrder=1', 'editWindow');

		result = true;	

 return result;

}







function orderEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addOrder.inc.php?eddingOrder=1&editOrder='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}









function articleAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addArticle.inc.php?newArticle=1', 'editWindow');

		result = true;	

 return result;

}



function articleEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addArticle.inc.php?eddingArticle=1&editArticle='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}





function confEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID == '1'){

			editWindow('exec/addConf.inc.php?confID=SITECONTACTS', 'editWindow');

			result = true;

	}

	if(lastUsedID == '2'){

			editWindow('exec/addConf.inc.php?confID=RIGHTBANNER', 'editWindow');

			result = true;

	}

	if(lastUsedID == '3'){

			editWindow('exec/addConf.inc.php?confID=LEFTBANNER', 'editWindow');

			result = true;

	}

	if(lastUsedID == '4'){

			editWindow('exec/addConf.inc.php?confID=ALLPHINE', 'editWindow');

			result = true;

	}

	if(lastUsedID == '5'){

			editWindow('exec/addConf.inc.php?confID=RECALL', 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function faqAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addFaq.inc.php?newFaq=1', 'editWindow');

		result = true;	

 return result;

}





function faqEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addFaq.inc.php?eddingFaq=1&editFaq='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}

function mailEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addMail.inc.php?eddingMail=1&editMail='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



function galleryAdd(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		editWindow('exec/addGallery.inc.php?newGallery=1', 'editWindow');

		result = true;	

 return result;

}





function galleryEdit(){

	var lastUsedID = document.getElementById('selectedDataID').value;

	var result;

		

	if(lastUsedID != '0'){

			editWindow('exec/addGallery.inc.php?eddingGallery=1&editGallery='+document.getElementById('selectedDataID').value, 'editWindow');

			result = true;

	}

	if(lastUsedID == '0'){

			result = false;

	}

 return result;

}



Element.prototype.remove = function() {

    this.parentElement.removeChild(this);

}

NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {

    for(var i = 0, len = this.length; i < len; i++) {

        if(this[i] && this[i].parentElement) {

            this[i].parentElement.removeChild(this[i]);

        }

    }

}









function storValueRowAdd22(langId){

				

	var lastRowID = document.getElementById('lastAddedS'+langId+'SID').value; /*Вычисление нового идентификатора*/



	lastRowID = parseInt(lastRowID, 10);

	var parentElem = document.getElementById('S'+langId+'S'+lastRowID); 

	var newRowID = lastRowID+1;

	document.getElementById('lastAddedS'+langId+'SID').value = newRowID;



	var newRowData = "<td>"+newRowID+"</td><td><input type='text' name='PDESCNAME"+langId+"[]'></td><td><input type='text' id='P"+langId+"DESCTEXT"+newRowID+"' name='PDESCTEXT"+langId+"[]'></td><td><a onclick='storValueRowDel(SS"+newRowID+","+newRowID+")'>Удалить</a></td>";

	



	var newTR = document.createElement('tr');

	newTR.innerHTML =newRowData;

	newTR.className = 'imgHolderRow';

	newTR.id = 'S'+langId+'S'+newRowID;

	

	parentElem.parentNode.insertBefore(newTR, parentElem.nextSibling );

}







function storValueRowAdd(mode){

	 mode = typeof mode !== 'undefined' ? mode : 'imgMode';

		if(mode == 'imgMode'){	

							

							

							var lastRowID = document.getElementById('lastAddedID').value; /*Вычисление нового идентификатора*/

	

							lastRowID = parseInt(lastRowID, 10);

							var parentElem = document.getElementById('S'+lastRowID); 

							var newRowID = lastRowID+1;

							document.getElementById('lastAddedID').value = newRowID;

	

	

	

							var newRowData = "<td>1</td><td><input type='file' name='GIMG[]' accept='image/jpeg,image/png,image/gif'></td><td><a onclick='storValueRowDel(S"+newRowID+","+newRowID+")'>Հեռացնել</a></td>";

	

							var newTR = document.createElement('tr');

							newTR.innerHTML =newRowData;

							newTR.className = 'imgHolderRow';

							newTR.id = 'S'+newRowID;

	

							parentElem.parentNode.insertBefore(newTR, parentElem.nextSibling );



		}

		if(mode == 'addBankAcnt'){

					var lastRowID = document.getElementById('lastAddedbankAcntID').value; /*Вычисление нового идентификатора*/

	

					lastRowID = parseInt(lastRowID, 10);

					var parentElem = document.getElementById('B'+lastRowID); 

					var newRowID = lastRowID+1;

					document.getElementById('lastAddedbankAcntID').value = newRowID;

	

	

	

					var newRowData = window.bankAcntNew+"<td><a onclick='storValueRowDel(S"+newRowID+","+newRowID+")'>Հեռացնել</a></td>";

	

					var newTR = document.createElement('tr');

					newTR.innerHTML =newRowData;

					newTR.className = 'bankAcntHolderRow';

					newTR.id = 'B'+newRowID;

	

					parentElem.parentNode.insertBefore(newTR, parentElem.nextSibling );

		}

		if(mode == 'addCustPhone'){

					var lastRowID = document.getElementById('lastAddedcustPhoneID').value; /*Вычисление нового идентификатора*/

	

					lastRowID = parseInt(lastRowID, 10);

					var parentElem = document.getElementById('P'+lastRowID); 

					var newRowID = lastRowID+1;

					document.getElementById('lastAddedcustPhoneID').value = newRowID;

	

	

	

					var newRowData = window.custPhoneNew+"<td><a onclick='storValueRowDel(S"+newRowID+","+newRowID+")'>Հեռացնել</a></td>";

	

					var newTR = document.createElement('tr');

					newTR.innerHTML =newRowData;

					newTR.className = 'custPhoneHolderRow';

					newTR.id = 'P'+newRowID;

	

					parentElem.parentNode.insertBefore(newTR, parentElem.nextSibling );

		}				

		

		if(mode == 'addProdRel'){

					var lastRowID = document.getElementById('lastAddedProdRelID').value; /*Вычисление нового идентификатора*/

	

					lastRowID = parseInt(lastRowID, 10);

					var parentElem = document.getElementById('R'+lastRowID); 

					var newRowID = lastRowID+1;

					document.getElementById('lastAddedProdRelID').value = newRowID;

	

	

	

					var newRowData = window.prodRelNew1+newRowID+window.prodRelNew2+newRowID+window.prodRelNew3+"<td><a onclick='storValueRowDel(R"+newRowID+","+newRowID+")'>Հեռացնել</a></td>";

	

					var newTR = document.createElement('tr');

					newTR.innerHTML =newRowData;

					newTR.className = 'prodRelHolderRow';

					newTR.id = 'R'+newRowID;

	

					parentElem.parentNode.insertBefore(newTR, parentElem.nextSibling );

					

					var CPID = document.getElementById('CPID'+newRowID);

					

					CPID.onclick = function() {

									editMiniWindow('mini/chouseProduct.inc.php?ofLine=CPID'+newRowID+'&ofTextLine=PRODTEXT'+newRowID);

					}

		}

	

	

}

 

 

function startCopyOfProd(){

	

	$( ".copy_list_cont" ).each(function() {

	  if($(this).prop( "checked" ) == true){

		  

		var CopyFrom = $(this).val();

		var CopyTo = $("#editProductID").val();

		

		var xmlhttp;

			xmlhttp=new XMLHttpRequest();	

			xmlhttp.onreadystatechange=function()

					{

						if (xmlhttp.readyState==4 && xmlhttp.status==200)

							{

								location.reload();

							}

						else{

						}

					}

			xmlhttp.open("GET","engine.php?startCopyOfProd=1&CopyFrom="+CopyFrom+"&CopyTo="+CopyTo, true);

			xmlhttp.send();

			

		  

	  }

	});

	

} 

 

 

 



function addToCardProdInfo(mode){

	if(mode == 'hdd'){ 

		$( ".hdd_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  

			   $( "#hddCont" ).append( "<div id='HL_"+$(this).val()+"' class='col-sm-12 other-color'><div class='item'><a onclick='deleteProdCon(HL_"+$(this).val()+", 1);' class='remove'><i class='fa fa-trash-o' aria-hidden='true'></i></a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#hddName_"+$(this).val() ).val()+"</a><input type='hidden' name='HCPID[]' value='"+$(this).val()+"'></div></div>" );

			 

		  }

		});

	}

	if(mode == 'color'){ 

		$( ".color_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  

			   $( "#colorCont" ).append( "<div id='CL_"+$(this).val()+"' class='col-sm-12 other-color'><div class='item'><a onclick='deleteProdCon(CL_"+$(this).val()+", 1);' class='remove'><i class='fa fa-trash-o' aria-hidden='true'></i></a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#colName_"+$(this).val() ).val()+"</a><input type='hidden' name='CCPID[]' value='"+$(this).val()+"'></div></div>" );

			 

		  }

		});

	}

	if(mode == 'related'){

		$( ".related_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  

			  $( "#relatedCont" ).append( "<div id='RL_"+$(this).val()+"' class='addnewtag'><a onclick='deleteProdCon(RL_"+$(this).val()+", 1);' class='removetag'>Remove</a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#relName_"+$(this).val() ).val()+" / "+$( "#relPrice_"+$(this).val() ).val()+"AMD</a><input type='hidden' name='RCPID[]' value='"+$(this).val()+"'></div>" );

		  }

		});

	}

	if(mode == 'special'){

		$( ".special_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  

			  $( "#specialCont" ).append( "<div id='SL_"+$(this).val()+"' class='addnewtag'><a onclick='deleteProdCon(SL_"+$(this).val()+", 1);' class='removetag'>Remove</a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#specName_"+$(this).val() ).val()+" / "+$( "#specPrice_"+$(this).val() ).val()+"AMD</a><input type='text' name='SPRICE[]' value="+$( "#specPrice_"+$(this).val() ).val()+"><input type='hidden' name='SCPID[]' value='"+$(this).val()+"'></div>" );

		  }

		});

	}

	if(mode == 'similar'){

		$( ".similar_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  

			  $( "#similarCont" ).append( "<div id='SML_"+$(this).val()+"' class='addnewtag'><a onclick='deleteProdCon(SML_"+$(this).val()+", '1');' class='removetag'>Remove</a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#simName_"+$(this).val() ).val()+" / "+$( "#simPrice_"+$(this).val() ).val()+"AMD</a><input type='hidden' name='SMCPID[]' value='"+$(this).val()+"'></div>" );

		  }

		});

	}

	if(mode == 'wendor'){ 

		$( ".wendor_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  

			   $( "#otherWendors" ).append( "<div id='WML_"+$(this).val()+"' class='col-sm-12 other-color'><div class='item'><a onclick='deleteProdCon(WML_"+$(this).val()+", 1);' class='remove'><i class='fa fa-trash-o' aria-hidden='true'></i></a><a>"+$( "#wenName_"+$(this).val() ).val()+"</a><input type='hidden' name='WENCPID[]' value='"+$(this).val()+"'></div></div>" );

			 

		  }

		});

	}

	if(mode == 'groupItam'){ 

		$( ".similar_list_cont" ).each(function() {

		  if($(this).prop( "checked" ) == true){

			  if($( "#groupItamsCont_"+$( "#simCat_"+$(this).val() ).val() ).length == 0) {

				  

				  $( ".discountMainList").append( "<div class='discouted-items similar'><h2>"+$( "#simCatName_"+$(this).val() ).val()+"</h2><div id='groupItamsCont_"+$( "#simCat_"+$(this).val() ).val()+"'></div><a href='#' class='remove-all'><i class='fa fa-trash-o' aria-hidden='true'></i> Remove all items</a></div>" );

				  

				  $( "#groupItamsCont_"+$( "#simCat_"+$(this).val() ).val() ).append( "<div id='SML_"+$(this).val()+"' class='addnewtag'><a onclick='deleteProdCon(SML_"+$(this).val()+", '1');' class='removetag'>Remove</a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#simName_"+$(this).val() ).val()+" / "+$( "#simPrice_"+$(this).val() ).val()+"AMD</a><input type='hidden' name='SMCPID[]' value='"+$(this).val()+"'></div><div class=\"clearfix\"></div>" );

			  }

			  else{

				$( "#groupItamsCont_"+$( "#simCat_"+$(this).val() ).val() ).append( "<div id='SML_"+$(this).val()+"' class='addnewtag'><a onclick='deleteProdCon(SML_"+$(this).val()+", '1');' class='removetag'>Remove</a><a target='_blank' href='mainFrame.php?m=prod_edit&editProduct="+$(this).val()+"'>"+$( "#simName_"+$(this).val() ).val()+" / "+$( "#simPrice_"+$(this).val() ).val()+"AMD</a><input type='hidden' name='SMCPID[]' value='"+$(this).val()+"'></div><div class=\"clearfix\"></div>" );

			  }

		  }

		});

	}

}





function storValueRowDel(trToRemoveID, ID, mode){

	mode = typeof mode !== 'undefined' ? mode : 'imgMode';

		

		if(mode == 'imgMode'){

		/*Вычисление нового идентификатора*/

		var lastRowID = document.getElementById('lastAddedID').value; 

		if(ID == lastRowID){

			lastRowID = parseInt(lastRowID, 10);

			lastRowID = lastRowID-1;

			document.getElementById('lastAddedID').value = lastRowID;

		

		}

		/*Вычисление нового идентификатора*/

		trToRemoveID.remove();

		}

		else{

		

		}

}



function deleteProdCon(onTrID, ofGalID)

{

		var promo;

		promo = confirm("Remove connection?");

			if(promo){

				var xmlhttp;

				xmlhttp=new XMLHttpRequest();

				

				xmlhttp.onreadystatechange=function()

				{

					if (xmlhttp.readyState==4 && xmlhttp.status==200)

						{

							onTrID.remove();

						}

					else{

					}

				}

		xmlhttp.open("GET","engine.php?deleteProdCon=1&ID="+ofGalID,true);

		xmlhttp.send();

		}

}



function deleteGroupVal(onTrID, ofGalID)

{

		var promo;

		promo = confirm("Remove item?");

			if(promo){

				var xmlhttp;

				xmlhttp=new XMLHttpRequest();

				

				xmlhttp.onreadystatechange=function()

				{

					if (xmlhttp.readyState==4 && xmlhttp.status==200)

						{

							onTrID.remove();

						}

					else{

					}

				}

		xmlhttp.open("GET","engine.php?deleteGroupVal=1&ID="+ofGalID,true);

		xmlhttp.send();

		}

}



function deletePGalIMG(onTrID, ofGalID)

{

		var promo;

		

		promo = confirm("Delete Prod Pic?");

			if(promo){

				var xmlhttp;



				xmlhttp=new XMLHttpRequest();

				

				xmlhttp.onreadystatechange=function()

				{

					if (xmlhttp.readyState==4 && xmlhttp.status==200)

						{

							

							onTrID.remove();

							

						}

					else{

					}

				}

		xmlhttp.open("GET","engine.php?deletePGalIMG=1&galIIMGID="+ofGalID,true);

		xmlhttp.send();

		}





}





function deleteOGalIMG(onTrID, ofGalID)

{

		var promo;

		

		promo = confirm("Delete order product?");

			if(promo){

				var xmlhttp;



				xmlhttp=new XMLHttpRequest();

				

				xmlhttp.onreadystatechange=function()

				{

					if (xmlhttp.readyState==4 && xmlhttp.status==200)

						{

							

							onTrID.remove();

							

						}

					else{

					}

				}

		xmlhttp.open("GET","../engine.php?deleteOGalIMG=1&galIIMGID="+ofGalID,true);

		xmlhttp.send();

		}





}



function selectProductAndClose(){



	var productId = parseInt(document.getElementById('selectedDataID').value);

	if(productId > 0){

	var productName = document.getElementById('NAMETEXT'+productId).innerHTML;

	var productArticle = document.getElementById('ARTICLETEXT'+productId).innerHTML;

	

	try {

	opener.window.document.getElementById(window.tagToUpdate).value = productId;

	opener.window.document.getElementById(window.tagTextToUpdate).value = productArticle+' / '+productName;

	}

	catch(e) {

		alert(e);

		return 0;

	}

	window.close();

	}

	else{

		alert('Ապրանքը ընտրված չէ');

	}

}



function storMiniDataSelecter(storData){

		var lastUsedData = document.getElementById('seceltedRowID').value;

			if(lastUsedData == '0'){

				var rowID = "MiniGridTr"+ storData;

				document.getElementById('seceltedRowID').value = rowID;

				document.getElementById('selectedDataID').value = storData;

				document.getElementById(rowID).className = "miniPopUpDataContDataTrAct";

			}

			else{

				document.getElementById(lastUsedData).className = "miniPopUpDataContDataTr";

				var rowID = "MiniGridTr"+ storData;

				document.getElementById('seceltedRowID').value = rowID;

				document.getElementById('selectedDataID').value = storData;

				document.getElementById(rowID).className = "miniPopUpDataContDataTrAct";

			}

}



function deleteOrderUserVal(onTrID, onOrderRow){

		var xmlhttp;



		xmlhttp=new XMLHttpRequest();

		

		xmlhttp.onreadystatechange=function()

		{

			if (xmlhttp.readyState==4 && xmlhttp.status==200)

				{

					location.reload();

				}

			else{

			}

		}

		xmlhttp.open("GET", window.location.protocol+"//"+window.location.hostname+"/sadmin/engine.php?deleteOrderUserVal=1&galIIMGID="+onOrderRow,true);

		xmlhttp.send();

		

}





function deleteCompareVal(onOrderRow)

{

		var promo;

			var xmlhttp;



			xmlhttp=new XMLHttpRequest();

			

			xmlhttp.onreadystatechange=function()

			{

				if (xmlhttp.readyState==4 && xmlhttp.status==200)

					{

						location.reload();

					}

				else{

				}

			}

		xmlhttp.open("GET", window.location.protocol+"//"+window.location.hostname+"/mainadmin/engine.php?deleteCompareVal=1&ID="+onOrderRow,true);

		xmlhttp.send();

}