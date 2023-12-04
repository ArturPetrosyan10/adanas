<?	/* fos broker .am */

	

	function if_aparik($number) {

		$number = str_replace(' ', '', $number);

		return $number >= 30000;

	}

	

	function transLateURRL($rdata){

		$rdata = str_replace(' ', '-', $rdata);

		$rdata = str_replace('×', '_', $rdata);

		$rdata = str_replace('(', '_', $rdata);

		$rdata = str_replace(')', '_', $rdata);

		$rdata = str_replace('/', '_', $rdata);

		$rdata = str_replace('\\', '_', $rdata);

        $cyr = [

            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',

            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',

            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',

            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'

        ];

        $lat = [

            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',

            'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',

            'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',

            'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'

        ];

        $rdata = str_replace($cyr, $lat, $rdata);

       return strtolower($rdata);

	}

	

	function get_aparik_price12($number) {

		$number = str_replace(' ', '', $number);

		$number = $number * 100 / 100 / 12;

		$number = ceil($number / 10) * 10;

		return number_format($number, 0, '', ',');

	}

	

	function get_aparik_price24($number) {

		$number = str_replace(' ', '', $number);

		$number = $number * 100 / 100 / 24;

		$number = ceil($number / 10) * 10;

		return number_format($number, 0, '', ',');

	}

	

	function get_aparik_price36($number) {

		$number = str_replace(' ', '', $number);

		$number = $number * 100 / 100 / 36;

		$number = ceil($number / 10) * 10;

		return number_format($number, 0, '', ',');

	}

	

	function move_to_top(&$array, $key) {

    $temp = array($key => $array[$key]);

    unset($array[$key]);

    $array = $temp + $array;

	}

	

	function generateRandomString($length = 10) {

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$charactersLength = strlen($characters);

		$randomString = '';

		for ($i = 0; $i < $length; $i++) {

			$randomString .= $characters[rand(0, $charactersLength - 1)];

		}

		return $randomString;

	}

	

	

	function strposa($haystack, $needles=array(), $offset=0) {

        $chr = array();

        foreach($needles as $needle) {

                $res = strpos($haystack, $needle, $offset);

                if ($res !== false) $chr[$needle] = $res;

        }

        if(empty($chr)) return false;

        return min($chr);

	}

	

	

	function prodPriceToChar($PCURTYPE){

		$PCURTYPE = (int) $PCURTYPE;

		    $CURCHARID = mysql_query("SELECT `DICTIONNAMEID` FROM QK_DICTION WHERE `DICTIONTYPE` = 'CURRENCYTYPE' AND `DICTIONVALUE`='$PCURTYPE' LIMIT 1");

			$CURCHARID = mysql_fetch_assoc($CURCHARID);

			$CURCHARID = $CURCHARID['DICTIONNAMEID'];

			$RESULT = LangCharSetter(1, $CURCHARID, 150);

			return $RESULT;

	}

	

	function cpLogin(){

			

			$login = mysql_real_escape_string($_POST['login']);

			$password = mysql_real_escape_string($_POST['pass']);

			$authorization_query = mysql_query("SELECT CUSTOMER AS user_id, CONCAT(NAME, SNAME) AS userNameSurname FROM QK_CUSTOMER WHERE LOGIN = '$login' AND PASS = '$password' AND IS_SELLER = 1 AND ACTIVE = 1");

			$authorization = mysql_fetch_assoc($authorization_query);

			

			if(isset($authorization['user_id']) === true){

				

				$_SESSION['LOG_STATE'] = TRUE;

				$_SESSION['LOG_STATE_MEN'] = TRUE;

				$_SESSION['CUSTOMERTYPE'] = 2;

				$_SESSION['CUSTOMER'] = $authorization['user_id'];

				$_SESSION["user_id"] = $authorization['user_id'];

				$_SESSION["userNameSurname"] = $authorization['userNameSurname'];	

				header('Location:mainFrame.php');

				exit();

				

			}

			else{

				$GLOBALS['LERROR'] = 1;

				$GLOBALS['LERRORTEXT'] = "Login or Password Error";

			}

	}

	

	function LangCharSetter($lang, $NAMEID, $isShort = 0, $isHTML = 0){

		

		if($NAMEID > 0 && $lang > 0){

		$GLOBALS['langID'] = (int) $lang;

		$GLOBALS['TEXT_ID'] = (int) $NAMEID;

		$DATA = selection(666.2);

		$DATA = $DATA[0]['TEXT_VAL'];

		if(strlen($DATA) > 0){

			if($isHTML == 1){

				$DATA  = strip_tags($DATA);

			}

			if($isShort != 0){

				$strLeight = strlen($DATA);

				$DATA = mb_substr($DATA, 0, $isShort, 'UTF-8');

				if($isShort<=($strLeight-3)){

					$DATA .= '...';

				}

			}

		}

		else{/*sadasdasd*/

			$GLOBALS['langID'] = (int) 1;

			$DATA = selection(666.2);

			

			$DATA = $DATA[0]['TEXT_VAL'];

			if($isHTML == 1){

				$DATA  = strip_tags($DATA);

			}

			if($isShort != 0){

				$strLeight = strlen($DATA);

				$DATA = mb_substr($DATA, 0, $isShort, 'UTF-8');

				if($isShort<=($strLeight-3)){

					$DATA .= '...';

				}

			}

				

				

			

			

		}/*asdsad*/

		return $DATA;

		}

		else return '';

		

	}	

	

	

	class BlogPost

	{

			var $date;

			var $link;

			var $title;

	}



	class BlogFeed

	{

			var $posts = array();

			function __construct($file_or_url)

			{

				$file_or_url = $this->resolveFile($file_or_url);

				if (!($x = simplexml_load_file($file_or_url)))

					return;

				foreach ($x->channel->item as $item)

				{

					$post = new BlogPost();

					$post->date  = (string) $item->pubdate;

					$post->link  = (string) $item->link;

					$post->title = (string) $item->title;

					$post->summary = $this->summarizeText($post->text);

					$this->posts[] = $post;

				}

			}

			private function resolveFile($file_or_url) {

				if (!preg_match('|^http?:|', $file_or_url))

					$feed_uri = $_SERVER['DOCUMENT_ROOT'] .'/shared/xml/'. $file_or_url;

				else

					$feed_uri = $file_or_url;

				return $feed_uri;

			}

			private function summarizeText($summary) {

				$summary = strip_tags($summary);

				$max_len = 100;

				if (strlen($summary) > $max_len)

					$summary = substr($summary, 0, $max_len) . '...';

				return $summary;

			}

	}



	

	

	

	

	function bool_analizer($data)

		{

			if($data == 1){$result = 'yes';}

			elseif($data == 0) {$result = 'no';}

	

			return $result;

	

	

		}

	function menuTypeToString($data)

		{

			if($data == 1){$result = $GLOBALS['lPack']['noEdit'];}

			elseif($data == 2) {$result = $GLOBALS['lPack']['isEdit'];}

	

			return $result;

	

	

		}

	



	

	function dateTimeToString($data)

		{

			$result = array();

			

			$month = date('m', strtotime($data));

			switch ($month) {

				case 01: $month = "Jan"; break;

				case 02: $month = "Feb"; break;

				case 03: $month = "Mar"; break;

				case 04: $month = "Apr"; break;

				case 05: $month = "May"; break;

				case 06: $month = "Jun"; break;

				case 07: $month = "Jul"; break;

				case 08: $month = "Aug"; break;

				case 09: $month = "Sep"; break;

				case 10: $month = "Oct"; break;

				case 11: $month = "Nov"; break;

				case 12: $month = "Dec"; break;

			}

			

			$day = date('d', strtotime($data));

			

			$result['m'] = $month;

			$result['d'] = $day;

			

			return $result;

	

	

		}	

		

		

	function boolToCheckbox($data)

		{

			if($data == 1){$result = "checked";}

			elseif($data == 0) {$result = NULL;}

	

			return $result;

	

	

		}	

	function stateToText($data)

		{

			settype($data, "integer");

			if($data == 0){$result = "Ադմինիստրատիվ";}

			elseif($data == 1) {$result = "Սպասարկում";}

			return $result;

	

	

		}

	function departIDToStr($departID){

			$GLOBALS['ID'] = $departID;

				$resultData = selection(666.12);

				$resultData = $resultData[0]['TEXT_VAL'];

			return $resultData;

			

	

	

	}

	

	

	function dataFilter($data, $mode){

		if($data){

			$arr = array();

				while($array_data = mysql_fetch_assoc($data))

					{

					$arr[] = $array_data;

					

					}

			return $arr;

		}

		else{

			die("ERROR ON: ".$mode);

		}

	}

	

	



	function save($mode)

			{	

				$result = TRUE;

				

					if($mode == 999.1) /*Редактирование Работника*/

					{

					

						$ID = $_POST['editVacancieID'];

						$EDITDATE = date("Y-m-d H:i:s", strtotime($_POST['EDITDATE']));

						$ACTIVE = $_POST['ACTIVE'];

						

						$NAMEID = $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$JOBNAMEID = $_POST['JOBNAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $JOBNAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $JOBNAMEID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'JOBNAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$DESCID = $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						mysql_query("UPDATE QK_WORKERS

						SET ACTIVE = $ACTIVE,

						EDITDATE = '$EDITDATE'

						WHERE  ID = $ID") or die(mysql_error());

						

						

					}

				

				

				

					if($mode == 999.2) /*Добавление нового Работника*/

					{

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$JOBNAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $JOBNAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'JOBNAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						$IMG = "noWIMG.png";

						

						$EDITDATE = date("Y-m-d H:i:s", strtotime($_POST['EDITDATE']));

						$EMAIL = $_POST['EMAIL'];

						$ACTIVE = $_POST['ACTIVE'];

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_WORKERS  (NAMEID, QUE, JOBNAMEID, DESCID, ACTIVE, EMAIL, IMG, EDITDATE) 

													VALUES ($NAMEID, 0, $JOBNAMEID, $DESCID, $ACTIVE, '$EMAIL', '$IMG', '$EDITDATE')";

													 

						

						mysql_query($SQLQUE) or die(mysql_error());

													

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						

						

						



					

						

					

						

					}

					

					

					

					if($mode == 999.3) /*Редактирование Проекта*/

					{

						$sortCATCounter = 1;

						foreach($_POST['SORT_CAT'] as $SORTDATAID){

							mysql_query("UPDATE QK_CATEGORIES SET QUE = $sortCATCounter WHERE ID = $SORTDATAID");

							$sortCATCounter++;

						}

						

						$sortGRCounter = 1;

						foreach($_POST['SORT_GROUP'] as $SORTDATAID){

							mysql_query("UPDATE QK_DICPRODGROUP SET QUE = $sortGRCounter WHERE ID = $SORTDATAID");

							$sortGRCounter++;

						}

						

						$sortGRVCounter = 1;

						foreach($_POST['SORT_GROUP_VAL'] as $SORTDATAID){

							mysql_query("UPDATE QK_DICPRODVAL SET QUE = $sortGRVCounter WHERE ID = $SORTDATAID");

							$sortGRVCounter++;

						}

						

						$sortMANUFCounter = 1;

						foreach($_POST['SORT_MANUF'] as $SORTDATAID){

							mysql_query("UPDATE QK_DICTION SET DICTIONVALUE3 = $sortMANUFCounter WHERE id = $SORTDATAID");

							$sortMANUFCounter++;

						}

						

						$sortDICCLASSCounter = 1;

						foreach($_POST['SORT_DICCLASS'] as $SORTDATAID){

							mysql_query("UPDATE QK_DICTIONCLASS SET QUE = $sortDICCLASSCounter WHERE ID = $SORTDATAID");

							$sortDICCLASSCounter++;

						}

						

						$sortDICVALCounter = 1;

						foreach($_POST['SORT_DICCLASSVALS'] as $SORTDATAID){

							mysql_query("UPDATE QK_DICTION SET DICTIONVALUE4 = $sortDICVALCounter WHERE id = $SORTDATAID");

							$sortDICVALCounter++;

						}

						

						

						$sortSLIDERCounter = 1;

						foreach($_POST['SORT_SLIDER'] as $SORTDATAID){

							mysql_query("UPDATE QK_SLIDER SET QUE = $sortSLIDERCounter WHERE ID = $SORTDATAID");

							$sortSLIDERCounter++;

						}

						

						$sortPRODCounter = 1;

						foreach($_POST['SORT_PROD'] as $SORTDATAID){

							mysql_query("UPDATE QK_PRODUCTS SET QUE = $sortPRODCounter WHERE ID = $SORTDATAID");

							$sortPRODCounter++;

						}

						

						$sortADRCounter = 1;

						foreach($_POST['SORT_ADR'] as $SORTDATAID){

							mysql_query("UPDATE QK_ADDR SET QUE = $sortADRCounter WHERE ID = $SORTDATAID");

							$sortADRCounter++;

						}

					}

					if($mode == 999.4) /*Добавление Возможного пораметра к категории +*/

					{

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						$CATID = (int) $_POST["CATID"];

						$SELECTED = (int) $_POST["SELECTED"];

						$SQLQUE = "UPDATE QK_DICPRODVAL  SET VISIBLE = $SELECTED WHERE ID = $CATID";

						mysql_query($SQLQUE) or die(mysql_error());

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

					}

					

					if($mode == 999.5) /*Добавление Возможного пораметра к категории +*/

					{

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						$DICID = (int) $_POST["DICID"];

						$SELECTED = (int) $_POST["SELECTED"];

						$SQLQUE = "UPDATE QK_DICTION  SET DICTIONVALUE = $SELECTED WHERE id = $DICID";

						mysql_query($SQLQUE) or die(mysql_error());

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

					}

					

					if($mode == 999.6) /*Добавление нового Пользователя*/

					{

						

						$BROKER = (int) $_SESSION['CUSTOMER'];

						$CUSTOMER_ID = (int) $_POST['CUSTOMER_ID'];

						$WORKER_ID = (int) $_POST['WORKER_ID'];

						$BRAND_ID = (int) $_POST['BRAND_ID'];

						$ADDDATE = date("Y-m-d H:i:s");

						

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						mysql_query("INSERT INTO QK_CUSTOMER_USERS_SECTORS  

											(BROKER, CUSTOMER_ID, WORKER_ID, BRAND_ID, ADDDATE, ACTIVE) 

									VALUES ($BROKER, $CUSTOMER_ID, $WORKER_ID, $BRAND_ID, '$ADDDATE', $ACTIVE)") or die(mysql_error());

						

						

					}

					if($mode == 999.7) /*Добавление нового Пользователя*/

					{

						

						$CUST = $_SESSION['CUSTOMER'];

						$LOGIN = $_POST['LOGIN'];

						$PASS = $_POST['PASS'];

						$PASS_RE = $_POST['PASS_RE'];

						$CONTACT_NAME = $_POST['CONTACT_NAME'];

						$MAIL = $_POST['MAIL'];

						$PHONE = $_POST['PHONE'];

						$ADDDATE = date("Y-m-d H:i:s");

						

						$ACTIVE = 1;

						

						if($PASS == $PASS_RE){

							mysql_query("INSERT INTO QK_CUSTOMER_USERS  

												(CUST, LOGIN, PASS, CONTACT_NAME, MAIL, PHONE, ADDDATE, ACTIVE) 

										VALUES ('$CUST', '$LOGIN', '$PASS', '$CONTACT_NAME', '$MAIL', '$PHONE', '$ADDDATE', $ACTIVE)") or die(mysql_error());

						}

						

					}

					if($mode == 999.8) /*Редактирование запаса на складе*/

					{

						

					

						$ID = $_POST['editUserID'];		

						$LOGIN = $_POST['LOGIN'];

						$PASS = $_POST['PASS'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						$CONTACT_NAME = $_POST['CONTACT_NAME'];

						$MAIL = $_POST['MAIL'];

						$PHONE = $_POST['PHONE'];

						$ADDDATE = date("Y-m-d H:i:s");

						if(strlen($PASS) > 0){

							mysql_query("UPDATE QK_CUSTOMER_USERS 

										SET CONTACT_NAME = '$CONTACT_NAME',

										LOGIN = '$LOGIN',

										PASS = '$PASS',

										ACTIVE = $ACTIVE,

										CONTACT_NAME = '$CONTACT_NAME',

										MAIL = '$MAIL',

										PHONE = '$PHONE',

										ADDDATE = '$ADDDATE'

										 WHERE ID = $ID") or die(mysql_error());

						}

						else{

							mysql_query("UPDATE QK_CUSTOMER_USERS 

										SET CONTACT_NAME = '$CONTACT_NAME',

										LOGIN = '$LOGIN',

										ACTIVE = $ACTIVE,

										CONTACT_NAME = '$CONTACT_NAME',

										MAIL = '$MAIL',

										PHONE = '$PHONE',

										ADDDATE = '$ADDDATE'

										 WHERE ID = $ID") or die(mysql_error());

						}

					

					

					

						

					}

					if($mode == 999.9) /*Добавление Возможного пораметра к категории +*/

					{

						

						$ID = $_POST['editUserID'];		

						$CUSTOMER_ID = (int) $_POST['CUSTOMER_ID'];

						$WORKER_ID = (int) $_POST['WORKER_ID'];

						$BRAND_ID = (int) $_POST['BRAND_ID'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						$ADDDATE = date("Y-m-d H:i:s");

						

						mysql_query("UPDATE QK_CUSTOMER_USERS_SECTORS 

									SET

									CUSTOMER_ID = $CUSTOMER_ID,

									WORKER_ID = $WORKER_ID,

									BRAND_ID = $BRAND_ID,

									ACTIVE = $ACTIVE,

									ADDDATE = '$ADDDATE'

									 WHERE ID = $ID") or die(mysql_error());

						

					

					}

					if($mode == 999.11) /*Добавление Возможного пораметра к категории +*/

					{

						foreach($_POST['ROW_ID'] as $ROW_ID){

							$WORKER_ID = (int) $_POST['WORKER_ID'];

							mysql_query("UPDATE QK_CUSTOMER_USERS_SECTORS 

										SET

										WORKER_ID = $WORKER_ID

										 WHERE ID = $ROW_ID") or die(mysql_error());

										 

						}			 

						

					

					}

					

					if($mode == 999.12) /*Добавление Возможного пораметра к категории +*/

					{

						

						$CopyFrom = (int) $_GET['CopyFrom'];

						$CopyTo = (int) $_GET['CopyTo'];

						

						

						/*MAIN INFO UPD*/ 

							$mainOldData = mysql_query("SELECT CATID, MAKER, PRICE, COLOR, NAMEID, CRRULESID, LEFTCOUNT, OLDPRICE, NEW FROM QK_PRODUCTS WHERE ID = $CopyFrom");

							$mainOldData = mysql_fetch_assoc($mainOldData);

							

							$minorOldData = mysql_query("SELECT NAMEID, CRRULESID FROM QK_PRODUCTS WHERE ID = $CopyTo");

							$minorOldData = mysql_fetch_assoc($minorOldData);

							

							$NAME1 = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = {$mainOldData['NAMEID']} AND LANG_ID = 1 LIMIT 1");

							$NAME1 = mysql_fetch_assoc($NAME1);

							$NAME1 = $NAME1['TEXT_VAL'];

							

							$NAME2 = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = {$mainOldData['NAMEID']} AND LANG_ID = 2 LIMIT 1");

							$NAME2 = mysql_fetch_assoc($NAME2);

							$NAME2 = $NAME2['TEXT_VAL'];

							

							$NAME3 = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = {$mainOldData['NAMEID']} AND LANG_ID = 3 LIMIT 1");

							$NAME3 = mysql_fetch_assoc($NAME3);

							$NAME3 = $NAME3['TEXT_VAL'];

							

							$CRRULES1 = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = {$mainOldData['CRRULESID']} AND LANG_ID = 1 LIMIT 1");

							$CRRULES1 = mysql_fetch_assoc($CRRULES1);

							$CRRULES1 = $CRRULES1['TEXT_VAL'];

							

							$CRRULES2 = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = {$mainOldData['CRRULESID']} AND LANG_ID = 2 LIMIT 1");

							$CRRULES2 = mysql_fetch_assoc($CRRULES2);

							$CRRULES2 = $CRRULES2['TEXT_VAL'];

							

							$CRRULES3 = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = {$mainOldData['CRRULESID']} AND LANG_ID = 3 LIMIT 1");

							$CRRULES3 = mysql_fetch_assoc($CRRULES3);

							$CRRULES3 = $CRRULES3['TEXT_VAL'];

							

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$NAME1' WHERE TEXT_ID = {$minorOldData['NAMEID']} AND LANG_ID = 1 LIMIT 1");

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$NAME2' WHERE TEXT_ID = {$minorOldData['NAMEID']} AND LANG_ID = 2 LIMIT 1");

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$NAME3' WHERE TEXT_ID = {$minorOldData['NAMEID']} AND LANG_ID = 3 LIMIT 1");

							

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$CRRULES1' WHERE TEXT_ID = {$minorOldData['CRRULESID']} AND LANG_ID = 1 LIMIT 1");

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$CRRULES2' WHERE TEXT_ID = {$minorOldData['CRRULESID']} AND LANG_ID = 2 LIMIT 1");

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$CRRULES3' WHERE TEXT_ID = {$minorOldData['CRRULESID']} AND LANG_ID = 3 LIMIT 1");

							

							

							$CATID = $mainOldData['CATID'];

							$MAKER = $mainOldData['MAKER'];

							$PRICE = $mainOldData['PRICE'];

							$OLDPRICE = $mainOldData['OLDPRICE'];

							$NEW = $mainOldData['NEW'];

							$COLOR = $mainOldData['COLOR'];

							$LEFTCOUNT = $mainOldData['LEFTCOUNT'];

							

							mysql_query("UPDATE QK_PRODUCTS SET CATID = $CATID, MAKER = $MAKER, PRICE = $PRICE, COLOR = $COLOR, LEFTCOUNT = $LEFTCOUNT, OLDPRICE = $OLDPRICE WHERE ID = $CopyTo");

						

						/*MAIN INFO UPD*/

						

						/*PRODCONT COPY*/

						

						mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $CopyTo AND TYPE NOT IN (5, 4)");

						$allOldConDatas = mysql_query("SELECT CID, PRICE, TYPE FROM QK_PRODCONT WHERE PID = $CopyFrom AND TYPE NOT IN (5, 4)");

						while($allOldConData = mysql_fetch_assoc($allOldConDatas)){

							$TYPE = (int) $allOldConData['TYPE'];

							$PRICE = (int) $allOldConData['PRICE'];

							$CID = (int) $allOldConData['CID'];

							mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE, PRICE) 

																VALUES ($CopyTo, $CID, $TYPE, $PRICE)") or die(mysql_error());

						

						}

						

						/*PRODCONT COPY*/

						

						/*PRODDETVAL*/		

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN (SELECT VALUE FROM QK_PRODDETVAL WHERE PID = $CopyTo);");

						mysql_query("DELETE FROM QK_PRODDETVAL WHERE PID = $CopyTo;");

						

						$allValuesCodes = mysql_query("SELECT TYPEID, VALUE FROM QK_PRODDETVAL WHERE PID = $CopyFrom");

						while($allValuesCode = mysql_fetch_assoc($allValuesCodes)){

								

								$OLDTEXTID = $allValuesCode['VALUE'];

								$newLangID = selection(666.3);

								$newLangID = $newLangID[0];

								$newLangID = $newLangID['TEXT_ID']+1;

								

								$NAMEID = $newLangID;

								$langsINSERT = selection(666.1);

								foreach($langsINSERT as $langINSERT){

								$TEXT_ID = $NAMEID;

								$LANG_ID = $langINSERT['id'];

								

								$TEXT_VAL = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = $OLDTEXTID AND LANG_ID = $LANG_ID;");

								$TEXT_VAL = mysql_fetch_assoc($TEXT_VAL);

								$TEXT_VAL = $TEXT_VAL['TEXT_VAL'];

									

									

									mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

									VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

								}

								$TYPEID = $allValuesCode['TYPEID'];

								mysql_query("INSERT INTO QK_PRODDETVAL (PID, TYPEID, VALUE) 

													VALUES ($CopyTo, $TYPEID, $NAMEID)");

								

								

						}

						

						

						/*PRODDETVAL*/	

				

						

						/*IMG EXPORT*/

						mysql_query("DELETE FROM QK_PRODUCTS_IMG WHERE PRODID = $CopyTo");

						

						$allImgDatas = mysql_query("SELECT IMG, QUE FROM QK_PRODUCTS_IMG WHERE PRODID = $CopyFrom");

						while($allImgData = mysql_fetch_assoc($allImgDatas)){

							

							$IMG = $allImgData['IMG'];

							$QUE = $allImgData['QUE'];

							mysql_query("INSERT INTO QK_PRODUCTS_IMG  (PRODID, IMG, NAMEID, QUE) 

										VALUES ($CopyTo, '$IMG', 'NULL', $QUE)");

										

						}

						

						/*IMG EXPORT*/

						

					}

					

					if($mode == 999.13) /*Редактирование Функционала Проекта*/

					{

					

						$ID = (int) $_POST['editServiceID'];

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						/*Блок Работы С фотографией*/

						

						$oldPhotosData = mysql_query("SELECT `IMG`, `IMGHOVERED` FROM `QK_SERVICES` WHERE `ID` = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						

						$IMG = $oldPhotosData['IMG'];

						$IMGHOVERED = $oldPhotosData['IMGHOVERED'];

						

							if($_FILES['IMG']['name'])

							{

								if($IMG != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/".$IMG;

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

							

							

							

							if($_FILES['IMGHOVERED']['name'])

							{

								if($IMGHOVERED != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/".$IMGHOVERED;

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMGHOVERED = $customName.str_replace(' ', '', $_FILES['IMGHOVERED']['name']);

								$product_ico_tmp = $_FILES['IMGHOVERED']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMGHOVERED);

							}

						/*Блок Работы С фотографией*/

						

						mysql_query("UPDATE `QK_SERVICES`

						SET 

						`ACTIVE`=$ACTIVE,

						`IMG`='$IMG',

						`IMGHOVERED`='$IMGHOVERED',

						`EDITDATE`='$EDITDATE'

						WHERE  `ID` = $ID") or die(mysql_error());

					}

				if($mode == 999.14) /*Добавление Новой Истории*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SDESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Блок Работы С фотографией*/

							/*if($_FILES['LOGO']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/products/";

								$LOGO = $_FILES['LOGO']['name'];

								$product_ico_tmp = $_FILES['LOGO']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$LOGO);

							}

							else {$LOGO = "noWIMG.png";}*/

						

						/*Блок Работы С фотографией*/

						$YEAR = (int) $_POST['YEAR'];

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = $_POST['ACTIVE'];



						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_HISTORY`  (`NAMEID`,`SDESCID`,`DESCID`,`YEAR`,`IMG`,`ACTIVE`,`EDITDATE`) 

											VALUES ($NAMEID,$SDESCID,$DESCID,$YEAR,'noWIMG.png',$ACTIVE,'$EDITDATE')";

													

						mysql_query($SQLQUE) or die(mysql_error());							

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						

						

					}

					if($mode == 999.15) /*Редактирование Вопросов*/

					{

					

						$ID = (int) $_POST['editPlaceID'];

						

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$SDESCID = (int) $_POST['SDESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $SDESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$GLAT = $_POST['GLAT'];

						$GLONG = $_POST['GLONG'];

						$INNERID = $_POST['INNERID'];

						$EMAIL = $_POST['EMAIL'];

						$PHONE = $_POST['PHONE'];

						

						$WORKFROM = "'".date("Y-m-d H:i:s", strtotime(date("Y-m-d").' '.$_POST['WORKFROM_H'].':'.$_POST['WORKFROM_M'].':00'))."'";

						$WORKTO = "'".date("Y-m-d H:i:s", strtotime(date("Y-m-d").' '.$_POST['WORKTO_H'].':'.$_POST['WORKTO_M'].':00'))."'";

						

						

						mysql_query("UPDATE QK_ADDR

						SET GLAT = '$GLAT', GLONG = '$GLONG', INNERID = '$INNERID', EMAIL = '$EMAIL', PHONE = '$PHONE', WORKFROM = $WORKFROM, WORKTO = $WORKTO

						WHERE ID = $ID") or die(mysql_error());

					}

					if($mode == 999.16) /*Добавление нового Партнера*/

					{

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Блок Работы С фотографией*/

							if($_FILES['LOGO']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/partners/";

								$customName = substr(md5(microtime()), 0, 20);

								$LOGO = $customName.str_replace(' ', '', $_FILES['LOGO']['name']);

								$product_ico_tmp = $_FILES['LOGO']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$LOGO);

							}

							else {$LOGO = "noWIMG.png";}

						

						/*Блок Работы С фотографией*/

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_PARTNERS` WHERE `QUE` = $newQue LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										$lastQue = selection(999.47);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										mysql_query("UPDATE `QK_PARTNERS` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						/*Блок Очереди*/

						

						

						

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = $_POST['ACTIVE'];



						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_PARTNERS`  (`NAMEID`,`QUE`,`DESCID`,`ACTIVE`,`LOGO`,`EDITDATE`) 

													VALUES ($NAMEID,$newQue,$DESCID,$ACTIVE,'$LOGO','$EDITDATE')";

													

													

						

						

						

						mysql_query($SQLQUE) or die(mysql_error());

						

						

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

					

						

					}

					if($mode == 999.17) /*Редактирование Партнера*/

					{

					

						$ID = (int) $_POST['editPartnerID'];

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_PARTNERS` WHERE `QUE` = $newQue LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										$lastQue = (int) $_POST['oldQue'];

										mysql_query("UPDATE `QK_PARTNERS` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						

						

						/*Блок Очереди*/

						

						

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						$oldPhotosData = mysql_query("SELECT `LOGO` FROM QK_PARTNERS WHERE `ID` = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						$LOGO = $oldPhotosData['LOGO'];

						/*Блок Работы С фотографией*/

							if($_FILES['LOGO']['name'])

							{

								$oldPhotosData = mysql_query("SELECT `LOGO` FROM QK_PARTNERS WHERE `ID` = $ID LIMIT 1");

								$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

								if($oldPhotosData['LOGO'] != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/partners/".$oldPhotosData['LOGO'];

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/partners/";

								$customName = substr(md5(microtime()), 0, 20);

								$LOGO = $customName.str_replace(' ', '', $_FILES['LOGO']['name']);

								$product_ico_tmp = $_FILES['LOGO']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$LOGO);

							}

						/*Блок Работы С фотографией*/

						

						mysql_query("UPDATE `QK_PARTNERS`

						SET `ACTIVE`=$ACTIVE,

						`LOGO`='$LOGO',

						`QUE` = $newQue,

						`EDITDATE`='$EDITDATE'

						WHERE  `ID` = $ID") or die(mysql_error());

					}

					if($mode == 999.18) /*Добавление Новостей*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SDESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Блок Работы С фотографией*/

							if($_FILES['IMG']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/news/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

							else {$IMG = "noWIMG.png";}

						

						/*Блок Работы С фотографией*/

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = $_POST['ACTIVE'];

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_NEWS` WHERE `QUE` = $newQue LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										$lastQue = selection(999.47);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										mysql_query("UPDATE `QK_NEWS` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						

						

						/*Блок Очереди*/

						

						

						

						$NEWSDATE = date('Y-m-d H:i:s', strtotime($_POST['NEWSDATE']));



						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_NEWS`  (`NAMEID`,`NEWSDATE`,`SDESCID`,`DESCID`,`QUE`,`VIEWS`,`IMG`,`ACTIVE`,`EDITDATE`) 

											VALUES ($NAMEID,'$NEWSDATE',$SDESCID,$DESCID,$newQue,0,'$IMG',$ACTIVE,'$EDITDATE')";

													

						mysql_query($SQLQUE) or die(mysql_error());							

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						

						

						

					}

					if($mode == 999.19) /*Редактирование Новостей*/

					{

					

						$ID = (int) $_POST['editNewsID'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						$NEWSDATE = date('Y-m-d H:i:s', strtotime($_POST['NEWSDATE']));

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_NEWS` WHERE `QUE` = $newQue LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										$lastQue = (int) $_POST['oldQue'];

										mysql_query("UPDATE `QK_NEWS` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						

						

						/*Блок Очереди*/

						

						

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$SDESCID = (int) $_POST['SDESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $SDESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						/*Блок Работы С фотографией*/

						

						$oldPhotosData = mysql_query("SELECT `IMG` FROM QK_NEWS WHERE `ID` = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						

						$IMG = $oldPhotosData['IMG'];

						

							if($_FILES['IMG']['name'])

							{

								$oldPhotosData = mysql_query("SELECT `IMG` FROM QK_NEWS WHERE `ID` = $ID LIMIT 1");

								$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

								if($oldPhotosData['IMG'] != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/news/".$oldPhotosData['IMG'];

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/news/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

						/*Блок Работы С фотографией*/

						

						

						

						

						

						

						mysql_query("UPDATE `QK_NEWS`

						SET `ACTIVE`=$ACTIVE, `IMG` = '$IMG', `NEWSDATE` = '$NEWSDATE', `QUE` = $newQue

						WHERE  `ID` = $ID") or die(mysql_error());

					}

					

					

					if($mode == 999.21) /*Добавление Вопросов*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = 'New Store Name';

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SDESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = '';

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = '';

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

					

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = 1;

						

						

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_ADDR  (NAMEID, SDESCID, DESCID, GLAT, GLONG, WORKFROM, WORKTO, ACTIVE, EDITDATE, QUE) 

											VALUES ($NAMEID, $SDESCID, $DESCID, '', '',  '2018-07-09 10:00:00', '2018-07-09 21:00:00', $ACTIVE, '$EDITDATE', 0)";

													

														

						mysql_query($SQLQUE) or die(mysql_error());



						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

							

					}

					

					if($mode == 999.22){

						

						if(strlen($_POST['NAMEFROM']) > 2 && strlen($_POST['TEXTFROM']) > 5){

							

							$NAMEFROM = strip_tags($_POST['NAMEFROM']);

							$EMAILFROM = strip_tags($_POST['EMAILFROM']);

							$TEXTFROM = "<div style='font-weight:bold;'>".strip_tags($_POST['TEXTFROM'])."</div>";

							

							$to = 'info@mobilecentre.am';

							$subject = "FeedBeck Info From $NAMEFROM, $EMAILFROM";

							

							$message = $TEXTFROM;	

							

							 $subject_preferences = array(

								"input-charset" => 'utf-8',

								"output-charset" => 'utf-8',

								"line-length" => 76, 

								"line-break-chars" => "\r\n"

							);

							

							$header = "Content-type: text/html; charset=utf-8 \r\n";

							$header .= "From: mobilecentre.am FeedBack <info@mobilecentre.am> \r\n";

							$header .= "MIME-Version: 1.0 \r\n";

							$header .= "Content-Transfer-Encoding: 8bit \r\n";

							$header .= "Date: ".date("r (T)")." \r\n";

							$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);

							

							

							$array  = array('http', 'com', 'bit.ly', '.ru');



							if (strposa($message, $array, 1)) {

								

							} else {

								mail($to, $subject, $message, $header);

							}

							

							

							

						}

						elseif(strlen($_POST['mail']) > 1){

							$DATE = date("Y-m-d H:i:s");

							$mail = mysql_real_escape_string($_POST['mail']);

							mysql_query("INSERT INTO `QK_EMAIL` (`ID`, `FROM`, `TO`, `SENDERNAME`, `SENDERPHONE`, `MAILBODY`, `SUBJECT`, `SENDDATE`) VALUES (NULL, '$mail', '$mail', '$mail', '$mail', '$mail', '$mail', '$DATE');");

						}

						

						

						$result = true;

					

					}

					if($mode == 999.23) /*Добавление Меню*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$TITLEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $TITLEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'TITLEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$KEYID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $KEYID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'KEYID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$CONTENTID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $CONTENTID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'CONTENTID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						$QUE = (int) $_POST['QUE'];

						

						/*Блок Очереди*/

						

						if($_POST['PARENTID'] == 'NSET'){

							$PARENTID = 'NULL';

						}

						else{

							$PARENTID = (int) $_POST['PARENTID']; 

						}

						

						$ISMENU	 = (int) 1;

						$EDITDATE = date("Y-m-d H:i:s");

						$TYPE = (int) 2;

						$PLACE = (int) 1;

						$FILENAME = 'index.php?m=pages';

						$ACTIVE = (int) $_POST['ACTIVE'];

		

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_MENU  (PARENTID, ISMENU, PLACE, QUE, NAMEID, TITLEID, DESCID, KEYID, TYPE, FILENAME, CONTENTID, ACTIVE, EDITDATE) 

									VALUES ($PARENTID, $ISMENU, $PLACE, $QUE, $NAMEID, $TITLEID, $DESCID, $KEYID, $TYPE, '$FILENAME', $CONTENTID, $ACTIVE, '$EDITDATE')";

													

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						

						

						

						

						

					

						

					}

					if($mode == 999.24) /*Редактирование Меню*/

					{

						

						$ID = (int) $_POST['editMenuID'];

						

						$QUE = (int) $_POST['QUE'];

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$TITLEID = (int) $_POST['TITLEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $TITLEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $TITLEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'TITLEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$KEYID = (int) $_POST['KEYID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $KEYID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $KEYID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'KEYID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$CONTENTID = (int) $_POST['CONTENTID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $CONTENTID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $CONTENTID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'CONTENTID'."$LANG_ID";

							$TEXT_VAL = mysql_real_escape_string($_POST[$pangGetter]);

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						if($_POST['PARENTID'] == 'NSET'){

							$PARENTID = 'NULL';

						}

						else{

							$PARENTID = (int) $_POST['PARENTID']; 

						}

						

						$ACTIVE = (int) $_POST['ACTIVE'];

						$EDITDATE = date("Y-m-d H:i:s");

						

						mysql_query("UPDATE QK_MENU

						SET 

						ACTIVE = $ACTIVE,

						QUE = $QUE,

						EDITDATE = '$EDITDATE'	

						WHERE ID = $ID") or die(mysql_error());

						

					}

					

					

					if($mode == 999.25) 

					{

						unset($result);

						

						$ID = (int) $_POST["ID"];

						

						

						if($_FILES['IMG']['name'])

						{

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/catpic/";

							$customName = substr(md5(microtime()), 0, 20);

							$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

							$product_ico_tmp = $_FILES['IMG']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

						}

						else{

							$oldImageData = mysql_query("SELECT IMG FROM QK_CATEGORIES WHERE ID = $ID LIMIT 1");

							$oldImageData = mysql_fetch_assoc($oldImageData);

							$oldImageData = $oldImageData['IMG'];

							$IMG = $oldImageData;

						}

							

						$SQLQUE = "UPDATE QK_CATEGORIES

						SET 

						IMG = '$IMG'

						WHERE ID = $ID";			

						

						mysql_query($SQLQUE) or die(mysql_error());

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$result = 1;

					}

					

					if($mode == 999.26) 

					{

						unset($result);

						

						$ID = (int) $_POST["ID"];

						

						

						if($_FILES['IMG']['name'])

						{

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/brands/";

							$customName = substr(md5(microtime()), 0, 20);

							$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

							$product_ico_tmp = $_FILES['IMG']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

						}

						else{

							$oldImageData = mysql_query("SELECT DICTIONVALUE2 FROM QK_DICTION WHERE ID = $ID LIMIT 1");

							$oldImageData = mysql_fetch_assoc($oldImageData);

							$oldImageData = $oldImageData['DICTIONVALUE2'];

							$IMG = $oldImageData;

						}

							

						$SQLQUE = "UPDATE QK_DICTION

						SET 

						DICTIONVALUE2 = '$IMG'

						WHERE id = $ID";			

						

						mysql_query($SQLQUE) or die(mysql_error());

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$result = 1;

					}

					

					if($mode == 999.27) /*Добавление нового Слайдера*/

					{



						

						$IMG_1 = "noWIMG.png";

						$IMG_2 = "noWIMG.png";

						$IMG_3 = "noWIMG.png";

						$SIMG_1 = "noWIMG.png";

						$SIMG_2 = "noWIMG.png";

						$SIMG_3 = "noWIMG.png";

						

						/*Блок Очереди*/

							$ISSETONOLDREC = mysql_query("SELECT QUE FROM QK_SLIDER ORDER BY QUE DESC LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['QUE'])){

										$QUE = $ISSETONOLDREC['QUE']+1;

									}

									else{

										$QUE = 1;

									}

						/*Блок Очереди*/

						

						

						$ACTIVE = (int) 0;

						$TYPE = (int) $_GET['type'];



						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_SLIDER  (TYPE, IMG_1, IMG_2, IMG_3, SIMG_1, SIMG_2, SIMG_3, QUE, ACTIVE) 

													VALUES ($TYPE, '$IMG_1', '$IMG_2', '$IMG_3', '$SIMG_1', '$SIMG_2', '$SIMG_3', $QUE, $ACTIVE)";				

									

						

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

					}

					if($mode == 999.28) /*Редактирование Партнера*/

					{

						

						$t1BW = 1920;

						$t1BH = 550;

						

						$t1MW = 414;

						$t1MH = 540;

						

						$t2W = 560;

						$t2H = 285;

						

						$ID = (int) $_POST['editSliderID'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						$LINK = $_POST['LINK'];

						

						$oldPhotosData = mysql_query("SELECT IMG_1, IMG_2, IMG_3, SIMG_1, SIMG_2, SIMG_3, TYPE FROM QK_SLIDER WHERE ID = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						$TYPE = $oldPhotosData['TYPE'];

						$IMG_1 = $oldPhotosData['IMG_1'];

						$IMG_2 = $oldPhotosData['IMG_2'];

						$IMG_3 = $oldPhotosData['IMG_3'];

						$SIMG_1 = $oldPhotosData['SIMG_1'];

						$SIMG_2 = $oldPhotosData['SIMG_2'];

						$SIMG_3 = $oldPhotosData['SIMG_3'];

						

						if($_FILES['IMG_1']['name'] && ( $_FILES['IMG_1']['type'] == 'image/png' or $_FILES['IMG_1']['type'] == 'image/jpeg' )){

							

							list($width_orig, $height_orig) = getimagesize($_FILES['IMG_1']['tmp_name']);

							

							if($TYPE == 1){

								if($width_orig == $t1BW && $height_orig == $t1BH){}

								else{return false;}

							}

							elseif($TYPE == 2){

								if($width_orig == $t2W && $height_orig == $t2H){}

								else{return false;}

							}

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/slider/";

							$customName = substr(md5(microtime()), 0, 20);

							$IMG_1 = $customName.'_'.str_replace(' ', '', $_FILES['IMG_1']['name']);

							$product_ico_tmp = $_FILES['IMG_1']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$IMG_1);

						}

						if($_FILES['IMG_2']['name'] && ( $_FILES['IMG_2']['type'] == 'image/png' or $_FILES['IMG_2']['type'] == 'image/jpeg' )){

							

							list($width_orig, $height_orig) = getimagesize($_FILES['IMG_2']['tmp_name']);

							

							if($TYPE == 1){

								if($width_orig == $t1BW && $height_orig == $t1BH){}

								else{return false;}

							}

							elseif($TYPE == 2){

								if($width_orig == $t2W && $height_orig == $t2H){}

								else{return false;}

							}

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/slider/";

							$customName = substr(md5(microtime()), 0, 20);

							$IMG_2 = $customName.'_'.str_replace(' ', '', $_FILES['IMG_2']['name']);

							$product_ico_tmp = $_FILES['IMG_2']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$IMG_2);

						}

						if($_FILES['IMG_3']['name'] && ( $_FILES['IMG_3']['type'] == 'image/png' or $_FILES['IMG_3']['type'] == 'image/jpeg' )){

							

							list($width_orig, $height_orig) = getimagesize($_FILES['IMG_3']['tmp_name']);

							

							if($TYPE == 1){

								if($width_orig == $t1BW && $height_orig == $t1BH){}

								else{return false;}

							}

							elseif($TYPE == 2){

								if($width_orig == $t2W && $height_orig == $t2H){}

								else{return false;}

							}

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/slider/";

							$customName = substr(md5(microtime()), 0, 20);

							$IMG_3 = $customName.'_'.str_replace(' ', '', $_FILES['IMG_3']['name']);

							$product_ico_tmp = $_FILES['IMG_3']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$IMG_3);

						}

						

						if($_FILES['SIMG_1']['name'] && ( $_FILES['SIMG_1']['type'] == 'image/png' or $_FILES['SIMG_1']['type'] == 'image/jpeg' )){

							

							list($width_orig, $height_orig) = getimagesize($_FILES['SIMG_1']['tmp_name']);

							

							if($TYPE == 1){

								if($width_orig == $t1MW && $height_orig == $t1MH){}

								else{return false;}

							}

							elseif($TYPE == 2){

								if($width_orig == $t2W && $height_orig == $t2H){}

								else{return false;}

							}

							

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/slider/";

							$customName = substr(md5(microtime()), 0, 20);

							$SIMG_1 = $customName.'_'.str_replace(' ', '', $_FILES['SIMG_1']['name']);

							$product_ico_tmp = $_FILES['SIMG_1']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG_1);

						}

						

						if($_FILES['SIMG_2']['name'] && ( $_FILES['SIMG_2']['type'] == 'image/png' or $_FILES['SIMG_2']['type'] == 'image/jpeg' )){

							

							list($width_orig, $height_orig) = getimagesize($_FILES['SIMG_2']['tmp_name']);

							

							if($TYPE == 1){

								if($width_orig == $t1MW && $height_orig == $t1MH){}

								else{return false;}

							}

							elseif($TYPE == 2){

								if($width_orig == $t2W && $height_orig == $t2H){}

								else{return false;}

							}

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/slider/";

							$customName = substr(md5(microtime()), 0, 20);

							$SIMG_2 = $customName.'_'.str_replace(' ', '', $_FILES['SIMG_2']['name']);

							$product_ico_tmp = $_FILES['SIMG_2']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG_2);

						}

						

						if($_FILES['SIMG_3']['name'] && ( $_FILES['SIMG_3']['type'] == 'image/png' or $_FILES['SIMG_3']['type'] == 'image/jpeg' )){

							

							list($width_orig, $height_orig) = getimagesize($_FILES['SIMG_3']['tmp_name']);

							

							if($TYPE == 1){

								if($width_orig == $t1MW && $height_orig == $t1MH){}

								else{return false;}

							}

							elseif($TYPE == 2){

								if($width_orig == $t2W && $height_orig == $t2H){}

								else{return false;}

							}

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/slider/";

							$customName = substr(md5(microtime()), 0, 20);

							$SIMG_3 = $customName.'_'.str_replace(' ', '', $_FILES['SIMG_3']['name']);

							$product_ico_tmp = $_FILES['SIMG_3']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG_3);

						}

						

						mysql_query("UPDATE QK_SLIDER

						SET ACTIVE = $ACTIVE,

						IMG_1 = '$IMG_1',

						IMG_2 = '$IMG_2',

						IMG_3 = '$IMG_3',

						SIMG_1 = '$SIMG_1',

						SIMG_2 = '$SIMG_2',

						SIMG_3 = '$SIMG_3',

						LINK = '$LINK'

						WHERE ID = $ID") or die(mysql_error());

						

						return true;

					}

					if($mode == 999.29) /*Редактирование Работника*/

					{

					

						unset($result);

						$EDITDATE = date("Y-m-d H:i:s");

						$LANGID = (int) $_POST['LANGID'];

						$ONMODUL = $_POST['ONMODUL'];

						

				

						/*Блок Работы С фотографией*/

						$globCounter = (int) $_POST['filesCounter'];

							for($counter = 0; $counter < $globCounter; $counter++){

								if($_FILES['ATTIMG']['name'][$counter])

								{

									$TYPE = $_FILES['ATTIMG']['type'][$counter];

									

									$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/uploadFiles/";

									$customName = substr(md5(microtime()), 0, 20);

									$IMG = $customName.str_replace(' ', '', $_FILES['ATTIMG']['name'][$counter]);

									$product_ico_tmp = $_FILES['ATTIMG']['tmp_name'][$counter];

									$IMGFULLNAME = 'http://'.$_SERVER['SERVER_NAME']."/img/uploadFiles/".$IMG;

									$process = move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

									if($process != true){

										$result = false;

										break;

									}

											

									$SQLQUE = "INSERT INTO `QK_FILES`  (`LANGID`,`ONMODUL`,`LINK`,`TYPE`) 

																VALUES ($LANGID,'$ONMODUL','$IMGFULLNAME','$TYPE')";				

									mysql_query($SQLQUE) or die(mysql_error());

									$SQLQUE = str_replace("'", "-", $SQLQUE);									

									$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

									mysql_query($SQLLOG) or die(mysql_error());

								}

								$result[$counter] = array("LINK" => "$IMGFULLNAME");

							}

							

						/*Блок Работы С фотографией*/

						

					

						

					}

					if($mode == 999.31){

						$FROM = $_POST['FROM'];

						$TO = $_POST['TO'];

						$SENDERNAME = $_POST['SENDERNAME'];

						$SENDERPHONE = $_POST['SENDERPHONE'];

						$MAILBODY = $_POST['MAILBODY'];

						$SUBJECT = $_POST['SUBJECT'];

						$SENDDATE = date("Y-m-d H:i:s");

					

						$SQLQUE = "INSERT INTO `QK_EMAIL`  (`FROM`,`TO`,`SENDERNAME`,`SENDERPHONE`,`MAILBODY`,`SUBJECT`,`SENDDATE`) 

													VALUES ('$FROM','$TO','$SENDERNAME','$SENDERPHONE','$MAILBODY','$SUBJECT','$SENDDATE')";

						mysql_query($SQLQUE) or die(mysql_error());

						$result = true;

					

					}

					

					

					if($mode == 999.32){

						$WEBMAIL = $_POST['WEBMAIL'];

						$CURDOLLAR = $_POST['CURDOLLAR'];

						$NEWSPAGGER = $_POST['NEWSPAGGER'];

						$FACEPAGE = $_POST['FACEPAGE'];

						$LINKPAGE = $_POST['LINKPAGE'];

						$SKYPELOGIN = $_POST['SKYPELOGIN'];

						

						

						$TVITTPAGE = $_POST['TVITTPAGE'];

						

						

						$VKPAGE = $_POST['VKPAGE'];

						$OKPAGE = $_POST['OKPAGE'];

						$GPLUSPAGE = $_POST['GPLUSPAGE'];

						

						

						$YOUPAGE = $_POST['YOUPAGE'];

						$GMAP = $_POST['GMAP'];

						$GMAP2 = $_POST['GMAP2'];

					

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$CURDOLLAR' WHERE `CONFIGTYPE` = 'CURDOLLAR'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$WEBMAIL' WHERE `CONFIGTYPE` = 'WEBMAIL'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$NEWSPAGGER' WHERE `CONFIGTYPE` = 'NEWSPAGGER'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$FACEPAGE' WHERE `CONFIGTYPE` = 'FACEPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$LINKPAGE' WHERE `CONFIGTYPE` = 'LINKPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$SKYPELOGIN' WHERE `CONFIGTYPE` = 'SKYPELOGIN'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$YOUPAGE' WHERE `CONFIGTYPE` = 'YOUPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$GMAP' WHERE `CONFIGTYPE` = 'GMAP'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$GMAP2' WHERE `CONFIGTYPE` = 'GMAP2'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$TVITTPAGE' WHERE `CONFIGTYPE` = 'TVITTPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$VKPAGE' WHERE `CONFIGTYPE` = 'VKPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$OKPAGE' WHERE `CONFIGTYPE` = 'OKPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						$SQLQUE = "UPDATE `QK_CONFIGS` SET `CONFVALUE` = '$GPLUSPAGE' WHERE `CONFIGTYPE` = 'GPLUSPAGE'";

						mysql_query($SQLQUE) or die(mysql_error());

						

						

						$result = true;

					

					}

					if($mode == 999.33) /*Редактирование Работника*/

					{

						

						$CONFVALUE = $_POST['CONFVALUE'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $CONFVALUE") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $CONFVALUE;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'CONFVALUE'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}



						

					}

					

					if($mode == 999.34) /*Добавление Новой Группы Параметров*/

					{



						 

						$newLangID = selection(666.3);

						$newLangID = $newLangID[0];

						$newLangID = $newLangID['TEXT_ID']+1;

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['DICPRODVAL_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 2;

						$TEXT_VAL = $_POST['DICPRODVAL_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 3;

						$TEXT_VAL = $_POST['DICPRODVAL_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$NAMEID = (int) $TEXT_ID;

						$ACTIVE = (int) 1;

						

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_DICPRODGROUP  (NAMEID, ACTIVE) 

													VALUES ($NAMEID, $ACTIVE)";				

													

						

						

						

						mysql_query($SQLQUE) or die(mysql_error());

						

						

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

					

						

					}

					

					if($mode == 999.35) /*Добавление Категории Товаров*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SDESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						

						if($_POST['PARENTID'] == 'NSET'){

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_CATEGORIES` WHERE `QUE` = $newQue AND `PARENTID` IS NULL LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										mysql_query("UPDATE `QK_CATEGORIES` SET `QUE` = NULL WHERE ID = $ISSETONOLDREC");

										$lastQue = selection(999.68);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CATEGORIES` WHERE `QUE` = $i AND `PARENTID` IS NULL LIMIT 1");

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CATEGORIES` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						}

						else{

							

							/*Блок Очереди*/

							

							$PARENTID = (int) $_POST['PARENTID']; 

							

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_CATEGORIES` WHERE `QUE` = $newQue and `PARENTID` = $PARENTID LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										mysql_query("UPDATE `QK_CATEGORIES` SET `QUE` = NULL WHERE ID = $ISSETONOLDREC");

										$lastQue = selection(999.83);

										$lastQue = ($lastQue[0]['COUNT'])+1;

											for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CATEGORIES` WHERE `QUE` = $i AND `PARENTID` = $PARENTID LIMIT 1");

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CATEGORIES` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

							

						}

							

						

						/*Блок Очереди*/

						

						if($_POST['PARENTID'] == 'NSET'){

							$PARENTID = 'NULL';

						}

						else{

							$PARENTID = (int) $_POST['PARENTID']; 

						}

						

						

						/*Блок Работы С фотографией*/

							if($_FILES['IMG']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/catpic/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

							else {$IMG = "noWIMG.png";}

						

						/*Блок Работы С фотографией*/

						

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = (int) $_POST['ACTIVE'];

		

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_CATEGORIES`  (`PARENTID`,`QUE`,`NAMEID`,`IMG`,`SDESCID`,`ACTIVE`,`EDITDATE`) 

									VALUES ($PARENTID,$newQue,$NAMEID,'$IMG',$SDESCID,$ACTIVE,'$EDITDATE')";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					if($mode == 999.36) /*Редактирование Категории Товаров*/

					{

						

						$ID = (int) $_POST['CATEGORIES_EDIT_ID'];

						

						$PARENTID = (int) $_POST['CATEGORIES_PARENTID'];

						mysql_query("UPDATE QK_CATEGORIES SET PARENTID = $PARENTID WHERE ID = $ID");

						

						$NAMEID = mysql_query("SELECT NAMEID FROM QK_CATEGORIES WHERE ID = $ID LIMIT 1");

						$NAMEID = mysql_fetch_assoc($NAMEID);

						$NAMEID = (int) $NAMEID['NAMEID'];

						

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $NAMEID AND LANG_ID = 1") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['CATEGORIES_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID, LANG_ID, TEXT_VAL)

							VALUES ($TEXT_ID, $LANG_ID, '$TEXT_VAL')");

						}

						

					}	

					

					if($mode == 999.37) /*Добавление Нового Товара*/

					{

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = '';

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = '';

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$CRRULESID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $CRRULESID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'CRRULESID'."$LANG_ID";

							$TEXT_VAL = '';

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						$SIMG = "noWIMG.png";

						$IMG = "noWIMG.png";

						$DESCFILE = "noWIMG.png";

						

						$EDITDATE = date("Y-m-d H:i:s");

						

						$PRICE = (int) 0;

						$OLDPRICE = (int) 0;

						$ARTICLE = '';

						$MAKER = (int) 0;

						$BROKER = (int) $_SESSION['CUSTOMER'];

						$CURTYPE = (int) 0;

						$ISSPEC = (int) 0;

						$ISTOP = (int) 0;

						$LEFTCOUNT = (int) 0;

						$EXPORTED = 1;

						$CATID = (int) $_POST['addnewintemcat'];

						$ACTIVE	 = (int) 1;

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_PRODUCTS  (CATID,

															ARTICLE,

															NAMEID,

															DESCID,

															CRRULESID,

															MAKER,

															ISTOP,

															BROKER,

															ISSPEC,

															LEFTCOUNT,

															PRICE,

															OLDPRICE,

															CURTYPE,

															EXPORTED,

															SIMG,

															IMG,

															DESCFILE,

															ACTIVE,

															EDITDATE) 

										VALUES 

															($CATID,

															'$ARTICLE',

															$NAMEID,

															$DESCID,

															$CRRULESID,

															$MAKER,

															$ISTOP,

															$BROKER,

															$ISSPEC,

															$LEFTCOUNT,

															$PRICE,

															$OLDPRICE,

															$CURTYPE,

															$EXPORTED,

															'$SIMG',

															'$IMG',

															'$DESCFILE',

															$ACTIVE,

															'$EDITDATE')";

						mysql_query($SQLQUE) or die(mysql_error());

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$LASTGALID = mysql_query("SELECT `ID` FROM `QK_PRODUCTS` ORDER BY ID DESC LIMIT 1");

						$LASTGALID  = mysql_fetch_assoc($LASTGALID);

						$LASTGALID = $LASTGALID['ID'];

						$result = $LASTGALID;

					}	

					

					

					if($mode == 999.38) /*Редактирование Товара*/

					{

						

						$ID = (int) $_POST['editProductID'];

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die('66');

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = mysql_real_escape_string($_POST[$pangGetter]);

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die('61');

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = mysql_real_escape_string($_POST[$pangGetter]);

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$TDESCID = (int) $_POST['TDESCID'];

						

						if($TDESCID == 0){

							/*Generating New ID On Lang Modul*/

								$newLangID = selection(666.3);

								$newLangID = $newLangID[0];

								$newLangID = $newLangID['TEXT_ID']+1;

							/*Generating New ID On Lang Modul*/

							$TDESCID = $newLangID;

						}

						

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $TDESCID") or die('61');

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $TDESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'TDESCID'."$LANG_ID";

							$TEXT_VAL = mysql_real_escape_string($_POST['TDESCID']);

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$PREDESCID = (int) $_POST['PREDESCID'];

						

						if($PREDESCID == 0){

							/*Generating New ID On Lang Modul*/

								$newLangID = selection(666.3);

								$newLangID = $newLangID[0];

								$newLangID = $newLangID['TEXT_ID']+1;

							/*Generating New ID On Lang Modul*/

							$PREDESCID = $newLangID;

						}

						

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $PREDESCID") or die('61');

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $PREDESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'PREDESCID'."$LANG_ID";

							$TEXT_VAL = mysql_real_escape_string($_POST[$pangGetter]);

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$CRRULESID = (int) $_POST['CRRULESID'];

						

						if($CRRULESID == 0){

							/*Generating New ID On Lang Modul*/

								$newLangID = selection(666.3);

								$newLangID = $newLangID[0];

								$newLangID = $newLangID['TEXT_ID']+1;

							/*Generating New ID On Lang Modul*/

							$CRRULESID = $newLangID;

						}

						

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $CRRULESID") or die('61');

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $CRRULESID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'CRRULESID'."$LANG_ID";

							$TEXT_VAL = mysql_real_escape_string($_POST[$pangGetter]);

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$EDITDATE = date("Y-m-d H:i:s");

						$PRICE = (int) $_POST['PRICE'];

						$MAKER = (int) $_POST['MAKER'];

						$COLOR = (int) $_POST['COLOR'];

						$OLDPRICE = (int) $_POST['OLDPRICE'];

						

						$CURTYPE = (int) $_POST['CURTYPE'];

						$ISSPEC = (int) $_POST['ISSPEC'];

						$ISOFFER = (int) $_POST['ISOFFER'];

						$LEFTCOUNT = (int) $_POST['LEFTCOUNT'];

						

						if($ISOFFER > 0){

							$ISOFFER_FROM = "'".date("Y-m-d H:i:s", strtotime($_POST['ISOFFER_FROM_DATE'].' '.$_POST['ISOFFER_FROM_H'].':'.$_POST['ISOFFER_FROM_M'].':00'))."'";

							$ISOFFER_TO = "'".date("Y-m-d H:i:s", strtotime($_POST['ISOFFER_TO_DATE'].' '.$_POST['ISOFFER_TO_H'].':'.$_POST['ISOFFER_TO_M'].':00'))."'";

						}

						else{

							$ISOFFER_FROM = 'NULL';

							$ISOFFER_TO = 'NULL';

						}

						

						

						/*Блок Работы С фотографией*/

						

						if($_POST['VIMG'] == 0){

							mysql_query("UPDATE QK_PRODUCTS SET SIMG = 'noWIMG.png' WHERE ID = $ID");

						}

						

						$oldPhotosData = mysql_query("SELECT SIMG FROM QK_PRODUCTS WHERE ID = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						

						$SIMG = $oldPhotosData['SIMG'];

							

						if($_FILES['SIMG']['name'])

						{

							

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/";

							$customName = substr(md5(microtime()), 0, 20);

							$SIMG = $customName.str_replace(' ', '', $_FILES['SIMG']['name']);

							$product_ico_tmp = $_FILES['SIMG']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG);

						}

							

						/*Блок Работы С фотографией*/

					

						$ISTOP = (int) $_POST['ISTOP'];

						$NEW = (int) $_POST['NEW'];

						

						if($NEW == 1){

							

							$checkifset = mysql_query("SELECT ID FROM QK_NOTIFICATIONS WHERE TYPE = 4 AND PRODID = $ID");

							$checkifset = mysql_fetch_assoc($checkifset);

							$checkifset = (int) $checkifset['ID'];

							if($checkifset == 0){

								mysql_query("INSERT INTO QK_NOTIFICATIONS (TYPE, PRODID, ADDDATE) VALUES (4, $ID, '$EDITDATE')");

							}

						}

						

						$SOON = (int) $_POST['SOON'];

						$PREORDER = (int) $_POST['PREORDER'];

						$PREORDERPRICE = (int) $_POST['PREORDERPRICE'];

						$EXPORTED = 1;

						$DESCFILE = $_POST['DESCFILE'];

						

						if($_POST['CATID_3'] > 1){

							$CATID = (int) $_POST['CATID_3'];

						}

						elseif($_POST['CATID_2'] > 1){

							$CATID = (int) $_POST['CATID_2'];	

						}

						else{

							$CATID = (int) $_POST['CATID_1'];

						}

						

						if($PREORDER > 0 && strlen($_POST['PREORDER_FROM_DATE']) > 3 && strlen($_POST['PREORDER_TO_DATE']) > 3 ){

							$PREORDER_FROM = "'".date("Y-m-d H:i:s", strtotime($_POST['PREORDER_FROM_DATE'].' '.$_POST['PREORDER_FROM_H'].':'.$_POST['PREORDER_FROM_M'].':00'))."'";

							$PREORDER_TO = "'".date("Y-m-d H:i:s", strtotime($_POST['PREORDER_TO_DATE'].' '.$_POST['PREORDER_TO_H'].':'.$_POST['PREORDER_TO_M'].':00'))."'";

						}

						else{

							$PREORDER_FROM = 'NULL';

							$PREORDER_TO = 'NULL';

							$PREORDER = 0;

						}

						

						

						

						$ACTIVE	= (int) $_POST['ACTIVE'];

						$EXCLUDED = (int) $_POST['EXCLUDED'];

						$ONLYSHOP = (int) $_POST['ONLYSHOP'];

						$ISCOUNTRY = (int) $_POST['ISCOUNTRY'];

						$DELIVERY = (int) $_POST['DELIVERY'];

						$ARTICLE = mysql_real_escape_string($_POST['ARTICLE']);

						

						

						mysql_query("UPDATE QK_PRODUCTS

						SET 

						TDESCID = $TDESCID,

						PREDESCID = $PREDESCID,

						CRRULESID = $CRRULESID,

						PRICE = $PRICE,

						MAKER = $MAKER,

						COLOR = $COLOR,

						OLDPRICE = $OLDPRICE,

						CURTYPE = $CURTYPE,

						ISSPEC = $ISSPEC,

						DELIVERY = $DELIVERY,

						ISOFFER = $ISOFFER,

						LEFTCOUNT = $LEFTCOUNT,

						ISOFFER_FROM = $ISOFFER_FROM,

						ISOFFER_TO = $ISOFFER_TO,

						PREORDER_FROM = $PREORDER_FROM,

						PREORDER_TO = $PREORDER_TO,

						NEW = $NEW,

						SOON = $SOON,

						SIMG = '$SIMG',

						ISTOP = $ISTOP,

						EXPORTED = $EXPORTED,

						PREORDER = $PREORDER,

						PREORDERPRICE = $PREORDERPRICE,

						CATID = $CATID,

						ARTICLE = '$ARTICLE',

						ACTIVE = $ACTIVE,

						EXCLUDED = $EXCLUDED,

						ONLYSHOP = $ONLYSHOP,

						ISCOUNTRY = $ISCOUNTRY,

						DESCFILE = '$DESCFILE',

						EDITDATE = '$EDITDATE'

						WHERE ID = $ID") or die('2');

						

						$LASTGALID = $ID;

						

						/*IMG SORTING*/

						

						$sortLocCounter = 1;

						foreach($_POST['PIMGSORT'] as $SORTIMGID){

							mysql_query("UPDATE QK_PRODUCTS_IMG SET QUE = $sortLocCounter WHERE ID = $SORTIMGID AND PRODID = $LASTGALID");

							$sortLocCounter++;

						}

						/*IMG SORTING*/

						

						

						/*OTHER CATS*/

						

							mysql_query("DELETE FROM QK_PRODUCTS_CATS WHERE PRODID = $LASTGALID");

							

							foreach($_POST['OTHERCATID'] as $CATID){

								mysql_query("INSERT INTO QK_PRODUCTS_CATS  (PRODID, CATID) VALUES ($LASTGALID, $CATID)");									

							}	

							

						/*OTHER CATS*/

						

						

						/*TYPE 1*/

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['RCPID']);

						while($localCounter2 <= $maxCounter){

								$RCPID = $_POST['RCPID'][$localCounter];

								$NOTE = '';

								$TYPE = (int) 1;

								if($RCPID > 0){

																

								mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $LASTGALID AND CID = $RCPID AND TYPE = $TYPE");

								mysql_query("DELETE FROM QK_PRODCONT WHERE CID = $LASTGALID AND PID = $RCPID AND TYPE = $TYPE");

								

								

								mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																VALUES ($LASTGALID, $RCPID, $TYPE)") or die('81');

								mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																VALUES ($RCPID, $LASTGALID, $TYPE)") or die('81');

																

								}					

							

						$localCounter++;

						$localCounter2++;

						}

						/*TYPE 1*/

						

						

						/*TYPE 2*/

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['SCPID']);

						while($localCounter2 <= $maxCounter){

								$SCPID = $_POST['SCPID'][$localCounter];

								$PRICE = $_POST['SPRICE'][$localCounter];

								$NOTE = '';

								$TYPE = (int) 2;

								if($SCPID > 0){

								mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $LASTGALID AND CID = $SCPID AND TYPE = $TYPE");

								mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE, PRICE) 

																VALUES ($LASTGALID, $SCPID, $TYPE, $PRICE)") or die('5');

								}					

							

						$localCounter++;

						$localCounter2++;

						}

						/*TYPE 2*/

						

						

						/*TYPE 3*/

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['SMCPID']);

						while($localCounter2 <= $maxCounter){

								$SMCPID = $_POST['SMCPID'][$localCounter];

								$NOTE = '';

								$TYPE = (int) 3;

								if($SMCPID > 0){

								mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $LASTGALID AND CID = $SMCPID AND TYPE = $TYPE");

								mysql_query("DELETE FROM QK_PRODCONT WHERE CID = $LASTGALID AND PID = $SMCPID AND TYPE = $TYPE");

								

								

								mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																VALUES ($LASTGALID, $SMCPID, $TYPE)") or die('81');

								mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																VALUES ($SMCPID, $LASTGALID, $TYPE)") or die('81');

								}					

							

						$localCounter++;

						$localCounter2++;

						}

						/*TYPE 3*/

						

						/*TYPE 4*/

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['CCPID']);

						while($localCounter2 <= $maxCounter){

								$CCPID = $_POST['CCPID'][$localCounter];

								$PRICE = (int) $_POST['SPRICE'][$localCounter];

								$NOTE = '';

								$TYPE = (int) 4;

								if($CCPID > 0){

								

							    $ISALTER = mysql_query("SELECT 11 AS DATA FROM QK_PRODCONT WHERE PID = $CCPID AND CID = $LASTGALID AND TYPE = $TYPE");

								$ISALTER = mysql_fetch_assoc($ISALTER);

								$ISALTER = (int) $ISALTER['DATA'];

									if($ISALTER == 0){

											mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $LASTGALID AND CID = $CCPID AND TYPE = $TYPE");

											mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																	VALUES ($LASTGALID, $CCPID, $TYPE)") or die('81');

									}

																

								}					

							

						$localCounter++;

						$localCounter2++;

						}

						/*TYPE 4*/

						

						/*TYPE 5*/

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['HCPID']);

						while($localCounter2 <= $maxCounter){

								$HCPID = $_POST['HCPID'][$localCounter];

								$PRICE = 0;

								$NOTE = '';

								$TYPE = (int) 5;

								if($HCPID > 0){

																

									$ISALTER = mysql_query("SELECT 11 AS DATA FROM QK_PRODCONT WHERE PID = $HCPID AND CID = $LASTGALID AND TYPE = $TYPE");

									$ISALTER = mysql_fetch_assoc($ISALTER);

									$ISALTER = (int) $ISALTER['DATA'];

										if($ISALTER == 0){

												mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $LASTGALID AND CID = $HCPID AND TYPE = $TYPE");

												mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																		VALUES ($LASTGALID, $HCPID, $TYPE)") or die('81');

										}			

								}					

							

							$localCounter++;

							$localCounter2++;

						}

						/*TYPE 5*/

						

						/*TYPE 6*/

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['WENCPID']);

						while($localCounter2 <= $maxCounter){

								$WENCPID = $_POST['WENCPID'][$localCounter];

								$NOTE = '';

								$TYPE = (int) 6;

								if($WENCPID > 0){

									mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $LASTGALID AND CID = $WENCPID AND TYPE = $TYPE");

									mysql_query("INSERT INTO QK_PRODCONT  (PID, CID, TYPE) 

																VALUES ($LASTGALID, $WENCPID, $TYPE)") or die('81');

								}					

							

						$localCounter++;

						$localCounter2++;

						}

						/*TYPE 6*/

						

						$locCounter = (int) 0;

						while(isset($_POST['EXPDESC'][$locCounter])){

							$QK_PRODUCTS_DESC_ID = (int) $_POST['EXPDESC'][$locCounter];

							$DESCDATA = mysql_query("SELECT LANGID, NAMEID, DESCID FROM QK_PRODUCTS_DESC WHERE ID = $QK_PRODUCTS_DESC_ID LIMIT 1");

							$DESCDATA = mysql_fetch_assoc($DESCDATA);

							

							$LANGID = (int) $DESCDATA['LANGID'];

							$NAMEID = (int) $DESCDATA['NAMEID'];

							$DESCID = (int) $DESCDATA['DESCID'];

							

							

							$NEWNAMEIDTEXT = mysql_real_escape_string($_POST['EX'.$QK_PRODUCTS_DESC_ID.'PDESCNAMEID']);

							$NEWDESCIDTEXT = mysql_real_escape_string($_POST['EX'.$QK_PRODUCTS_DESC_ID.'PDESCDESCID']);

							

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$NEWNAMEIDTEXT' WHERE TEXT_ID = $NAMEID AND LANG_ID = $LANGID");

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$NEWDESCIDTEXT' WHERE TEXT_ID = $DESCID AND LANG_ID = $LANGID");

							

							$locCounter++;

						}

					

						

						

						

						/*ADDING INS PROD DESC*/

						foreach($langsINSERT as $langINSERT){

							$curLangId = $langINSERT['id'];

							$localCounter = 0;

							$maxCounter = count($_POST['PDESCNAME'.$curLangId]);

							while($localCounter <= $maxCounter){

								if(isset($_POST['PDESCNAME'.$curLangId][$localCounter]) && isset($_POST['PDESCTEXT'.$curLangId][$localCounter])){

									if(strlen($_POST['PDESCNAME'.$curLangId][$localCounter]) > 0){	

										

										$PID = (int) $LASTGALID;

										$LANGID = (int) $curLangId;

										

										

										/*DESC NAME INSERT*/

										$newLangID = selection(666.3);

										$newLangID = $newLangID[0];

										$newLangID = $newLangID['TEXT_ID']+1;

										$TEXT_ID = $newLangID;

										$NAMEID = $newLangID;

										$LANG_ID = $LANGID;

										$TEXT_VAL = mysql_real_escape_string($_POST['PDESCNAME'.$curLangId][$localCounter]);

										mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

										VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die('88');

										/*DESC NAME INSERT*/

										

										/*DESC DESC INSERT*/

										$newLangID = selection(666.3);

										$newLangID = $newLangID[0];

										$newLangID = $newLangID['TEXT_ID']+1;

										$TEXT_ID = $newLangID;

										$DESCID = $newLangID;

										$LANG_ID = $LANGID;

										$TEXT_VAL = mysql_real_escape_string($_POST['PDESCTEXT'.$curLangId][$localCounter]);

										mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

										VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die('59');

										/*DESC DESC INSERT*/

										

										$ACTIVE = 1;

										

										

										mysql_query("INSERT INTO `QK_PRODUCTS_DESC`  (`PID`,`LANGID`,`NAMEID`, `DESCID`, `ACTIVE`) 

														VALUES ($PID,$LANGID,$NAMEID, $DESCID, $ACTIVE)") or die('44');

									}

								}

							$localCounter++;

							}

						}

						/*ADDING INS PROD DESC*/

						

						$localCounter = 0;

						$maxCounter = count($_FILES['GIMG']);

						while($localCounter <= $maxCounter){

							if(isset($_FILES['GIMG']['name'][$localCounter])  && $_FILES['GIMG']['name'][$localCounter] != ''){

									$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/";

									$customName = substr(md5(microtime()), 0, 20);

									$IMG = $customName.str_replace(str_split('() '), '_', $_FILES['GIMG']['name'][$localCounter]);

									$product_ico_tmp = $_FILES['GIMG']['tmp_name'][$localCounter];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

									

									$filename = $product_image_location.$IMG;

									$width = 550;

									$height = 550;

									$info = getimagesize($filename);

									list($width_orig, $height_orig) = getimagesize($filename);

									$ratio_orig = $width_orig/$height_orig;

									if($width/$height > $ratio_orig){

									   $width = $height*$ratio_orig;

									}

									else{

									   $height = $width/$ratio_orig;

									}

									$image_p = imagecreatetruecolor($width, $height);

									if($info['mime'] == 'image/jpeg'){

										$image = imagecreatefromjpeg($filename);

									}

									elseif($info['mime'] == 'image/gif'){

										$image = imagecreatefromgif($filename);

									}

									elseif($info['mime'] == 'image/png'){

										$image = imagecreatefrompng($filename);

									}

									else{	

										continue;

									}

									imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

									imagejpeg($image_p, $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$IMG, 100);

									

									/*$stamp = imagecreatefrompng($_SERVER["DOCUMENT_ROOT"]."/img/stamp.png");

									$im = imagecreatefromjpeg($_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$IMG);

									$marge_right = 197;

									$marge_bottom = 259;

									$sx = imagesx($stamp);

									$sy = imagesy($stamp);

									

									imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

									imagejpeg($im, $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$IMG, 100);

									imagedestroy($im);*/

									

									

									$filename = $product_image_location.$IMG;

									$width = 376;

									$height = 376;

									$info = getimagesize($filename);

									list($width_orig, $height_orig) = getimagesize($filename);

									$ratio_orig = $width_orig/$height_orig;

									if($width/$height > $ratio_orig){

									   $width = $height*$ratio_orig;

									}

									else{

									   $height = $width/$ratio_orig;

									}

									$image_p = imagecreatetruecolor($width, $height);

									if($info['mime'] == 'image/jpeg'){

										$image = imagecreatefromjpeg($filename);

									}

									elseif($info['mime'] == 'image/gif'){

										$image = imagecreatefromgif($filename);

									}

									elseif($info['mime'] == 'image/png'){

										$image = imagecreatefrompng($filename);

									}

									else{	

										continue;

									}

									imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

									imagejpeg($image_p, $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/".$IMG, 100);

									

									/*$stamp = imagecreatefrompng($_SERVER["DOCUMENT_ROOT"]."/img/stamp.png");

									$im = imagecreatefromjpeg($_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/".$IMG);

									$marge_right = 15;

									$marge_bottom = 15;

									$sx = imagesx($stamp);

									$sy = imagesy($stamp);

									

									imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

									imagejpeg($im, $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/".$IMG, 100);

									imagedestroy($im);*/

									

									mysql_query("INSERT INTO QK_PRODUCTS_IMG  (PRODID, IMG, NAMEID, QUE) 

													VALUES ($LASTGALID, '$IMG', NULL, $sortLocCounter)") or die(mysql_error());

									

									$sortLocCounter++;

							}

						$localCounter++;

						}

						

						

						/*ADDING STAT INS PROD DESC*/

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN (SELECT VALUE FROM QK_PRODDETVAL WHERE PID = $LASTGALID);");

						mysql_query("DELETE FROM QK_PRODDETVAL WHERE PID = $LASTGALID;");

						

						$allValuesCodes = mysql_query("SELECT TAGID FROM QK_CATDETVAL WHERE CATID = $CATID");

						

						while($allValuesCode = mysql_fetch_assoc($allValuesCodes)){

								

								

								$newLangID = selection(666.3);

								$newLangID = $newLangID[0];

								$newLangID = $newLangID['TEXT_ID']+1;

								

								$NAMEID = $newLangID;

								$langsINSERT = selection(666.1);

								foreach($langsINSERT as $langINSERT){

								$TEXT_ID = $NAMEID;

								$LANG_ID = $langINSERT['id'];

								$pangGetter = $allValuesCode['TAGID'].'_'."$LANG_ID";

									$TEXT_VAL = $_POST[$pangGetter];

									mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

									VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die('57');

								}

								$TYPEID = $allValuesCode['TAGID'];

								mysql_query("INSERT INTO QK_PRODDETVAL (PID, TYPEID, VALUE) 

													VALUES ($LASTGALID, $TYPEID, $NAMEID)");

								

								

						}

						

						

						

						/*ADDING STAT INS PROD DESC*/

					}

					if($mode == 999.39) /*Добавление Категории Статьей*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SDESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						

						if($_POST['PARENTID'] == 'NSET'){

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_ACATEGORIES` WHERE `QUE` = $newQue LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										$lastQue = selection(999.76);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										mysql_query("UPDATE `QK_ACATEGORIES` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						}

						

						/*Блок Очереди*/

						

						if($_POST['PARENTID'] == 'NSET'){

							$PARENTID = 'NULL';

						}

						else{

							$PARENTID = (int) $_POST['PARENTID']; 

							$newQue = 0;

						}

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = (int) $_POST['ACTIVE'];

		

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_ACATEGORIES`  (`PARENTID`,`QUE`,`NAMEID`,`SDESCID`,`ACTIVE`,`EDITDATE`) 

									VALUES ($PARENTID,$newQue,$NAMEID,$SDESCID,$ACTIVE,'$EDITDATE')";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					if($mode == 999.41) /*Редактирование Категории Статьей*/

					{

						

						$ID = (int) $_POST['editCategoryID'];

						$CANBECHANGED = mysql_query("SELECT `PARENTID` FROM `QK_ACATEGORIES` WHERE `ID` = $ID LIMIT 1");

							$CANBECHANGED = mysql_fetch_assoc($CANBECHANGED);

								$CANBECHANGED = $CANBECHANGED['PARENTID'];

						if((!isset($CANBECHANGED) && $_POST['PARENTID'] == 'NSET') || (isset($CANBECHANGED) && $_POST['PARENTID'] != 'NSET')){

						if($_POST['PARENTID'] == 'NSET'){

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `ID` FROM `QK_ACATEGORIES` WHERE `QUE` = $newQue LIMIT 1");

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['ID'])){

										$ISSETONOLDREC = $ISSETONOLDREC['ID'];

										$lastQue = (int) $_POST['oldQue'];

										mysql_query("UPDATE `QK_ACATEGORIES` SET `QUE` = $lastQue WHERE ID = $ISSETONOLDREC");

									}

						/*Блок Очереди*/

						}

						else{

						$newQue = 0;

						}

					

						

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$SDESCID = (int) $_POST['SDESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $SDESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						



						

						if($_POST['PARENTID'] == 'NSET'){

							$PARENTID = 'NULL';

						}

						else{

							$PARENTID = (int) $_POST['PARENTID']; 

							$newQue = 0;

						}

						

						$ACTIVE = (int) $_POST['ACTIVE'];

						$EDITDATE = date("Y-m-d H:i:s");

						

						mysql_query("UPDATE `QK_ACATEGORIES`

						SET `PARENTID` = $PARENTID, 

						`ACTIVE`=$ACTIVE,

						`QUE` = $newQue,

						`EDITDATE` = '$EDITDATE'	

						WHERE  `ID` = $ID") or die(mysql_error());

						}

							

					}

					if($mode == 999.42) /*Добавление Новой Статьи*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SDESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SDESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Блок Работы С фотографией*/

							

							if($_FILES['SIMG']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/small/";

								$customName = substr(md5(microtime()), 0, 20);

								$SIMG = $customName.str_replace(' ', '', $_FILES['SIMG']['name']);

								$product_ico_tmp = $_FILES['SIMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG);

							}

							else {$SIMG = "noWIMG.png";}

							

							

							if($_FILES['IMG']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

							else {$IMG = "noWIMG.png";}

						

						/*Блок Работы С фотографией*/

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ADDDATE = date("Y-m-d H:i:s");

						$AUTOR	 = $_POST['AUTOR'];

						$LINK	 = $_POST['LINK'];

						$ISSPEC = (int) $_POST['ISSPEC'];

						$ISTOP = (int) $_POST['ISTOP'];

						$EXPORTED = 0;

						$CATID = (int) $_POST['CATID'];

						$ACTIVE	 = (int) $_POST['ACTIVE'];

						

						

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_ARTICLES`  (`CATID`,`NAMEID`, `SDESCID`, `DESCID`,`ISTOP`,`ISSPEC`,`AUTOR`,`LINK`,`ADDDATE`,`EXPORTED`,`SIMG`,`IMG`,`ACTIVE`,`EDITDATE`) 

														VALUES ($CATID,$NAMEID, '$SDESCID', '$DESCID',$ISTOP,$ISSPEC,'$AUTOR','$LINK','$ADDDATE',$EXPORTED,'$SIMG','$IMG',$ACTIVE,'$EDITDATE')";

													

					

						mysql_query($SQLQUE) or die(mysql_error());

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						

						

					

					

						

					}						

					

					if($mode == 999.43) /*Редактирование Товара*/

					{

						$ID = (int) $_POST['editArticleID'];

					

						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						$SDESCID = (int) $_POST['SDESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $SDESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $SDESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'SDESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						$DESCID = (int) $_POST['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $DESCID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $DESCID;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						/*Блок Работы С фотографией*/

						

						$oldPhotosData = mysql_query("SELECT  `SIMG`, `IMG` FROM `QK_PRODUCTS` WHERE `ID` = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						

						$SIMG = $oldPhotosData['SIMG'];

						$IMG = $oldPhotosData['IMG'];

							

							if($_FILES['SIMG']['name'])

							{

								if($SIMG != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/small/".$SIMG;

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/small/";

								$customName = substr(md5(microtime()), 0, 20);

								$SIMG = $customName.str_replace(' ', '', $_FILES['SIMG']['name']);

								$product_ico_tmp = $_FILES['SIMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG);

							}

							

							if($_FILES['IMG']['name'])

							{

								if($IMG != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/".$IMG;

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

							

						/*Блок Работы С фотографией*/

						

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ADDDATE = date("Y-m-d H:i:s");

						$AUTOR	 = $_POST['AUTOR'];

						$LINK	 = $_POST['LINK'];

						$ISSPEC = (int) $_POST['ISSPEC'];

						$ISTOP = (int) $_POST['ISTOP'];

						$EXPORTED = 0;

						$CATID = (int) $_POST['CATID'];

						$ACTIVE	 = (int) $_POST['ACTIVE'];

						

						

						mysql_query("UPDATE `QK_ARTICLES`

						SET 

						`AUTOR`='$AUTOR',

						`LINK`='$LINK',

						`ISSPEC`=$ISSPEC,

						`ISTOP`=$ISTOP,

						`EXPORTED`=$EXPORTED,

						`CATID`=$CATID,

						`ACTIVE`=$ACTIVE,

						`SIMG`='$SIMG',

						`IMG`='$IMG',

						`EDITDATE`='$EDITDATE',

						`ADDDATE`='$EDITDATE'

						WHERE  `ID` = $ID") or die(mysql_error());

					}

					

					

					if($mode == 999.44) /*Редактирование параметров главное страницы Работников*/

					{

						$newLangID = selection(666.3);

						$newLangID = $newLangID[0];

						$newLangID = $newLangID['TEXT_ID']+1;

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['CATEGORIES_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 2;

						$TEXT_VAL = $_POST['CATEGORIES_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 3;

						$TEXT_VAL = $_POST['CATEGORIES_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$NAMEID = (int) $TEXT_ID;

						$ACTIVE = (int) 1;

						$PARENTID = (int) $_POST['CATEGORIES_PARENTID'];;

						 

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_CATEGORIES  (PARENTID, QUE, NAMEID, IMG, SDESCID, ACTIVE, EDITDATE) 

									VALUES ($PARENTID, 0, $NAMEID, 'noWIMG.png', 0, 1, '$DATE')";

					

						mysql_query($SQLQUE) or die(mysql_error());

						

						

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



					}

					if($mode == 999.46) /*Добавление нового Человека*/

					{

						$VALUE = $_POST['VALUE'];

						$LANGID = (int) $_POST['LANGID'];

						$TEXTID = (int) $_POST['TEXTID'];

						$ifIsSet = mysql_query("SELECT 1 AS DATA FROM QK_LANGSVAL WHERE TEXT_ID = $TEXTID AND LANG_ID = $LANGID LIMIT 1");

						$ifIsSet = mysql_fetch_assoc($ifIsSet);

						if($ifIsSet['DATA'] > 0){

							mysql_query("UPDATE QK_LANGSVAL SET TEXT_VAL = '$VALUE' WHERE TEXT_ID = $TEXTID AND LANG_ID = $LANGID");

						}

						else{

							mysql_query("INSERT INTO QK_LANGSVAL (TEXT_ID, LANG_ID, TEXT_VAL) VALUES ($TEXTID,  $LANGID,  '$VALUE');");

						}

					}

					if($mode == 999.47) /*Редактирование Партнера*/

					{

					

						$ID = (int) $_POST['editCustomerID'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						$RESIDENCE = (int) $_POST['RESIDENCE'];

						$SEX = (int) $_POST['SEX'];

						$BIRTHDAY = date('Y-m-d H:i:s', strtotime($_POST['BIRTHDAY']));

						$IDCART =  $_POST['IDCART'];

						$SOCCARD =  $_POST['SOCCARD'];

						$TAXPAYER =  $_POST['TAXPAYER'];

						$DOCUMENT =  $_POST['DOCUMENT'];

						

						$WWW =  $_POST['WWW'];

						$MAIL =  $_POST['MAIL'];

						$WORKPLACE =  $_POST['WORKPLACE'];

						$WORKAS =  $_POST['WORKAS'];

						

						

						$OPENDATE = date('Y-m-d H:i:s', strtotime($_POST['OPENDATE']));

						$TSOPENER = $_SESSION["userNameSurname"];

						$EDITDATE = date("Y-m-d H:i:s");

						

					

					

						

						$PERSON = (int) $_POST['PERSON'];

						if($PERSON == 2){	

							/*Generating New ID On Lang Modul*/

								$newLangID = selection(666.3);

								$newLangID = $newLangID[0];

								$newLangID = $newLangID['TEXT_ID']+1;

							/*Generating New ID On Lang Modul*/

							$NAME = $newLangID;

							$langsINSERT = selection(666.1);

							foreach($langsINSERT as $langINSERT){

							$TEXT_ID = $NAME;

							$LANG_ID = $langINSERT['id'];

							$pangGetter = 'ONAME'."$LANG_ID";

								$TEXT_VAL = $_POST[$pangGetter];

								mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

								VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

							}

							

							

							$SNAME = NULL;

							$FNAME = NULL;

							}

						else{

							

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAME = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAME;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAME'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$SNAME = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $SNAME;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'SNAME'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$FNAME = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $FNAME;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'FNAME'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

							

						}

						

						/*Блок Работы С фотографией*/

						/*

						$oldPhotosData = mysql_query("SELECT `LOGO` FROM QK_PARTNERS WHERE `ID` = $ID LIMIT 1");

						$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

						$LOGO = $oldPhotosData['LOGO'];

						

							if($_FILES['LOGO']['name'])

							{

								$oldPhotosData = mysql_query("SELECT `LOGO` FROM QK_PARTNERS WHERE `ID` = $ID LIMIT 1");

								$oldPhotosData = mysql_fetch_assoc($oldPhotosData);

								if($oldPhotosData['LOGO'] != 'noWIMG.png'){

								$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/partners/".$oldPhotosData['LOGO'];

								unlink($oldImgData);

								}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/partners/";

								$customName = substr(md5(microtime()), 0, 20);

								$LOGO = $customName.str_replace(' ', '', $_FILES['LOGO']['name']);

								$product_ico_tmp = $_FILES['LOGO']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$LOGO);

							}*/

						/*Блок Работы С фотографией*/

						

						

						$WWW =  $_POST['WWW'];

						$MAIL =  $_POST['MAIL'];

						$WORKPLACE =  $_POST['WORKPLACE'];

						$WORKAS =  $_POST['WORKAS'];

						

						mysql_query("UPDATE `QK_CUSTOMER`

						SET 

						`ACTIVE`=$ACTIVE,

						`RESIDENCE`=$RESIDENCE,

						`SEX`=$SEX,

						`BIRTHDAY`='$BIRTHDAY',

						`IDCART`='$IDCART',

						`SOCCARD`='$SOCCARD',

						`TAXPAYER`='$TAXPAYER',

						`DOCUMENT`='$DOCUMENT',

						

						`WWW`='$WWW',

						`MAIL`='$MAIL',

						`WORKPLACE`='$WORKPLACE',

						`WORKAS`='$WORKAS',

						`WORKPLACECUST`=NULL,

						

						

						`OPENDATE`='$OPENDATE',

						`TSOPENER` = '$TSOPENER',

						`EDITDATE`='$EDITDATE'

						WHERE  `CUSTOMER` = $ID") or die(mysql_error());

						

						

						

						

						

						$LASTCUSTOMERID = $ID;

						

						mysql_query("DELETE FROM `QK_CUSTPHONE` WHERE CUST = $LASTCUSTOMERID") or die(mysql_error());

						mysql_query("DELETE FROM `QK_CUSTOMERACNT` WHERE CUST = $LASTCUSTOMERID") or die(mysql_error());

						

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['BANKACNT']);

						while($localCounter2 <= $maxCounter){

								$BANKACNT = $_POST['BANKACNT'][$localCounter];

								$CURRENCY = $_POST['CURRENCY'][$localCounter];

								$OFBANK = $_POST['OFBANK'][$localCounter];

								mysql_query("INSERT INTO `QK_CUSTOMERACNT`  (`CUST`,`BANKACNT`,`CURRENCY`,`OFBANK`) 

													VALUES ($LASTCUSTOMERID,'$BANKACNT','$CURRENCY','$OFBANK')") or die(mysql_error());

							

						$localCounter++;

						$localCounter2++;

						}

						

						

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['PHONE']);

						while($localCounter2 <= $maxCounter){

								$KIND = (int) $_POST['KIND'][$localCounter];

								$CODE = $_POST['CODE'][$localCounter];

								$PHONE = $_POST['PHONE'][$localCounter];

								$ISSMS = (int) $_POST['ISSMS'][$localCounter];

								$STATE = (int) $_POST['STATE'][$localCounter];

								$NOTE = $_POST['NOTE'][$localCounter];

								mysql_query("INSERT INTO `QK_CUSTPHONE`  (`CUST`,`KIND`,`CODE`,`PHONE`,`ISSMS`,`STATE`,`NOTE`) 

													VALUES ($LASTCUSTOMERID,$KIND,'$CODE','$PHONE',$ISSMS,$STATE,'$NOTE')") or die(mysql_error());

							

						$localCounter++;

						$localCounter2++;

						}

						

						

						

						

						

						

						

						

						

						

						

						

						

						

					}

					

					

					if($mode == 999.48) /*Добавление Вида Сделки*/

					{

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DICTIONNAMEID = $newLangID;

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = 1;

						

						$TEXT_VAL = $_POST['BRAND_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID, LANG_ID, TEXT_VAL)

						VALUES ($TEXT_ID, $LANG_ID, '$TEXT_VAL')") or die(mysql_error());

						

						$DICTIONNAMEID = $newLangID;

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = 2;

						

						$TEXT_VAL = $_POST['BRAND_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID, LANG_ID, TEXT_VAL)

						VALUES ($TEXT_ID, $LANG_ID, '$TEXT_VAL')") or die(mysql_error());

						

						$DICTIONNAMEID = $newLangID;

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = 3;

						

						$TEXT_VAL = $_POST['BRAND_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID, LANG_ID, TEXT_VAL)

						VALUES ($TEXT_ID, $LANG_ID, '$TEXT_VAL')") or die(mysql_error());

						

						$lastEdit = date("Y-m-d H:i:s");

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_DICTION (DICTIONTYPE, DICTIONNAMEID, DICTIONVALUE, DICTIONVALUE2, DICTIONVALUE3, lastEdit) 

													VALUES ('CONTRACTTYPE', $DICTIONNAMEID, '0', '0', '0', '$lastEdit')";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}



					if($mode == 999.49) /*Редактирования Вида Сделки*/

					{

						

						

						

						$ID = (int) $_POST['BRAND_EDIT_ID'];



						

						$DICTIONNAMEID = mysql_query("SELECT DICTIONNAMEID FROM QK_DICTION WHERE id = $ID");

						$DICTIONNAMEID = mysql_fetch_assoc($DICTIONNAMEID);

						$DICTIONNAMEID = (int) $DICTIONNAMEID['DICTIONNAMEID'];

						

						

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $DICTIONNAMEID AND LANG_ID = 1") or die(mysql_error());

						

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['BRAND_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						

					}

					

					

					if($mode == 999.51) /*Добавление Страны*/

					{

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `COUNTRY` FROM `QK_COUNTRY` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['COUNTRY'])){

										$ISSETONOLDREC = $ISSETONOLDREC['COUNTRY'];

										mysql_query("UPDATE `QK_COUNTRY` SET `QUE` = NULL WHERE COUNTRY = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.6);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_COUNTRY` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_COUNTRY` SET `QUE` = $lastQue WHERE COUNTRY = '$ISSETONOLDREC'") or die(mysql_error());

									}

						

					

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_COUNTRY`  (`COUNTRY`,`NAMEID`,`QUE`,`ACTIVE`) 

													VALUES ('$COUNTRY',$NAMEID,$newQue,$ACTIVE)";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					

					

					if($mode == 999.52) /*Редактирования Вида Сделки*/

					{

						

						

						

						$ID = $_POST['editCountryID'];



						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `COUNTRY` FROM `QK_COUNTRY` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['COUNTRY'])){

										$ISSETONOLDREC = $ISSETONOLDREC['COUNTRY'];

										mysql_query("UPDATE `QK_COUNTRY` SET `QUE` = NULL WHERE COUNTRY = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.6);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_COUNTRY` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_COUNTRY` SET `QUE` = $lastQue WHERE COUNTRY = '$ISSETONOLDREC'") or die(mysql_error());

									}

						/*Блок Очереди*/

	

	

						

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						mysql_query("UPDATE `QK_COUNTRY`

						SET

						`COUNTRY`='$COUNTRY',

						`QUE`=$newQue,

						`ACTIVE` = $ACTIVE

						WHERE  `COUNTRY` = '$ID'") or die(mysql_error());

						



						

					}

					

					

					

						

					if($mode == 999.53) /*Добавление Страны*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$REGION = $_POST['REGION'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `REGION` FROM `QK_CNTREGION` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['REGION'])){

										$ISSETONOLDREC = $ISSETONOLDREC['REGION'];

										mysql_query("UPDATE `QK_CNTREGION` SET `QUE` = NULL WHERE REGION = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.9);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CNTREGION` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CNTREGION` SET `QUE` = $lastQue WHERE REGION = '$ISSETONOLDREC'") or die(mysql_error());

									}

						

					

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_CNTREGION`  (`REGION`,`COUNTRY`,`NAMEID`,`QUE`,`TYPE`,`ACTIVE`) 

													VALUES ('$REGION','$COUNTRY',$NAMEID,$newQue,0,$ACTIVE)";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					if($mode == 999.54) /*Редактирования Вида Сделки*/

					{

						

						

						

						$ID = $_POST['editRegionID'];



						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `REGION` FROM `QK_CNTREGION` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['REGION'])){

										$ISSETONOLDREC = $ISSETONOLDREC['REGION'];

										mysql_query("UPDATE `QK_CNTREGION` SET `QUE` = NULL WHERE REGION = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.9);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CNTREGION` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CNTREGION` SET `QUE` = $lastQue WHERE REGION = '$ISSETONOLDREC'") or die(mysql_error());

									}

						/*Блок Очереди*/

	

	

						

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$REGION = $_POST['REGION'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						mysql_query("UPDATE `QK_CNTREGION`

						SET

						`COUNTRY`='$COUNTRY',

						`REGION`='$REGION',

						`QUE`=$newQue,

						`TYPE`=0,

						`ACTIVE` = $ACTIVE

						WHERE  `REGION` = '$ID'") or die(mysql_error());

						



						

					}

					

					if($mode == 999.55) /*Добавление Страны*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$REGION = $_POST['REGION'];

						$DISTRICT = $_POST['DISTRICT'];

						$TYPE = $_POST['TYPE'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `DISTRICT` FROM `QK_CNTDISTRICT` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['DISTRICT'])){

										$ISSETONOLDREC = $ISSETONOLDREC['DISTRICT'];

										mysql_query("UPDATE `QK_CNTDISTRICT` SET `QUE` = NULL WHERE DISTRICT = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.13);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CNTDISTRICT` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CNTDISTRICT` SET `QUE` = $lastQue WHERE DISTRICT = '$ISSETONOLDREC'") or die(mysql_error());

									}

						

					

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_CNTDISTRICT`  (`DISTRICT`, `REGION`,`COUNTRY`,`NAMEID`,`QUE`,`TYPE`,`ACTIVE`) 

													VALUES ('$DISTRICT', '$REGION','$COUNTRY',$NAMEID,$newQue,$TYPE,$ACTIVE)";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					

					

					if($mode == 999.56) /*Редактирования Вида Сделки*/

					{

						

						

						

						$ID = $_POST['editDistrictID'];



						

						$NAMEID = (int) $_POST['NAMEID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						}

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `DISTRICT` FROM `QK_CNTDISTRICT` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['DISTRICT'])){

										$ISSETONOLDREC = $ISSETONOLDREC['DISTRICT'];

										mysql_query("UPDATE `QK_CNTDISTRICT` SET `QUE` = NULL WHERE DISTRICT = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.13);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CNTDISTRICT` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CNTDISTRICT` SET `QUE` = $lastQue WHERE DISTRICT = '$ISSETONOLDREC'") or die(mysql_error());

									}

						/*Блок Очереди*/

	

	

						

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$REGION = $_POST['REGION'];

						$DISTRICT = $_POST['DISTRICT'];

						$TYPE = (int) $_POST['TYPE'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						mysql_query("UPDATE `QK_CNTDISTRICT`

						SET

						`DISTRICT`='$DISTRICT',

						`COUNTRY`='$COUNTRY',

						`REGION`='$REGION',

						`QUE`=$newQue,

						`TYPE`=$TYPE,

						`ACTIVE` = $ACTIVE

						WHERE  `DISTRICT` = '$ID'") or die(mysql_error());

						



						

					}

					

					

					if($mode == 999.57) /*Добавление Страны*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						$COUNTRY = $_POST['COUNTRY'];

						$REGION = $_POST['REGION'];

						$DISTRICT = $_POST['DISTRICT'];

						$STREET = $_POST['STREET'];

						$ACTIVE = (int) $_POST['ACTIVE'];

						

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['QUE'];

							$ISSETONOLDREC = mysql_query("SELECT `STREET` FROM `QK_CNTSTREETS` WHERE `QUE` = $newQue LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['STREET'])){

										$ISSETONOLDREC = $ISSETONOLDREC['STREET'];

										mysql_query("UPDATE `QK_CNTSTREETS` SET `QUE` = NULL WHERE STREET = '$ISSETONOLDREC'") or die(mysql_error());

										$lastQue = selection(888.16);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_CNTSTREETS` WHERE `QUE` = $i LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_CNTSTREETS` SET `QUE` = $lastQue WHERE STREET = '$ISSETONOLDREC'") or die(mysql_error());

									}

						

					

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_CNTSTREETS`  (`STREET`,`DISTRICT`, `REGION`,`COUNTRY`,`NAMEID`,`QUE`,`TYPE`,`ACTIVE`) 

													VALUES ('$STREET','$DISTRICT', '$REGION','$COUNTRY',$NAMEID,$newQue,0,$ACTIVE)";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					

					if($mode == 999.58) /*Редактирование Варианта Параматра дела в библеотеку*/

					{

						$ID = (int) $_POST['DICTIONCLASSVAL_EDIT_ID'];

						$NAME = $_POST['DICTIONCLASS_NAMEID'];

						mysql_query("UPDATE QK_DICTIONCLASS SET NAME = '$NAME' WHERE ID = $ID LIMIT 1") or die(mysql_error());

					}

					if($mode == 999.59) /*Добавление Производителя*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DICTIONNAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DICTIONNAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						$LastAddedValue = mysql_query("SELECT DICTIONVALUE FROM QK_DICTION WHERE DICTIONTYPE = 'CARTYPE' ORDER BY DICTIONVALUE DESC LIMIT 1");

						$LastAddedValue = mysql_fetch_assoc($LastAddedValue);

						$LastAddedValue = $LastAddedValue['DICTIONVALUE'];

						$DICTIONVALUE = (int) $LastAddedValue;

						$DICTIONVALUE = $DICTIONVALUE + 1;

					

						$DICTIONVALUE3 = (int) $_POST['DICTIONVALUE3'];

						

						

						

						/*Блок Очереди*/

							$newQue = (int) $_POST['DICTIONVALUE2'];

							$ISSETONOLDREC = mysql_query("SELECT `id` FROM `QK_DICTION` WHERE `DICTIONVALUE2` = $newQue AND  DICTIONTYPE = 'CARTYPE' LIMIT 1") or die(mysql_error());

								$ISSETONOLDREC = mysql_fetch_assoc($ISSETONOLDREC);

									if(isset($ISSETONOLDREC['id'])){

										$ISSETONOLDREC = $ISSETONOLDREC['id'];

										mysql_query("UPDATE `QK_DICTION` SET `DICTIONVALUE2` = NULL WHERE id = $ISSETONOLDREC") or die(mysql_error());

										$lastQue = selection(999.112);

										$lastQue = ($lastQue[0]['COUNT'])+1;

										for($i=1; $i<=$lastQue; $i++){

												$isOpenQue = mysql_query("SELECT 1 FROM `QK_DICTION` WHERE `DICTIONVALUE2` = $i AND  DICTIONTYPE = 'CARTYPE' LIMIT 1") or die(mysql_error());

												$isOpenQue = mysql_num_rows($isOpenQue);

												if($isOpenQue == 0 and $i != $newQue){

													$lastQue = $i;

													break;

												}

											}

										mysql_query("UPDATE `QK_DICTION` SET `DICTIONVALUE2` = $lastQue WHERE id = $ISSETONOLDREC AND  DICTIONTYPE = 'CARTYPE'") or die(mysql_error());

									}

						

					

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_DICTION`  (`DICTIONTYPE`,`DICTIONVALUE`,`DICTIONNAMEID`,`DICTIONVALUE2`,`DICTIONVALUE3`) 

													VALUES ('CARTYPE','$DICTIONVALUE', $DICTIONNAMEID,'$newQue','$DICTIONVALUE3')";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					if($mode == 999.61) /*Добавление нового Звезд +*/

					{

						

						$SESSIONID = session_id();

						$PRODID = (int) $_GET['PRODID'];

						$STARS = (int) $_GET['STARS'];

						

						if(strlen($_COOKIE["MAINSESS"]) > 0){

							$SESSIONID = mysql_real_escape_string($_COOKIE["MAINSESS"]);

						}

						else{

							setcookie("MAINSESS", $SESSIONID, time()+60*60*24*30);

						}

						

						$IFISSET = mysql_query("SELECT ID FROM QK_PRODUCTS_STARS WHERE PRODID = $PRODID AND SESSIONID = '$SESSIONID' LIMIT 1");

						$IFISSET = mysql_fetch_assoc($IFISSET);

						$IFISSET = (int) $IFISSET['ID'];

						

						$ADDDATE = date("Y-m-d H:i:s");

						$ACTIVE = $_POST['ACTIVE'];

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						if($IFISSET == 0){

							$SQLQUE = "INSERT INTO QK_PRODUCTS_STARS  (SESSIONID, PRODID, STARS,  ADDDATE) 

													VALUES ('$SESSIONID', $PRODID, $STARS, '$ADDDATE')";

						}

						else{

							$SQLQUE = "UPDATE QK_PRODUCTS_STARS SET STARS = $STARS WHERE ID = $IFISSET";

						}

						

						

						mysql_query($SQLQUE) or die(mysql_error());							

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$result = 200;

						

					}

					if($mode == 999.62) /*Добавление Записи В словарь +*/

					{

						

						

						$newLangID = selection(666.3);

						$newLangID = $newLangID[0];

						$newLangID = $newLangID['TEXT_ID']+1;

						

						$DICTIONNAMEID = $newLangID;

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['DICTIONCLASS_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						

					

						$DICTIONTYPE = $_POST['DICTIONVALUE3'];

						$DICTIONTYPE = $_POST['DICTION_DICTIONTYPE'];

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_DICTION  (DICTIONTYPE, DICTIONNAMEID, DICTIONVALUE) 

													VALUES ('$DICTIONTYPE', $DICTIONNAMEID, 0)";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					

					if($mode == 999.63) /*Редактирования Вида Сделки*/

					{

						

						$ID = $_POST['DICTIONCLASSVAL_EDIT_ID'];

						

						$DICTIONNAMEID = mysql_query("SELECT DICTIONNAMEID FROM QK_DICTION WHERE id = $ID");

						$DICTIONNAMEID = mysql_fetch_assoc($DICTIONNAMEID);

						$DICTIONNAMEID = (int) $DICTIONNAMEID['DICTIONNAMEID'];

						

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $DICTIONNAMEID AND LANG_ID = 1") or die(mysql_error());

						

						$TEXT_ID = $DICTIONNAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['DICTIONCLASS_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						

						$DICTIONTYPE = $_POST['DICTION_DICTIONTYPE'];

						mysql_query("UPDATE QK_DICTION SET DICTIONTYPE = '$DICTIONTYPE' WHERE  id = '$ID'") or die(mysql_error());

						

					}

					

					if($mode == 999.64) /*Добавление нового Заказа*/

					{

						$result = array();

						

						$SESSIONID = session_id();

						$PRODID = (int) $_GET['PRODID'];

						$QUANTITY = (int) $_GET['QUANTITY'];

						$OFFERID = (int) $_GET['OFFERID'];

						

						$ADDDATE = date("Y-m-d H:i:s");

						$ACTIVE =  $_POST['ACTIVE'];

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$IFISSETID = mysql_query("SELECT ID FROM QK_BASKET WHERE SESSIONID = '$SESSIONID' AND PRODID = $PRODID LIMIT 1");

						$IFISSETID = mysql_fetch_assoc($IFISSETID);

						$IFISSETID = (int) $IFISSETID['ID'];

						

						$IFISSETQUANTITY = mysql_query("SELECT QUANTITY FROM QK_BASKET WHERE SESSIONID = '$SESSIONID' AND PRODID = $PRODID LIMIT 1");

						$IFISSETQUANTITY = mysql_fetch_assoc($IFISSETQUANTITY);

						$IFISSETQUANTITY = (int) $IFISSETQUANTITY['QUANTITY'];

						

						$IFISOFFERID = mysql_query("SELECT OFFERID FROM QK_BASKET WHERE SESSIONID = '$SESSIONID' AND PRODID = $PRODID LIMIT 1");

						$IFISOFFERID = mysql_fetch_assoc($IFISOFFERID);

						$IFISOFFERID = (int) $IFISOFFERID['OFFERID'];

						

						if($IFISSETQUANTITY < 10){

							

							if(($IFISSETQUANTITY+$QUANTITY) > 10){

								$QUANTITY = 10-$IFISSETQUANTITY;

							}

							

							if($IFISSETID > 0){

								if($IFISOFFERID == 0){

									$SQLQUE = "UPDATE QK_BASKET SET QUANTITY = QUANTITY + $QUANTITY WHERE ID = $IFISSETID";

									$result['mode'] = 2;

								}

							}

							else{

								$SQLQUE = "INSERT INTO QK_BASKET  (SESSIONID, PRODID, OFFERID, QUANTITY, ADDDATE) 

														VALUES ('$SESSIONID', $PRODID, $OFFERID, $QUANTITY, '$ADDDATE')";

								$result['mode'] = 1;

							}

							

							mysql_query($SQLQUE) or die(mysql_error());							

															

							$SQLQUE = str_replace("'", "-", $SQLQUE);									

							$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

							mysql_query($SQLLOG) or die(mysql_error());

						}

						$result['res'] = 200; 

					}

					if($mode == 999.65) /*Добавление Заказа*/

					{	

						$CNAME = mysql_real_escape_string($_POST['CNAME']);

						$CSNAME = mysql_real_escape_string($_POST['CSNAME']);

						$CPHONE = mysql_real_escape_string($_POST['CPHONE']);

						$CMAIL = mysql_real_escape_string($_POST['CMAIL']);

						$CADDRES = mysql_real_escape_string($_POST['CADDRES']);

						$STORE = (int) $_POST['STORE'];

						$GETTYPE = (int) $_POST['GETTYPE'];

						$PAYMENT = (int) $_POST['PAYMENT'];

						$COMMENT = mysql_real_escape_string($_POST['COMMENT']);

						$ADDDATE = date("Y-m-d H:i:s");

						$STATE = -1;

										

						

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_ORDERS

											(CUST, CNAME, CPHONE, CMAIL, FULLPRICE, PAYMENT, PAYED, ADDDATE, STATE, GETTYPE, STORE, COMMENT) VALUES 

											(0,'$CNAME $CSNAME','$CPHONE','$CMAIL', 0, $PAYMENT, 0, '$ADDDATE', $STATE, $GETTYPE, $STORE, '$COMMENT')";

													

						mysql_query($SQLQUE) or die(mysql_error());							

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$LASTEDDEDORDID = mysql_query("SELECT ID FROM QK_ORDERS ORDER BY ID DESC LIMIT 1");

						$LASTEDDEDORDID = mysql_fetch_assoc($LASTEDDEDORDID);

						$LASTEDDEDORDID = (int) $LASTEDDEDORDID['ID'];

						

						$locCounter = 0;

						

						$FULLPRICE = 0;

						while(isset($_POST['PRODID'][$locCounter])){

							

							$ORDERID = $LASTEDDEDORDID; 

							$PRODID = (int) $_POST['PRODID'][$locCounter];

							$COUNT = (int) $_POST['COUNT'][$locCounter];

							$ONEPRICE = (int) $_POST['PRICE'][$locCounter];

							

							$PRICE = $_POST['COUNT'][$locCounter]*$_POST['PRICE'][$locCounter];

							$_POST['ALLPRICEROW'][$locCounter] = $_POST['COUNT'][$locCounter]*$_POST['PRICE'][$locCounter];

							

							$FULLPRICE = $FULLPRICE + $PRICE;

							

							$PRODNAME = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT NAMEID FROM QK_PRODUCTS WHERE ID = $PRODID LIMIT 1)");

							$PRODNAME = mysql_fetch_assoc($PRODNAME);

							$PRODNAME = $PRODNAME['TEXT_VAL'];

							

							$_POST['PRODNAME'][$locCounter] = $PRODNAME;

							

							$DATE = date("Y-m-d H:i:s");

							$ONUSER = $_SESSION["userNameSurname"];

							

							$SQLQUE = "INSERT INTO QK_ORDERS_LIST

												(ORDERID, PRODID, COUNT, PRICE, ONEPRICE) VALUES 

												($ORDERID,'$PRODID',$COUNT,$PRICE, $ONEPRICE)";

														

							mysql_query($SQLQUE) or die(mysql_error());							

														

							$SQLQUE = str_replace("'", "-", $SQLQUE);									

							$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

							mysql_query($SQLLOG) or die(mysql_error());

							$locCounter++;

						}

						

						

						mysql_query("UPDATE QK_ORDERS SET FULLPRICE = $FULLPRICE WHERE ID = $ORDERID;");

						

						

						$SESSIONID = $_POST['SESSIONID'];

						

						if(strlen($SESSIONID) > 1){

							mysql_query("DELETE FROM QK_BASKET WHERE SESSIONID = '$SESSIONID'");

						}

						

						if(strlen($CMAIL) > 0){

							$DATE = date("Y-m-d H:i:s");

							$mail = mysql_real_escape_string($CMAIL);

							mysql_query("INSERT INTO `QK_EMAIL` (`ID`, `FROM`, `TO`, `SENDERNAME`, `SENDERPHONE`, `MAILBODY`, `SUBJECT`, `SENDDATE`) VALUES (NULL, '$mail', '$mail', '$mail', '$mail', '$mail', '$mail', '$DATE');");

						}

						

						if($PAYMENT == 1){$ISONLINEPAY = 0; $PAYMENT = 'Առաքման ժամանակ'; }else{$ISONLINEPAY = 1; $PAYMENT = 'Օնլայն վճարում'; }

						

						

						$to = 'sales@mobilecentre.am';

						$subject = "Order Info : $ORDERID";

						

						$message = "<body style='margin: 0px;'>

							<div style='background:#F1F1F1; padding:25px 15px; font-family:'Arial AMU',Helvetica'>

						<div style=' width:100%; max-width:600px; margin:0 auto;'>

							<table cellpadding='0' cellspacing='0' border='0' style='width: 100%;'>

								<tbody><tr>

									<td style='padding:15px 20px;text-align:left;'>

										<a href='http://mobilecentre.am'><img src='http://mobilecentre.am/assets/img/logo-email.png' width='200'></a>

									</td>

								</tr>

								<tr>

									<td style='padding:20px; background:#FFF;'>



										<table cellpadding='0' cellspacing='0' border='0' style='width:100%;' align='center'>

											<tbody><tr>

												<td style='padding:0px 0px 15px; border-bottom: 1px dashed #CCC;'>

													<h1 style='font-size:24px; margin:20px 0 0;'>Պատվեր $ORDERID</h1>

												</td>

											</tr>";

											

									$locCounter = 0;

									while(isset($_POST['PRODID'][$locCounter])){

										

										$message = $message."<tr>

												<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

													<span style='color:#000; font-weight: 700;'>".$_POST['PRODNAME'][$locCounter]."</span>

													<span style='color:#000; float: right; width: 150px; text-align: right; '>".$_POST['ALLPRICEROW'][$locCounter]." դր.</span>

													<span style='color:#000; float: right; '>".$_POST['COUNT'][$locCounter]." հատ</span>

												</td>

											</tr>";

										$locCounter++;

									}

									

									

									if($STORE > 0){		

									

									$STORENAME = mysql_query("SELECT NAMEID FROM QK_ADDR WHERE ID = $STORE LIMIT 1");

									$STORENAME = mysql_fetch_assoc($STORENAME);

									$STORENAME = (int) $STORENAME['NAMEID'];

									$STORENAME = LangCharSetter(2, $STORENAME, 0, 1);

									

									$message = $message."<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Վճարման տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$PAYMENT</span>

																<span style='color:#999;'>Վճարման տարբերակ</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>Ամբողջ վճար</span>

																<span style='color:#999;'>Վաճառքի տեսակ</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$FULLPRICE դր.</span>

																<span style='color:#999;'>Ընդհանուր գումար</span>

															</td>

														</tr>

														<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Խանութի տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$STORENAME</span>

																<span style='color:#999;'>Հասցե</span>

															</td>

														</tr>

														<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Գնորդի տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CNAME $CSNAME</span>

																<span style='color:#999;'>Անուն Ազգանուն</span>

															</td>

														</tr>

														

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CPHONE</span>

																<span style='color:#999;'>Բջջային հեռախոս</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$COMMENT</span>

																<span style='color:#999;'>Մեկնաբանություն</span>

															</td>

														</tr>

													</tbody></table>



												</td>

											</tr>

										</tbody></table>

									</div>

								<div>

							</div></div></body>";

							}

							else{

								

								$message = $message."<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Վճարման տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$PAYMENT</span>

																<span style='color:#999;'>Վճարման տարբերակ</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>Ամբողջ վճար</span>

																<span style='color:#999;'>Վաճառքի տեսակ</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$FULLPRICE դր.</span>

																<span style='color:#999;'>Ընդհանուր գումար</span>

															</td>

														</tr>

														<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Գնորդի տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CNAME $CSNAME</span>

																<span style='color:#999;'>Անուն Ազգանուն</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CADDRES</span>

																<span style='color:#999;'>Հասցե</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CPHONE</span>

																<span style='color:#999;'>Բջջային հեռախոս</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$COMMENT</span>

																<span style='color:#999;'>Մեկնաբանություն</span>

															</td>

														</tr>

													</tbody></table>



												</td>

											</tr>

										</tbody></table>

									</div>

								<div>

							</div></div></body>";

								

								

							}

							

							

							

						 $subject_preferences = array(

							"input-charset" => 'utf-8',

							"output-charset" => 'utf-8',

							"line-length" => 76, 

							"line-break-chars" => "\r\n"

						);

						

						$header = "Content-type: text/html; charset=utf-8 \r\n";

						$header .= "From: mobilecentre.am Sales <sales@mobilecentre.am> \r\n";

						$header .= "MIME-Version: 1.0 \r\n";

						$header .= "Content-Transfer-Encoding: 8bit \r\n";

						$header .= "Date: ".date("r (T)")." \r\n";

						$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);

						

						

						

						if(strlen($CMAIL) > 2 && $ISONLINEPAY == 0){

							mail($to, $subject, $message, $header);

							mail($CMAIL, $subject, $message, $header);

							mail("darbinyan@gmail.com", $subject, $message, $header);

							mail("dokholyan.t@gmail.com", $subject, $message, $header);

						}

						

						

						 

						

						$SECONTMAILB = mysql_real_escape_string($message);

						mysql_query("UPDATE QK_ORDERS SET SECONTMAILB = '$SECONTMAILB' WHERE ID = $ORDERID;");

						

						

						

						$RESD = array();

						$RESD['LASTEDDEDORDID'] = $LASTEDDEDORDID;

						$RESD['FULLPRICE'] = $FULLPRICE;

						

						return $RESD;

						

					}

					

					if($mode == 999.66) /*Добавление Нового Товара*/

					{

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$NAMEID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $NAMEID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'NAMEID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						

						

						

						

						/*Generating New ID On Lang Modul*/

							$newLangID = selection(666.3);

							$newLangID = $newLangID[0];

							$newLangID = $newLangID['TEXT_ID']+1;

						/*Generating New ID On Lang Modul*/

						$DESCID = $newLangID;

						$langsINSERT = selection(666.1);

						foreach($langsINSERT as $langINSERT){

						$TEXT_ID = $DESCID;

						$LANG_ID = $langINSERT['id'];

						$pangGetter = 'DESCID'."$LANG_ID";

							$TEXT_VAL = $_POST[$pangGetter];

							mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						}

						

						/*Блок Работы С фотографией*/

							

							if($_FILES['SIMG']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/";

								$customName = substr(md5(microtime()), 0, 20);

								$SIMG = $customName.str_replace(' ', '', $_FILES['SIMG']['name']);

								$product_ico_tmp = $_FILES['SIMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$SIMG);

							}

							else {$SIMG = "noWIMG.png";}

							

							

							if($_FILES['IMG']['name'])

							{

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/";

								$customName = substr(md5(microtime()), 0, 20);

								$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

								$product_ico_tmp = $_FILES['IMG']['tmp_name'];

									move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							}

							else {$IMG = "noWIMG.png";}

						

						/*Блок Работы С фотографией*/

						

						

						/*Блок Работы С Файлом Характеристики*/

						if($_FILES['DESCFILE']['name'])

						{

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/desc/";

							$customName = substr(md5(microtime()), 0, 5);

							$DESCFILE = $customName.$_FILES['DESCFILE']['name'];

							$product_ico_tmp = $_FILES['DESCFILE']['tmp_name'];

								move_uploaded_file($product_ico_tmp, $product_image_location.$DESCFILE);

						}

						else {$DESCFILE = "noWIMG.png";}

						/*Блок Работы С Файлом Характеристики*/

						

						

						

						$EDITDATE = date("Y-m-d H:i:s");

						$CARTYPE = (int) $_POST['CARTYPE'];

						$CARMODEL = (int) $_POST['CARMODEL'];

						$SIZE = (int) $_POST['SIZE'];

						$ISUSED = (int) $_POST['ISUSED'];



						$PRICE = (int) $_POST['PRICE'];

						$CURTYPE = (int) $_POST['CURTYPE'];

						$ISSPEC = (int) $_POST['ISSPEC'];

						$ISTOP = (int) $_POST['ISTOP'];

						$LEFTCOUNT = (int) $_POST['LEFTCOUNT'];

						$EXPORTED = 0;

						$CATID = (int) $_POST['CATID'];

						$ACTIVE	 = (int) $_POST['ACTIVE'];

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO `QK_PRODUCTS`  (`CATID`,

																`CARTYPE`,

																`CARMODEL`,

																`SIZE`,

																`ISUSED`,

																`NAMEID`,

																`DESCID`,

																`ISTOP`,

																`ISSPEC`,

																`LEFTCOUNT`,

																`PRICE`,

																`CURTYPE`,

																`EXPORTED`,

																`SIMG`,

																`IMG`,

																`DESCFILE`,

																`ACTIVE`,

																`EDITDATE`) 

										VALUES 

															($CATID,

															$CARTYPE,

															$CARMODEL,

															$SIZE,

															$ISUSED,

															$NAMEID,

															'$DESCID',

															$ISTOP,

															$ISSPEC,

															$LEFTCOUNT,

															$PRICE,

															$CURTYPE,

															$EXPORTED,

															'$SIMG',

															'$IMG',

															'$DESCFILE',

															$ACTIVE,

															'$EDITDATE')";

													 

					

						mysql_query($SQLQUE) or die(mysql_error());

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$LASTGALID = mysql_query("SELECT `ID` FROM `QK_PRODUCTS` ORDER BY ID DESC LIMIT 1");

						$LASTGALID  = mysql_fetch_assoc($LASTGALID);

						$LASTGALID = $LASTGALID['ID'];

						

						

						

							

						

						

						$localCounter = 0;

						$maxCounter = count($_FILES['GIMG']);

						while($localCounter <= $maxCounter){

							if(isset($_FILES['GIMG']['name'][$localCounter])  && $_FILES['GIMG']['name'][$localCounter] != ''){

									$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/";

									$customName = substr(md5(microtime()), 0, 20);

									$IMG = $customName.str_replace(' ', '', $_FILES['GIMG']['name'][$localCounter]);

									$product_ico_tmp = $_FILES['GIMG']['tmp_name'][$localCounter];

										move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

									mysql_query("INSERT INTO `QK_PRODUCTS_IMG`  (`PRODID`,`IMG`,`NAMEID`) 

													VALUES ($LASTGALID,'$IMG', NULL)");

							}

						$localCounter++;

						}

						

					

					

						

					}

					if($mode == 999.67) /*Редактирование Товара*/

					{

						

						$ID = (int) $_POST['ORDERID'];

						$STATE = (int) $_POST['STAT'];

						

						mysql_query("UPDATE QK_ORDERS

						SET 

						STATE = $STATE

						 WHERE ID = $ID") or die(mysql_error());			

					}

					if($mode == 999.68) /*Добавление нового цвета*/

					{

						

						$newLangID = selection(666.3);

						$newLangID = $newLangID[0];

						$newLangID = $newLangID['TEXT_ID']+1;

						

						$NAMEID = $newLangID;

						$TEXT_ID = $NAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['COLORS_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						

						$NAMEID = $newLangID;

						$TEXT_ID = $NAMEID;

						$LANG_ID = 2;

						$TEXT_VAL = $_POST['COLORS_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						

						$NAMEID = $newLangID;

						$TEXT_ID = $NAMEID;

						$LANG_ID = 3;

						$TEXT_VAL = $_POST['COLORS_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$CHARNAME = $_POST['COLORS_NAMEID'];

						$LOGO = $_POST['COLORS_CODEID'];

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = (int) 1;

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_COLORS  (NAMEID, CHARNAME, ACTIVE, LOGO, EDITDATE) 

													VALUES ($NAMEID, '$CHARNAME', $ACTIVE, '$LOGO', '$EDITDATE')";

													

						mysql_query($SQLQUE) or die(mysql_error());

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

					}

					if($mode == 999.69) /*Редактирование Цвета*/

					{

					

						$ID = (int) $_POST['COLORS_EDIT_ID'];

						

						$NAMEID = mysql_query("SELECT NAMEID FROM QK_COLORS WHERE ID = $ID LIMIT 1");

						$NAMEID = mysql_fetch_assoc($NAMEID);

						$NAMEID = (int) $NAMEID['NAMEID'];

						

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID") or die(mysql_error());

						

						$TEXT_ID = $NAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['COLORS_NAMEID'];

						$LOGO = $_POST['COLORS_CODEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

							VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						mysql_query("UPDATE QK_COLORS SET LOGO = '$LOGO' WHERE ID = $ID");

						

						

					}

					

					if($mode == 999.71) /*Добавление Варианта Параматра дела в библеотеку*/

					{

						

						$newLangID = selection(666.3);

						$newLangID = $newLangID[0];

						$newLangID = $newLangID['TEXT_ID']+1;

						

						$TEXT_ID = $newLangID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['DICPRODVAL_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

						

						$NAMEID = (int) $TEXT_ID;

						$GID = (int) $_POST['DICPRODVAL_GID'];

						$TYPE = 1;

						$DICCHAR = '';

						$ACTIVE = (int) 1;

						$EDITDATE = date("Y-m-d H:i:s");

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_DICPRODVAL  (NAMEID, GID, TYPE, DICCHAR,  ACTIVE,  EDITDATE) 

									VALUES ($NAMEID, $GID, '$TYPE', '$DICCHAR', $ACTIVE, '$EDITDATE')";

					

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					if($mode == 999.72) /*Добавление Варианта Нового Параметра в Библеотеку +*/ 

					{

						

						$NAME = $_POST['DICTIONCLASS_NAMEID'];

						$DICCHAR = generateRandomString(6);

						$ACTIVE = (int) 1;

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_DICTIONCLASS  (NAME, DICCHAR, ACTIVE) 

									VALUES ('$NAME', '$DICCHAR', $ACTIVE)";

						

						mysql_query($SQLQUE) or die(mysql_error());								

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO `QK_LOGS` (`VAL`,`ONUSER`,`DATE`) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());



						

					}

					if($mode == 999.73) /*Добавление нового Заказа*/

					{

						

						$SESSIONID = session_id();

						$PRODID = (int) $_GET['PRODID'];

						

						$ADDDATE = date("Y-m-d H:i:s");

						$ACTIVE = $_POST['ACTIVE'];

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						if($_GET['mode'] == 0){

							$SQLQUE = "INSERT INTO QK_WISHLIST  (SESSIONID, PRODID, ADDDATE) 

													VALUES ('$SESSIONID', $PRODID, '$ADDDATE')";

						}

						else{

							$SQLQUE = "DELETE FROM QK_WISHLIST  WHERE SESSIONID = '$SESSIONID' AND PRODID = $PRODID";

						}

						mysql_query($SQLQUE) or die(mysql_error());							

														

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$result = 200;

						

					}

					if($mode == 999.74) /*Добавление Заказа*/

					{	

					

						$ORDERID = (int) $GLOBALS['ORDERID'];

						$PAYMENTID = $_POST['paymentid'];

						mysql_query("UPDATE QK_ORDERS SET PAYED = 1 WHERE PAYMENTID = '$PAYMENTID';");

						

						$ORDERDATA = mysql_query("SELECT SECONTMAILB, CMAIL FROM QK_ORDERS WHERE ID = $ORDERID LIMIT 1");

						$ORDERDATA = mysql_fetch_assoc($ORDERDATA);

						$message = $ORDERDATA['SECONTMAILB'];

						$CMAIL = $ORDERDATA['CMAIL'];

						

						if(strlen($message) > 2){

							$to_1 = "sales@mobilecentre.am";

							

							$subject = "Order Info : $ORDERID";

							

							 $subject_preferences = array(

								"input-charset" => 'utf-8',

								"output-charset" => 'utf-8',

								"line-length" => 76, 

								"line-break-chars" => "\r\n"

							);

							

							$header = "Content-type: text/html; charset=utf-8 \r\n";

							$header .= "From: mobilecentre.am Sales <sales@mobilecentre.am> \r\n";

							$header .= "MIME-Version: 1.0 \r\n";

							$header .= "Content-Transfer-Encoding: 8bit \r\n";

							$header .= "Date: ".date("r (T)")." \r\n";

							$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);

							

							mail($to_1, $subject, $message, $header);

						

							if(strlen($CMAIL) > 2){

								mail($CMAIL, $subject, $message, $header);

							}

						

						}

						

						

					}

					if($mode == 999.75) /*Добавление Заказа*/

					{	

						$ORDERID = (int) $GLOBALS['ORDERID'];

						$PaymentID = $GLOBALS['PaymentID'];

						mysql_query("UPDATE QK_ORDERS SET PAYMENTID = '$PaymentID' WHERE ID = $ORDERID;");

						

					}

					

					if($mode == 999.76) /*Редактирование Варианта Параматра дела в библеотеку*/

					{

						

						$ID = (int) $_POST['DICPRODVAL_EDIT_ID'];

						$NAMEID = mysql_query("SELECT NAMEID FROM QK_DICPRODVAL WHERE ID = $ID");

						$NAMEID = mysql_fetch_assoc($NAMEID);

						$NAMEID = (int) $NAMEID['NAMEID'];

						

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $NAMEID AND LANG_ID = 1 LIMIT 1") or die(mysql_error());

						$langsINSERT = selection(666.1);

						

						$TEXT_ID = $NAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['DICPRODVAL_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

						

						$GID = (int) $_POST['DICPRODVAL_GID'];

						mysql_query("UPDATE QK_DICPRODVAL SET GID = $GID WHERE ID = $ID");

						

					}

					if($mode == 999.77) /*Редактирование Варианта Параматра дела в библеотеку*/

					{

						

						$ID = (int) $_POST['DICPRODVAL_EDIT_ID'];

						$NAMEID = mysql_query("SELECT NAMEID FROM QK_DICPRODGROUP WHERE ID = $ID");

						$NAMEID = mysql_fetch_assoc($NAMEID);

						$NAMEID = (int) $NAMEID['NAMEID'];

						

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $NAMEID AND LANG_ID = 1 LIMIT 1") or die(mysql_error());

						$langsINSERT = selection(666.1);

						

						$TEXT_ID = $NAMEID;

						$LANG_ID = 1;

						$TEXT_VAL = $_POST['DICPRODVAL_NAMEID'];

						mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

						VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

					}

					if($mode == 999.78) /*Добавление нового Заказа*/

					{

						

						$SESSIONID = session_id();

						$PRODID = (int) $_GET['PRODID'];

						

						$ADDDATE = date("Y-m-d H:i:s");

						$ACTIVE = $_POST['ACTIVE'];

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$IfAlreadyInDB = mysql_query("SELECT 1 AS DATAS FROM QK_COMPARE WHERE SESSIONID = '$SESSIONID' AND PRODID = $PRODID LIMIT 1");

						$IfAlreadyInDB = mysql_fetch_assoc($IfAlreadyInDB);

						$IfAlreadyInDB = (int) $IfAlreadyInDB['DATAS'];

						

						if($IfAlreadyInDB > 0){

							$SQLQUE = "DELETE FROM QK_COMPARE WHERE SESSIONID = '$SESSIONID' AND PRODID = $PRODID";

							

							mysql_query($SQLQUE) or die(mysql_error());							

															

							$SQLQUE = str_replace("'", "-", $SQLQUE);									

							$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

							mysql_query($SQLLOG) or die(mysql_error());

						}

						else{

							$SQLQUE = "INSERT INTO QK_COMPARE  (SESSIONID, PRODID, ADDDATE) 

														VALUES ('$SESSIONID', $PRODID, '$ADDDATE')";

							

							mysql_query($SQLQUE) or die(mysql_error());							

															

							$SQLQUE = str_replace("'", "-", $SQLQUE);									

							$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

							mysql_query($SQLLOG) or die(mysql_error());

							

							$result = 200;

						}

						

					}

					if($mode == 999.79) /*Добавление Нового Товара*/

					{

						$url = 'http://91.103.30.6:1010/mob/hs/exchange_v1/BALANCE/?company=MobileCentre';

						$username = 'WebService';

						$password = 'webadmin';

                        $headers = array(

								'header'  => "Authorization: Basic " . base64_encode("$username:$password")

							);

                        //The old way

//						$context = stream_context_create(array(

//							'http' => $headers

//						));

//						$ICDATAS = file_get_contents($url, false, $context);

                        

                        //New way

                        $curl_handle=curl_init();

                        curl_setopt($curl_handle, CURLOPT_URL,'http://91.103.30.6:1010/mob/hs/exchange_v1/BALANCE/?company=MobileCentre');

                        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 4); //Timeout limit 4 minutes

                        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

                        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);

                        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mobilecentre');

                        $ICDATAS = curl_exec($curl_handle);

                        curl_close($curl_handle);



                        $ICDATAS = json_decode($ICDATAS);

                     	$ICDATAS = array($ICDATAS->Items);

						$ICDATAS = $ICDATAS[0];

						$locCounter = 0;

						foreach($ICDATAS as $ICDATA){

							

							$ARTICLE = array($ICDATA->id);

							$ARTICLE = $ARTICLE[0];

							

							$NEWPR = array($ICDATA->price);

							$NEWPR = (int) $NEWPR[0];

							

							$NEWNAME = array($ICDATA->Item);

							$NEWNAME = mysql_real_escape_string($NEWNAME[0]);

							

							$NEWCOUNT = array($ICDATA->quantity);

							$NEWCOUNT = (int) $NEWCOUNT[0];

							

							if(strlen($ARTICLE) > 1){

							

							$ifOldExists = mysql_query("SELECT ID, PRICE, OLDPRICE, OLDPRICEDATE, EXCLUDED FROM QK_PRODUCTS WHERE ARTICLE = '$ARTICLE' LIMIT 1");

							$ifOldExists = mysql_fetch_assoc($ifOldExists);

							$ifOldExistsID = (int) $ifOldExists['ID'];

							$EXCLUDED = (int) $ifOldExists['EXCLUDED'];

							$PRICE = (int) $ifOldExists['PRICE'];

							$OLDPRICE = (int) $ifOldExists['OLDPRICE'];

							$OLDPRICEDATE = strtotime($ifOldExists['OLDPRICEDATE']);

							$NOW = time();

							$NOWCHAR = date("Y-m-d H:i:s");

							

							if($ifOldExistsID > 0){

								if($EXCLUDED == 0){ 

										if($NEWPR < $PRICE){

											mysql_query("UPDATE QK_PRODUCTS SET OLDPRICE = $PRICE, OLDPRICEDATE = '$NOWCHAR', PRICE = $NEWPR, LEFTCOUNT = $NEWCOUNT WHERE ID = $ifOldExistsID");

										}

										else{

											if(($NOW - $OLDPRICEDATE) >= 2678400){

												mysql_query("UPDATE QK_PRODUCTS SET OLDPRICE = 0, PRICE = $NEWPR, LEFTCOUNT = $NEWCOUNT WHERE ID = $ifOldExistsID");

											}

											else{

												mysql_query("UPDATE QK_PRODUCTS SET PRICE = $NEWPR, LEFTCOUNT = $NEWCOUNT WHERE ID = $ifOldExistsID");

											}

										}

								}

								else{

									mysql_query("UPDATE QK_PRODUCTS SET LEFTCOUNT = $NEWCOUNT WHERE ID = $ifOldExistsID");

								}

							}

							else{

							

								/*Generating New ID On Lang Modul*/

									$newLangID = selection(666.3);

									$newLangID = $newLangID[0];

									$newLangID = $newLangID['TEXT_ID']+1;

								/*Generating New ID On Lang Modul*/

								$NAMEID = $newLangID;

								$langsINSERT = selection(666.1);

								foreach($langsINSERT as $langINSERT){

								$TEXT_ID = $NAMEID;

								$LANG_ID = $langINSERT['id'];

								$pangGetter = 'NAMEID'."$LANG_ID";

									$TEXT_VAL = $NEWNAME;

									mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

									VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

								}

								

								/*Generating New ID On Lang Modul*/

									$newLangID = selection(666.3);

									$newLangID = $newLangID[0];

									$newLangID = $newLangID['TEXT_ID']+1;

								/*Generating New ID On Lang Modul*/

								$DESCID = $newLangID;

								$langsINSERT = selection(666.1);

								foreach($langsINSERT as $langINSERT){

								$TEXT_ID = $DESCID;

								$LANG_ID = $langINSERT['id'];

								$pangGetter = 'DESCID'."$LANG_ID";

									$TEXT_VAL = '';

									mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

									VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die(mysql_error());

								}

								

								$IMG = "noWIMG.png";

								$SIMG = "noWIMG.png";

								$DESCFILE = "noWIMG.png";

								$EDITDATE = date("Y-m-d H:i:s");

								$PRICE = (int) $NEWPR;

								$OLDPRICE = (int) 0;

								$MAKER = (int) 0;

								$CATID = (int) 0;

								$CURTYPE = (int) 0;

								$ISSPEC = (int) 0;

								$ISTOP = (int) 0;

								$LEFTCOUNT = (int) $NEWCOUNT;

								$EXPORTED = 0;

								$COLOR = 'NULL';

								$ACTIVE	 = (int) 1;

								

								$DATE = date("Y-m-d H:i:s");

								$ONUSER = $_SESSION["userNameSurname"];

								

								$SQLQUE = "INSERT INTO QK_PRODUCTS  (CATID,

																	ARTICLE,

																	NAMEID,

																	DESCID,

																	MAKER,

																	ISTOP,

																	ISSPEC,

																	LEFTCOUNT,

																	PRICE,

																	OLDPRICE,

																	CURTYPE,

																	EXPORTED,

																	SIMG,

																	IMG,

																	DESCFILE,

																	ACTIVE,

																	EDITDATE) 

												VALUES 

																	($CATID,

																	'$ARTICLE',

																	$NAMEID,

																	$DESCID,

																	$MAKER,

																	$ISTOP,

																	$ISSPEC,

																	$LEFTCOUNT,

																	$PRICE,

																	$OLDPRICE,

																	$CURTYPE,

																	$EXPORTED,

																	'$SIMG',

																	'$IMG',

																	'$DESCFILE',

																	$ACTIVE,

																	'$EDITDATE')";

															 

							

								mysql_query($SQLQUE) or die(mysql_error());

						

							}

						

							}

						

						

						}

					}	

					if($mode == 999.81) /*Добавление нового Звезд +*/

					{

						

						$BID = (int) $_GET['BID'];

						$QUANTITY = (int) $_GET['NEWCOUNT'];

						$SQLQUE = "UPDATE QK_BASKET SET QUANTITY = $QUANTITY WHERE ID = $BID";

						

						mysql_query($SQLQUE) or die(mysql_error());							

									

						$result = 200;

						

					}

					if($mode == 999.82) /*Редактирование Варианта Параматра дела в библеотеку*/

					{

						$result = array();

						$SESSIONID = session_id();

						$allBasketDatas = mysql_query("SELECT ID, PRODID, (SELECT ARTICLE FROM QK_PRODUCTS WHERE QK_PRODUCTS.ID = PRODID LIMIT 1) AS PART, QUANTITY FROM QK_BASKET WHERE SESSIONID = '$SESSIONID'");

						$locCounter = 0;

						while($allBasketData = mysql_fetch_assoc($allBasketDatas)){

							

							$PART = $allBasketData['PART'];

							$REQQUANTITY = (int) $allBasketData['QUANTITY'];

							

							

							$url = 'http://91.103.30.6:1010/mob/hs/exchange_v1/BALANCE/?company=MobileCentre&id='.$PART;

							$username = 'WebService';

							$password = 'webadmin';

							$context = stream_context_create(array(

								'http' => array(

									'header'  => "Authorization: Basic " . base64_encode("$username:$password")

								)

							));

							

							

							$ICDATAS = file_get_contents($url, false, $context);

							$ICDATAS = json_decode($ICDATAS);

							$ICDATAS = array($ICDATAS->Items);

							$ICDATAS = $ICDATAS[0];

							$ICDATAS = $ICDATAS[0];

							

							$ARTICLE = array($ICDATAS->id);

							$ARTICLE = $ARTICLE[0];

							

							$STOCKQUANTITY = array($ICDATAS->quantity);

							$STOCKQUANTITY = (int) $STOCKQUANTITY[0];

							

							if($STOCKQUANTITY >= $REQQUANTITY && $PART == $ARTICLE){

								continue;

							}

							else{

								$result[$locCounter] = (int) $allBasketData['ID'];

								$locCounter++;

							}

							

							

						}

						

						

						

					}

					

					if($mode == 999.83) /*Добавление Вопросов*/

					{

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = 1;

						$NAME = "New Group (".date("d-m-Y H:i").")";

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_GROUP  (NAME, ACTIVE, EDITDATE) 

											VALUES ('$NAME', $ACTIVE, '$EDITDATE')";

													

														

						mysql_query($SQLQUE) or die(mysql_error());



						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

							

					}

					if($mode == 999.84) /*Редактирование Вопросов*/

					{

					

						$ID = (int) $_POST['editGroupID'];

						

						$NAME = mysql_real_escape_string($_POST['NAME']);

						$DICTOUNT =(int) $_POST['DICTOUNT'];

						$FROMDATE = date("Y-m-d 00:00:00", strtotime($_POST['FROMDATE']));

						$TODATE = date("Y-m-d 00:00:00", strtotime($_POST['TODATE']));

						

						mysql_query("UPDATE QK_GROUP

						SET NAME = '$NAME', DICTOUNT = $DICTOUNT, FROMDATE = '$FROMDATE', TODATE = '$TODATE'

						WHERE ID = $ID") or die(mysql_error());

					}

					

					if($mode == 999.85) /*Добавление Вопросов*/

					{

						

						$GID = (int) $_POST['gid'];

						

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['SMCPID']);

						

						if($GID > 0){

							mysql_query("DELETE FROM QK_GROUP_INC WHERE GID = $GID");

						}

						

						while($localCounter2 <= $maxCounter){

								$PID = $_POST['SMCPID'][$localCounter];

								if($GID > 0 && $PID > 0){

									mysql_query("INSERT INTO QK_GROUP_INC  (GID, PID) 

																VALUES ($GID, $PID)") or die(mysql_error());

								}	

							$localCounter++;

							$localCounter2++;

						}

							

					}

					

					if($mode == 999.86) /*Добавление Вопросов*/

					{

						

						$EDITDATE = date("Y-m-d H:i:s");

						$ACTIVE = 1;

						$NAME = "New Group (".date("d-m-Y H:i").")";

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_LABELGROUPS  (NAME, ACTIVE, EDITDATE) 

											VALUES ('$NAME', $ACTIVE, '$EDITDATE')";

													

														

						mysql_query($SQLQUE) or die(mysql_error());



						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

							

					}

					if($mode == 999.87) /*Редактирование Вопросов*/

					{

					

						$ID = (int) $_POST['editGroupID'];

						

						

						$oldImgData = mysql_query("SELECT ICON FROM QK_LABELGROUPS WHERE ID = $ID");

						$oldImgData = mysql_fetch_assoc($oldImgData);

						$oldImgData = $oldImgData['ICON'];

						

						/*Блок Работы С Файлом Характеристики*/

						if($_FILES['ICON']['name'])

						{

							$t1BW = 74;

							$t1BH = 74;

							if($_FILES['ICON']['name'] && ( $_FILES['ICON']['type'] == 'image/png' or $_FILES['ICON']['type'] == 'image/jpeg' )){

								

								list($width_orig, $height_orig) = getimagesize($_FILES['ICON']['tmp_name']);

								

								if($width_orig == $t1BW && $height_orig == $t1BH){}

								else{return false;}

								

								$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/";

								$customName = substr(md5(microtime()), 0, 5);

								$ICON = $customName.$_FILES['ICON']['name'];

								$product_ico_tmp = $_FILES['ICON']['tmp_name'];

								move_uploaded_file($product_ico_tmp, $product_image_location.$ICON);

							}

						}

						else{$ICON = $oldImgData;}

						/*Блок Работы С Файлом Характеристики*/

						

						$NAME = mysql_real_escape_string($_POST['NAME']);

						$LURL = mysql_real_escape_string($_POST['LURL']);

						$FROMDATE = date("Y-m-d 00:00:00", strtotime($_POST['FROMDATE']));

						$TODATE = date("Y-m-d 00:00:00", strtotime($_POST['TODATE']));

						

						mysql_query("UPDATE QK_LABELGROUPS

						SET NAME = '$NAME', ICON = '$ICON', LURL = '$LURL', FROMDATE = '$FROMDATE', TODATE = '$TODATE'

						WHERE ID = $ID") or die(mysql_error());

					}

					

					if($mode == 999.88) /*Добавление Вопросов*/

					{

						

						$GID = (int) $_POST['gid'];

						

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['SMCPID']);

						

						if($GID > 0){

							mysql_query("DELETE FROM QK_LABELGROUPS_INC WHERE GID = $GID");

						}

						

						while($localCounter2 <= $maxCounter){

								$PID = $_POST['SMCPID'][$localCounter];

								if($GID > 0 && $PID > 0){

									mysql_query("INSERT INTO QK_LABELGROUPS_INC  (GID, PID) 

																VALUES ($GID, $PID)") or die(mysql_error());

								}	

							$localCounter++;

							$localCounter2++;

						}

							

					}

					if($mode == 999.89) 

					{

						unset($result);

						 

						$ID = (int) $_POST["ID"];

						

						

						if($_FILES['IMG']['name'])

						{

							$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/img/";

							$customName = substr(md5(microtime()), 0, 20);

							$IMG = $customName.str_replace(' ', '', $_FILES['IMG']['name']);

							$product_ico_tmp = $_FILES['IMG']['tmp_name'];

							move_uploaded_file($product_ico_tmp, $product_image_location.$IMG);

							

							

							$filename = $product_image_location.$IMG;

							$width = 32;

							$height = 32;

							$info = getimagesize($filename);

							list($width_orig, $height_orig) = getimagesize($filename);

							$ratio_orig = $width_orig/$height_orig;

							if($width/$height > $ratio_orig){

							   $width = $height*$ratio_orig;

							}

							else{

							   $height = $width/$ratio_orig;

							}

							$image_p = imagecreatetruecolor($width, $height);

							if($info['mime'] == 'image/jpeg'){

								$image = imagecreatefromjpeg($filename);

							}

							elseif($info['mime'] == 'image/gif'){

								$image = imagecreatefromgif($filename);

							}

							elseif($info['mime'] == 'image/png'){

								$image = imagecreatefrompng($filename);

							}

							else{	

								continue;

							}

							imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

							imagejpeg($image_p, $_SERVER["DOCUMENT_ROOT"]."/img/".$IMG, 100);

							

							

							

						}

						else{

							$oldImageData = mysql_query("SELECT ICON FROM QK_DICPRODGROUP WHERE ID = $ID LIMIT 1");

							$oldImageData = mysql_fetch_assoc($oldImageData);

							$oldImageData = $oldImageData['ICON'];

							$IMG = $oldImageData;

						}

							

						$SQLQUE = "UPDATE QK_DICPRODGROUP

						SET 

						ICON = '$IMG'

						WHERE ID = $ID";			

						

						mysql_query($SQLQUE) or die(mysql_error());

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$result = 1;

					}

					

					

					if($mode == 999.91) /*Добавление Заказа*/

					{	

						$CNAME = $_POST['CNAME'];

						$CSNAME = $_POST['CSNAME'];

						$CPHONE = $_POST['CPHONE'];

						$CMAIL = $_POST['CMAIL'];

						$CADDRES = $_POST['CADDRES'];

						$STORE = (int) $_POST['STORE'];

						$GETTYPE = (int) $_POST['GETTYPE'];

						$PAYMENT = (int) $_POST['PAYMENT'];

						$COMMENT = mysql_real_escape_string($_POST['COMMENT']);

						$ADDDATE = date("Y-m-d H:i:s");

						$STATE = -1;

						$PREORDER = 1;

										

						

						

						$DATE = date("Y-m-d H:i:s");

						$ONUSER = $_SESSION["userNameSurname"];

						

						$SQLQUE = "INSERT INTO QK_ORDERS

											(CUST, CNAME, CPHONE, CMAIL, FULLPRICE, PAYMENT, PAYED, ADDDATE, STATE, PREORDER, GETTYPE, STORE, COMMENT) VALUES 

											(0,'$CNAME $CSNAME','$CPHONE','$CMAIL', 0, $PAYMENT, 0, '$ADDDATE', $STATE, $PREORDER, $GETTYPE, $STORE, '$COMMENT')";

													

						mysql_query($SQLQUE) or die(mysql_error());							

													

						$SQLQUE = str_replace("'", "-", $SQLQUE);									

						$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

						mysql_query($SQLLOG) or die(mysql_error());

						

						$LASTEDDEDORDID = mysql_query("SELECT ID FROM QK_ORDERS ORDER BY ID DESC LIMIT 1");

						$LASTEDDEDORDID = mysql_fetch_assoc($LASTEDDEDORDID);

						$LASTEDDEDORDID = (int) $LASTEDDEDORDID['ID'];

						

						$locCounter = 0;

						

						$FULLPRICE = 0;

						while(isset($_POST['PRODID'][$locCounter])){

							

							$ORDERID = $LASTEDDEDORDID; 

							$PRODID = (int) $_POST['PRODID'][$locCounter];

							$COUNT = (int) $_POST['COUNT'][$locCounter];

							$ONEPRICE = (int) $_POST['PRICE'][$locCounter];

							

							$PRICE = $_POST['COUNT'][$locCounter]*$_POST['PRICE'][$locCounter];

							$_POST['ALLPRICEROW'][$locCounter] = $_POST['COUNT'][$locCounter]*$_POST['PRICE'][$locCounter];

							

							$FULLPRICE = $FULLPRICE + $PRICE;

							

							$PRODNAME = mysql_query("SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT NAMEID FROM QK_PRODUCTS WHERE ID = $PRODID LIMIT 1)");

							$PRODNAME = mysql_fetch_assoc($PRODNAME);

							$PRODNAME = $PRODNAME['TEXT_VAL'];

							

							$_POST['PRODNAME'][$locCounter] = $PRODNAME;

							

							$DATE = date("Y-m-d H:i:s");

							$ONUSER = $_SESSION["userNameSurname"];

							

							$SQLQUE = "INSERT INTO QK_ORDERS_LIST

												(ORDERID, PRODID, COUNT, PRICE, ONEPRICE) VALUES 

												($ORDERID,'$PRODID',$COUNT,$PRICE, $ONEPRICE)";

														

							mysql_query($SQLQUE) or die(mysql_error());							

														

							$SQLQUE = str_replace("'", "-", $SQLQUE);									

							$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

							mysql_query($SQLLOG) or die(mysql_error());

							$locCounter++;

						}

						

						mysql_query("UPDATE QK_ORDERS SET FULLPRICE = $FULLPRICE WHERE ID = $ORDERID;");

						

						if(strlen($CMAIL) > 0){

							$DATE = date("Y-m-d H:i:s");

							$mail = mysql_real_escape_string($CMAIL);

							mysql_query("INSERT INTO `QK_EMAIL` (`ID`, `FROM`, `TO`, `SENDERNAME`, `SENDERPHONE`, `MAILBODY`, `SUBJECT`, `SENDDATE`) VALUES (NULL, '$mail', '$mail', '$mail', '$mail', '$mail', '$mail', '$DATE');");

						}

						

						if($PAYMENT == 1){ $PAYMENT = 'Առաքման ժամանակ'; }else{ $PAYMENT = 'Օնլայն վճարում'; }

						

						

						$to = 'sales@mobilecentre.am';

						$subject = "Order Info : $ORDERID";

						

						$message = "<body style='margin: 0px;'>

							<div style='background:#F1F1F1; padding:25px 15px; font-family:'Arial AMU',Helvetica'>

						<div style=' width:100%; max-width:600px; margin:0 auto;'>

							<table cellpadding='0' cellspacing='0' border='0' style='width: 100%;'>

								<tbody><tr>

									<td style='padding:15px 20px;text-align:left;'>

										<a href='http://mobilecentre.am'><img src='http://mobilecentre.am/assets/img/logo-email.png' width='200'></a>

									</td>

								</tr>

								<tr>

									<td style='padding:20px; background:#FFF;'>



										<table cellpadding='0' cellspacing='0' border='0' style='width:100%;' align='center'>

											<tbody><tr>

												<td style='padding:0px 0px 15px; border-bottom: 1px dashed #CCC;'>

													<h1 style='font-size:24px; margin:20px 0 0;'>Նախնական պատվեր $ORDERID</h1>

												</td>

											</tr>";

											

									$locCounter = 0;

									while(isset($_POST['PRODID'][$locCounter])){

										

										$message = $message."<tr>

												<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

													<span style='color:#000; font-weight: 700;'>".$_POST['PRODIDNAME'][$locCounter]."</span>

													<span style='color:#000; float: right; width: 150px; text-align: right; '>".$_POST['ALLPRICEROW'][$locCounter]." դր.</span>

													<span style='color:#000; float: right; '>".$_POST['COUNT'][$locCounter]." հատ</span>

												</td>

											</tr>";

										$locCounter++;

									}

									

							

								

								$message = $message."<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Վճարման տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$PAYMENT</span>

																<span style='color:#999;'>Վճարման տարբերակ</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>Նախնական վաճառք</span>

																<span style='color:#999;'>Վաճառքի տեսակ</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$FULLPRICE դր.</span>

																<span style='color:#999;'>Ընդհանուր գումար</span>

															</td>

														</tr>

														<tr>

															<td style='padding:0px 0px 15px; border-bottom: 1px solid #CCC;'>

																<h1 style='font-size:24px; margin:20px 0 0;'>Գնորդի տվյալներ</h1>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CNAME $CSNAME</span>

																<span style='color:#999;'>Անուն Ազգանուն</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CADDRES</span>

																<span style='color:#999;'>Հասցե</span>

															</td>

														</tr>

														<tr>

															<td style='padding:15px 0px; border-bottom: 1px dashed #CCC;'>

																<span style='float:right; color:#000; font-weight: 700;'>$CPHONE</span>

																<span style='color:#999;'>Բջջային հեռախոս</span>

															</td>

														</tr>

													</tbody></table>



												</td>

											</tr>

										</tbody></table>

									</div>

								<div>

							</div></div></body>";

								

								

							

							

							

							

						 $subject_preferences = array(

							"input-charset" => 'utf-8',

							"output-charset" => 'utf-8',

							"line-length" => 76, 

							"line-break-chars" => "\r\n"

						);

						

						$header = "Content-type: text/html; charset=utf-8 \r\n";

						$header .= "From: mobilecentre.am Sales <sales@mobilecentre.am> \r\n";

						$header .= "MIME-Version: 1.0 \r\n";

						$header .= "Content-Transfer-Encoding: 8bit \r\n";

						$header .= "Date: ".date("r (T)")." \r\n";

						$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);

						

						mail($to, $subject, $message, $header);

						

						mail($CMAIL, $subject, $message, $header);

						

						$RESD = array();

						$RESD['LASTEDDEDORDID'] = $LASTEDDEDORDID;

						$RESD['FULLPRICE'] = $FULLPRICE;

						

						return $RESD;

						

					}

					if($mode == 999.92) /*Редактирование запаса на складе*/

					{

							

						$NAME = mysql_real_escape_string($_POST['NAME']);		

						$SNAME = mysql_real_escape_string($_POST['SNAME']);		

						$LOGIN = mysql_real_escape_string($_POST['LOGIN']);		

						$PASS = mysql_real_escape_string($_POST['PASS']);		

						$PHONE = mysql_real_escape_string($_POST['PHONE']);		

						$MAIL = mysql_real_escape_string($_POST['MAIL']);		

						$TAX = mysql_real_escape_string($_POST['TAX']);		

						$ACCODE = mysql_real_escape_string($_POST['ACCODE']);		

						$ADDRTEXT = mysql_real_escape_string($_POST['ADDRTEXT']);		

						$BTYPE = (int) $_POST['BTYPE'];

						$BROKCONF = (int) $_POST['BROKCONF'];

						$CUSTOMER = (int) $_POST['editUserID'];

						mysql_query("UPDATE QK_CUSTOMER SET  NAME = '$NAME', ACCODE = '$ACCODE', TAX = '$TAX', ADDRTEXT = '$ADDRTEXT', SNAME = '$SNAME',  LOGIN = '$LOGIN', PASS = '$PASS',  PHONE = '$PHONE',  MAIL = '$MAIL', BTYPE = $BTYPE WHERE CUSTOMER = $CUSTOMER;") or die(mysql_error());

					}

					

					

					

					if($mode == 999.93) /*Добавление Нового Товара*/

					{	

					

						if($_FILES['RATEIMPORT']['name']){

								require_once('excel_reader2.php');

								

								if($_FILES['RATEIMPORT']['name'])

								{

									$product_image_location = $_SERVER["DOCUMENT_ROOT"]."/files/";

									$importFiles = str_replace(' ', '', $_FILES['RATEIMPORT']['name']);

									$product_ico_tmp = $_FILES['RATEIMPORT']['tmp_name'];

									$uploadResult = move_uploaded_file($product_ico_tmp, $product_image_location.$importFiles);

									

									if($uploadResult === true){

										$file = $product_image_location.$importFiles;

									}

								}

										

								$data = new Spreadsheet_Excel_Reader($file, true, "UTF-8");

								

								$dataArrays = array();

								$locCounter = 1;

								while($locCounter <= $data->sheets[0]['numRows']){

									

										foreach(range('A','Z') as $columnID) {

											$dataArrays[$locCounter][] = $data->val($locCounter, $columnID);

										}

										foreach(range('A','Z') as $columnID) {

											$columnID = "A".$columnID;

											$dataArrays[$locCounter][] = $data->val($locCounter, $columnID);

										}

										

									$locCounter++;

								}

								

								

								$titles = $dataArrays[1];

								

								/*echo "<pre>";

									print_r($dataArrays);

								echo "</pre>";

								die();*/

								$mCounter = 1;

								foreach($dataArrays as $dataArray){

										

									if($mCounter < 3){

										$mCounter++;

										continue;

									}

									

									$ARTICLE = $dataArray[6];

									

									$ifProductsIssSetData = mysql_query("SELECT ID, NAMEID, CRRULESID FROM QK_PRODUCTS WHERE ARTICLE = '$ARTICLE' LIMIT 1");

									$ifProductsIssSetData = mysql_fetch_assoc($ifProductsIssSetData);

									$ifProductsIssSet = (int) $ifProductsIssSetData['ID'];

									

									if($ifProductsIssSet > 0){

										$LASTGALID = $ifProductsIssSet;

										

										$EDITDATE = date("Y-m-d H:i:s");

										

										$NAMEID = (int) $ifProductsIssSetData['NAMEID'];

										mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $NAMEID");

										$langsINSERT = selection(666.1);

										foreach($langsINSERT as $langINSERT){

										$TEXT_ID = $NAMEID;

										$LANG_ID = $langINSERT['id'];

										$pangGetter = 'NAMEID'."$LANG_ID";

											if($LANG_ID == 1){

												$TEXT_VAL = $dataArray[0];

											}

											elseif($LANG_ID == 2){

												$TEXT_VAL = $dataArray[1];

											}

											elseif($LANG_ID == 3){

												$TEXT_VAL = $dataArray[2];

											}

											mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

											VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

										}

										

										$CRRULESID = (int) $ifProductsIssSetData['CRRULESID'];

										mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID` = $CRRULESID");

										$langsINSERT = selection(666.1);

										foreach($langsINSERT as $langINSERT){

										$TEXT_ID = $CRRULESID;

										$LANG_ID = $langINSERT['id'];

										$pangGetter = 'CRRULESID'."$LANG_ID";

											if($LANG_ID == 1){

												$TEXT_VAL = $dataArray[3];

											}

											elseif($LANG_ID == 2){

												$TEXT_VAL = $dataArray[4];

											}

											elseif($LANG_ID == 3){

												$TEXT_VAL = $dataArray[5];

											}

											mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

											VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')");

										}

										

										$PRICE = (int) $dataArray[7];

										$OLDPRICE = (int) $dataArray[8];

										

										$MAKERDATA = mysql_query("SELECT id FROM QK_DICTION WHERE DICTIONTYPE = 'CONTRACTTYPE' AND EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = DICTIONNAMEID AND TEXT_VAL = '{$dataArray[9]}')");

										$MAKERDATA = mysql_fetch_assoc($MAKERDATA);

										

										$MAKER = (int) $MAKERDATA['id'];

										$LEFTCOUNT = (int) $dataArray[10];

										

										$DELIVERY = (int) $dataArray[14];

										$ISCOUNTRY = (int) $dataArray[13];

										$ONLYSHOP = (int) $dataArray[15];

										$ACTIVE = (int) $dataArray[16];

										

										$CATID = (int) $_POST['addnewimportsubcat'];

										

										if(strlen($dataArray[12]) > 1){

											

											$CHARNAME = mysql_real_escape_string($dataArray[12]);

											$COLOR = mysql_query("SELECT ID FROM QK_COLORS WHERE CHARNAME = '{$CHARNAME }' LIMIT 1");

											$COLOR = mysql_fetch_assoc($COLOR);

											$COLOR = (int) $COLOR['ID'];

											if($COLOR == 0){

												$COLOR = 'null';

											}

										}

										else{

											$COLOR = 'null';

										}

										

										

										

										mysql_query("UPDATE QK_PRODUCTS SET MAKER = $MAKER, COLOR = $COLOR, DELIVERY = $DELIVERY,  ACTIVE = $ACTIVE, ONLYSHOP = $ONLYSHOP, ISCOUNTRY = $ISCOUNTRY, LEFTCOUNT = $LEFTCOUNT, PRICE = $PRICE, PRICE = $PRICE, OLDPRICE = $OLDPRICE, EDITDATE = '$EDITDATE' WHERE ID = $ifProductsIssSet");

										mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN (SELECT VALUE FROM QK_PRODDETVAL WHERE PID = $ifProductsIssSet)");

										mysql_query("DELETE FROM QK_PRODDETVAL WHERE PID = $ifProductsIssSet");

										

										/*ADDING STAT INS PROD DESC*/

										

											$allValuesCodes = mysql_query("SELECT TAGID, (SELECT DICCHAR FROM QK_DICPRODVAL WHERE ID = TAGID) AS DICCHAR FROM QK_CATDETVAL WHERE CATID = $CATID");

											

											while($allValuesCode = mysql_fetch_assoc($allValuesCodes)){

													

													

													$newLangID = selection(666.3);

													$newLangID = $newLangID[0];

													$newLangID = $newLangID['TEXT_ID']+1;

													

													

													$NAMEID = $newLangID;

													$langsINSERT = selection(666.1);

													foreach($langsINSERT as $langINSERT){

														

														$TEXT_ID = $NAMEID;

														$LANG_ID = $langINSERT['id']; 

														$pangGetter = array_search($allValuesCode['TAGID'], $titles);

														$TEXT_VAL = $dataArray[$pangGetter];

														

														if(strlen($allValuesCode['DICCHAR']) > 0){

															if($LANG_ID == 1){

																

																mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

															}

															else{

																$DICCHAR = $allValuesCode['DICCHAR'];

																$LANGDATA = mysql_query("SELECT ll.TEXT_ID FROM QK_DICTION dd, QK_LANGSVAL ll WHERE dd.DICTIONNAMEID = ll.TEXT_ID AND dd.DICTIONTYPE = '$DICCHAR' AND ll.LANG_ID = 1 AND ll.TEXT_VAL = '$TEXT_VAL' LIMIT 1");

																$LANGDATA = mysql_fetch_assoc($LANGDATA);

																if($LANGDATA['TEXT_ID'] > 0){

																	$NEWDATA = LangCharSetter($LANG_ID, $LANGDATA['TEXT_ID'], 0, 1);

																	if(strlen($NEWDATA) > 0){

																		$TEXT_VAL = $NEWDATA;

																		mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

																	}

																	else{

																		mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

																	}

																}

																else{

																	mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

																}

																

															}

														}

														else{

															mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

														}

														

													}

													$TYPEID = $allValuesCode['TAGID'];

													mysql_query("INSERT INTO QK_PRODDETVAL (PID, TYPEID, VALUE) 

																		VALUES ($LASTGALID, $TYPEID, $NAMEID)");

													

													

											}

											

										/*ADDING STAT INS PROD DESC*/

										

										

										

									}

									else{

										/*Generating New ID On Lang Modul*/

										$newLangID = selection(666.3);

										$newLangID = $newLangID[0];

										$newLangID = $newLangID['TEXT_ID']+1;

										/*Generating New ID On Lang Modul*/

										$NAMEID = $newLangID;

										$langsINSERT = selection(666.1);

										foreach($langsINSERT as $langINSERT){

										$TEXT_ID = $NAMEID;

										$LANG_ID = $langINSERT['id'];

										

											if($LANG_ID == 1){

												$TEXT_VAL = $dataArray[0];

											}

											elseif($LANG_ID == 2){

												$TEXT_VAL = $dataArray[1];

											}

											elseif($LANG_ID == 3){

												$TEXT_VAL = $dataArray[2];

											}

											mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

											VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

										}

										

										

										/*Generating New ID On Lang Modul*/

											$newLangID = selection(666.3);

											$newLangID = $newLangID[0];

											$newLangID = $newLangID['TEXT_ID']+1;

										/*Generating New ID On Lang Modul*/

										$CRRULESID = $newLangID;

										$langsINSERT = selection(666.1);

										foreach($langsINSERT as $langINSERT){

										$TEXT_ID = $CRRULESID;

										$LANG_ID = $langINSERT['id'];

										

											if($LANG_ID == 1){

												$TEXT_VAL = $dataArray[3];

											}

											elseif($LANG_ID == 2){

												$TEXT_VAL = $dataArray[4];

											}

											elseif($LANG_ID == 3){

												$TEXT_VAL = $dataArray[5];

											}

											

											mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

											VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

										}

										

										

										

										/*Generating New ID On Lang Modul*/

											$newLangID = selection(666.3);

											$newLangID = $newLangID[0];

											$newLangID = $newLangID['TEXT_ID']+1;

										/*Generating New ID On Lang Modul*/

										$DESCID = $newLangID;

										$langsINSERT = selection(666.1);

										foreach($langsINSERT as $langINSERT){

										$TEXT_ID = $DESCID;

										$LANG_ID = $langINSERT['id'];

										$pangGetter = 'DESCID'."$LANG_ID";

											$TEXT_VAL = '';

											mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

											VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

										}

										

										

										

										$SIMG = "noWIMG.png";

										$IMG = "noWIMG.png";

										$DESCFILE = "noWIMG.png";

										

										$EDITDATE = date("Y-m-d H:i:s");

										

										$PRICE = (int) $dataArray[7];

										$OLDPRICE = (int) $dataArray[8];

										$ARTICLE = $dataArray[6];

										

										$MAKERDATA = mysql_query("SELECT id FROM QK_DICTION WHERE DICTIONTYPE = 'CONTRACTTYPE' AND EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = DICTIONNAMEID AND TEXT_VAL = '{$dataArray[9]}')");

										$MAKERDATA = mysql_fetch_assoc($MAKERDATA);

										

										$MAKER = (int) $MAKERDATA['id'];

										$BROKER = (int) $_SESSION['CUSTOMER'];

										$CURTYPE = (int) 0;

										$ISSPEC = (int) 0;

										$ISTOP = (int) 0;

										$LEFTCOUNT = (int) $dataArray[10];

										

										$DELIVERY = (int) $dataArray[14];

										$ISCOUNTRY = (int) $dataArray[13];

										$ONLYSHOP = (int) $dataArray[15];

										

										$EXPORTED = 1;

										$CATID = (int) $_POST['addnewimportsubcat'];

										$ACTIVE	 = (int) $dataArray[16];

										

										if(strlen($dataArray[12]) > 1){

											

											$CHARNAME = mysql_real_escape_string($dataArray[12]);

											$COLOR = mysql_query("SELECT ID FROM QK_COLORS WHERE CHARNAME = '{$CHARNAME }' LIMIT 1");

											$COLOR = mysql_fetch_assoc($COLOR);

											$COLOR = (int) $COLOR['ID'];

											if($COLOR == 0){

												$COLOR = 'null';

											}

										}

										else{

											$COLOR = 'null';

										}

										

										$DATE = date("Y-m-d H:i:s");

										$ONUSER = $_SESSION["userNameSurname"];

										

										$SQLQUE = "INSERT INTO QK_PRODUCTS  (CATID,

																			ARTICLE,

																			NAMEID,

																			CRRULESID,

																			DESCID,

																			MAKER,

																			ISTOP,

																			BROKER,

																			ISSPEC,

																			COLOR,

																			LEFTCOUNT,

																			PRICE,

																			OLDPRICE,

																			CURTYPE,

																			EXPORTED,

																			DELIVERY,

																			ONLYSHOP,

																			ISCOUNTRY,

																			SIMG,

																			IMG,

																			DESCFILE,

																			ACTIVE,

																			EDITDATE) 

														VALUES 

																			($CATID,

																			'$ARTICLE',

																			$NAMEID,

																			$CRRULESID,

																			$DESCID,

																			$MAKER,

																			$ISTOP,

																			$BROKER,

																			$ISSPEC,

																			$COLOR,

																			$LEFTCOUNT,

																			$PRICE,

																			$OLDPRICE,

																			$CURTYPE,

																			$EXPORTED,

																			$DELIVERY,

																			$ONLYSHOP,

																			$ISCOUNTRY,

																			'$SIMG',

																			'$IMG',

																			'$DESCFILE',

																			$ACTIVE,

																			'$EDITDATE')";

										mysql_query($SQLQUE) or die(mysql_error());

																		

										$SQLQUE = str_replace("'", "-", $SQLQUE);									

										$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

										mysql_query($SQLLOG) or die(mysql_error());

										

										

										$LASTGALID = mysql_query("SELECT ID FROM QK_PRODUCTS ORDER BY ID DESC LIMIT 1");

										$LASTGALID  = mysql_fetch_assoc($LASTGALID);

										$LASTGALID = $LASTGALID['ID'];

										

										

										/*ADDING STAT INS PROD DESC*/

										

											$allValuesCodes = mysql_query("SELECT TAGID, (SELECT DICCHAR FROM QK_DICPRODVAL WHERE ID = TAGID) AS DICCHAR FROM QK_CATDETVAL WHERE CATID = $CATID");

											

											while($allValuesCode = mysql_fetch_assoc($allValuesCodes)){

													

													

													$newLangID = selection(666.3);

													$newLangID = $newLangID[0];

													$newLangID = $newLangID['TEXT_ID']+1;

													

													$NAMEID = $newLangID;

													$langsINSERT = selection(666.1);

													foreach($langsINSERT as $langINSERT){

													$TEXT_ID = $NAMEID;

													$LANG_ID = $langINSERT['id']; 

													$pangGetter = array_search($allValuesCode['TAGID'], $titles);

														$TEXT_VAL = $dataArray[$pangGetter];

														

														if(strlen($allValuesCode['DICCHAR']) > 0){

															if($LANG_ID == 1){

																

																mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

															}

															else{

																$DICCHAR = $allValuesCode['DICCHAR'];

																$LANGDATA = mysql_query("SELECT ll.TEXT_ID FROM QK_DICTION dd, QK_LANGSVAL ll WHERE dd.DICTIONNAMEID = ll.TEXT_ID AND dd.DICTIONTYPE = '$DICCHAR' AND ll.LANG_ID = 1 AND ll.TEXT_VAL = '$TEXT_VAL' LIMIT 1");

																$LANGDATA = mysql_fetch_assoc($LANGDATA);

																if($LANGDATA['TEXT_ID'] > 0){

																	$NEWDATA = LangCharSetter($LANG_ID, $LANGDATA['TEXT_ID'], 0, 1);

																	if(strlen($NEWDATA) > 0){

																		$TEXT_VAL = $NEWDATA;

																		mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

																	}

																	else{

																		mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL); 

																	}

																}

																else{

																	mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

																}

																

															}

														}

														else{

															mysql_query("INSERT INTO QK_LANGSVAL  (TEXT_ID,LANG_ID,TEXT_VAL)

																		VALUES ($TEXT_ID,$LANG_ID,'$TEXT_VAL')") or die($TEXT_VAL);

														}

														

													}

													$TYPEID = $allValuesCode['TAGID'];

													mysql_query("INSERT INTO QK_PRODDETVAL (PID, TYPEID, VALUE) 

																		VALUES ($LASTGALID, $TYPEID, $NAMEID)");

													

													

											}

											

										/*ADDING STAT INS PROD DESC*/

									}

								}

								

								

								

								

						}

						

						

					}	

					if($mode == 999.94) /*Добавление Вопросов*/

					{

					

						$GID = (int) $_POST['gid'];

						

						$localCounter = 0;

						$localCounter2 = 1;

						$maxCounter = count($_POST['OBJID']);

						

						if($GID > 0){

							mysql_query("DELETE FROM QK_ACROLEOBJ WHERE ROLEID = $GID");

						}

						

						while($localCounter2 <= $maxCounter){

								$PID = $_POST['OBJID'][$localCounter];

								if($GID > 0 && $PID > 0){

									mysql_query("INSERT INTO QK_ACROLEOBJ (ROLEID, OBJID, TYPE) VALUES ($GID, $PID, 1);") or die(mysql_error());

								}	

							$localCounter++;

							$localCounter2++;

						}

							

					}

					

				return $result;

		

			}	

		

	

	function selection($mode)

		{

					$startedQuery = microtime(true);

					switch($mode):

					case 111.1:	// Вывод Параметра Отдела Для Редактирования

							$result = mysql_query("SELECT CUSTOMER, NAME, TAX, ACCODE, ADDRTEXT, SNAME, PASS, MAIL, LOGIN, TYPE, PHONE, (SELECT COUNT(*) FROM QK_PRODUCTS WHERE BROKER = CUSTOMER) AS PCOUNT, BTYPE, BROKCONF, (SELECT COUNT(*) AS ORDERSUMS FROM QK_ORDERS ss WHERE ss.CUST = QK_CUSTOMER.CUSTOMER LIMIT 1) AS ORDERSUMS

									FROM QK_CUSTOMER

									ORDER BY CUSTOMER ASC"); break;

									

					case 111.19:	// Вывод Параметра Отдела Для Редактирования

							

							$CUST = (int) $_SESSION['CUSTOMER'];

							$result = mysql_query("SELECT ID, ADDDATE, STATE, NOTE, CKIND, 

									(SELECT CONTACT_NAME FROM QK_CUSTOMER WHERE CUSTOMER = FCUST LIMIT 1) AS FCUST_CONTACT_NAME,

									(SELECT NAME FROM QK_CUSTOMER WHERE CUSTOMER = FCUST LIMIT 1) AS FCUST_NAME,

									(SELECT CONTACT_NAME FROM QK_CUSTOMER WHERE CUSTOMER = TCUST LIMIT 1) AS TCUST_CONTACT_NAME,

									(SELECT NAME FROM QK_CUSTOMER WHERE CUSTOMER = TCUST LIMIT 1) AS TCUST_NAME,

									(SELECT IMAGE FROM QK_CUSTOMER WHERE CUSTOMER = TCUST LIMIT 1) AS IMAGE,

									FCUST, TCUST

									FROM QK_CUSTCONN

									WHERE TCUST = $CUST AND STATE = 2

									"); break;

									

					case 999.1:	// Вывод Полного Списка Пользователей в Административной Панели 

					 

						$CUST = $_SESSION['CUSTOMER'];

						$result = mysql_query("SELECT ID, CUST, LOGIN, CONTACT_NAME, MAIL, PHONE, ADDDATE, ACTIVE

													FROM QK_CUSTOMER_USERS WHERE CUST = $CUST"); break;

													

					case 999.2:	// Вывод Полного Списка Пользователей в Административной Панели 

					 

						$CUST = $_SESSION['CUSTOMER'];

						$result = mysql_query("SELECT ID, BROKER, CUSTOMER_ID, 

												CASE WHEN EXISTS (SELECT 1 FROM QK_NOTIFICATIONS WHERE PERSONALID = QK_CUSTOMER_USERS_SECTORS.ID)

												THEN 1 ELSE 0 END AS NOTICED,

												(SELECT NAME FROM QK_CUSTOMER WHERE CUSTOMER = CUSTOMER_ID) AS CUSTOMER_NAME,

												(SELECT CONTACT_NAME FROM QK_CUSTOMER_USERS WHERE ID = WORKER_ID) AS WORKER_NAME,

												(SELECT DICTIONNAMEID FROM QK_DICTION WHERE id = BRAND_ID) AS BRAND_NAME,

												WORKER_ID, BRAND_ID, ADDDATE, ACTIVE

													FROM QK_CUSTOMER_USERS_SECTORS WHERE BROKER = $CUST"); break;

													

					case 999.3:	// Вывод Полного Списка Работников 

							$result = mysql_query("SELECT s.ID, QUE, s.NAMEID, s.ACTIVE

														FROM QK_WORKERS s

														ORDER BY s.QUE ASC"); break;

					case 999.4:	// Вывод Параметра Отдела Для Редактирования

							$ID = (int) $_GET['editVacancie'];

							$result = mysql_query("SELECT ID, QUE, NAMEID, JOBNAMEID, DESCID, ACTIVE, IMG, EMAIL, EDITDATE

									FROM QK_WORKERS

									WHERE  ID = $ID LIMIT 1"); break;

									

					case 999.5:	// Вывод Полного Списка Продуктов 

							$result = mysql_query("SELECT ID, NAMEID, SIMG, IMG, PRICE, OLDPRICE

														FROM QK_PRODUCTS

														ORDER BY ID DESC LIMIT 2");  break;

														

					case 999.6:	// Вывод Полного Списка Продуктов 

							$result = mysql_query("SELECT ID, NAMEID, SIMG, IMG, PRICE, OLDPRICE

														FROM QK_PRODUCTS

														WHERE OLDPRICE > 0 AND OLDPRICE > PRICE

														ORDER BY ID DESC LIMIT 2");  break;

									

					case 999.7:	// Вывод Полного Списка Партнерев

							$result = mysql_query("SELECT s.ID AS ID, l.TEXT_VAL AS NAME, s.ACTIVE AS ACTIVE, s.LOGO AS LOGO

														FROM QK_COLORS s,  QK_LANGSVAL l 

														WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1

														ORDER BY s.ID ASC"); break;

					case 999.8:	// Вывод Видов Сделок

							$ID = (int) $_GET['editProduct'];

							$result = mysql_query("SELECT ID, PID, CID,

										(SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1))	AS PRODNAME,

										(SELECT ARTICLE FROM QK_PRODUCTS rr WHERE rr.ID = CID LIMIT 1) AS PRODARTICLE						

									FROM QK_PRODCONT WHERE PID = $ID") or die(mysql_error()); break;

					case 999.9:	// Вывод Полного Списка Продуктов 

							

							if($_POST['CAT_SEARCH'] == 0){

								$CAT_SEARCH = 0;

							}

							else{

								$CAT_SEARCH = (int) $_POST['CAT_SEARCH'];

							}

							if($_POST['NAME_SEARCH'] == ''){

								$NAME_SEARCH = 'NA';

							}

							else{

								$NAME_SEARCH = $_POST['NAME_SEARCH'];

							}

							

							if($_POST['ARTICLE_SEARCH'] == ''){

								$ARTICLE_SEARCH = 'NA';

							}

							else{

								$ARTICLE_SEARCH = $_POST['ARTICLE_SEARCH'];

							}

							

							if($_POST['ID_SEARCH'] == ''){

								$ID_SEARCH = 0;

							}

							else{

								$ID_SEARCH = (int) $_POST['ID_SEARCH'];

							}

							

							if($_POST['SHTCODE_SEARCH'] == ''){

								$SHTCODE_SEARCH = 'NA';

							}

							else{

								$SHTCODE_SEARCH = $_POST['SHTCODE_SEARCH'];

							}

							

							$LANG = 1;

							

						

							$result = mysql_query("SELECT s.ID,

														(SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = $LANG AND TEXT_ID = (SELECT NAMEID FROM QK_CATEGORIES c WHERE c.ID = s.CATID LIMIT 1) LIMIT 1) AS CNAME,

														(SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = $LANG AND TEXT_ID = s.NAMEID LIMIT 1) AS NAME,

														s.PRICE,

														s.CATID,

														s.ARTICLE

														FROM QK_PRODUCTS s 

														WHERE 

														((s.CATID = $CAT_SEARCH OR $CAT_SEARCH = 0) OR s.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $CAT_SEARCH))

														AND (((SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = s.NAMEID AND LANG_ID = $LANG LIMIT 1) LIKE '%$NAME_SEARCH%' OR '$NAME_SEARCH' = 'NA') OR (s.ARTICLE LIKE '%$NAME_SEARCH%' OR '$NAME_SEARCH' = 'NA'))

														AND s.EXPORTED = 1

													LIMIT 2000") or die(mysql_error()); break;

					case 999.11:	// Вывод Полного Списка Услуг 

							$result = mysql_query("SELECT s.`ID` AS ID, l.`TEXT_VAL` AS NAME, s.`ACTIVE` AS ACTIVE

													FROM `QK_SERVICES` s,  `QK_LANGSVAL` l

													WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1"); break;						

					case 999.12:	// Вывод Параметра Услуг Для Редактирования

							$ID = (int) $_GET['editService'];

							$result = mysql_query("SELECT `ID`,`NAMEID`,`DESCID`,`ACTIVE`,`EDITDATE`

									FROM `QK_SERVICES`

									WHERE  `ID` = $ID LIMIT 1"); break;

					case 999.13:	// Вывод Полного Списка Видов Сделок

							$BROKER = (int) $_SESSION['CUSTOMER'];

							$result = mysql_query("SELECT s.id AS ID, s.DICTIONVALUE, s.DICTIONVALUE2, s.DICTIONNAMEID,  s.DICTIONVALUE3 

							FROM QK_DICTION s

								WHERE s.DICTIONTYPE = 'CONTRACTTYPE' AND s.id IN (SELECT MAKER FROM QK_PRODUCTS WHERE BROKER = $BROKER)

							ORDER BY s.DICTIONVALUE3 + 0 ASC");  break;		

					case 999.14:	// Вывод Параметра Истории Для Редактирования

							$ID = (int) $_GET['editHistory'];

							$result = mysql_query("SELECT `ID`,`NAMEID`,`DESCID`,`ACTIVE`,`EDITDATE`, `YEAR`

									FROM `QK_HISTORY`

									WHERE  `ID` = $ID LIMIT 1"); break;

					case 999.15:	// Вывод Данных из Библиотеки для использования +

							$ID =  $GLOBALS['DICTIONTYPE'];

							$result = mysql_query("SELECT id AS ID, DICTIONVALUE, DICTIONNAMEID, DICTIONVALUE2, DICTIONVALUE3, DICTIONVALUE4

									FROM QK_DICTION

									WHERE DICTIONTYPE = '$ID' ORDER BY DICTIONVALUE4 ASC"); break;

					case 888.16:	// Вывод Полного Списка Продуктов 

							    

							if($_POST['CATID_SEARCH'] == 0){

								$CATID_SEARCH = 0;

							}

							else{

								$CATID_SEARCH = (int) $_POST['CATID_SEARCH'];

							}

							

							

							if($_POST['NAME_SEARCH'] == ''){

								$NAME_SEARCH = 'NA';

							}

							else{

								$NAME_SEARCH = $_POST['NAME_SEARCH'];

							}

							

							if($_POST['ARTICLE_SEARCH'] == ''){

								$ARTICLE_SEARCH = 'NA';

							}

							else{

								$ARTICLE_SEARCH = $_POST['ARTICLE_SEARCH'];

							}

							

							if($_POST['ID_SEARCH'] == ''){

								$ID_SEARCH = 0;

							}

							else{

								$ID_SEARCH = (int) $_POST['ID_SEARCH'];

							}

							

							if($_POST['SHTCODE_SEARCH'] == ''){

								$SHTCODE_SEARCH = 'NA';

							}

							else{

								$SHTCODE_SEARCH = $_POST['SHTCODE_SEARCH'];

							}

							

						

							$LANG = 1;

							$result = mysql_query("SELECT s.ID,

													(SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = $LANG AND TEXT_ID = (SELECT NAMEID FROM QK_CATEGORIES c WHERE c.ID = s.CATID LIMIT 1) LIMIT 1) AS CNAME,

													(SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = $LANG AND TEXT_ID = s.NAMEID LIMIT 1) AS NAME,

													s.ARTICLE

													FROM QK_PRODUCTS s 

													WHERE 

													

													(s.CATID = $CATID_SEARCH OR $CATID_SEARCH = 0)

													

													AND (s.ID = $ID_SEARCH OR $ID_SEARCH = 0)

													

													AND ((SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = s.NAMEID AND LANG_ID = $LANG LIMIT 1) LIKE '%$NAME_SEARCH%' OR '$NAME_SEARCH' = 'NA')

													

													AND (s.ARTICLE LIKE '%$ARTICLE_SEARCH%' OR '$ARTICLE_SEARCH' = 'NA')

													ORDER BY s.ARTICLE ASC

													LIMIT 20") or die(mysql_error()); break;

					case 999.17:	// Вывод Полного Списка Партнерев

							$result = mysql_query("SELECT s.`ID` AS ID, s.`QUE` AS QUE, l.`TEXT_VAL` AS NAME, s.`ACTIVE` AS ACTIVE, s.LOGO AS LOGO

														FROM `QK_PARTNERS` s,  QK_LANGSVAL l 

														WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1

														ORDER BY s.`QUE` ASC"); break;

					case 999.18:	// Вывод Параметра Партнера Для Редактирования

							$ID = (int) $_GET['editPartner'];

							$result = mysql_query("SELECT `ID`,`QUE`,`NAMEID`,`DESCID`,`ACTIVE`,`LOGO`,`EDITDATE`

									FROM `QK_PARTNERS`

									WHERE  `ID` = $ID LIMIT 1"); break;

					case 999.19:	// Вывод Полного Списка Новостей 

							$result = mysql_query("SELECT s.`ID` AS ID, l.`TEXT_VAL` AS NAME, s.`QUE` AS QUE, s.`ACTIVE` AS ACTIVE, s.`VIEWS` AS VIEWS

													FROM `QK_NEWS` s,  `QK_LANGSVAL` l

													WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1

													ORDER BY s.QUE ASC");  break;	

					case 999.21:	// Вывод Параметра Новостей Для Редактирования

							$ID = (int) $_GET['editNews'];

							$result = mysql_query("SELECT `ID`,`NAMEID`, `QUE`, `NEWSDATE`,`SDESCID`,`DESCID`,`ACTIVE`,`EDITDATE`, `VIEWS`

									FROM `QK_NEWS`

									WHERE  `ID` = $ID LIMIT 1");  break;

					case 999.22:	// Вывод Полного Списка Вопросов 

							$result = mysql_query("SELECT ID, NAMEID, SDESCID, DESCID, GLAT, GLONG, PHONE, EMAIL, INNERID, WORKFROM, WORKTO, ACTIVE

													FROM QK_ADDR 

													ORDER BY QUE ASC");  break;

					case 999.23:	// Вывод Параметра Вопросов Для Редактирования

							$ID = (int) $_GET['editFaq'];

							$result = mysql_query("SELECT `ID`,`NAMEID`,`SDESCID`,`DESCID`,`ACTIVE`,`EDITDATE`, `VIEWS`

									FROM `QK_FAQ`

									WHERE  `ID` = $ID LIMIT 1");  break;

					case 999.24:	// Вывод Параметра Вопросов Для Редактирования

							$ID = (int) $GLOBALS['PID'];

							$SESSIONID = session_id();

                            

                            $VENDORS_LEFTCOUNT = 'SELECT pc.PID, SUM(p.LEFTCOUNT) AS LEFTCOUNT 

                                                  FROM QK_PRODCONT AS pc 

                                                  LEFT JOIN QK_PRODUCTS AS p ON pc.CID = p.ID

                                                  WHERE TYPE = 6 

                                                  GROUP BY PID';

                            

                            

							if($ID > 0){ 

							$result = mysql_query("SELECT  p.ID,

															p.NAMEID,

															p.ARTICLE,

															p.CATID,

															p.SIMG AS YOUTIMG,

															p.DESCID,

															p.PREORDER,

															p.PREORDER_FROM,

															p.PREORDER_TO,

															p.PREORDERPRICE,

															p.MAKER,

															p.SOON,

															p.ONLYSHOP,

															CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = p.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

															(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = p.ID) AS STARS,

															(SELECT qq.DICTIONNAMEID FROM QK_DICTION qq WHERE qq.id = p.MAKER) AS MAKERNAME,

															(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

															(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

															p.COLOR,

															(SELECT ss.LOGO FROM QK_COLORS ss WHERE ss.ID = p.COLOR) AS COLCODE,

															

															p.NEW, 

															CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

																THEN  

																	p.PRICE -(p.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

																	ELSE  p.PRICE

															END AS PRICE,

															CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

																THEN p.PRICE ELSE  p.OLDPRICE END AS OLDPRICE,

															p.DESCFILE,

															p.CURTYPE,

															(p.LEFTCOUNT + IF(v.LEFTCOUNT, v.LEFTCOUNT, 0)) AS LEFTCOUNT

									FROM QK_PRODUCTS p

                                    LEFT JOIN (

                                          $VENDORS_LEFTCOUNT

                                        ) AS v ON v.PID = p.ID

									WHERE p.ID = $ID AND p.ACTIVE = 1 LIMIT 1 ");  break;

							}

							else{

							$result = mysql_query("SELECT p.ID,

															p.NAMEID,

															p.ARTICLE,

															p.CATID,

															p.DESCID,

															p.PREORDER,

															p.PREORDER_FROM,

															p.PREORDER_TO,

															p.MAKER,

															CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = p.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

															(SELECT qq.DICTIONNAMEID FROM QK_DICTION qq WHERE qq.id = p.MAKER LIMIT 1) AS MAKERNAME,

															p.COLOR,

															(SELECT ss.LOGO FROM QK_COLORS ss WHERE ss.ID = p.COLOR) AS COLCODE,

															(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

															(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

															p.PRICE, 

															p.NEW, 

															p.DESCFILE,

															p.LEFTCOUNT,

															p.CURTYPE

									FROM QK_PRODUCTS p

									WHERE p.ACTIVE = 1 ORDER BY p.ID DESC LIMIT 1");  break;

							}

					case 999.25:	// Вывод 3 продуктов для верхнего меню!

							$PARAM = (int) $_GET['cid'];

							$MANUF = (int) $_GET['manuf'];

							$CATTYPE = $_GET['type'];

							

							if($CATTYPE == 'parent'){

							$result = mysql_query("SELECT 1 AS ONE

									FROM QK_PRODUCTS

									WHERE  ACTIVE = 1 

									AND CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PARAM)

									AND (MAKER = $MANUF OR $MANUF = 0)

									ORDER BY ID DESC"); break;	

							}

							else{

							$result = mysql_query("SELECT 1 AS ONE

									FROM QK_PRODUCTS

									WHERE  ACTIVE = 1 

									AND (MAKER = $MANUF OR $MANUF = 0)

									AND CATID = $PARAM

									ORDER BY ID DESC");  break;	

							}

					case 999.26:	// Вывод Параметра Вопросов Для Редактирования

					

							$ID = (int) $GLOBALS['prodDataInfo']['CATID'];

							$result = mysql_query("SELECT ID, NAMEID, DESCID, SIMG, PRICE, CURTYPE

									FROM QK_PRODUCTS

									WHERE CATID = $ID AND `ACTIVE` = 1 ORDER BY ID DESC LIMIT 4 ");  break;						

					case 999.27:	// Вывод Параметра Новостей Для Редактирования

							

							$result = mysql_query("SELECT ID, NAMEID, NEWSDATE, SDESCID, IMG, EDITDATE, VIEWS

									FROM QK_NEWS

									WHERE  ACTIVE = 1 ORDER BY QUE DESC LIMIT 3");  break;							

									

					case 999.28:	// Вывод всех партнерев на главную страницу

							

							$result = mysql_query("SELECT `ID`,`NAMEID`,`DESCID`, `LOGO`

									FROM `QK_PARTNERS`

									WHERE  `ACTIVE` = 1 ORDER BY ID DESC");  break;	

									

					case 999.29:	// Вывод 3 продуктов для верхнего меню!

							$PARAM = (int) $_GET['cid'];

							$MANUF = (int) $_GET['manuf'];

							$CATTYPE = $_GET['type'];

							if($CATTYPE == 'parent'){

							$result = mysql_query("SELECT `ID`,`NAMEID`,`DESCID`, `SIMG`, `PRICE`, `CURTYPE`

									FROM `QK_PRODUCTS`

									WHERE  `ACTIVE` = 1 

									AND CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PARAM)

									AND (MAKER = $MANUF OR $MANUF = 0)

									ORDER BY ID DESC");  break;	

							}

							else{

							$result = mysql_query("SELECT `ID`,`NAMEID`,`DESCID`, `SIMG`, `PRICE`, `CURTYPE`

									FROM `QK_PRODUCTS`

									WHERE  `ACTIVE` = 1 

									AND (MAKER = $MANUF OR $MANUF = 0)

									AND CATID = $PARAM

									ORDER BY ID DESC");  break;	

							}

					case 999.31:	// Вывод 2 вопросов для главной страницы!

							

							$result = mysql_query("SELECT ID, NAMEID, SDESCID, DESCID, GLAT, GLONG, INNERID, EMAIL, PHONE, WORKFROM, WORKTO

									FROM QK_ADDR

									WHERE ACTIVE = 1 ORDER BY QUE ASC");  break;	

					case 999.32:	// Вывод Полного Списка Меню 

							$result = mysql_query("SELECT s.ID, s.ISMENU, s.QUE, l.TEXT_VAL AS NAME, s.ACTIVE, s.TYPE, s.EDITDATE

													FROM QK_MENU s,  QK_LANGSVAL l

													WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1 AND (s.PARENTID IS NULL OR s.PARENTID = 0)

													ORDER BY s.QUE ASC");  break;	

					case 999.33:	// Вывод Параметра Новостей Для Редактирования

							$ID = (int) $_GET['editMenu'];

							$result = mysql_query("SELECT ID, PARENTID, PLACE,  ISMENU, QUE, NAMEID, TITLEID, DESCID, KEYID, TYPE, FILENAME, ACTIVE, EDITDATE, CONTENTID

									FROM QK_MENU

									WHERE  ID = $ID LIMIT 1");  break;

					case 999.34:	// Вывод меню для главной страницы!

							$result = mysql_query("SELECT ID, NAMEID, TYPE, FILENAME, NONURL

									FROM QK_MENU

									WHERE  ACTIVE = 1 AND (PARENTID IS NULL OR PARENTID = 0) AND ISMENU = 1 AND PLACE = 1 ORDER BY QUE ASC LIMIT 10");  break;	

					

					case 999.35:	// Вывод меню для главной страницы!

							$result = mysql_query("SELECT ID, NAMEID, TYPE, FILENAME

									FROM QK_MENU

									WHERE  ACTIVE = 1 AND PARENTID IS NULL AND ISMENU = 1 AND PLACE = 2 ORDER BY QUE ASC LIMIT 10");  break;	

									

									

					case 999.36:	// Вывод услуг для страницы услуг

							$result = mysql_query("SELECT ID, NAMEID, DESCID, IMG, IMGHOVERED

									FROM QK_SERVICES

									WHERE  ACTIVE = 1 ORDER BY ID ASC");  break;	

					case 999.37:	// Вывод Видов Сделок +

							$ID = (int) $_GET['editProduct'];

							$TYPE = (int) $GLOBALS['TYPE'];

							$result = mysql_query("SELECT 

								ID, 

									CASE WHEN CID = $ID

									THEN PID

									ELSE CID END AS CID,  

									CASE WHEN CID = $ID

									THEN 

										(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = PID LIMIT 1)

									ELSE 

										(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1)

									END AS CNAME

									FROM QK_PRODCONT WHERE (PID = $ID OR CID = $ID) AND TYPE = $TYPE");  break;				

					case 999.38:	// Вывод Видов Сделок +

							$ID = (int) $_GET['editProduct'];

							$TYPE = (int) $GLOBALS['TYPE'];

							$result = mysql_query("SELECT 

								ID, 

									(SELECT ss.ARTICLE FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS ARTICLE,

									(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS CNAME

									FROM QK_PRODCONT WHERE PID = $ID AND TYPE = $TYPE");  break;	

					case 999.39:	// Вывод Полного Списка Галерей 

							$result = mysql_query("SELECT s.`ID` AS ID, l.`TEXT_VAL` AS NAME, s.`ACTIVE` AS ACTIVE

														FROM `QK_GALLERY` s,  QK_LANGSVAL l 

														WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1"); break;

					case 999.41:	// Вывод Параметра Галереи Для Редактирования

							$ID = (int) $_GET['gid'];

							$result = mysql_query("SELECT ID, NAME, DICTOUNT, FROMDATE, TODATE, ACTIVE, EDITDATE 

									FROM QK_GROUP

									WHERE ID = $ID LIMIT 1"); break;							

					case 999.42:	// Вывод всех партнерев на главную страницу

						

							$GID = (int) $GLOBALS['GID'];

							$result = mysql_query("SELECT ID, GID, PID, 

							(SELECT CATID FROM QK_PRODUCTS WHERE ID = PID) AS CATID, 

							(SELECT NAMEID FROM QK_PRODUCTS WHERE ID = PID) AS PRODNAMEID, 

							(SELECT PRICE FROM QK_PRODUCTS WHERE ID = PID) AS PRODPRICE, 

							(SELECT NAMEID FROM QK_CATEGORIES WHERE ID = (SELECT CATID FROM QK_PRODUCTS WHERE ID = PID LIMIT 1)) AS CATIDNAME 

									FROM QK_GROUP_INC

									WHERE  GID = $GID ORDER BY CATID DESC");  break;		

					

					case 999.43:	// Вывод Параметра Галереи Для Редактирования

							$result = mysql_query("SELECT `ID`,`NAMEID`,`SDESCID`,`ACTIVE`,`IMG`,`EDITDATE` 

									FROM `QK_GALLERY`

									ORDER BY ID DESC"); break;						

						

					case 999.44:	// Вывод всех Галерей на главную страницу

							$GALID = (int) $GLOBALS['GALID'];

							$result = mysql_query("SELECT `ID`,`GALID`,`IMG`, `NAMEID`

									FROM `QK_GALLERY_IMG`

									WHERE  `GALID` = $GALID ORDER BY ID DESC");  break;	

					case 999.45:	// Вывод Листа Новостей

								

							$FROM = $GLOBALS['PFROM'];

							$TO = $GLOBALS['PTO'];

							

							$result = mysql_query("SELECT ID,NAMEID,NEWSDATE,SDESCID,DESCID,ACTIVE,IMG

									FROM QK_NEWS

									WHERE ACTIVE = 1

									ORDER BY QUE DESC

									LIMIT $FROM, $TO"); break;						

					case 999.46:	// Вывод Новости Одной

							$ID = (int) $GLOBALS['NID'];

							$result = mysql_query("SELECT `ID`,`NAMEID`,`SDESCID`, `NEWSDATE`, `DESCID`,`ACTIVE`,`IMG`

									FROM `QK_NEWS`

									WHERE `ACTIVE` = 1

									AND `ID` = $ID

									LIMIT 1"); 

								if($result){

									$OLDD = mysql_query("SELECT `VIEWS` FROM `QK_NEWS` WHERE `ACTIVE` = 1 AND `ID` = $ID LIMIT 1");

									$OLDD = mysql_fetch_assoc($OLDD);

									$OLDD = (int) $OLDD['VIEWS'];

									$OLDD++;

									mysql_query("UPDATE `QK_NEWS` SET `VIEWS` = $OLDD WHERE `ACTIVE` = 1 AND `ID` = $ID");

								}

							break;

					case 999.47:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_NEWS`"); break;

					case 999.48:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_NEWS`"); break;

					case 999.49:	// Вывод Листа Новостей

							$param = (int) $_GET['p'];

							$result = mysql_query("SELECT `TITLEID`, `DESCID`, `KEYID`, `CONTENTID` 

									FROM `QK_MENU` WHERE ID = $param LIMIT 1"); break;

					case 999.51:	// Вывод Полного Списка Партнерев	

							$TYPE = (int) $GLOBALS['TYPE'];

							$result = mysql_query("SELECT s.ID, s.ACTIVE, s.LINK, s.IMG_1, s.IMG_2, s.IMG_3, s.SIMG_1, s.SIMG_2, s.SIMG_3

												FROM QK_SLIDER s WHERE (TYPE = $TYPE OR $TYPE = 0)

										ORDER BY s.QUE ASC"); break;

					case 999.52:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_SLIDER`"); break;

					case 999.53:	// Вывод Параметра Партнера Для Редактирования

							$ID = (int) $_GET['editSlider'];

							$result = mysql_query("SELECT `ID`,`TITLEID`,`SDESCID`,`PRODID`,`LINK`,`ACTIVE`,`QUE`

									FROM `QK_SLIDER`

									WHERE  `ID` = $ID LIMIT 1"); break;

					case 999.54:	// Вывод Параметра Партнера Для Редактирования

							$TYPE = (int) $GLOBALS['TYPE'];

							$result = mysql_query("SELECT s.ID, s.LINK, s.IMG_1, s.IMG_2, s.IMG_3, s.SIMG_1, s.SIMG_2, s.SIMG_3, s.LINK

									FROM QK_SLIDER s

									WHERE  s.ACTIVE = 1 AND (TYPE = $TYPE OR $TYPE = 0) ORDER BY s.QUE ASC LIMIT 20"); break;				

					case 999.55:	// Вывод Полного Списка Вопросов 

							$result = mysql_query("SELECT `ID`, `FROM`, `TO`, `SENDERNAME`, `SUBJECT`, `SENDDATE`

													FROM `QK_EMAIL`

													ORDER BY `SENDDATE` DESC");  break;

					case 999.56:	// Вывод Параметра Отдела Для Редактирования

							$ID = (int) $_GET['editMail'];

							$result = mysql_query("SELECT `ID`,`FROM`,`TO`,`SENDERNAME`,`SENDERPHONE`,`SUBJECT`,`MAILBODY`,`SENDDATE` 

									FROM `QK_EMAIL`

									WHERE  `ID` = $ID LIMIT 1"); break;

					case 999.57:	// Вывод Полного Списка Вопросов 

							$ONMODUL = $GLOBALS['ONMODULE'];

							$result = mysql_query("SELECT `ID`, `LINK`

													FROM `QK_FILES` WHERE `ONMODUL` = '$ONMODUL'

													ORDER BY `ID` ASC");  break;

					case 999.58:	// Вывод Полного Списка Параметров Сайта 

							$LANG = $_SESSION['LANGID'];

							$result = mysql_query("SELECT CONFIGTYPE, NAME, CONFVALUE, CONFVALUE2, (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE TEXT_ID = QK_CONFIGS.CONFVALUE AND LANG_ID = $LANG) AS CONFVALUETEXT

													FROM QK_CONFIGS WHERE CONFVALUE2 IN ('TEXT', 'SOC')");  break;

					case 999.59:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_MENU` WHERE PARENTID IS NULL"); break;

					case 999.61:	// Вывод Листа Новостей

							$result = mysql_query("SELECT CONFIGTYPE, NAME, CONFVALUE, CONFVALUE2

									FROM QK_CONFIGS WHERE CONFVALUE2 = 'SOC'");  break;

					case 999.62:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_WORKERS`"); break;	

					case 999.63:	// Вывод Параметра

							$CONFIGTYPE = $_GET['confID'];

							$result = mysql_query("SELECT `CONFIGTYPE`,`CONFVALUE`,`CONFVALUE2`

									FROM `QK_CONFIGS`

									WHERE  `CONFIGTYPE` = '$CONFIGTYPE' LIMIT 1"); break;

					case 999.64:	// Вывод Полного Списка Работников 

							$CURDAY = date("Y-m-d H:i:s");

							$result = mysql_query("SELECT s.ID, QUE, s.NAMEID, s.DESCID, s.EDITDATE

														FROM QK_WORKERS s

														WHERE s.EDITDATE > '$CURDAY' AND s.ACTIVE = 1

														ORDER BY s.QUE ASC"); break;			

					case 999.65:	// Вывод Полного Списка Меню 

							$PARENTID = (int) $GLOBALS['menuParentID'];

							$result = mysql_query("SELECT s.`ID` AS ID, s.`ISMENU` AS ISMENU, s.`QUE` AS QUE, l.`TEXT_VAL` AS NAME, s.`ACTIVE` AS ACTIVE, s.`TYPE` AS TYPE

													FROM `QK_MENU` s,  `QK_LANGSVAL` l

													WHERE  s.NAMEID = l.TEXT_ID AND l.LANG_ID = 1 AND s.`PARENTID`  = $PARENTID

													ORDER BY s.`QUE` ASC");  break;							

					case 999.66:	// Вывод Полного Списка Параметров Сайта 

							$result = mysql_query("SELECT `CONFIGTYPE`, `CONFVALUE`, `CONFVALUE2`

													FROM `QK_CONFIGS` WHERE `CONFIGTYPE` = 'WORKERSIMG' LIMIT 1");  break;

					

					case 999.67:	// Вывод Полного Списка Категорий Товаров 

							$result = mysql_query("SELECT s.ID, s.QUE, s.NAMEID, s.ACTIVE, s.IMG

													FROM QK_CATEGORIES s

													WHERE  s.PARENTID = 0

													ORDER BY s.QUE ASC");  break;

					case 999.68:	// Вывод Полного Списка Категорий Товаров 

							$IFMAINCAT = (int) $GLOBALS['MAINCAT'];

							

							$result = mysql_query("SELECT s.ID, s.QUE, s.NAMEID, s.ACTIVE, s.IMG

													FROM QK_CATEGORIES s

													WHERE  s.PARENTID = $IFMAINCAT AND s.ACTIVE = 1

													ORDER BY s.QUE ASC");  break;

					case 999.69:	// Вывод Полного Списка Категорий Товаров 

							

							$PARENTID = (int) $GLOBALS['allCat']['ID'];

							$result = mysql_query("SELECT s.ID, s.QUE, s.NAMEID, s.ACTIVE, s.IMG

													FROM QK_CATEGORIES s

													WHERE  s.PARENTID = $PARENTID AND s.ACTIVE = 1

													ORDER BY s.QUE ASC");  break;

					

					

					case 999.71:	// Вывод Полного Списка Товаров 

					

					

							

							$BROKER = (int) $_SESSION['CUSTOMER'];

							$LANG = $_SESSION['LANGID'];



							if($_POST['ARTICLE_SEARCH'] == ''){

								$ARTICLE_SEARCH = 'NA';

							}

							else{

								$ARTICLE_SEARCH = $_POST['ARTICLE_SEARCH'];

							}

							

							

							if($_POST['SHTCODE_SEARCH'] == ''){

								$SHTCODE_SEARCH = 'NA';

							}

							else{

								$SHTCODE_SEARCH = $_POST['SHTCODE_SEARCH'];

							}

							

							if($_POST['NAME_SEARCH'] == ''){

								$NAME_SEARCH = 'NA';

							}

							else{

								$NAME_SEARCH = $_POST['NAME_SEARCH'];

							}

							

							if($_GET['cid'] == 0){

								$CATID_SEARCH = 0;

							}

							else{

								$CATID_SEARCH = (int) $_GET['cid'];

							}

							

							if($_POST['ID_SEARCH'] == ''){

								$ID_SEARCH = 0;

							}

							else{

								$ID_SEARCH = (int) $_POST['ID_SEARCH'];

							}

							

							

							if($_POST['LEFTCOUNT_SEARCH'] == ''){

								$LEFTCOUNT_SEARCH = -1;

							}

							else{

								$LEFTCOUNT_SEARCH = (int) $_POST['LEFTCOUNT_SEARCH'];

							}

							$result = mysql_query("SELECT s.ID AS ID,

														  (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT NAMEID FROM QK_CATEGORIES WHERE ID = s.CATID LIMIT 1) LIMIT 1) AS PCAT,

														  (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = s.NAMEID LIMIT 1) AS NAME,

														 (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT DICTIONNAMEID FROM QK_DICTION WHERE id = s.MAKER) LIMIT 1) AS MAKERNAME,

														  s.PRICE AS PRICE,

														   (SELECT COUNT(*) FROM QK_PRODUCTS_IMG WHERE PRODID = s.ID) AS IMGCOUNT,

														  s.CURTYPE AS CURTYPE,

														  s.ISSPEC AS ISSPEC,

														  (SELECT CHARNAME FROM QK_COLORS WHERE ID = s.COLOR LIMIT 1) AS COLOR_CHARNAME,

														  s.NAMEID AS NAMEID,

														  s.ISCOUNTRY AS ISCOUNTRY,

														  s.DELIVERY AS DELIVERY,

														  s.ONLYSHOP AS ONLYSHOP,

														  s.OLDPRICE AS OLDPRICE,

														  s.ISTOP AS ISTOP,

														  (SELECT NAME FROM QK_CUSTOMER WHERE CUSTOMER = s.BROKER) AS BNAME,

														  (SELECT SNAME FROM QK_CUSTOMER WHERE CUSTOMER = s.BROKER) AS BSNAME,

														  IFNULL((SELECT SUM(COUNT) FROM QK_ORDERS_LIST WHERE QK_ORDERS_LIST.PRODID = s.ID), 0) AS SALEDSUM,

														  s.ARTICLE AS ARTICLE,

														  s.LEFTCOUNT AS LEFTCOUNT,

														  s.ACTIVE AS ACTIVE, 

                                                          s.NEW AS NEW, 

                                                          s.SOON AS SOON,

                                                          v.VENDORS_COUNT

													FROM QK_PRODUCTS s

                                                    LEFT JOIN (SELECT PID, COUNT(DISTINCT(CID)) as VENDORS_COUNT FROM QK_PRODCONT WHERE TYPE = 6 GROUP BY PID) AS v ON v.PID = s.ID

													WHERE

													s.EXPORTED = 1 AND s.BROKER = $BROKER

													AND (

														s.CATID = $CATID_SEARCH 

														OR s.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $CATID_SEARCH) 

														OR s.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $CATID_SEARCH))

													)	

													

													ORDER BY s.ID DESC LIMIT 100000") or die(mysql_error()); break;

                                                    

					case 999.72:	// Вывод Полного Списка Меню 

							$PARENTID = (int) $GLOBALS['catParentID'];

							$result = mysql_query("SELECT s.ID, s.QUE, s.NAMEID, s.ACTIVE, s.IMG

													FROM QK_CATEGORIES s

													WHERE s.PARENTID  = $PARENTID

													ORDER BY s.QUE ASC");  break;

					case 999.73:	// Вывод Параметра Услуг Для Редактирования +

							$ID = (int) $_GET['editProduct'];

							$result = mysql_query("SELECT ID,

														CATID,

														CATID AS LVL1RD,

														ARTICLE,		

														NAMEID,

														DELIVERY,

														DESCID,

														(SELECT PARENTID FROM QK_CATEGORIES WHERE ID = CATID LIMIT 1) AS LVL2RD,

														(SELECT PARENTID FROM QK_CATEGORIES WHERE ID = (SELECT PARENTID FROM QK_CATEGORIES WHERE ID = CATID LIMIT 1) LIMIT 1) AS LVL3RD,

														CRRULESID,

														PREDESCID,

														MAKER,

														COLOR,

														ISTOP,

														NEW,

														SOON,

														TDESCID,

														SIMG,

														ISOFFER,

														ISCOUNTRY,

														ISOFFER_TO,

														ISOFFER_FROM,

														PREORDER_TO,

														PREORDER_FROM,

														LEFTCOUNT,

														ISSPEC,

														PRICE,

														DESCFILE,

														OLDPRICE,

														CURTYPE,

														EXPORTED,

														PREORDER,

														PREORDERPRICE,

														ACTIVE,

														EXCLUDED,

														ONLYSHOP,

														EDITDATE

									FROM QK_PRODUCTS

									WHERE ID = $ID LIMIT 1") or die(mysql_error()); break;

					case 999.74:	// Вывод Полного Списка Категорий Статьей +

							$CATID = (int) $GLOBALS['sericeInfoData']['CATID'];

							$GID = (int) $GLOBALS['allValueGroupsForCat']['ID'];

							$result = mysql_query("SELECT ID, NAMEID, DICCHAR FROM QK_DICPRODVAL WHERE ID IN (SELECT TAGID FROM QK_CATDETVAL WHERE CATID = $CATID) AND GID = $GID ORDER BY QUE ASC");  break;

					case 999.75:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$CATID = (int) $GLOBALS['sericeInfoData']['CATID'];

							$result = mysql_query("SELECT ID, NAMEID, ICON FROM QK_DICPRODGROUP WHERE ID IN (SELECT GID FROM QK_DICPRODVAL WHERE ID IN (SELECT TAGID FROM QK_CATDETVAL WHERE CATID = $CATID)) ORDER BY QUE ASC");  break;

					case 999.76:	// Вывод Полного Списка Категорий Статьей +

							$PID = (int) $GLOBALS['sericeInfoData']['ID'];

							$TYPEID = (int) $GLOBALS['allValuesForCat']['ID'];

							$result = mysql_query("SELECT VALUE FROM QK_PRODDETVAL WHERE PID = $PID AND TYPEID = $TYPEID LIMIT 1");  break;

					case 999.77:	// Вывод Параметра Категории Статьей Для Редактирования

							$ID = (int) $_GET['editArtCategory'];

							$result = mysql_query("SELECT `ID`,`PARENTID`,`QUE`,`NAMEID`,`SDESCID`,`ACTIVE`,`EDITDATE`

									FROM `QK_ACATEGORIES`

									WHERE  `ID` = $ID LIMIT 1");  break;

					case 999.78:	// Вывод Полного Списка Товаров 

							$BROKER = $_SESSION['CUSTOMER'];

							$result = mysql_query("SELECT s.ID AS ID,

														  (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT NAMEID FROM QK_CATEGORIES WHERE ID = s.CATID LIMIT 1) LIMIT 1) AS PCAT,

														  (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = s.NAMEID LIMIT 1) AS NAME,

														 (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT DICTIONNAMEID FROM QK_DICTION WHERE id = s.MAKER) LIMIT 1) AS MAKERNAME,

														  s.PRICE AS PRICE,

														  s.CURTYPE AS CURTYPE,

														  s.ISSPEC AS ISSPEC,

														  s.ISTOP AS ISTOP,

														  s.SOON AS SOON,

														  s.ONLYSHOP AS ONLYSHOP,

														  s.ARTICLE AS ARTICLE,

														  s.LEFTCOUNT AS LEFTCOUNT,

														  s.PREORDER AS PREORDER,

														  s.PREORDER_FROM,

														  s.PREORDER_TO,

														  s.ACTIVE AS ACTIVE

													FROM QK_PRODUCTS s

													WHERE

													s.EXPORTED = 0 AND BROKER = $BROKER

													ORDER BY s.ID DESC LIMIT 7000") or die(mysql_error()); break;				

					case 999.79:	// Вывод Параметра Услуг Для Редактирования

							$ID = (int) $_GET['editArticle'];

							$result = mysql_query("SELECT `ID`,`CATID`,`NAMEID`, `SDESCID`, `DESCID`,`ISTOP`,`ISSPEC`, `AUTOR`, `LINK`, `EXPORTED`, `ACTIVE`,`EDITDATE`,`ADDDATE`

									FROM `QK_ARTICLES`

									WHERE  `ID` = $ID LIMIT 1"); break;	

					case 999.81:	// Вывод Листа Новостей

							$PARAM  = (int) $GLOBALS['PARENTID'];

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_MENU` WHERE PARENTID = $PARAM"); break;

					case 999.82:	// Вывод меню для главной страницы!

							$PARAM  = (int) $GLOBALS['ONMEN'];

							$result = mysql_query("SELECT `ID`,`NAMEID`,`TYPE`, `FILENAME`

									FROM `QK_MENU`

									WHERE  `ACTIVE` = 1 AND `PARENTID` IS NOT NULL AND `PARENTID` = $PARAM AND `ISMENU` = 1 ORDER BY QUE ASC LIMIT 10");  break;	

					case 999.83:	// Вывод Листа Новостей

							$PARAM  = (int) $GLOBALS['PARENTID'];

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_CATEGORIES` WHERE PARENTID = $PARAM"); break;

					case 999.84:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$result = mysql_query("SELECT ID, NAMEID, SDESCID, IMG

													FROM QK_CATEGORIES

													WHERE PARENTID IS NULL AND ACTIVE = 1

													ORDER BY QUE ASC");  break;

					

					case 999.85:	// Вывод меню для главной страницы!

							$PARAM  = (int) $GLOBALS['ONCAT'];

							$result = mysql_query("SELECT ID, NAMEID, SDESCID, IMG

													FROM QK_CATEGORIES

													WHERE PARENTID = $PARAM AND ACTIVE = 1

													ORDER BY QUE ASC");  break;	

					

					case 999.86:	// Вывод Листа Продуктов

							if($GLOBALS['CURCATID']){

								$PARAM  = (int) $GLOBALS['CURCATID'];

							}else{

								$PARAM  = (int) $_GET['cid'];

							}

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM QK_PRODUCTS WHERE CATID = $PARAM OR CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PARAM) AND ACTIVE = 1"); break;	

					case 999.87:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$PARAM  = (int) $GLOBALS['CID'];

							$result = mysql_query("SELECT ID, NAMEID, DESCID, SIMG, IMG, PRICE, ONLYSHOP, SOON, OLDPRICE

													FROM QK_PRODUCTS

													WHERE CATID = $PARAM AND ACTIVE = 1

													ORDER BY ID ASC LIMIT 6");  break;

					case 999.88:	// Вывод Листа Партнерев

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_PARTNERS` WHERE `ACTIVE` = 1"); break;	

					case 999.89:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$result = mysql_query("SELECT `ID`,`NAMEID`,`LOGO`

													FROM `QK_PARTNERS`

													WHERE `ACTIVE` = 1

													ORDER BY `ID` ASC");  break;

					case 999.91:	// Вывод всех партнерев на главную страницу

							$PRODID = (int) $GLOBALS['PRODID'];

							$result = mysql_query("SELECT ID, PRODID, IMG

									FROM QK_PRODUCTS_IMG

									WHERE  PRODID = $PRODID ORDER BY QUE ASC");  break;	

					case 999.92:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$CATID = (int) $_GET['cid'];

							$result = mysql_query("SELECT ID, NAMEID, DESCID, SIMG, SOON, ONLYSHOP, IMG, PRICE, OLDPRICE

														FROM QK_PRODUCTS

														WHERE CATID = $CATID AND ACTIVE = 1 

														ORDER BY ID DESC");  break;

							

							

					case 999.93:	// Вывод Параметра Категории Для Редактирования

							$ID = (int) $GLOBALS['PID'];

							$result = mysql_query("SELECT ID,

															NAMEID,

															CATID,

															(SELECT NAMEID FROM QK_CATEGORIES WHERE ID = CATID LIMIT 1) AS CATNAME,

															ARTICLE, 

															DESCID, 

															ISTOP, 

															ISSPEC, 

															LEFTCOUNT,

															PREORDER,

															ONLYSHOP,

															PREORDER_FROM,

														    PREORDER_TO,

															PRICE, 

															OLDPRICE, 

															CURTYPE, 

															IMG,

															SIMG

									FROM QK_PRODUCTS 

									WHERE  ID = $ID AND ACTIVE = 1 LIMIT 1");  break;

					case 999.94:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров +

							$CURID = (int) $_GET['editProduct'];

							$BROKER = (int) $_SESSION['CUSTOMER'];

							$result = mysql_query("SELECT ID, NAMEID, CATID, ARTICLE, ONLYSHOP, SIMG, PRICE, CURTYPE

													FROM QK_PRODUCTS

													WHERE ACTIVE = 1 AND EXPORTED = 1 AND BROKER = $BROKER AND NOT EXISTS (SELECT 1 FROM QK_PRODCONT WHERE CID = QK_PRODUCTS.ID AND TYPE = 6) AND ID <> $CURID OR $CURID = 0

													ORDER BY ID ASC LIMIT 50");  break;

					case 999.95:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$result = mysql_query("SELECT ID, NAMEID, DESCID, SIMG, PRICE, ONLYSHOP, OLDPRICE, CURTYPE

													FROM QK_PRODUCTS

													WHERE ACTIVE = 1

													AND ISTOP = 1

													ORDER BY ID ASC");  break;

					case 999.96:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров +

							

							if($_POST['cid'] > 0){

								$PRODID = (int) $_POST['cid'];

							}

							else{

								$PRODID = (int) $_GET['cid'];

							}

							

							if($_GET['scid'] > 1){

								$PRODID = (int) $_GET['scid'];

							}

							

							

							if(strlen($_POST['PRICE']) > 0){

								$FROMTO = explode('-', $_POST['PRICE']);

								$FROMTO[0] = preg_replace('/[^0-9]/', '',$FROMTO[0]);

								$FROMTO[1] = preg_replace('/[^0-9]/', '',$FROMTO[1]);

								

								$PRICESQL = "AND ss.PRICE BETWEEN '".$FROMTO[0]."' AND '".$FROMTO[1]."'";

							}

							else{

								$PRICESQL = '';

							}

							

							if($_POST['searchData_gift'][0] == 1){

								$GISTSQL = "AND EXISTS (SELECT 1 FROM QK_PRODCONT WHERE PID = ss.ID AND PRICE = 0 AND TYPE = 2)";

							}

							else{

								

								if($_GET['searchData_gift'] == 1){

									$GISTSQL = "AND EXISTS (SELECT 1 FROM QK_PRODCONT WHERE PID = ss.ID AND PRICE = 0 AND TYPE = 2)";

								}

								else{

									$GISTSQL = '';

								}

								

							}

							if($_POST['searchData_sale'][0] == 1){

								$SALESQL = "AND ss.PRICE < ss.OLDPRICE";

							}

							else{

								if($_GET['searchData_sale'] == 1){

									$SALESQL = "AND ss.PRICE < ss.OLDPRICE";

								}

								else{

									$SALESQL = '';

								}

							}

							

							if(count($_POST['searchData_brand']) > 0){

								$brandDatas = $_POST['searchData_brand'];

								$brandSearchString = '';

								

								foreach($brandDatas as $brandData){

									$brandSearchString = $brandSearchString.$brandData.',';

								}

								$brandSearchString = rtrim($brandSearchString,",");

							}

							else{

								

								if(isset($_GET['searchData_brand'])){

									

									$brandDatas = json_decode($_GET['searchData_brand'], true);

									$brandSearchString = '';

									

									foreach($brandDatas as $brandData){

										$brandSearchString = $brandSearchString.$brandData.',';

									}

									$brandSearchString = rtrim($brandSearchString,",");

									

									

								}

								else{

									$brandSearchString = '0';

									$brandDatas = 'NA';

								}

								

							}

							

							

							if(count($_POST['searchData_colors']) > 0){

								$colorDatas = $_POST['searchData_colors'];

								$colorSearchString = '';

								

								foreach($colorDatas as $colorData){

									$colorSearchString = $colorSearchString.$colorData.',';

								}

								$colorSearchString = rtrim($colorSearchString,",");

							}

							else{

								$colorSearchString = '0';

								$colorDatas = 'NA';

							}

							

							if(count($_POST['searchData_subCats']) > 0){

								$catDatas = $_POST['searchData_subCats'];

								$catSearchString = '';

								

								foreach($catDatas as $catData){

									$catSearchString = $catSearchString.$catData.',';

								}

								$catSearchString = rtrim($catSearchString,",");

							}

							else{

								$catSearchString = '0';

								$catDatas = 'NA';

							}

							

							if(count($_POST['searchData_cats']) > 0){

								$maincatDatas = $_POST['searchData_cats'];

								$maincatSearchString = '';

								

								foreach($maincatDatas as $maincatData){

									$maincatSearchString = $maincatSearchString.$maincatData.',';

								}

								$maincatSearchString = rtrim($maincatSearchString,",");

							}

							else{

								$maincatSearchString = '0';

								$maincatDatas = 'NA';

							}

							

							$PRODDETVALQUERY = '';

							$locCounter = 1;

							while($locCounter < 1200){

								

								if(isset($_POST['searchData_TAG_'.$locCounter])){

									$PRODDETVALQUERY = $PRODDETVALQUERY."AND EXISTS (SELECT 1 FROM QK_PRODDETVAL rr WHERE rr.PID = ss.ID AND rr.TYPEID = $locCounter AND EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = rr.VALUE AND TEXT_VAL IN(";

									

									

									foreach($_POST['searchData_TAG_'.$locCounter] as $curData){

										

										$PRODDETVALQUERY = $PRODDETVALQUERY."'".$curData."',";

										

									}

									$PRODDETVALQUERY = rtrim($PRODDETVALQUERY,",");

									

									$PRODDETVALQUERY = $PRODDETVALQUERY.")))";

								}

								

								if(isset($_GET['searchData_TAG_'.$locCounter])){

									

									$JSONDATA = json_decode($_GET['searchData_TAG_'.$locCounter], true);

									

									$PRODDETVALQUERY = $PRODDETVALQUERY."AND EXISTS (SELECT 1 FROM QK_PRODDETVAL rr WHERE rr.PID = ss.ID AND rr.TYPEID = $locCounter AND EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = rr.VALUE AND TEXT_VAL IN(";

									

									

									foreach($JSONDATA as $curData){

										

										$PRODDETVALQUERY = $PRODDETVALQUERY."'".$curData."',";

										

									}

									$PRODDETVALQUERY = rtrim($PRODDETVALQUERY,",");

									

									$PRODDETVALQUERY = $PRODDETVALQUERY.")))";

								}

								

								$locCounter++;

							}

							

						

							if($_POST['byPRICE'] == 1){

								$ORDERBYSTATEMENT = 'ORDER BY ss.PRICE ASC';

							}

							elseif($_POST['bySTAT'] == 1){

								$ORDERBYSTATEMENT = 'ORDER BY STARS DESC';

							}

							else{

								$ORDERBYSTATEMENT = 'ORDER BY ss.QUE ASC';

							}

							

                            $VENDORS_LEFTCOUNT = 'SELECT pc.PID, SUM(p.LEFTCOUNT) AS LEFTCOUNT 

                                                  FROM QK_PRODCONT AS pc 

                                                  LEFT JOIN QK_PRODUCTS AS p ON pc.CID = p.ID

                                                  WHERE TYPE = 6 

                                                  GROUP BY PID';

                            

							$SESSIONID = session_id();

							$result = mysql_query("SELECT 

									ss.ID, 

									ss.NAMEID, 

									ss.CRRULESID, 

									ss.PREORDER, 

									ss.SOON, 

									ss.ONLYSHOP, 

									ss.PREORDER_FROM,

								    ss.PREORDER_TO,

									(CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

										THEN  

											ss.PRICE -(ss.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

											ELSE  ss.PRICE

									END) AS PRICE,

									(CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

										THEN ss.PRICE ELSE  ss.OLDPRICE END) AS OLDPRICE,

									(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

									(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2, 

									 (SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = ss.ID) AS STARS,

									(CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END) AS ISWISH,

									(CASE WHEN EXISTS(SELECT 1 FROM QK_COMPARE WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END) AS ISCOMP,

									

									 ss.MAKER, ss.NEW, (ss.LEFTCOUNT + IF(v.LEFTCOUNT, v.LEFTCOUNT, 0)) AS LEFTCOUNT

														FROM QK_PRODUCTS ss

                                                        LEFT JOIN (

                                                          $VENDORS_LEFTCOUNT

                                                        ) AS v ON v.PID = ss.ID

                                                        

														WHERE 

														(

															ss.CATID = $PRODID 

															OR ss.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PRODID) 

															OR ss.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PRODID))

														)	

														

														$PRICESQL 

														$GISTSQL

														$SALESQL

														AND ss.ACTIVE = 1 AND (SELECT BROKCONF FROM QK_CUSTOMER WHERE CUSTOMER = ss.ID LIMIT 1) = 1 AND ss.EXPORTED = 1 

														AND (ss.MAKER IN ($brandSearchString) OR  '$brandDatas' = 'NA') 

														AND (ss.COLOR IN ($colorSearchString) OR  '$colorDatas' = 'NA')

														AND (ss.CATID IN ($catSearchString) OR  '$catDatas' = 'NA')

														AND (

															ss.CATID IN ($maincatSearchString) 

															OR ss.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID IN ($maincatSearchString)) 

															OR  '$maincatDatas' = 'NA'

														)

														$PRODDETVALQUERY

														$ORDERBYSTATEMENT");  break;

							

					case 999.97:	// Вывод Видов Сделок + 

							if($_GET['m'] == 'order'){

								$ID = (int) $_GET['pid'];

								$SESSIONID = session_id();

								$STATEMENT = "PID IN (SELECT PRODID FROM QK_BASKET WHERE SESSIONID = '$SESSIONID')";

							}

							else{

								$ID = (int) $_GET['pid'];

								$STATEMENT = "PID = $ID";

							}

							$TYPE = (int) $GLOBALS['TYPE'];

							$result = mysql_query("SELECT 

														ID AS OFFERID,

														CID AS ID, 

														CID,

														PRICE AS SPRICE, 

														(SELECT LOGO FROM QK_COLORS WHERE ID = (SELECT ss.COLOR FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) LIMIT 1) AS COLORCODE,

														(SELECT VALUE FROM QK_PRODDETVAL WHERE TYPEID = 69 AND PID = CID LIMIT 1) AS MEMSIZE,

														(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = CID) AS STARS,

														(SELECT ss.LEFTCOUNT FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS LEFTCOUNT,

														(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS NAMEID,

														(SELECT ss.PRICE FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PRICE,

														(SELECT ss.IMG FROM QK_PRODUCTS_IMG ss WHERE ss.PRODID = CID ORDER BY QUE ASC LIMIT 1) AS SIMG,

														(SELECT ss.IMG FROM QK_PRODUCTS_IMG ss WHERE ss.PRODID = CID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2

														

									FROM QK_PRODCONT WHERE $STATEMENT AND TYPE = $TYPE");  break;

					case 999.98:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$CATID = (int) $_GET['pid'];

							$result = mysql_query("SELECT ID, NAMEID, ICON FROM QK_DICPRODGROUP WHERE ID IN (SELECT GID FROM QK_DICPRODVAL WHERE ID IN (SELECT TYPEID FROM QK_PRODDETVAL WHERE PID = $CATID)) ORDER BY QUE ASC");  break;

					case 999.101:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$CATID = (int) $GLOBALS['CATID'];

							$result = mysql_query("SELECT ID, NAMEID FROM QK_DICPRODGROUP WHERE ID IN (SELECT GID FROM QK_DICPRODVAL WHERE ID IN (SELECT TAGID FROM QK_CATDETVAL WHERE CATID = $CATID))");  break;

					

					case 999.102:	// Вывод Полного Списка Клиентов 

							$CATID = (int) $_GET['pid'];

							$result = mysql_query("SELECT VALUE, (SELECT NAMEID FROM QK_DICPRODVAL WHERE ID = TYPEID) AS TYPNAME, TYPEID FROM QK_PRODDETVAL WHERE PID = $CATID AND (SELECT VISIBLE FROM QK_DICPRODVAL WHERE QK_DICPRODVAL.ID = QK_PRODDETVAL.TYPEID LIMIT 1) = 1"); break;

							

							

					case 999.103:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$CATID = (int) $GLOBALS['CATID'];

							$GID = (int) $GLOBALS['GID'];

							$result = mysql_query("SELECT ID, NAMEID FROM QK_DICPRODVAL WHERE ID IN (SELECT TAGID FROM QK_CATDETVAL WHERE CATID = $CATID) AND GID = $GID");  break;

					case 999.104:	// Вывод Полного Списка Видов Сделок

							$result = mysql_query("SELECT s.id AS ID, s.DICTIONVALUE, s.DICTIONVALUE2, s.DICTIONNAMEID,  s.DICTIONVALUE3 

							FROM QK_DICTION s

								WHERE s.DICTIONTYPE = 'CONTRACTTYPE'

							ORDER BY s.DICTIONVALUE3 + 0 ASC");  break;				

					case 999.105:	// Вывод Параметра Вида Сделки Для Редактирования

							$ID = (int) $_GET['editContractType'];

							$result = mysql_query("SELECT `id`,`DICTIONTYPE`,`DICTIONNAMEID`,`DICTIONVALUE2`,`DICTIONVALUE3`,`lastEdit`

									FROM `QK_DICTION`

									WHERE  `id` = $ID LIMIT 1");  break;

					case 999.106:	// Вывод Видов Сделок

							

							$PARAM = (int) $_GET['cid'];

							$CATTYPE = $_GET['type'];

							if($CATTYPE == 'parent'){

							

							$result = mysql_query("SELECT dd.id, dd.DICTIONTYPE, dd.DICTIONNAMEID, dd.DICTIONVALUE2, dd.DICTIONVALUE3, dd.lastEdit

									FROM QK_DICTION dd

									WHERE EXISTS (SELECT 1 FROM QK_PRODUCTS pp 

														WHERE pp.ACTIVE = 1 

														AND dd.id = pp.MAKER 

														AND pp.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PARAM))");  break;	

							}

							else{

							$result = mysql_query("SELECT dd.id, dd.DICTIONTYPE, dd.DICTIONNAMEID, dd.DICTIONVALUE2, dd.DICTIONVALUE3, dd.lastEdit

									FROM QK_DICTION dd

									WHERE EXISTS (SELECT 1 FROM QK_PRODUCTS pp 

														WHERE pp.ACTIVE = 1 

														AND dd.id = pp.MAKER 

														AND pp.CATID = $PARAM)");  break;	

							}

							break;

							

					case 999.107:	// Вывод Видов Сделок +

							$ID = (int) $_GET['editProduct'];

							$TYPE = (int) $GLOBALS['TYPE'];

							$result = mysql_query("SELECT ID, CID, PRICE, (SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS CNAME, (SELECT ss.PRICE FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS CPRICE

									FROM QK_PRODCONT WHERE PID = $ID AND TYPE = $TYPE");  break;						

					case 999.108:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$PID = (int) $_GET['pid'];

							$GID = (int) $GLOBALS['GID'];

							$LANGID = (int) $_SESSION['LANGID'];

							$result = mysql_query("SELECT (SELECT qq.NAMEID FROM QK_DICPRODVAL qq WHERE qq.ID = TYPEID) AS TYPENAME, VALUE, (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = $LANGID AND TEXT_ID = QK_PRODDETVAL.VALUE LIMIT 1) AS VALUETEXT

									FROM QK_PRODDETVAL 

									WHERE PID = $PID AND TYPEID IN (SELECT ID FROM QK_DICPRODVAL WHERE GID = $GID)");  break;

									

					case 999.109:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$CURPRODID = (int) $GLOBALS['CURPRODID'];

							$TYPEID = (int) $GLOBALS['TYPEID'];

							$result = mysql_query("SELECT VALUE AS NAMEID FROM QK_PRODDETVAL WHERE PID = $CURPRODID AND TYPEID = $TYPEID LIMIT 1");  break;

					case 999.112:	// Вывод Листа Новостей +

							$CATID = (int) $_GET['cid'];

							$TAGID = (int) $GLOBALS['allDivVal']['ID'];

							$result = mysql_query("SELECT 1 AS DATA

									FROM QK_CATDETVAL WHERE CATID = $CATID AND TAGID = $TAGID LIMIT 1"); break;

					

					

					case 999.113:	// Вывод Параметра Вида Сделки Для Редактирования

							$DICTIONTYPE = $GLOBALS['DICTIONTYPE'];

							$result = mysql_query("SELECT DICTIONNAMEID

									FROM QK_DICTION

									WHERE DICTIONTYPE = '$DICTIONTYPE'");  break;	

									

									

					case 999.114:	// Вывод Полного Списка Дочерних Категорий Статьей + 

							$CATID = (int) $_GET['cid'];

							$result = mysql_query("SELECT dv.NAMEID, dv.DICCHAR, cv.ID, dv.ID AS DID,

								CASE WHEN (SELECT COUNT(*) AS COUNT FROM QK_DICTION WHERE DICTIONTYPE = dv.DICCHAR) = 2 

											AND 

										  (SELECT TEXT_VAL FROM QK_LANGSVAL WHERE LANG_ID = 1 AND TEXT_ID = (SELECT DICTIONNAMEID FROM QK_DICTION WHERE DICTIONTYPE = dv.DICCHAR LIMIT 1) LIMIT 1) IN ('Yes', 'YES', 'yes', 'NO', 'no', 'No') THEN 1 ELSE 0 END AS CHECKBOXTYPE



							FROM

							QK_CATDETVAL cv, QK_DICPRODVAL dv WHERE 

								cv.CATID = $CATID

								AND cv.TAGID = dv.ID

								AND LENGTH(dv.DICCHAR) > 0

								

								

								");  break;

					case 999.115:	// Вывод Параметра Вида Сделки Для Редактирования +

							$result = mysql_query("SELECT id, DICTIONNAMEID, DICTIONVALUE, DICTIONVALUE2, DICTIONVALUE3

									FROM QK_DICTION

									WHERE DICTIONTYPE = 'COUNTRY' ORDER BY id ASC");  break;	

					case 999.116:	// Вывод Параметра Вида Сделки Для Редактирования

						// Вывод 

						$SESSIONID = session_id();

						if(isset($_POST['searchData'])){

								$STATICTEXT = $_POST['searchData'];

								$TextArrays = explode(' ', $_POST['searchData']);

								$counter = 1;

								$maxCount = count($TextArrays);

								foreach($TextArrays as $TextArray){

									if($counter == 1){

										$TEXTPARAM = $TEXTPARAM." TEXT_VAL LIKE '%".$TextArray."%' ";

									}

									else{

										$TEXTPARAM = $TEXTPARAM."AND TEXT_VAL LIKE '%".$TextArray."%' ";

									}

									$counter++;

								}



								$OFCAT = (int) $_POST['searchDataCat'];

							}

							else{

								$STATICTEXT = $_GET['searchData'];

								$TextArrays = explode(' ', $_GET['searchData']);

								$counter = 1;

								$maxCount = count($TextArrays);

								foreach($TextArrays as $TextArray){

									if($counter == 1){

										$TEXTPARAM = $TEXTPARAM." TEXT_VAL LIKE '%".$TextArray."%' ";

									}

									else{ 

										$TEXTPARAM = $TEXTPARAM."AND TEXT_VAL LIKE '%".$TextArray."%' ";

									}

									$counter++;

								}

								

								$OFCAT = (int) $_GET['searchDataCat'];

							}

					

							if(strlen($TEXTPARAM) > 0){

								

							

								

							$result = mysql_query("SELECT p.ID,

														(SELECT NAMEID FROM QK_CATEGORIES WHERE p.CATID = QK_CATEGORIES.ID LIMIT 1) AS CATNAME, 

														p.NAMEID,

														p.DESCID,

														p.LEFTCOUNT,

														p.PREORDER,

														p.PREORDER_FROM,

														p.PREORDER_TO,

														p.NEW,

														p.SOON,

														p.ONLYSHOP,

														(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = p.ID) AS STARS,

														CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = p.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

														p.MAKER,

														p.IMG,

														(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

														(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

														CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN  

																p.PRICE -(p.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

																ELSE  p.PRICE

														END AS PRICE,

														CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN p.PRICE ELSE  p.OLDPRICE END AS OLDPRICE,

														p.CURTYPE

									FROM QK_PRODUCTS p, QK_CATEGORIES s

									WHERE p.CATID = s.ID AND p.EXPORTED = 1 AND p.ACTIVE = 1 AND s.ACTIVE = 1

									AND (((EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = p.NAMEID AND  $TEXTPARAM LIMIT 1) /*OR EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID IN (SELECT VALUE FROM QK_PRODDETVAL WHERE PID = p.ID ) AND TEXT_VAL <> '' AND TEXT_VAL LIKE '%$STATICTEXT%' LIMIT 1)*/) OR p.ARTICLE LIKE '%$STATICTEXT%') OR EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = p.TDESCID AND TEXT_VAL <> '' AND TEXT_VAL LIKE '%$STATICTEXT%' LIMIT 1))

										AND (p.CATID = $OFCAT OR $OFCAT = 0)

									ORDER BY s.QUE ASC") or die(mysql_error());

							}		

							break;

					case 999.117:	// Вывод Данных из Библиотеки для использования

							$DICTIONTYPE =  $GLOBALS['DICTIONTYPE'];

							$result = mysql_query("SELECT id AS ID, DICTIONVALUE, DICTIONNAMEID, DICTIONVALUE2, DICTIONVALUE3

									FROM QK_DICTION

									WHERE  DICTIONTYPE = '$DICTIONTYPE' AND DICTIONVALUE = 1 ORDER BY DICTIONVALUE4 ASC"); break;

					case 999.118:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$CATID = (int) $GLOBALS['CATID'];

							$REJCATID = (int) $GLOBALS['REJCATID'];

							$SESSIONID = session_id();

							

							

							$result = mysql_query("SELECT ss.ID, 

								ss.NAMEID, 

								ss.CRRULESID, 

								(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = ss.ID) AS STARS,

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

								CASE WHEN EXISTS(SELECT 1 FROM QK_COMPARE WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISCOMP,

								ss.IMG, 

								CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

									THEN  

										ss.PRICE -(ss.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

										ELSE  ss.PRICE

								END AS PRICE,

								CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

									THEN ss.PRICE ELSE  ss.OLDPRICE END AS OLDPRICE,

								ss.NEW, 

								ss.SOON, 

								ss.ONLYSHOP, 

								ss.PREORDER,

								ss.PREORDER_FROM,

							    ss.PREORDER_TO,

								ss.LEFTCOUNT

													FROM QK_PRODUCTS ss

													WHERE ss.ISSPEC = 1 AND (ss.CATID = $CATID OR $CATID = 0) AND (ss.CATID <> $REJCATID OR $REJCATID = 0) AND ss.ACTIVE = 1 AND (SELECT BROKCONF FROM QK_CUSTOMER WHERE CUSTOMER = ss.ID LIMIT 1) = 1

													ORDER BY RAND() LIMIT 10");  break;

					case 999.119:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$SESSIONID = session_id();

							$result = mysql_query("SELECT b.ID, p.ID AS PID, b.PRODID, p.ARTICLE, p.NAMEID, p.DESCID, p.DESCID, p.ONLYSHOP,

														

														

											

													CASE WHEN b.OFFERID > 0 THEN (SELECT PRICE FROM QK_PRODCONT WHERE ID = b.OFFERID LIMIT 1) ELSE CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

														THEN  

															p.PRICE -(p.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

															ELSE  p.PRICE

													END END AS PRICE,

														

													b.QUANTITY,

													(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, (SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID LIMIT 1) AS IMG

													FROM QK_PRODUCTS p, QK_BASKET b

													WHERE b.SESSIONID = '$SESSIONID' AND p.ID = b.PRODID

													ORDER BY b.ADDDATE ASC");  break;

					case 999.121:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

					

							$BROKER = (int) $_SESSION['CUSTOMER']; 

					

							$result = mysql_query("SELECT ID, CNAME, (SELECT NAME FROM QK_CUSTOMER WHERE CUSTOMER = BROKER) AS BNAME, (SELECT NAME FROM QK_CUSTOMER WHERE CUSTOMER = DELAGENT) AS DNAME, CPHONE, CMAIL, FULLPRICE, (SELECT SUM(PRICE) FROM QK_ORDERS_LIST WHERE ORDERID = QK_ORDERS.ID AND BROKER = $BROKER) AS BROKERFULLPRICE, SECONTMAILB, COMMENT, PREORDER, STORE, ADDDATE, PAYMENT, PAYED, STATE, (SELECT SUM(COUNT) FROM QK_ORDERS_LIST WHERE ORDERID =  QK_ORDERS.ID) AS SUBCOUNT, (SELECT SUM(PRICE) FROM QK_ORDERS_LIST WHERE ORDERID =  QK_ORDERS.ID) AS SUBPRICE

													FROM QK_ORDERS WHERE WAFFENSS = 0 AND (EXISTS(SELECT 1 FROM QK_ORDERS_LIST WHERE ORDERID = QK_ORDERS.ID AND BROKER = $BROKER) OR $BROKER = 0)

													ORDER BY ID DESC");  break;

					case 999.123:	// Вывод Параметра Услуг Для Редактирования

							$ID = (int) $_GET['oid'];

							$result = mysql_query("SELECT ID,

														CUST,

														CNAME,

														CPHONE,												

														CMAIL,

														STORE,

														(SELECT NAMEID FROM QK_PRODUCTS WHERE ID = (SELECT PRODID FROM QK_ORDERS_LIST WHERE ORDERID = QK_ORDERS.ID LIMIT 1) LIMIT 1) AS PRODNAME,

														(SELECT NAMEID FROM QK_ADDR WHERE ID = STORE LIMIT 1) AS STORNAME,

														FULLPRICE,

														ADDDATE,

														STATE

									FROM QK_ORDERS

									WHERE  ID = $ID LIMIT 1"); break;

					case 999.124:	// Вывод всех партнерев на главную страницу

							$PRODID = (int) $GLOBALS['PRODID'];

							$BROKER = (int) $GLOBALS['BROKER'];

							$result = mysql_query("SELECT l.ID, l.PRODID, l.COUNT, l.PRICE, p.NAMEID, p.DESCID, p.ARTICLE, p.PRICE AS PPRICE 

									FROM QK_ORDERS_LIST l, QK_PRODUCTS p

									WHERE  l.ORDERID = $PRODID AND (l.BROKER = $BROKER OR $BROKER = 0)

									AND p.ID = l.PRODID

									ORDER BY l.ID DESC") or die(mysql_error());  break;	

					

					

					case 999.125:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

					

							$PARAM = (int) $_GET['cid'];

							$result = mysql_query("SELECT ss.ID, ss.NAMEID, ss.SDESCID, ss.IMG, ss.PARENTID,

											(SELECT PARENTID FROM QK_CATEGORIES WHERE ID = ss.ID) AS PARENPARENTTID, 

											(SELECT NAMEID FROM QK_CATEGORIES WHERE ID = ss.PARENTID) AS PARENPARENTTNAME, 

											(SELECT PARENTID FROM QK_CATEGORIES WHERE ID = (SELECT PARENTID FROM QK_CATEGORIES WHERE ID = ss.ID)) AS PARENPARENPARENTTTID,

											(SELECT NAMEID FROM QK_CATEGORIES WHERE ID = (SELECT PARENTID FROM QK_CATEGORIES WHERE ID = ss.PARENTID)) AS PARENPARENPARENTTTNAME, 

											(SELECT NAMEID FROM QK_CATEGORIES WHERE ID = ss.PARENTID) AS PARENTNAMEID

											FROM QK_CATEGORIES ss

											WHERE ss.ACTIVE = 1 AND ss.ID = $PARAM

											LIMIT 1");  break;

							

						

					case 999.126:	// Вывод всех партнерев на главную страницу

							$PID = (int) $GLOBALS['PID'];

							$LANGID = (int) $GLOBALS['LANGID_L'];

							$result = mysql_query("SELECT g.ID, g.LANGID, g.NAMEID, g.DESCID, g.ACTIVE

									FROM QK_PRODUCTS_DESC g

									WHERE  g.PID = $PID AND g.LANGID = $LANGID ORDER BY g.ID ASC");  break;

					case 999.127:	// Вывод всех партнерев на главную страницу

							$PID = (int) $GLOBALS['PID'];

							$LANGID = (int) $_SESSION['LANGID'];

							$result = mysql_query("SELECT g.ID, g.LANGID, g.NAMEID, g.DESCID, g.ACTIVE

									FROM QK_PRODUCTS_DESC g

									WHERE  g.PID = $PID AND g.LANGID = $LANGID ORDER BY g.ID ASC");  break;

					case 999.128:	// Вывод Параметра Партнера Для Редактирования

							$ID = (int) $_GET['editColor'];

							$result = mysql_query("SELECT ID, NAMEID, CHARNAME, ACTIVE, LOGO, EDITDATE

									FROM QK_COLORS

									WHERE  ID = $ID LIMIT 1"); break;

					case 999.129:	// Вывод Параметра Партнера Для Редактирования +

							$result = mysql_query("SELECT ID, NAMEID, CHARNAME, ACTIVE, LOGO, EDITDATE

									FROM QK_COLORS

									ORDER BY CHARNAME ASC"); break;

					

					case 999.131:	// Вывод Полного Списка Складов в Компании

						$result = mysql_query("SELECT s.ID, s.DICCHAR, s.NAME, s.ACTIVE, s.QUE

												FROM QK_DICTIONCLASS s

												ORDER BY s.QUE ASC");  break;

					

					case 999.132:	// Вывод Полного Списка Складов в Компании

							$result = mysql_query("SELECT s.ID, s.NAMEID, s.ICON, s.ACTIVE

													FROM QK_DICPRODGROUP s

													ORDER BY s.QUE ASC");  break;

													

					case 999.133:	// Вывод Полного Списка Складов в Компании

							$GID = (int) $GLOBALS['GID'];

							$result = mysql_query("SELECT s.ID, s.NAMEID, s.TYPE, s.VISIBLE, s.DICCHAR

													FROM QK_DICPRODVAL s

													WHERE s.GID = $GID

													ORDER BY s.QUE ASC");  break;

					case 999.134:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$SESSIONID = session_id();

							$result = mysql_query("SELECT p.ID, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = p.ID) AS STARS,

								CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = p.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

								b.PRODID, p.MAKER, p.ONLYSHOP, p.ARTICLE, p.NAMEID, p.DESCID, p.DESCID, CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN  

																p.PRICE -(p.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

																ELSE  p.PRICE

														END AS PRICE,

														CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN p.PRICE ELSE  p.OLDPRICE END AS OLDPRICE, p.LEFTCOUNT, p.PREORDER, p.PREORDER_FROM, p.PREORDER_TO, p.NEW, p.SOON

													FROM QK_PRODUCTS p, QK_WISHLIST b

													WHERE b.SESSIONID = '$SESSIONID' AND p.ID = b.PRODID

													ORDER BY b.ADDDATE ASC");  break;

					case 999.135:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$CURDAY = date("Y-m-d H:i:s");

							$result = mysql_query("SELECT ss.ID, 

								ss.NAMEID, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								ss.IMG, 

								ss.PRICE, 

								ss.OLDPRICE, 

								ss.ISOFFER_FROM,

								ss.ISOFFER_TO, 

								ss.NEW, 

								ss.SOON, 

								ss.ONLYSHOP, 

								ss.LEFTCOUNT,

								ss.PREORDER_FROM,

								ss.PREORDER_TO,

								ss.PREORDER

									FROM QK_PRODUCTS ss

									WHERE ss.ISOFFER = 1 AND (SELECT BROKCONF FROM QK_CUSTOMER WHERE CUSTOMER = ss.ID LIMIT 1) = 1 AND ss.ACTIVE = 1 AND '$CURDAY' BETWEEN ss.ISOFFER_FROM AND ss.ISOFFER_TO

									ORDER BY ss.ID DESC LIMIT 1");  break;

					case 999.136:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

					

							$LAST_FIVES = explode("|", $_COOKIE['viewedProds']);

							krsort($LAST_FIVES);

							$locCounter = 1;

							$INSTATEMENT = '';

							foreach($LAST_FIVES as $LAST_FIVE){

								if($locCounter == 6){break;}

								$LAST_FIVE = (int) $LAST_FIVE;

								if($LAST_FIVE > 0){

									$INSTATEMENT = $INSTATEMENT.$LAST_FIVE.',';

								}

								$locCounter++;

							}

							$INSTATEMENT = rtrim($INSTATEMENT,",");

							

                            $VENDORS_LEFTCOUNT = 'SELECT pc.PID, SUM(p.LEFTCOUNT) AS LEFTCOUNT 

                                                  FROM QK_PRODCONT AS pc 

                                                  LEFT JOIN QK_PRODUCTS AS p ON pc.CID = p.ID

                                                  WHERE TYPE = 6 

                                                  GROUP BY PID';

                            

							$SESSIONID = session_id();

							$result = mysql_query("SELECT ss.ID, 

								ss.NAMEID, 

								(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = ss.ID) AS STARS,

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

								CASE WHEN EXISTS(SELECT 1 FROM QK_COMPARE WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISCOMP,

								ss.IMG, 

								CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

									THEN  

										ss.PRICE -(ss.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

										ELSE  ss.PRICE

								END AS PRICE,

								CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

									THEN ss.PRICE ELSE  ss.OLDPRICE END AS OLDPRICE,

								ss.NEW, 

								ss.SOON, 

								ss.ONLYSHOP, 

								ss.PREORDER, 

								ss.PREORDER_FROM,

								ss.PREORDER_TO,

								(ss.LEFTCOUNT + IF(v.LEFTCOUNT, v.LEFTCOUNT, 0)) AS LEFTCOUNT

													FROM QK_PRODUCTS ss

                                                    LEFT JOIN ( $VENDORS_LEFTCOUNT ) AS v ON v.PID = ss.ID

													WHERE ss.ID IN ($INSTATEMENT) AND AND (SELECT BROKCONF FROM QK_CUSTOMER WHERE CUSTOMER = ss.ID LIMIT 1) = 1 ss.ACTIVE = 1 AND EXPORTED = 1

													ORDER BY RAND() LIMIT 10");  break;

					case 999.137:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$SESSIONID = session_id();

							$result = mysql_query("SELECT p.ID AS PID, b.ID, (SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, (SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2, p.CATID, p.LEFTCOUNT, p.PREORDER, p.PREORDER_FROM, p.PREORDER_TO, b.PRODID, p.MAKER, p.ARTICLE, p.NAMEID, p.DESCID, p.ONLYSHOP, p.DESCID, p.PRICE

													FROM QK_PRODUCTS p, QK_COMPARE b

													WHERE b.SESSIONID = '$SESSIONID' AND p.ID = b.PRODID

													ORDER BY b.ADDDATE ASC");  break;

					case 999.138:	// Вывод Видов Сделок + 

							

							if($GLOBALS['SUBPID'] > 0){

								$ID = (int) $GLOBALS['SUBPID'];

							}

							else{

								$ID = (int) $_GET['pid'];

							}

							

							

							

							

							

							$TYPE = (int) $GLOBALS['TYPE'];

							

							

							

							$result = mysql_query("SELECT 

														ID AS MAINID,

														CASE WHEN PID = $ID

														THEN 

														CID

														ELSE PID END AS ID, 

														PRICE AS SPRICE, 

														CASE WHEN PID = $ID

														THEN 

															(SELECT LOGO FROM QK_COLORS WHERE ID = (SELECT ss.COLOR FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) LIMIT 1) 

														ELSE

															(SELECT LOGO FROM QK_COLORS WHERE ID = (SELECT ss.COLOR FROM QK_PRODUCTS ss WHERE ss.ID = PID LIMIT 1) LIMIT 1)

														END AS COLORCODE,

														

														CASE WHEN PID = $ID

														THEN 

														(SELECT pr.VALUE FROM QK_PRODDETVAL pr WHERE pr.TYPEID = 104 AND pr.PID = QK_PRODCONT.CID LIMIT 1) 

														ELSE 

														(SELECT pr.VALUE FROM QK_PRODDETVAL pr WHERE pr.TYPEID = 104 AND pr.PID = QK_PRODCONT.PID LIMIT 1) 	

														END AS MEMSIZE,

														

														

														(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = CID) AS STARS,

														(SELECT ss.LEFTCOUNT FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS LEFTCOUNT,

														(SELECT ss.PREORDER FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PREORDER,

														(SELECT ss.PREORDER_FROM FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PREORDER_FROM,

														(SELECT ss.PREORDER_TO FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PREORDER_TO,

														

														CASE WHEN PID = $ID

														THEN 

															(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1)

														ELSE

															(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = PID LIMIT 1) 

														END AS NAMEID,

														

														(SELECT ss.PRICE FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PRICE,

														(SELECT ss.IMG FROM QK_PRODUCTS_IMG ss WHERE ss.PRODID = CID ORDER BY QUE ASC LIMIT 1) AS SIMG,

														(SELECT ss.IMG FROM QK_PRODUCTS_IMG ss WHERE ss.PRODID = CID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2

														

									FROM QK_PRODCONT WHERE (PID = $ID OR CID = $ID) AND (SELECT ACTIVE FROM QK_CATEGORIES WHERE ID = (SELECT CATID FROM QK_PRODUCTS WHERE ID = PID)) = 1 AND (SELECT ACTIVE FROM QK_PRODUCTS WHERE ID = PID) = 1 AND (SELECT ACTIVE FROM QK_CATEGORIES WHERE ID = (SELECT CATID FROM QK_PRODUCTS WHERE ID = CID)) = 1 AND (SELECT ACTIVE FROM QK_PRODUCTS WHERE ID = CID) = 1 AND TYPE = $TYPE");  break;

					

					case 999.139:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$ORDERID = (int) $GLOBALS['ORDERID'];

							$result = mysql_query("SELECT ID, PRODID, (SELECT NAMEID FROM QK_PRODUCTS WHERE ID = PRODID LIMIT 1) AS PNAMEID, COUNT, PRICE, ONEPRICE

													FROM QK_ORDERS_LIST

													WHERE ORDERID = $ORDERID");  break;

					case 999.141:	// Вывод Параметра Партнера Для Редактирования +

							$CATID = (int) $_GET['cid'];

							$result = mysql_query("SELECT ID, NAMEID, CHARNAME, ACTIVE, LOGO, EDITDATE

									FROM QK_COLORS

									WHERE ID IN (SELECT COLOR FROM QK_PRODUCTS WHERE CATID = $CATID)

									ORDER BY CHARNAME ASC"); break;								

					case 999.142:	// Вывод Полного Списка Категорий Товаров 

							

							$PARENTID = (int) $GLOBALS['catInfo']['ID'];

							$result = mysql_query("SELECT s.ID, s.QUE, s.NAMEID, s.ACTIVE, s.IMG

													FROM QK_CATEGORIES s

													WHERE  s.PARENTID = $PARENTID AND s.ACTIVE = 1

													ORDER BY s.QUE ASC");  break;								

					

					case 999.143:	// Вывод Полного Списка Категорий Товаров 

							

							$PARENTID = (int) $GLOBALS['allSubcategorie']['ID'];

							$result = mysql_query("SELECT s.ID, s.QUE, s.NAMEID, s.ACTIVE, s.IMG

													FROM QK_CATEGORIES s

													WHERE  s.PARENTID = $PARENTID AND s.ACTIVE = 1

													ORDER BY s.QUE ASC");  break;	

					

					case 999.144:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$SESSIONID = session_id();

							$CAT = (int) $_GET['cid']; 

							

							$VENDORS_LEFTCOUNT = 'SELECT pc.PID, SUM(p.LEFTCOUNT) AS LEFTCOUNT 

                                                  FROM QK_PRODCONT AS pc 

                                                  LEFT JOIN QK_PRODUCTS AS p ON pc.CID = p.ID

                                                  WHERE TYPE = 6 

                                                  GROUP BY PID';

							

							

							$result = mysql_query("SELECT p.ID, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = p.ID) AS STARS,

								CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = p.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

								p.MAKER, p.ONLYSHOP, p.ARTICLE, p.NAMEID, p.DESCID, p.DESCID, CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN  

																p.PRICE -(p.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

																ELSE  p.PRICE

														END AS PRICE,

														CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN p.PRICE ELSE  p.OLDPRICE END AS OLDPRICE, p.LEFTCOUNT, p.PREORDER, p.PREORDER_FROM, p.PREORDER_TO, p.NEW, p.SOON

													FROM QK_PRODUCTS p

													WHERE (p.PRICE < p.OLDPRICE OR EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)) AND p.EXPORTED = 1 AND p.ACTIVE = 1

													AND NOT EXISTS (SELECT 1 FROM QK_PRODCONT WHERE QK_PRODCONT.CID = p.ID AND TYPE = 6)

													AND ((p.CATID = $CAT OR p.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $CAT) 

															OR p.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $CAT))

														) OR $CAT = 0)

													ORDER BY RAND() LIMIT 300");  break;

					case 999.145:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

					

							$LAST_FIVES = explode("|", $_COOKIE['viewedProds']);

							krsort($LAST_FIVES);

							$locCounter = 1;

							$INSTATEMENT = '';

							foreach($LAST_FIVES as $LAST_FIVE){

								if($locCounter == 6){break;}

								$LAST_FIVE = (int) $LAST_FIVE;

								if($LAST_FIVE > 0){

									$INSTATEMENT = $INSTATEMENT.$LAST_FIVE.',';

								}

								$locCounter++;

							}

							$INSTATEMENT = rtrim($INSTATEMENT,",");

							

							$SESSIONID = session_id();

							$result = mysql_query("SELECT ss.ID, 

								ss.NAMEID, 

								(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = ss.ID) AS STARS,

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

								CASE WHEN EXISTS(SELECT 1 FROM QK_COMPARE WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISCOMP,

								ss.IMG, 

								ss.PRICE, 

								ss.OLDPRICE, 

								ss.NEW, 

								ss.SOON, 

								ss.ONLYSHOP, 

								ss.LEFTCOUNT

													FROM QK_PRODUCTS ss

													WHERE ss.ID IN ($INSTATEMENT) AND ss.ACTIVE = 1 AND EXPORTED = 1

													ORDER BY RAND()");  break;	

					

					case 999.146:	// Вывод Параметра Вида Сделки Для Редактирования

						// Вывод 

						$SESSIONID = session_id();

						

								$STATICTEXT = $_GET['searchGroup'];

								$TextArrays = explode(',', $_GET['searchGroup']);

								$counter = 1;

								$maxCount = count($TextArrays);

								foreach($TextArrays as $TextArray){

									$TEXTPARAM = $TEXTPARAM."'".$TextArray."',";

									$counter++;

								}

								$TEXTPARAM = rtrim($TEXTPARAM, ",");

							$result = mysql_query("SELECT p.ID,

														(SELECT NAMEID FROM QK_CATEGORIES WHERE p.CATID = QK_CATEGORIES.ID LIMIT 1) AS CATNAME, 

														p.NAMEID,

														p.DESCID,

														p.LEFTCOUNT,

														p.PREORDER,

														p.PREORDER_FROM,

														p.PREORDER_TO,

														p.NEW,

														p.SOON,

														p.ONLYSHOP,

														(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = p.ID) AS STARS,

														CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = p.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

														p.MAKER,

														p.IMG,

														(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

														(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

														CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN  

																p.PRICE -(p.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

																ELSE  p.PRICE

														END AS PRICE,

														CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = p.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

															THEN p.PRICE ELSE  p.OLDPRICE END AS OLDPRICE,

														p.CURTYPE

									FROM QK_PRODUCTS p, QK_CATEGORIES s

									WHERE p.CATID = s.ID AND p.EXPORTED = 1 AND p.ACTIVE = 1 AND s.ACTIVE = 1 AND p.ARTICLE IN ($TEXTPARAM)

									

									ORDER BY s.QUE ASC") or die(mysql_error());

									

							break;

					

					case 999.147:	// Вывод Полного Списка Вопросов 

							$result = mysql_query("SELECT ID, NAME, DICTOUNT, FROMDATE, TODATE, ACTIVE, EDITDATE

													FROM QK_GROUP 

													ORDER BY ID ASC");  break;

					case 999.148:	// Вывод Полного Списка Вопросов 

							$result = mysql_query("SELECT ID, NAME, ICON, FROMDATE, LURL, TODATE, ACTIVE, EDITDATE

													FROM QK_LABELGROUPS 

													ORDER BY ID ASC");  break;								

					case 999.149:	// Вывод Параметра Галереи Для Редактирования

							$ID = (int) $_GET['gid'];

							$result = mysql_query("SELECT ID, NAME, FROMDATE, TODATE, ACTIVE, EDITDATE 

									FROM QK_LABELGROUPS

									WHERE ID = $ID LIMIT 1"); break;

					case 999.151:	// Вывод всех партнерев на главную страницу

						

							$GID = (int) $GLOBALS['GID'];

							$result = mysql_query("SELECT ID, GID, PID, 

							(SELECT CATID FROM QK_PRODUCTS WHERE ID = PID) AS CATID, 

							(SELECT NAMEID FROM QK_PRODUCTS WHERE ID = PID) AS PRODNAMEID, 

							(SELECT PRICE FROM QK_PRODUCTS WHERE ID = PID) AS PRODPRICE, 

							(SELECT NAMEID FROM QK_CATEGORIES WHERE ID = (SELECT CATID FROM QK_PRODUCTS WHERE ID = PID LIMIT 1)) AS CATIDNAME 

									FROM QK_LABELGROUPS_INC

									WHERE  GID = $GID ORDER BY CATID DESC");  break;	

					case 999.152:	// Вывод Параметра Галереи Для Редактирования

							$ID = (int) $GLOBALS['oneProdData']['ID'];

							$DATE = date("Y-m-d H:i:s");

							

							$result = mysql_query("SELECT s.ID, s.NAME, s.ICON, s.LURL

									FROM QK_LABELGROUPS s, QK_LABELGROUPS_INC c

									WHERE c.PID = $ID AND c.GID = s.ID AND '$DATE' BETWEEN s.FROMDATE AND s.TODATE"); break;

					case 999.153:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

					

							$LAST_FIVES = explode("|", $_COOKIE['viewedProds']);

							krsort($LAST_FIVES);

							$locCounter = 1;

							$INSTATEMENT = '';

							foreach($LAST_FIVES as $LAST_FIVE){

								if($locCounter == 50){break;}

								$LAST_FIVE = (int) $LAST_FIVE;

								if($LAST_FIVE > 0){

									$INSTATEMENT = $INSTATEMENT.$LAST_FIVE.',';

								}

								$locCounter++;

							}

							$INSTATEMENT = rtrim($INSTATEMENT,",");

							

							$SESSIONID = session_id();

							$result = mysql_query("SELECT ss.ID, 

								ss.NAMEID, 

								(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = ss.ID) AS STARS,

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

								(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2,

								CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

								CASE WHEN EXISTS(SELECT 1 FROM QK_COMPARE WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISCOMP,

								ss.IMG, 

								CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

										THEN  

											ss.PRICE -(ss.PRICE/100*(SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1))

											ELSE  ss.PRICE

									END AS PRICE,

									CASE WHEN EXISTS (SELECT DICTOUNT FROM QK_GROUP_INC rr, QK_GROUP pp WHERE rr.PID = ss.ID AND rr.GID = pp.ID AND CURDATE() BETWEEN FROMDATE AND TODATE LIMIT 1)

										THEN ss.PRICE ELSE  ss.OLDPRICE END AS OLDPRICE,

								ss.NEW, 

								ss.SOON, 

								ss.ONLYSHOP, 

								ss.PREORDER,

								ss.PREORDER_FROM,

								ss.PREORDER_TO,

								ss.LEFTCOUNT

													FROM QK_PRODUCTS ss

													WHERE ss.ID IN ($INSTATEMENT) AND ss.ACTIVE = 1 AND EXPORTED = 1

													ORDER BY RAND()");  break;	

					case 999.154:	// Вывод Полного Списка Работников 

							$CURDAY = date("Y-m-d H:i:s");

							$ID = (int) $_GET['vid'];

							$result = mysql_query("SELECT s.ID, QUE, s.NAMEID, s.DESCID, s.EDITDATE

														FROM QK_WORKERS s

														WHERE s.EDITDATE > '$CURDAY' AND s.ACTIVE = 1 AND s.ID = $ID

														ORDER BY s.QUE ASC"); break;			

					case 999.155:	// Вывод Видов Сделок + 

							

							if($GLOBALS['SUBPID'] > 0){

								$ID = (int) $GLOBALS['SUBPID'];

							}

							else{

								$ID = (int) $_GET['pid'];

							}

							

							$TYPE = (int) $GLOBALS['TYPE'];

							

							$result = mysql_query("SELECT 

														ID AS MAINID,

														CASE WHEN PID = $ID

														THEN 

														CID

														ELSE PID END AS ID, 

														PRICE AS SPRICE, 

														CASE WHEN PID = $ID

														THEN 

															(SELECT LOGO FROM QK_COLORS WHERE ID = (SELECT ss.COLOR FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) LIMIT 1) 

														ELSE

															(SELECT LOGO FROM QK_COLORS WHERE ID = (SELECT ss.COLOR FROM QK_PRODUCTS ss WHERE ss.ID = PID LIMIT 1) LIMIT 1)

														END AS COLORCODE,

														

														CASE WHEN PID = $ID

														THEN 

														(SELECT pr.VALUE FROM QK_PRODDETVAL pr WHERE pr.TYPEID = 104 AND pr.PID = QK_PRODCONT.CID LIMIT 1) 

														ELSE 

														(SELECT pr.VALUE FROM QK_PRODDETVAL pr WHERE pr.TYPEID = 104 AND pr.PID = QK_PRODCONT.PID LIMIT 1) 	

														END AS MEMSIZE,

														

														

														(SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = CID) AS STARS,

														(SELECT ss.LEFTCOUNT FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS LEFTCOUNT,

														(SELECT ss.REORDER FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PREORDER,

														(SELECT ss.PREORDER_FROM FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PREORDER_FROM,

														(SELECT ss.PREORDER_TO FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PREORDER_TO,

														

														CASE WHEN PID = $ID

														THEN 

															(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1)

														ELSE

															(SELECT ss.NAMEID FROM QK_PRODUCTS ss WHERE ss.ID = PID LIMIT 1) 

														END AS NAMEID,

														

														(SELECT ss.PRICE FROM QK_PRODUCTS ss WHERE ss.ID = CID LIMIT 1) AS PRICE,

														(SELECT ss.IMG FROM QK_PRODUCTS_IMG ss WHERE ss.PRODID = CID ORDER BY QUE ASC LIMIT 1) AS SIMG,

														(SELECT ss.IMG FROM QK_PRODUCTS_IMG ss WHERE ss.PRODID = CID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2

														

									FROM QK_PRODCONT WHERE (PID = $ID OR CID = $ID) AND (SELECT ACTIVE FROM QK_PRODUCTS WHERE ID = PID) = 1 AND (SELECT ACTIVE FROM QK_PRODUCTS WHERE ID = CID) = 1 AND TYPE = $TYPE");  break;

					

					case 999.156:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров

							$ID = (int) $_GET['pid'];

							$result = mysql_query("SELECT p.ID AS PID, p.ID, p.ARTICLE, p.NAMEID, p.DESCID, p.DESCID, p.PREDESCID, p.ONLYSHOP, p.PRICE, ((p.PRICE/100) * p.PREORDERPRICE) AS PERCPRICE,

													(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, (SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = p.ID LIMIT 1) AS IMG

													FROM QK_PRODUCTS p

													WHERE p.ID = $ID

													LIMIT 1");  break;

					case 999.157:	// Вывод Полного Списка Вопросов 

					

							$BROKER = (int) $_SESSION['CUSTOMER'];

							$result = mysql_query("SELECT ID, NAME, ACTIVE, EDATE

													FROM QK_ACROLE 

													WHERE BROKER = $BROKER

													ORDER BY ID ASC");  break;	

					case 999.158:	// Вывод Параметра Галереи Для Редактирования

							$ID = (int) $_GET['gid'];

							$result = mysql_query("SELECT ID, NAME, ACTIVE, EDATE

									FROM QK_ACROLE

									WHERE ID = $ID LIMIT 1"); break;							

					case 999.159:	// Вывод всех партнерев на главную страницу

						

							$GID = (int) $GLOBALS['GID'];

							$result = mysql_query("SELECT ID, ROLEID, OBJID, 

							1 AS CATID, 

							(SELECT NAME FROM QK_PWIND WHERE ID = OBJID) AS NAME, 

							'' AS CATIDNAME 

									FROM QK_ACROLEOBJ

									WHERE  ROLEID = $GID ORDER BY ID ASC");  break;	

					case 999.161:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров +

							$result = mysql_query("SELECT ID, NAME, PERTYPE

													FROM QK_PWIND

													ORDER BY ID ASC LIMIT 50");  break;

													/*DEFAULTS*/

					

					case 666.1:	// Полный Список Языков в Программе 

							$result = mysql_query("SELECT * FROM `QK_LANGS` ORDER BY `id`"); break;

					case 666.2:	// Вывод значение Строковый из языковой библиотеки

								$LANG_ID = $GLOBALS['langID'];

								$TEXT_ID = $GLOBALS['TEXT_ID'];

								$result = mysql_query("SELECT TEXT_VAL

										FROM QK_LANGSVAL

										WHERE LANG_ID = $LANG_ID AND `TEXT_ID`=$TEXT_ID

										LIMIT 1"); break;

					case 666.3:	// Генерация Последнего ID IN LANG MODULE

							$result = mysql_query("SELECT `TEXT_ID` FROM `QK_LANGSVAL` ORDER BY `TEXT_ID` DESC LIMIT 1"); break;

					case 666.4:	// Полный Список Языков в Программе 

							$param = $GLOBALS['lang'];

							$result = mysql_query("SELECT id FROM `QK_LANGS` WHERE `LABEL` = '$param' LIMIT 1"); break;

							

					case 666.5:	// Полный Список Языков в Программе 

							

							$CATID = $GLOBALS['CATID'];

							$PRODID = $GLOBALS['PRODID'];

							$result = mysql_query("SELECT ID FROM QK_PRODUCTS_CATS WHERE PRODID = $PRODID AND CATID = $CATID LIMIT 1"); break;	

							

							

												/*DEFAULTS*/



												/*NEW DEFIS FOR ALL*/

												

					case 888.1:	// Вывод Видов Сделок

							$result = mysql_query("SELECT `id`,`DICTIONTYPE`, `DICTIONVALUE`, `DICTIONNAMEID`,`DICTIONVALUE2`,`DICTIONVALUE3`,`lastEdit`

									FROM `QK_DICTION` WHERE DICTIONTYPE = 'CUSTPHONE'");  break;									

					case 888.2:	// Вывод Видов Сделок

							$result = mysql_query("SELECT DESCTEXT

									FROM QK_INTERIDS WHERE ACTIVE = 1");  break;								

					case 888.3:	// Вывод Видов Сделок

							$ID = (int) $_GET['editCustomer'];

							$result = mysql_query("SELECT `KIND`, `CODE`, `PHONE`, `ISSMS`, `STATE`, `NOTE`

									FROM `QK_CUSTPHONE` WHERE CUST = $ID"); break;

					case 888.4:	// Вывод Видов Сделок

							$ID = (int) $_GET['editCustomer'];

							$result = mysql_query("SELECT `BANKACNT`, `CURRENCY`, `OFBANK`

									FROM `QK_CUSTOMERACNT` WHERE CUST = $ID"); break;

					case 888.5:	// Вывод  Стран

							$result = mysql_query("SELECT `COUNTRY`, `NAMEID`, `QUE`, `ACTIVE`

									FROM `QK_COUNTRY` ORDER BY `QUE` ASC");	break;

					case 888.6:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_COUNTRY`"); break;

					case 888.7:	// Вывод Параметра Вида Сделки Для Редактирования

							$ID = $_GET['editCountry'];

							$result = mysql_query("SELECT `COUNTRY`, `NAMEID`, `QUE`, `ACTIVE`

									FROM `QK_COUNTRY`

									WHERE  `COUNTRY` = '$ID' LIMIT 1");  break;

					case 888.8:	// Вывод  Стран

							$result = mysql_query("SELECT `REGION`, `COUNTRY`, `NAMEID`, `TYPE`, `QUE`, `ACTIVE`

									FROM `QK_CNTREGION` ORDER BY `QUE` ASC");	break;

					case 888.9:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_CNTREGION`"); break;

					case 888.11:	// Вывод Параметра Вида Сделки Для Редактирования

							$ID = $_GET['editRegion'];

							$result = mysql_query("SELECT `REGION`,`COUNTRY`, `NAMEID`, `QUE`, `TYPE`, `ACTIVE`

									FROM `QK_CNTREGION`

									WHERE  `REGION` = '$ID' LIMIT 1");  break;

					case 888.12:	// Вывод  Стран

							$result = mysql_query("SELECT `DISTRICT`, `REGION`, `COUNTRY`, `NAMEID`, `TYPE`, `QUE`, `ACTIVE`

									FROM `QK_CNTDISTRICT` ORDER BY `QUE` ASC");	break;

					

					case 888.13:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_CNTDISTRICT`"); break;		

					

					case 888.14:	// Вывод Параметра Вида Сделки Для Редактирования

							$ID = $_GET['editDistrict'];

							$result = mysql_query("SELECT `DISTRICT`,`REGION`,`COUNTRY`, `NAMEID`, `QUE`, `TYPE`, `ACTIVE`

									FROM `QK_CNTDISTRICT`

									WHERE  `DISTRICT` = '$ID' LIMIT 1");  break;

					

					case 888.15:	// Вывод  Стран

							$result = mysql_query("SELECT `STREET`, `DISTRICT`, `REGION`, `COUNTRY`, `NAMEID`, `TYPE`, `QUE`, `ACTIVE`

									FROM `QK_CNTSTREETS` ORDER BY `QUE` ASC");	break;

					case 888.16:	// Вывод Листа Новостей

							$result = mysql_query("SELECT COUNT(*) AS COUNT

									FROM `QK_CNTSTREETS`"); break;	

					case 888.17:	// Вывод Параметра Вида Сделки Для Редактирования

							$ID = $_GET['editStreet'];

							$result = mysql_query("SELECT `STREET`, `DISTRICT`,`REGION`,`COUNTRY`, `NAMEID`, `QUE`, `TYPE`, `ACTIVE`

									FROM `QK_CNTSTREETS`

									WHERE  `STREET` = '$ID' LIMIT 1");  break;

					



					case 888.18:	// Вывод Полного Списка Категорий Товаров На Страницу Категории Товаров +

							

							if($_POST['cid'] > 0){

								$PRODID = (int) $_POST['cid'];

							}

							else{

								$PRODID = (int) $_GET['cid'];

							}

							

							if($_GET['scid'] > 1){

								$PRODID = (int) $_GET['scid'];

							}

							

							

							if(strlen($_POST['PRICE']) > 0){

								$FROMTO = explode('-', $_POST['PRICE']);

								$FROMTO[0] = preg_replace('/[^0-9]/', '',$FROMTO[0]);

								$FROMTO[1] = preg_replace('/[^0-9]/', '',$FROMTO[1]);

								

								$PRICESQL = "AND ss.PRICE BETWEEN '".$FROMTO[0]."' AND '".$FROMTO[1]."'";

							}

							else{

								$PRICESQL = '';

							}

							

							if($_POST['searchData_gift'][0] == 1){

								$GISTSQL = "AND EXISTS (SELECT 1 FROM QK_PRODCONT WHERE PID = ss.ID AND PRICE = 0 AND TYPE = 2)";

							}

							else{

								$GISTSQL = '';

							}

							if($_POST['searchData_sale'][0] == 1){

								$SALESQL = "AND ss.PRICE < ss.OLDPRICE";

							}

							else{

								$SALESQL = '';

							}

							

							if(count($_POST['searchData_brand']) > 0){

								$brandDatas = $_POST['searchData_brand'];

								$brandSearchString = '';

								

								foreach($brandDatas as $brandData){

									$brandSearchString = $brandSearchString.$brandData.',';

								}

								$brandSearchString = rtrim($brandSearchString,",");

							}

							else{

								$brandSearchString = '0';

								$brandDatas = 'NA';

							}

							

							

							if(count($_POST['searchData_colors']) > 0){

								$colorDatas = $_POST['searchData_colors'];

								$colorSearchString = '';

								

								foreach($colorDatas as $colorData){

									$colorSearchString = $colorSearchString.$colorData.',';

								}

								$colorSearchString = rtrim($colorSearchString,",");

							}

							else{

								$colorSearchString = '0';

								$colorDatas = 'NA';

							}

							

							if(count($_POST['searchData_subCats']) > 0){

								$catDatas = $_POST['searchData_subCats'];

								$catSearchString = '';

								

								foreach($catDatas as $catData){

									$catSearchString = $catSearchString.$catData.',';

								}

								$catSearchString = rtrim($catSearchString,",");

							}

							else{

								$catSearchString = '0';

								$catDatas = 'NA';

							}

							

							if(count($_POST['searchData_cats']) > 0){

								$maincatDatas = $_POST['searchData_cats'];

								$maincatSearchString = '';

								

								foreach($maincatDatas as $maincatData){

									$maincatSearchString = $maincatSearchString.$maincatData.',';

								}

								$maincatSearchString = rtrim($maincatSearchString,",");

							}

							else{

								$maincatSearchString = '0';

								$maincatDatas = 'NA';

							}

							

							$PRODDETVALQUERY = '';

							$locCounter = 1;

							while($locCounter < 1200){

								if(isset($_POST['searchData_TAG_'.$locCounter])){

									$PRODDETVALQUERY = $PRODDETVALQUERY."AND EXISTS (SELECT 1 FROM QK_PRODDETVAL rr WHERE rr.PID = ss.ID AND rr.TYPEID = $locCounter AND EXISTS (SELECT 1 FROM QK_LANGSVAL WHERE TEXT_ID = rr.VALUE AND TEXT_VAL IN(";

									

									

									foreach($_POST['searchData_TAG_'.$locCounter] as $curData){

										

										$PRODDETVALQUERY = $PRODDETVALQUERY."'".$curData."',";

										

									}

									$PRODDETVALQUERY = rtrim($PRODDETVALQUERY,",");

									

									$PRODDETVALQUERY = $PRODDETVALQUERY.")))";

								}

								$locCounter++;

							}

							

						

							if($_POST['byPRICE'] == 1){

								$ORDERBYSTATEMENT = 'ORDER BY ss.PRICE ASC';

							}

							elseif($_POST['bySTAT'] == 1){

								$ORDERBYSTATEMENT = 'ORDER BY STARS DESC';

							}

							else{

								$ORDERBYSTATEMENT = 'ORDER BY ss.QUE ASC';

							}

							

							$SESSIONID = session_id();

							$result = mysql_query("SELECT 

									ss.ID, 

									ss.NAMEID, 

									ss.CRRULESID, 

									(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1) AS SIMG, 

									(SELECT IMG FROM QK_PRODUCTS_IMG WHERE PRODID = ss.ID ORDER BY QUE ASC LIMIT 1, 1) AS SIMG_2, 

									 (SELECT AVG(STARS) FROM QK_PRODUCTS_STARS WHERE PRODID = ss.ID) AS STARS,

									CASE WHEN EXISTS(SELECT 1 FROM QK_WISHLIST WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISWISH,

									CASE WHEN EXISTS(SELECT 1 FROM QK_COMPARE WHERE PRODID = ss.ID AND SESSIONID = '$SESSIONID') THEN 1 ELSE 0 END AS ISCOMP,

									 ss.PRICE, 

									 ss.OLDPRICE, 

									 ss.ONLYSHOP, 

									 ss.MAKER, ss.NEW, ss.PREORDER, ss.PREORDER_FROM, ss.PREORDER_TO, ss.LEFTCOUNT 

														FROM QK_PRODUCTS ss

														WHERE 

														(

															ss.CATID = $PRODID 

															OR ss.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PRODID) 

															OR ss.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID = $PRODID))

														)	

														

														$PRICESQL

														$GISTSQL

														$SALESQL

														AND ss.ACTIVE = 1 AND ss.EXPORTED = 1 

														AND (ss.MAKER IN ($brandSearchString) OR  '$brandDatas' = 'NA') 

														AND (ss.COLOR IN ($colorSearchString) OR  '$colorDatas' = 'NA')

														AND (ss.CATID IN ($catSearchString) OR  '$catDatas' = 'NA')

														AND (

															ss.CATID IN ($maincatSearchString) 

															OR ss.CATID IN (SELECT ID FROM QK_CATEGORIES WHERE PARENTID IN ($maincatSearchString)) 

															OR  '$maincatDatas' = 'NA'

														)

														$PRODDETVALQUERY

														$ORDERBYSTATEMENT");  break;

					

					/*NEW DEFIS FOR ALL*/





					default: die('selection_funkError'); break;

		

					endswitch;

			

			

			

			$finishedQuery = microtime(true);

			$execTime = round($finishedQuery - $startedQuery, 3);

			if($execTime >= 0){

				/*$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];

				$SQLLOG = "INSERT INTO QK_LOGS_SQL (VAL, ONUSER, DATE, execTime) VALUES ('$mode', '$ONUSER', '$DATE', $execTime)";

				mysql_query($SQLLOG) or die(mysql_error());*/

			}

		

		

		

			return dataFilter($result, $mode);

		}

		

		

		

		

		function deleter($mode)

		{

			switch($mode):

				

			case 555.1: //Удаление товара и всех его Данных

				$param = (int) $_GET['departmentID'];	

					$langDatas = mysql_query("SELECT * FROM QK_DEPARTMENTS WHERE `id`=$param");

					$langDatas = mysql_fetch_assoc($langDatas);

					$langDatas = $langDatas['NAMEID'];

					mysql_query("DELETE FROM `QK_LANGSVAL` WHERE `TEXT_ID`=$langDatas");



				$SQLQUE = "DELETE FROM QK_DEPARTMENTS WHERE id=$param";

													

				mysql_query($SQLQUE) or die(mysql_error());								

				

				

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];



				

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		





				

				break;

				

			case 999.2: //Удаление Пользователя

				$param = (int) $_GET['userID'];

					

					$SQLQUE = "DELETE FROM `QK_USERS` WHERE `user_id`=$param LIMIT 1";

					

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

				break;

				

			case 999.3: //Удаление Пользователя

				$param = (int) $_GET['workerID'];

					$photoData = mysql_query("SELECT `IMG` FROM QK_WORKERS WHERE `ID`=$param LIMIT 1");

					$photoData = mysql_fetch_assoc($photoData);

					$photoData = $photoData['IMG'];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/workers/".$photoData;

					unlink($oldImgData);

					}

					

				

					

					$SQLQUE = "DELETE FROM `QK_WORKERS` WHERE `ID`=$param LIMIT 1";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

				break;

				

			case 999.4: //Удаление Проекта

				$param = (int) $_GET['ProjectID'];

					$projectData = mysql_query("SELECT `LOGO`, `NAMEID`, `DESCID` FROM `QK_PRODUCTS` WHERE `ID`=$param LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$photoData = $projectData['LOGO'];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/products/".$photoData;

					unlink($oldImgData);

					}

						/*Удаление Функционала*/

						$projectFuncs = mysql_query("SELECT `ID`, `NAMEID`, `DESCID` FROM `QK_PRODUCTS` WHERE `KIND` = 2 AND `PARENTID` = $param");

							while($projectFunc = mysql_fetch_assoc($projectFuncs)){

								$TMP_NAMEID = $projectFunc['NAMEID'];

								$TMP_DESCID = $projectFunc['DESCID'];

								mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_DESCID)");

							}

						mysql_query("DELETE FROM `QK_PRODUCTS` WHERE `KIND` = 2 AND `PARENTID` = $param");	

						/*Удаление Функционала*/

					

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_DESCID = $projectData['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_DESCID)");

				

					

					$SQLQUE = "DELETE FROM `QK_PRODUCTS` WHERE `ID`=$param LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

					

					

					

				break;

				

				

			case 999.5: //Удаление Функционала

				$ID = (int) $_GET['ID'];

					

				$LANGVALS = mysql_query("SELECT NAMEID FROM QK_DICPRODVAL WHERE ID = $ID LIMIT 1");	

				$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAMEID = $LANGVAL['NAMEID'];

				mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $TMP_NAMEID");

					

				$SQLQUE = "DELETE FROM QK_DICPRODVAL WHERE ID = $ID LIMIT 1";

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				

				

				break;

				

				

			case 999.6: //Удаление Функционала

				$ID = (int) $_GET['ID'];

					

				$LANGVALS = mysql_query("SELECT NAMEID FROM QK_DICPRODGROUP WHERE ID = $ID LIMIT 1");	

				$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAMEID = $LANGVAL['NAMEID'];

				mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $TMP_NAMEID");

					

				mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN (SELECT NAMEID FROM QK_DICPRODVAL WHERE GID = $ID)");

				mysql_query("DELETE FROM QK_DICPRODVAL WHERE GID = $ID");

					

				

				$SQLQUE = "DELETE FROM QK_DICPRODGROUP WHERE ID = $ID LIMIT 1";

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				

				break;

				

			case 999.7: //Удаление Функционала

				$param = (int) $_GET['historyID'];

					/*$photoData = mysql_query("SELECT `IMG`, `IMGHOVERED` FROM `QK_SERVICES` WHERE `ID`=$param LIMIT 1");

					$photoData = mysql_fetch_assoc($photoData);

					$IMG = $photoData['IMG'];

					$IMGHOVERED = $photoData['IMGHOVERED'];

					

					if($IMG != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/".$IMG;

					unlink($oldImgData);

					}

					

					if($IMGHOVERED != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/".$IMGHOVERED;

					unlink($oldImgData);

					}*/

					

					

				$LANGVALS = mysql_query("SELECT `NAMEID`, `SDESCID`,  `DESCID` FROM `QK_HISTORY` WHERE `ID` = $param LIMIT 1");	

					$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAMEID = $LANGVAL['NAMEID'];

				$TMP_SDESCID = $LANGVAL['SDESCID'];

				$TMP_DESCID = $LANGVAL['DESCID'];

				mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_DESCID, $TMP_SDESCID)");

					

		

				$SQLQUE = "DELETE FROM `QK_HISTORY` WHERE `ID`=$param LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				

				

				break;

				

				case 999.8: //Удаление Партнера

				$param = (int) $_GET['PartnerID'];

					$projectData = mysql_query("SELECT `LOGO`, `NAMEID`, `DESCID` FROM `QK_PARTNERS` WHERE `ID`=$param LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$photoData = $projectData['LOGO'];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/partners/".$photoData;

					unlink($oldImgData);

					}

					

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_DESCID = $projectData['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_DESCID)");

					

										

					$SQLQUE = "DELETE FROM `QK_PARTNERS` WHERE `ID`=$param LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

						

					

					

				break;

				case 999.9: //Удаление Новостей

				$param = (int) $_GET['newsID'];

					$projectData = mysql_query("SELECT `IMG`, `NAMEID`, `SDESCID`, `DESCID` FROM `QK_NEWS` WHERE `ID`=$param LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$photoData = $projectData['IMG'];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/news/".$photoData;

					unlink($oldImgData);

					}

					

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_SDESCID = $projectData['SDESCID'];

					$TMP_DESCID = $projectData['DESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_SDESCID, $TMP_DESCID)");

					

					

					$SQLQUE = "DELETE FROM `QK_NEWS` WHERE `ID`=$param LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

					

					

					

				break;

				

				case 999.11: //Удаление Слайдера Фото +

					$ID = (int) $_GET['SliderID'];

					$TAGID = mysql_real_escape_string($_GET['TAGID']);

					$projectData = mysql_query("SELECT $TAGID FROM QK_SLIDER WHERE ID = $ID LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$photoData = $projectData[$TAGID];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/slider/".$photoData;

						unlink($oldImgData);

					}

					

								 

					$SQLQUE = "UPDATE QK_SLIDER SET $TAGID = 'noWIMG.png' WHERE ID = $ID LIMIT 1";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());				

				break;

				

				case 999.12: //Удаление Меню

				$param = (int) $_GET['menuID'];

					$projectData = mysql_query("SELECT `NAMEID`, `CONTENTID` FROM `QK_MENU` WHERE `ID`=$param LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_CONTENTID = $projectData['CONTENTID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_CONTENTID)");

					

					

					$SQLQUE = "DELETE FROM `QK_MENU` WHERE `ID`=$param LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

					

				break;

				case 999.13: // Удаление фотографии галереи +

					$ID = (int) $_GET['ID'];

					mysql_query("DELETE FROM QK_PRODCONT WHERE ID = $ID LIMIT 1");

				

				break;

				

				case 999.14: //Удаление Слайдера

				$ID = (int) $_GET['SliderID'];

					$projectData = mysql_query("SELECT IMG, TITLEID, SDESCID FROM QK_SLIDER WHERE ID = $ID LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$photoData = $projectData['IMG'];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/slider/".$photoData;

					unlink($oldImgData);

					}

					

					$TMP_TITLEID = $projectData['TITLEID'];

					$TMP_SDESCID = $projectData['SDESCID'];

						mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN ($TMP_TITLEID, $TMP_SDESCID)");

					

										

					$SQLQUE = "DELETE FROM QK_SLIDER WHERE ID = $ID LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());				

				break;

				

				

				case 999.15: //Удаление Продукта

				

				$ID = (int) $_GET['productID'];

				

				$photoData = mysql_query("SELECT SIMG, IMG, ARTICLE FROM QK_PRODUCTS WHERE ID = $ID LIMIT 1");

				$photoData = mysql_fetch_assoc($photoData);

				

				$SIMG = $photoData['SIMG'];

				$IMG = $photoData['IMG'];

				$ARTICLE = $photoData['ARTICLE'];

				

				if($SIMG != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/".$SIMG;

					unlink($oldImgData);

				}

				

				if($IMG != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$IMG;

					unlink($oldImgData);

				}

					

					

				$LANGVALS = mysql_query("SELECT NAMEID, DESCID FROM QK_PRODUCTS WHERE ID = $ID LIMIT 1");	

				$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAMEID = $LANGVAL['NAMEID'];

				$TMP_DESCID = $LANGVAL['DESCID'];

				

				mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $TMP_NAMEID");

				mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $TMP_DESCID");

					

				mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $ID OR CID = $ID");

				

				

				$allProdDetVals = mysql_query("SELECT VALUE, ID FROM QK_PRODDETVAL WHERE PID = $ID");

				while($allProdDetVal = mysql_fetch_assoc($allProdDetVals)){

					mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = {$allProdDetVal['VALUE']}");

					mysql_query("DELETE FROM QK_PRODDETVAL WHERE ID = {$allProdDetVal['ID']}");

				}

				

				$allProdImgVals = mysql_query("SELECT IMG, ID FROM QK_PRODUCTS_IMG WHERE PRODID = $ID");

				$locCounter = 0;

				while($allProdImgVal = mysql_fetch_assoc($allProdImgVals)){

					

					$array = explode('.', $allProdImgVal['IMG']);

					$extension = end($array);

					

					copy($_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$allProdImgVal['IMG'], $_SERVER["DOCUMENT_ROOT"]."/img/tmp/".$ARTICLE.'_'.$locCounter.'.'.$extension);

					

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/".$allProdImgVal['IMG'];

					unlink($oldImgData);

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$allProdImgVal['IMG'];

					unlink($oldImgData);

					mysql_query("DELETE FROM QK_PRODUCTS_IMG WHERE ID = {$allProdImgVal['ID']}");

					$locCounter++;

				}

				

				$SQLQUE = "DELETE FROM QK_PRODUCTS WHERE ID = $ID LIMIT 1";

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				

				break;

				

				

			

				

				case 999.16: //Удаление Продукта

				$param = (int) $_GET['articleID'];

					$photoData = mysql_query("SELECT `SIMG`, `IMG` FROM `QK_ARTICLES` WHERE `ID`=$param LIMIT 1");

					$photoData = mysql_fetch_assoc($photoData);

					

					$SIMG = $photoData['SIMG'];

					$IMG = $photoData['IMG'];

					

					if($SIMG != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/small/".$SIMG;

					unlink($oldImgData);

					}

					

					if($IMG != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/artpic/".$IMG;

					unlink($oldImgData);

					}

					

					

				$LANGVALS = mysql_query("SELECT `NAMEID`, `DESCID`, `DESCID` FROM `QK_ARTICLES` WHERE `ID` = $param LIMIT 1");	

					$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAMEID = $LANGVAL['NAMEID'];

				$TMP_SDESCID = $LANGVAL['SDESCID'];

				$TMP_DESCID = $LANGVAL['DESCID'];

				mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_SDESCID, $TMP_DESCID)");

					

					

				

				$SQLQUE = "DELETE FROM `QK_ARTICLES` WHERE `ID`=$param LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				

				break;

				

				

				case 999.17: //Удаление Категории Продукта

				$param = (int) $_GET['ID'];

					$projectData = mysql_query("SELECT `ID`, `NAMEID`, `SDESCID` FROM `QK_CATEGORIES` WHERE `ID`=$param LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_SDESCID = $projectData['SDESCID'];

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_SDESCID)");

					

					$SELECTEDCATID = (int) $projectData['ID'];

						$CATPRODS = mysql_query("SELECT `ID` FROM `QK_PRODUCTS` WHERE CATID = $SELECTEDCATID");

							while($CATPROD = mysql_fetch_assoc($CATPRODS)){

										$productID = (int) $CATPROD['ID'];

											$photoData = mysql_query("SELECT `SIMG`, `IMG` FROM `QK_PRODUCTS` WHERE `ID`=$productID LIMIT 1");

											$photoData = mysql_fetch_assoc($photoData);

											

											$SIMG = $photoData['SIMG'];

											$IMG = $photoData['IMG'];

											

											if($SIMG != 'noWIMG.png'){

											$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/small/".$SIMG;

											unlink($oldImgData);

											}

											

											if($IMG != 'noWIMG.png'){

											$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/prodpic/".$IMG;

											unlink($oldImgData);

											}

											

											

										$LANGVALS = mysql_query("SELECT `NAMEID`, `DESCID` FROM `QK_PRODUCTS` WHERE `ID` = $productID LIMIT 1");	

											$LANGVAL = mysql_fetch_assoc($LANGVALS);

										$TMP_NAMEID = $LANGVAL['NAMEID'];

										$TMP_DESCID = $LANGVAL['DESCID'];

										mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_DESCID)");

											

										

										$PRODUCTS_DESCS = mysql_query("SELECT NAMEID, DESCID FROM QK_PRODUCTS_DESC WHERE PID = $productID LIMIT 1");

										while($PRODUCTS_DESC = mysql_fetch_assoc($PRODUCTS_DESCS)){

											$TMP_NAMEID = $PRODUCTS_DESC['NAMEID'];

											$TMP_DESCID = $PRODUCTS_DESC['DESCID'];

											mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_DESCID)");

										}

										mysql_query("DELETE FROM QK_PRODUCTS_DESC WHERE PID = $productID");

									

										mysql_query("DELETE FROM QK_PRODCONT WHERE PID = $productID");

										mysql_query("DELETE FROM QK_PRODCONT WHERE CID = $productID");

										

										

										

										$SQLQUE = "DELETE FROM QK_PRODUCTS WHERE ID = $productID LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

										$ONUSER = $_SESSION["userNameSurname"];									

										mysql_query($SQLQUE) or die(mysql_error());								

																	

										$SQLQUE = str_replace("'", "-", $SQLQUE);									

										$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

										mysql_query($SQLLOG) or die(mysql_error());	



								}

					

					

					

					$SQLQUE = "DELETE FROM QK_CATEGORIES WHERE `ID`=$param LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

					

				break;

				

				case 999.18: // Удаление фотографии галереи

					$param = (int) $_GET['galIIMGID'];

					$photoData = mysql_query("SELECT `IMG` FROM `QK_PRODUCTS_IMG` WHERE `ID`=$param LIMIT 1");

					$photoData = mysql_fetch_assoc($photoData);

					$photoData = $photoData['IMG'];

					if($photoData != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/partners/".$photoData;

					unlink($oldImgData);

					}

					mysql_query("DELETE FROM `QK_PRODUCTS_IMG` WHERE `ID`=$param LIMIT 1");

				

				break;

				

				case 999.19: //Удаление Человека

				

				

				$param = (int) $_GET['customerID'];

					

				$LANGVALS = mysql_query("SELECT `NAME`, `SNAME`, `FNAME` FROM `QK_CUSTOMER` WHERE `CUSTOMER` = $param LIMIT 1");	

					$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAME = $LANGVAL['NAME'];

				$TMP_SNAME = $LANGVAL['SNAME'];

				$TMP_FNAME = $LANGVAL['FNAME'];

				mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAME, $TMP_SNAME, $TMP_FNAME)");

					

					

				

				$SQLQUE = "DELETE FROM `QK_CUSTOMER` WHERE `CUSTOMER`=$param LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());







				$SQLQUE = "DELETE FROM `QK_CUSTOMERACNT` WHERE `CUST`=$param LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());	

				

				

				$SQLQUE = "DELETE FROM `QK_CUSTPHONE` WHERE `CUST`=$param LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());	

				

				

				break;

				

				

				

				case 999.21: //Удаление Страны

				$param = $_GET['countryID'];

					

				$LANGVALS = mysql_query("SELECT `NAMEID` FROM `QK_COUNTRY` WHERE `COUNTRY` = '$param' LIMIT 1");	

					$LANGVAL = mysql_fetch_assoc($LANGVALS);

				$TMP_NAME = $LANGVAL['NAMEID'];

				mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_NAME)");

					

					

				

				$SQLQUE = "DELETE FROM `QK_COUNTRY` WHERE `COUNTRY`='$param' LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());







				$SQLQUE = "DELETE FROM `QK_CNTREGION` WHERE `COUNTRY`='$param' LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());	

				

				

				$SQLQUE = "DELETE FROM `QK_CNTDISTRICT` WHERE `COUNTRY`='$param' LIMIT 1";

									$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());	

				

				

				break;

				

				case 999.23: //Удаление Модели

				$ID = (int) $_GET['ID'];

				

				$projectData = mysql_query("SELECT id AS ID, DICTIONNAMEID, DICTIONVALUE2 FROM QK_DICTION WHERE id = $ID LIMIT 1");

				$projectData = mysql_fetch_assoc($projectData);

					

				$TMP_DICTIONNAMEID = $projectData['DICTIONNAMEID'];

				mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $TMP_NAMEID");

					

				$DICTIONVALUE2 = $projectData['DICTIONVALUE2'];

				

				if($DICTIONVALUE2 != 'noWIMG.png'){

					$oldImgData = $_SERVER["DOCUMENT_ROOT"]."/img/brands/".$DICTIONVALUE2;

					unlink($oldImgData);

				}

											



					

				$SQLQUE = "DELETE FROM QK_DICTION WHERE id = $ID LIMIT 1";

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];								

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

					

					

				break;

				

				case 999.24: // Удаление продукта из корзины + 

					$ID = (int) $_GET['ID'];

					mysql_query("DELETE FROM QK_COMPARE WHERE ID = $ID LIMIT 1");

				break;

				

				

				case 999.25: //Удаление Заказа

				$param = (int) $_GET['orderID'];

				

				

				$SQLQUE = "DELETE FROM `QK_ORDERS_LIST` WHERE `ORDERID`=$param LIMIT 1";

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				

				

				$SQLQUE = "DELETE FROM `QK_ORDERS` WHERE `ID`=$param LIMIT 1";

				$DATE = date("Y-m-d H:i:s");

				$ONUSER = $_SESSION["userNameSurname"];									

				mysql_query($SQLQUE) or die(mysql_error());								

											

				$SQLQUE = str_replace("'", "-", $SQLQUE);									

				$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

				mysql_query($SQLLOG) or die(mysql_error());		

				

				break;

				

				case 999.26: // Удаление продукта из заказа

					$param = (int) $_GET['galIIMGID'];

					mysql_query("DELETE FROM `QK_ORDERS_LIST` WHERE `ID`=$param LIMIT 1");

				

				break;

				

				case 999.27: // Удаление продукта из корзины + 

					$param = (int) $_GET['galIIMGID'];

					mysql_query("DELETE FROM QK_BASKET WHERE ID = $param LIMIT 1");

				break;

				

				case 999.28: //Удаление Категории Продукта

				$param = (int) $_GET['ContractTypeID'];

					$projectData = mysql_query("SELECT DICTIONNAMEID FROM QK_DICTION WHERE id=$param LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					

					$TMP_DICTIONNAMEID = $projectData['DICTIONNAMEID'];

					

						mysql_query("DELETE FROM `QK_LANGSVAL` WHERE TEXT_ID IN ($TMP_DICTIONNAMEID)");

					

					

					

					$SQLQUE = "DELETE FROM QK_DICTION WHERE id=$param LIMIT 1";

					

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

					

				break;

				

				case 999.29: //Удаление Партнера

					$ID = (int) $_GET['ID'];

					$projectData = mysql_query("SELECT LOGO, NAMEID FROM QK_COLORS WHERE ID = $ID LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$TMP_NAMEID = $projectData['NAMEID'];

					mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID = $TMP_NAMEID");			

					$SQLQUE = "DELETE FROM QK_COLORS WHERE ID = $ID LIMIT 1";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

				break;

				

				case 999.31: //Удаление Партнера

					$ID = (int) $_GET['ID'];

					

					$SQLQUE = "DELETE FROM QK_EMAIL WHERE ID = $ID";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

				break;

				

				case 999.32: //Удаление Партнера

					$ID = (int) $_GET['ID'];

					

					$SQLQUE = "DELETE FROM QK_DICTIONCLASS WHERE ID = $ID";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

				break;

				

				case 999.33: //Удаление Слайдера

				$ID = (int) $_GET['AddrID'];

					$projectData = mysql_query("SELECT NAMEID, SDESCID, DESCID FROM QK_ADDR WHERE ID = $ID LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_SDESCID = $projectData['SDESCID'];

					$TMP_DESCID = $projectData['DESCID'];

					mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_SDESCID, $TMP_DESCID)");

					$SQLQUE = "DELETE FROM QK_ADDR WHERE ID = $ID LIMIT 1";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());				

				break;

				

				

				case 999.34: //Удаление Слайдера

				$ID = (int) $_GET['GroupID'];

					

					mysql_query("DELETE FROM QK_GROUP_INC WHERE GID = $ID");

					$SQLQUE = "DELETE FROM QK_GROUP WHERE ID = $ID LIMIT 1";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());				

				break;

				

				case 999.35: // Удаление фотографии галереи +

					$ID = (int) $_GET['ID'];

					mysql_query("DELETE FROM QK_GROUP_INC WHERE ID = $ID LIMIT 1");

				

				break;

				

				

				case 999.36: //Удаление Слайдера

				$ID = (int) $_GET['GroupID'];

					

					mysql_query("DELETE FROM QK_LABELGROUPS_INC WHERE GID = $ID");

					$SQLQUE = "DELETE FROM QK_LABELGROUPS WHERE ID = $ID LIMIT 1";

					$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());			

				

				case 999.37: //Удаление Меню

				$ID = (int) $_GET['menuID'];

					$projectData = mysql_query("SELECT NAMEID, JOBNAMEID, DESCID FROM QK_WORKERS WHERE ID = $ID LIMIT 1");

					$projectData = mysql_fetch_assoc($projectData);

					

					$TMP_NAMEID = $projectData['NAMEID'];

					$TMP_JOBNAMEID = $projectData['JOBNAMEID'];

					$TMP_DESCID = $projectData['DESCID'];

					mysql_query("DELETE FROM QK_LANGSVAL WHERE TEXT_ID IN ($TMP_NAMEID, $TMP_JOBNAMEID, $TMP_DESCID)");

					

					

					$SQLQUE = "DELETE FROM QK_WORKERS WHERE ID = $ID LIMIT 1";

										$DATE = date("Y-m-d H:i:s");

					$ONUSER = $_SESSION["userNameSurname"];								

					mysql_query($SQLQUE) or die(mysql_error());								

												

					$SQLQUE = str_replace("'", "-", $SQLQUE);									

					$SQLLOG = "INSERT INTO QK_LOGS (VAL,ONUSER,DATE) VALUES ('$SQLQUE', '$ONUSER', '$DATE')";			

					mysql_query($SQLLOG) or die(mysql_error());		

					

					

				break;

				

				case 999.38: // Удаление фотографии галереи +

					$ID = (int) $_GET['ID'];

					mysql_query("DELETE FROM QK_ACROLEOBJ WHERE ID = $ID LIMIT 1");

				

				break;

				

			default: die('deleter_funkError'); break;

			

			endswitch;

		

		

		return $result;

		

		}

?>

