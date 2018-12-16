<?php
  require "configAdmin.php";
  require "include/head.php";

  // Код для добавления категории в базу.
    $data = $_POST;
    if(isset($data['do_addCat'])){
      $addCatAdmin = $dbA->prepare("INSERT INTO `Cat` (`title`) VALUES (:title) ");
      $addCatAdmin->execute(
        array(
          ':title' => $data['cat_title']
        )
      );
    }

// Код для отображения существующих статей.
  $cat_in_databases = $dbA->prepare("SELECT * FROM `Cat`");
  $cat_in_databases->execute();
  $cat_in_databasesF = $cat_in_databases->fetchAll();

?>

<div id="catContaner">
  <form class="" action="" method="post">
    <input type="text" name="cat_title">
    <button type="submit" name="do_addCat">Добавить категорию</button>
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
