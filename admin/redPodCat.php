<?php
  require "configAdmin.php";
  require "include/head.php";
  $data_id_pod_Cat = (int) $_GET['id_pod_Cat'];
  $data = $_POST;
  if(isset($data['button'])){
    $red_pod_cat = $dbA->prepare("UPDATE  `podCat` SET `title_pod_cat` = :title_pod_cat, `id_Cat` = :id_Cat WHERE `id` = :id_pod_cat");
  $red_pod_cat->execute(
      array(
        ':title_pod_cat' => trim($data['podCat']),
        ':id_Cat' => (int) $data['selCat'],
        ':id_pod_cat' => (int) $data_id_pod_Cat
      )
    );
    header("Location: adminPodCat.php");
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
      <h1><?php echo $pod_catF[0][$data_id_pod_Cat];?></h1>
      <input type="text" name="podCat">
      <select name="selCat">
        <option value="0">Выберете категорию</option>
        <?php foreach ($catF as $key ) {?>
            <option value="<?php echo $key['id']; ?>"><?php echo $key['title']; ?></option>
        <?php } ?>
      </select>
      <button type="submit" name="button">Изменить</button>
    </form>
  </div>

<table>
  <tr>
    <td>id подкатегории</td>
    <td>Название подкатегории</td>
    <td>Название категориии</td>
    <td>id категории</td>
  </tr>
  <?php foreach ($pod_catF as $pod_catFor ) {?>
    <tr>
      <td><?php echo $pod_catFor['id']; ?></td>
      <td><?php echo $pod_catFor['title_pod_cat']; ?></td>
      <td><?php echo $pod_catFor['title']; ?></td>
      <td><?php echo $pod_catFor['idCat']; ?></td>
    </tr>
  <?php } ?>

</table>



<?php
  require "include/foot.php";
?>
