<?php
$start = 1;  //最初からの場合は1から
$end = 56; //最後のページを指定する
$page = 'https://osu.ppy.sh/p/beatmaplist?l=1&r=4&q=4k&g=0&la=0&s=7&o=1&m=3';  //検索したときのURLを貼り付けてください。例はKeywords:4K, mode:osu!mania, Rank status;Allで検索したやつです。
$cookie = "cookie:";  //chrome等でリクエストヘッダーの中からcookieを抜き出してください。

mkdir($dirpath, 0777);
for ($start; $start < $end + 1; $start++) {
echo $start."ページ目\n";
	$opts = array(
	  'http'=>array(
	    'method'=>"GET",
	    'header'=>"Accept-language: en\r\n" .
	              $cookie . "\r\n"
	  )
	);
	$context = stream_context_create($opts);
	$file = file_get_contents($page.'&page='.$start, false, $context);
	preg_match_all("/<a class='require-login beatmap_download_link' href='\/d\/(\d+)'>/s",$file,$retArr);
	print_r($retArr[1]);

	for ($i = 0; $i< count($retArr[1]); $i++) {
		exec("wget -O 'osz/'".$retArr[1][$i].".osz --header '" . $cookie ."' https://osu.ppy.sh/d/" . $retArr[1][$i]);
		echo $start . "ページ " .$retArr[1][$i] . " is OK.\n";
	}
}
?>