osu!Downloader
===========

##What is it?

osu!の譜面を自動で一括ダウンロードするプログラム。  
やばそうだったら消します。  
phpで適当に作ってますが、[osu!Notification](https://github.com/flum1025/osu_Notification)のosu_api.rbのget_beatmaps使って作ったほうが詳細に作れたかもしれません。  
osu!Notificationより先に作っちゃったから仕方ないね。  
スレッド化してないので譜面が大量にあると結構時間かかります。  
40譜面x５２ページで８時間ぐらいかかってます。  
気が向いたらosu_api.rb使ってrubyで作り直します。  
  
動作確認はubuntu14.04 PHP 5.5.9-1ubuntu4.5です。

##How to Use
まずchromeとか使ってリクエストヘッダーの中身からcookieを抜き出してosu-downloader.phpの$cookieに指定してください。  
次にosuのページから一括でダウンロードしたいものを検索しそのページのURLをosu-downloader.phpの$pageに指定してください。  
検索結果のページから検索結果が何ページあるかを確認し、$endにそのページ数を指定してください。  
$startと$endを変更すれば特定のページから特定のページまでをダウンロードするといったこともできます。  
実行した後./oszの中に譜面データが格納されているはずです。  
```
> git clone https://github.com/flum1025/osu_Downloader.git
> cd osu_Downloader
> php osu_Downloader.php

```


質問等ありましたらTwitter:[@flum_](https://twitter.com/flum_)までお願いします。

##License

The MIT License

-------
(c) @2015 flum_
