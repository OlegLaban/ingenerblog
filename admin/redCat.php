<?php
  require "configAdmin.php";
  require "include/head.php";

  //Код для изменения Категории
  $data = $_POST;
  $redStat = $_GET['idCat'];
  if(isset($data['button'])){
      $red_cat = $dbA->prepare("UPDATE `Cat` SET `title` = :tit WHERE `id` = :id");
      $red_cat->execute(
        array(
          ':tit' => trim($data['Red_Cat']),
          ':id' => (int) $data['button']
        )
      );
  }


  // Код для отображения существующих статей.
    $cat_in_databases = $dbA->prepare("SELECT * FROM `Cat`");
    $cat_in_databases->execute();
    $cat_in_databasesF = $cat_in_databases->fetchAll();
?>


<div id="catContaner">
    <h3><?php echo $cat_in_databasesF[0][$redStat]; ?></h3>
  <form action="" method="post">
    <input type="text" name="Red_Cat" value="<?php echo $cat_in_databasesF[0][$redStat]; ?>">
    <button type="submit" name="button" value="<?php echo $_GET['idCat'];?>">Изменить категорию</button>
  </form>
</div>
<div>
  <table>
    <tr>
    <td>id</td>
    <td>title</td>
    <td>Удалить</td>
    <td>Изменить</td>
    </tr>
    <?php foreach ($cat_in_databasesF as $cat_in_databasesFore) {?>

    <tr>
    <td><?php echo $cat_in_databasesFore['id'];  ?></td>
    <td><?php echo $cat_in_databasesFore['title'];  ?></td>
    <td> <button type="button" name="button"> <a href="delCat.php?idCat=<?php echo $cat_in_databasesFore['id'];  ?>" >Удалить</a> </button>  </td>
    <td> <button type="button" name="button"> <a href="redCat.php?idCat=<?php echo $cat_in_databasesFore['id']; ?> ">Изменить</a> </button> </td>
    </tr>
<?php } ?>
  </table>
</div>


<?php
  require "include/foot.php";
?>
