<?php
$id = $_GET['id'];
//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=project1', 'root', '');

$query = "
SELECT tbl_comment.*, san_pham.ten_san_pham 
FROM (tbl_comment inner join san_pham on san_pham.id = tbl_comment.id_san_pham)
WHERE parent_comment_id = '0' and id_san_pham = '$id'
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading" > &ensp; By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">&ensp; '.$row["comment"].'</div>
  <div class="panel-footer" ><button type="button" class = "reply"id="'.$row["comment_id"].'">Trả lời</button></div>

 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $id = $_GET['id'];
 $query = "
 SELECT 
 tbl_comment.*, san_pham.ten_san_pham 
 FROM (tbl_comment inner join san_pham on san_pham.id = tbl_comment.id_san_pham)
  WHERE parent_comment_id = '".$parent_id."' and id_san_pham = '$id'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 40;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading"> &ensp; By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">&ensp;'.$row["comment"].'</div>
    <div class="panel-footer" ><button type="button" class = "reply" id="'.$row["comment_id"].'">Trả lời</button></div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>
