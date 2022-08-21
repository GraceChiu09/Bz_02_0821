<!-- 分為初始 投票 結果 -->
目前位置: 首頁>問卷調查

<?php
$sw = 0;
if(!empty($_GET['vote'])) $sw =1;
if(!empty($_GET['show'])) $sw =2;
switch($sw){
  case '1':
    break;
  case '2':
    <?php
    break;
    default:
    ?>
    <table>
    <tr>
        <td valign=top>編號</td>
        <td valign=top>問卷題目</td>
        <td>投票總數</td>
        <td>結果</td>
        <td>狀態</td>
        </tr>




    </table>



  break; 



}
?>