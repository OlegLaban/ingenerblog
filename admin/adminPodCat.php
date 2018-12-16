<?php
  require "configAdmin.php";
  require "include/head.php";
 $data = $_POST;
  if(isset($data['button'])){
    $add_pod_cat = $dbA->prepare("INSERT INTO `podCat` (`title_pod_cat`, `id_Cat`) VALUES (:title_pod_cat, :id_Cat)");
    $add_pod_cat->execute(
      array(
        ':title_pod_cat' => trim($data['podCat']),
        ':id_Cat' => (int) $data['selCat']
      )
    );
	
  }

  $pod_cat = $dbA->prepare("SELECT podCat.id, podCat.title_pod_cat, Cat.title, Cat.id as idCat FROM `podCat` INNER JOIN `Cat` ON (Cat.id = podCat.id_Cat)");
  $pod_cat->execute();
  $pod_catF = $pod_cat->fetchAll();

  $cat = $dbA->prepare("SELECT * FROM `Cat`");
  $cat->execute();
  $catF = $cat->fetchAll();

  

?>

  <div class="formAddPodCat">
    <form action="" method="post">
      <input type="text" name="podCat">
      <select name="selCat">
        <option value="0">Выберете категорию</option>
        <?php foreach ($catF as $key ) {?>
            <option value="<?php echo $key['id']; ?>"><?php echo $key['title']; ?></option>
        <?php } ?>
      </select>
      <button type="submit" name="button"  >Дабавить</button>
    </form>
  </div>

<table>
  <tr>
    <td>id подкатегории</td>
    <td>Название подкатегории</td>
    <td>Название категориии</td>
    <td>id категории</td>
    <td>Изменить</td>
    <td>Удалить</td>
  </tr>
  <?php foreach ($pod_catF as $pod_catFor ) {?>
    <tr>
      <td><?php echo $pod_catFor['id']; ?></td>
      <td><?php echo $pod_catFor['title_pod_cat']; ?></td>
      <td><?php echo $pod_catFor['title']; ?></td>
      <td><?php echo $pod_catFor['idCat']; ?></td>
      <td><button type="button" name="button"><a href="redPodCat.php?id_pod_Cat=<?php echo $pod_catFor['id']; ?>">Изменить</button></td>
      <td><button type="button" name="button" > <a href="delpodCat.php?id_pod_Cat=<?php echo $pod_catFor['id']; ?>">Удалить</a></button></td>
    </tr>
  <?php } ?>

</table>



<?php
  require "include/foot.php";
?>
