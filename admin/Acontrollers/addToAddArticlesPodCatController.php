<?php
  require "../configAdmin.php";
  $data = $_POST;
  $dbPodCatData = $dbA->prepare("SELECT * FROM `podCat` WHERE `id_Cat` = :sel_pod_Cat");
  $dbPodCatData->execute(
    array(
      ':sel_pod_Cat' => (int) $data['selCat'],
    )
  );

  $Arrat_Pod_Cat_Data = $dbPodCatData->fetchAll();
    echo json_encode($Arrat_Pod_Cat_Data);

?>
