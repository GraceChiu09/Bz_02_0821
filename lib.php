<?php

session_start();
// $db=new PDO("mysql:localhost;dbname=db00;charset=utf8","root","",null);
$db=new PDO("mysql:host=127.0.0.1;dbname=db00;charset=utf8","root","",null); 
date_default_timezone_set("Asia/Taipei");

//  select insert、update、delete
// echo $db;

function select($tb, $wh){
    global $db;
    return $db->query(" SELECT * FROM " .$tb. " WHERE " .$wh)->fetchAll();
}

// $field $data
function insert($ary,$tb){
    global $db;
    $field="id";
    $data="null";
    foreach ($ary as $key => $value){
       $field.=",".$key;
       $data.=",'".$value."'";
    }
    $db->query(" INSERT INTO " .$tb. "(".$field.") VALUES (".$data.")");
    return $db->lastInsertId();
}

function update($ary,$tb){
    global $db;
    foreach($ary as $do => $data){
        switch ($do) {
            case 'num+1':
                $db->query(" UPDATE " .$tb. " SET num=num+1 WHERE id=" .$data);
                break;
            case 'num-1':
                $db->query(" UPDATE " .$tb. " SET num=num-1 WHERE id=" .$data);
                break;
            
            default:
                foreach($data as $key => $value)
                $db->query(" UPDATE " .$tb. " SET " .$do. "='" .$value. "' WHERE id=" .$key);
                break;
        }


    }
}

function delete($ary, $tb){
    global $db;
    foreach($ary as $do => $data){
        switch ($do) {
            case 'del':
                foreach($data as $value)
                $db->query(" DELETE FROM " .$tb. " WHERE id=" .$value);
                break;
            case 'delwh':
                $db->query(" DELETE FROM " .$tb. " WHERE id=" .$data);
                break;
            
        }


        
    }
}

function plo($link){
    return header("location:" .$link);
}

function jlo($link){
   return "location.href='" .$link."'";
}

function addfile($file){
    $newname=time()."_".$file['name'];
    copy($file['tmp_name'],"img/.$newname");
    return $newname;

}

function navpage($tb,$wh,$range,$nowpage){
    $total=count(select($tb,$wh));
    $many=ceil($total / $range);
    $pg['<']=($nowpage==1)?$nowpage:$nowpage-1;
    for ($i=1; $i <$many ; $i++) $pg[$i]=$i;
    $pg['>']=($nowpage==$many)?$many:$nowpage+1;
    return $pg;

}
//t3
$re = select("q2t3_visit","date='" . date("Y-m-d") . "'");//檢查今日是否存在
if ($re == null) {//資料庫內尚未持有今日資訊
    $post['num'] = 0;
    $post['date'] = date("Y-m-d");
    $id = insert($post, "q2t3_visit");
    $t3_visit = 0;//拜訪數據0
    // $t3_visit
   
}else{
    $id = $re[0]['id'];
    $t3_visit = $re[0]['num'];//下載拜訪數據
}

if (empty($_SESSION['visit'])) {//檢查若為新訪客
    $_SESSION['visit'] = true;
    $_POST['num+1'] = $id;
    update($_POST,"q2t3_visit");//資料庫數據+1
    $t3_visit++;//拜訪數據+1

}

$re = select("q2t3_visit", 1);
$t3_total = 0;
foreach($re as $ro) $t3_total += $ro['num'];//統計總數

//t6
$t6_btn = 
   (empty($_SESSION['user'])) ?
   '<a href="?do=login">會員登入</a>' :
   '歡迎, ' . $_SESSION['user'] . '<a href="api.php?do=logout" style="border: solid 1px #000">登出</a>';
?>