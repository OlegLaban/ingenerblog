<?php
  $limit = 2;
  if(isset($_GET['page'])){
    $page = intval($_GET['page']);
  }else{
    $page = 1;
  }

  $total_count = $db->prepare("SELECT COUNT(`id`) AS `total_page` FROM `articles`");
  $total_count->execute();
  $total_count_result = (int) $total_count->fetch(PDO::FETCH_ASSOC)['total_page'];
  $total_pages = ceil($total_count_result / $limit);
  if($page < 1 || $page > $total_pages){
    $page = 1;
  }
  $art = ($page * $limit) - $limit;
