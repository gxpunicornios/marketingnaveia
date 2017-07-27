<?php 
if(!isset($_GET['url']) || empty($_GET['url'])){
  include 'home.php';
}
else{
  $result = explode('/',$_GET['url']);

$url = $result[0].".php";


if($result > 1 && !empty($result[1])){
  $_GET['seo'] = $result[1];
}
  //str_replace("/","",$_GET['url']) . '.php';

  // if(isset($_GET['id']) && !empty($_GET['id'])){
  //   $url = $url .'?id='.$_GET['id'];
  // }
  
  include $url;

}
?>