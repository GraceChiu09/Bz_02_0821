<?php
include "lib.php";?>

<?php
$admin = (empty($_SESSION['admin']))? "main" : "admin";
$main = (empty($_GET['do'])) ? $admin : $_GET['do'];

;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
	<!-- 規劃選單連結內容 -->
	

<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<!-- <iframe name="back" style="display:none;"></iframe> -->

	<div id="all">
    	<div id="title">
			<!-- 今日日期 用date() -->
			<!-- 今日瀏覽人次 把每天的日期記錄起來 不存在就新增 有新訪客就加1 -->
			<!-- 累計瀏覽人次 跑個迴圈把資料表內所有的數字加起來-->
        <?=date("m 月 d 號 l") ?>| 今日瀏覽: <?= $t3_visit ?> | 累積瀏覽: <?=$t3_visit ?>   </div>
        <a href="index.php" style="float:right;">回首頁</a>
		
		<div id="title2">
		<img src="./icon/02B01.jpg" alt="健康促進網 - 回首頁" title="健康促進網 - 回首頁">
        	
        </div>

        <div id="mm">
        	<div class="hal" id="lef">
            	                	    <a class="blo" href="?do=po">分類網誌</a>
               	                     	    <a class="blo" href="?do=news">最新文章</a>
               	                     	    <a class="blo" href="?do=pop">人氣文章</a>
               	                     	    <a class="blo" href="?do=know">講座訊息</a>
               	                     	    <a class="blo" href="?do=que">問卷調查</a>
               	                 </div>
            <div class="hal" id="main">
            	<div>
            		
                	<marquee style="width:80%; display:inline-block;">請民眾踴躍投稿電子報，讓電子報成為大家相互交流，分享的園地!詳見最新文章</marquee>
                    <span style="width:18%; display:inline-block;"><?= $t6_btn ?></span>
                    <!-- <a href="?do=login" style="float:right ;">會員登入</a> -->
                    	
						<!--  -->
						<div>
						<?php include $main . ".php" ?>
                		</div>
                </div>
            </div>
        </div> 
        <div id="bottom">
		     <div class="ct">本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © <?=date("Y")?>健康促進網社群平台 All Right Reserved</div>
    		 <br>
    		 <div style="float:right">服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45"></div>
        </div>
    </div>

</body></html>