

<div class="popularStats">
<h3>Самые просматриваемые статьи:</h3>
<?php foreach ($lastAddStatF as $dataLastAddStat ) {?>
  <div class="popStat">
    <a href="#"><img class="imgPopStat" src="<?php echo SITE_TEMPLATE_PATH?>img/<?php echo $dataLastAddStat['img']; ?>" alt="<?php echo $dataLastAddStat['title_art']; ?>"></a>
    <div class="opisPopStat">
    <span class="namePopStat"><a href="/page/<?php echo $dataLastAddStat['id'];?>/"><strong><?php echo $dataLastAddStat['title_art']; ?></strong></a></span><span class="viePopStat"><?php echo $dataLastAddStat['views']; ?></span>
      <p><?php echo trim(mb_substr($dataLastAddStat['text_art'], 0, 90)) . "... "; ?></p>
    </div>
  </div>
  <div class="clear"></div>
<? } ?>


</div>
<div class="clear"></div>
