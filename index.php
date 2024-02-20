<?php
// ver = 2.0.0

$CLOAKING['WHITE_ajksdh128h'] = 'index1.html';
$CLOAKING['OFFER_ajksdh128h'] = 'index1.html';


//--------------------------------------------------------------------------------------//
renameIndexHtml(); // Кастомная функция для быстрого переименования файлов и ссылок
//При использовании параметра к URL ?ip, выводит ip клиента, например domain.com/?ip
if(Get_Parameter_URL() == 'ip'){echo MyIp();}
//--------------------------------------------------------------------------------------//

//Вывод текущего домена с протоколом https или http
function current_url_protocol() {
    $current_url  = 'http';
    $server_https = $_SERVER["HTTPS"];
    $server_name  = $_SERVER["SERVER_NAME"];
    if ($server_https == "on") $current_url .= "s";
    $current_url .= "://";
    $current_url .= $server_name;
    return $current_url;
}
//Вывод текущего домена
function current_url() {
    // $current_url  = 'http';
    $server_https = $_SERVER["HTTPS"];
    $server_name  = $_SERVER["SERVER_NAME"];
    // if ($server_https == "on") $current_url .= "s";
    // $current_url .= "://";
    $current_url .= $server_name;
    return $current_url;
}
//Вывод текущего протокола https или http
function current_protocol() {
    $current_url  = 'http';
    $server_https = $_SERVER["HTTPS"];
    $server_name  = $_SERVER["SERVER_NAME"];
    if ($server_https == "on") $current_url .= "s";
    return $current_url;
}



if (empty($CLOAKING['banReason']) && !empty($CLOAKING['STATUS']) && !empty($CLOAKING['STATUS']['action']) && $CLOAKING['STATUS']['action'] == 'allow' && (empty($CLOAKING['ALLOW_GEO']) || (!empty($CLOAKING['STATUS']['geo']) && !empty($CLOAKING['ALLOW_GEO']) && stristr($CLOAKING['ALLOW_GEO'],$CLOAKING['STATUS']['geo'])))) {
    cloakedOfferajksdh128h($CLOAKING['OFFER_ajksdh128h'],$CLOAKING['OFFER_METHOD'],$CLOAKING['UTM'],$CLOAKING['STATUS']['geo']);
}
else {
    cloakedWhiteajksdh128h($CLOAKING['WHITE_ajksdh128h'],$CLOAKING['WHITE_METHOD'],$CLOAKING['UTM'],$CLOAKING['STATUS']['geo']);
}

function cloakedWhiteajksdh128h($white,$method='curl',$utm=false,$req_country=''){
    if(substr($white,0,8)=='https://' || substr($white,0,7)=='http://') {

    }
    else {require_once($white);}// bots
    die();
}

die();




//Кастомные функции от Михаила//
function renameIndexHtml(){
	$old_name = "index.html"; //$old_name - Какой файл найти для переименования.
	$new_name = "index1.html"; //$new_name - На какое имя переименовать
	if(file_exists($new_name)){ 
	// if(1 == 2){ 
		//если найден файл с названием index1.html, то ничего не делаем
	}else{
		if (rename( $old_name, $new_name)) {
		// if (1 == 1) {
			echo '<style>
					.php_replase{
						position: relative;
						z-index: 99999;
						text-align: center;
						background: #31537c;
						padding: 5px;
						color: white;
						font-size: 1vw;
						width: 100%;
						margin: 0;
					}
					.php_rename {
						position: fixed;
						z-index: 9999;
						text-align: center;
						background: #31537c;
						padding: 15px;
						color: white;
						font-size: 30px;
						display: flex;
						justify-content: center;
						top: 0px;
						left: 0px;
						width: 100vw;
						height: 100vh;
						align-items: center;
						flex-direction: column;
						overflow: auto;
					}
					.php_file{
						padding: 5px;
						color: #ffc400;
					}
				</style>';
		echo '<div class="php_rename">';
		
		echo '<p class="php_replase">Найден файл ' . $old_name . ' и он переименовыван в ' . $new_name . '</p>';
		
		
		$sitemapArray;
		$sitemapArray .= '<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
			$sitemapArray .= '
			<url>';
				$sitemapArray .= '
				<loc>https://' . current_url() . '/</loc>';
				$sitemapArray .= '
				<lastmod>' . date("Y-m-d") . '</lastmod>';
				$sitemapArray .= '
				<changefreq>weekly</changefreq>';
				$sitemapArray .= '
				<priority>1.0</priority>';
			$sitemapArray .= '
			</url>';

		foreach(glob(dirname(__FILE__) . '/*.html') as $file) {
			$file_path = basename($file);
			echo $file_path;
			echo '<br>';

		if($file_path == 'index1.html' || $file_path == 'index.html' || $file_path == 'home.html' || $file_path == 'home1.html'){

		}else{
			$sitemapArray .= '
			<url>';
				$sitemapArray .= '
				<loc>https://' . current_url() . '/' . $file_path . '/</loc>';
				$sitemapArray .= '
				<lastmod>' . date("Y-m-d") . '</lastmod>';
				$sitemapArray .= '
				<changefreq>weekly</changefreq>';
				$sitemapArray .= '
				<priority>1.0</priority>';
			$sitemapArray .= '
			</url>';
		}






			$file_content = file_get_contents($file_path);
			$file_content = str_replace('index.html', '/', $file_content);
			$file_content = str_replace('_blank', '_self', $file_content);
			file_put_contents($file_path, $file_content);
			echo '<p class="php_replase">В файле (' . $file_path . ') найдена гиперссылка index.html, переименовываем ссылку с index.html в index1.html</p>';
		}
		$sitemapArray .= '
	</urlset>';
		if(file_put_contents('sitemap.xml', $sitemapArray)){
			echo '<p class="php_file">Файл sitemap.xml сгенерирован</p>';
		}else{
			echo '<p class="php_file">Ошибка генерации sitemap.xml</p>';
		}

		// $robots = file_get_contents(__DIR__.'/robots.txt');
		// if($robots !== false){
			// echo 'Файл открыт';
		// }else{
			// echo 'Файла нет';
		// }
        
        $new_robots = 'User-agent: *
Allow: /
Sitemap: https://'. current_url() .'/sitemap.xml';
        
		if(file_put_contents(__DIR__.'/robots.txt' , $new_robots)){
			echo '<p class="php_file">Файл robots.txt сгенерирован</p>';
		}else{
			echo '<p class="php_file">Ошибка генерации robots.txt</p>';
		}

		echo '</div>';
		}
	}
}
function Get_Parameter_URL(){
	$parse_URL = array(
					'scheme' => '',
					'host' => '',
					'path' => '',
					'query' => '',
				);
	$parse_URL = parse_url(((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	if(!empty($parse_URL["query"])){
		return $parse_URL["query"];
	}else{
		return;
	}
	
}
function MyIp(){
	$value = '';
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$value = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$value = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
		$value = $_SERVER['REMOTE_ADDR'];
	}
	return '<p class="php_replase">' . $value . '</p><style>
					.php_replase{
						position: relative;
						z-index: 99999;
						text-align: center;
						background: #31537c;
						padding: 5px;
						color: white;
						font-size: 4vw;
						width: 100%;
						margin: 0;
					}
					.php_file{
						padding: 5px;
						color: #ffc400;
					}
					</style>';
}
//Кастомные функции от Михаила//
?>