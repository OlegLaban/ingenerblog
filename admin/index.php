<?php
  require 'include/head.php';
  require 'configAdmin.php';
?>

<?php
  $Aart = $dbA->prepare("SELECT articles.id, articles.title_art, articles.pub_date, articles.views, articles.text_art, articles.img, Cat.title, podCat.title_pod_cat FROM `articles` INNER JOIN `Cat` ON (articles.id_Cat = Cat.id) INNER JOIN `podCat` ON (articles.id_pod_Cat = podCat.id) ");
  $Aart->execute();
  $AartF = $Aart->fetchAll();

?>

<div id="wrapper">
  <table>
    <tr>
      <td> Изображение </td>
      <td>Название статьи</td>
      <td>Текст статьи</td>
      <td>Кол-во просмотров</td>
      <td>Дата публикации</td>
      <td><button><a href="addArticles.php" >Добавить статью</a></button></td>
    </tr>
  <?php foreach ($AartF as $val) {?>
    <tr>
      <td> <img class="imgArt" src="../img/<?php echo $val['img']; ?>" alt="<?php echo strtok($val['img'], '?');?> "> </td>
      <td><?php echo $val['title_art']; ?></td>
      <td class="textArtTable"><?php echo trim(mb_substr($val['text_art'], 0, 100)) . "..."; ?></td>
      <td><?php echo $val['views']; ?></td>
      <td><?php echo $val['pub_date']; ?></td>
        <td><button value="<?php echo $val['id']; ?>"><a href="redArticles.php?id_art=<?php echo $val['id']; ?>">Изменить статью</a></button></td>
        <td><button value=""><a href="delStat.php?id=<?php echo  $val['id']; ?>">Удалить статью</a></button></td>

    </tr>
  <?php } ?>


</table>
</div>


<?php require 'include/foot.php'; ?>
