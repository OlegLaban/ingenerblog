<?php
  require "configAdmin.php";
  require "include/head.php";
  $data_id_art = (int) $_GET['id_art'];

  $date_From_Data_Bases = $dbA->prepare("SELECT articles.title_art, articles.text_art, articles.img, Cat.title, podCat.title_pod_cat FROM `articles` INNER JOIN `Cat` ON (Cat.id = articles.id_Cat) INNER JOIN `podCat` ON (podCat.id = articles.id_pod_Cat) WHERE articles.id= :id_art");
  $date_From_Data_Bases->execute(
    array(
      ':id_art' => (int) $data_id_art
      )
  );

$date_From_Data_BasesF = $date_From_Data_Bases->fetch();

  //Получаем данные для "select категорий"
    $dbCatData = $dbA->prepare("SELECT * FROM `Cat`");
    $dbCatData->execute();
    $ArrayCatData = $dbCatData->fetchAll();


  //end Получаем данные для "select категорий"
?>

  <div id="form">
    <p id="mess"></p>
    <div class="textForm">
      <form action="">
        <h2>Название статьи</h2>
        <input id="nameArt" type="text" name="titleArt" value="<?php echo $date_From_Data_BasesF['title_art']; ?>"><br>
        <h3>Главное изображение</h3>
        <input id="imgArt" type="text" name="imgArt" value="<?php echo $date_From_Data_BasesF['img'] ; ?>">
        <h2>Текст статьи</h2>
        <textarea id="textArt"><?php echo $date_From_Data_BasesF['text_art']; ?></textarea><br>

        <div class="catPodcat">
            <div>
              <h2>Категория</h2>
              <select id="Cat" class="" name="category">
                <option value="0">Выберите категорию</option>
                <?php foreach ($ArrayCatData as $val) {?>
                  <option value="<?php echo $val['id'];?>" <?php if( trim($date_From_Data_BasesF['title']) == trim($val['title']) ){ echo "selected='selected'";}?>><?php echo $val['title']; ?></option>
              <?php  } ?>
              </select>
            </div>
            <div>
              <h2>Подкатегория</h2>
              <select id="podCat" class="" name="podcategory">

              </select>
            </div>
        </div>
        <br>

      </form>
      <button id="Asub">Сохранить статью</button>
    </div>
    <div id="imgForm">
      <form method="post" action="" enctype="multipart/form-data">
        <h2>Изображения</h2>
        <input type="file" name="img" multiple id="myImg">
        <input type="button" name="subImg" value="Загрузить" id="addImg">
        <div id="myFormStatus">

        </div>

      </form>
      <div id="addImageResult">

      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
  console.log("work");
      var butAsub = $("#Asub");

      butAsub.bind("click", addArticle);
      function addArticle() {
        console.log("work");
        var objDataArt = {};
        fillData();

        $.ajax({
          url:"/admin/Acontrollers/redArticleController.php",
          type:"POST",
          data:objDataArt,
          dataType:"html",
          success:addArticleSuccess
        });




        // функции для работы функции "addArticle"


            function fillData(){
                   objDataArt[$('#nameArt').attr('id')] = $('#nameArt').val();
                   objDataArt[$('#textArt').attr('id')] = $('#textArt').val();
                   objDataArt[$('#imgArt').attr('id')] = $('#imgArt').val();
                   objDataArt['idCat'] = $("#Cat :selected").val();
                   objDataArt['idpodCat'] = $("#podCat :selected").val();
                   objDataArt['id_art'] = <?php echo $data_id_art; ?>;
                }
            function addArticleSuccess() {
                $("#mess").innerHTML = "Статья добавлена!";
            }


      }

      //ajax для добавления Подкатегорий.
      addDataPodCat();
        var SelCat = $("#Cat");
        SelCat.on("change", addDataPodCat);

        function addDataPodCat() {
          $.ajax({
            url:"/admin/Acontrollers/addToAddArticlesPodCatController.php",
            type:"POST",
            data:{"selCat":$("#Cat :selected").val()},
            dataType:"html",
            success:addPodCatVal
          });
        }



      //end ajax для добавления подкатегорий.

      function addPodCatVal(data){
       var  podCatData = JSON.parse(data), selPodCat = $("#podCat"), htmlPodCat = "<option value=''>Выберите подкатегорию</option>";
         for(var i = 0; i < podCatData.length; i++){
            if( podCatData[i]['title_pod_cat'] == '<?php echo $date_From_Data_BasesF['title_pod_cat'] ; ?>' ){
              sele = "selected='selected'";
            }else{
              sele = ""
            }
           htmlPodCat += "<option " + sele  + " value='" + podCatData[i]['id'] + "' >"+ podCatData[i]['title_pod_cat'] +"</option>";
         }
         selPodCat.html(htmlPodCat);

    }

      // Добавление изображений на сервер посредством ajax

        var formImg = $("#imgForm"), addImg = $("#addImg"), myFormStatus = $("#myFormStatus");


          addImg.on('click', function(){


            var formData = new FormData();
            if( ($("#myImg")[0].files).length != 0 ){
              $.each($("#myImg")[0].files, function(i, file){
                formData.append("file["+ i +"]", file);

              });
            }else{
                myFormStatus.html("Нужно выбрать файлы.");
                return false;
            }
              $.ajax({
                type:"POST",
                url:"/admin/Acontrollers/addImgController.php",
                data:formData,
                cache:false,
                dataType:'json',
                contentType:false,
                processData:false,
                beforeSend:function(){
                  console.log('Запрос начат');
                  myFormStatus.text("Запрос начат");
                  formImg.find('input').prop("disabled", true);
                },
                success:function(data){
                  console.log(data);
                  if(data.status == "ok"){
                    myFormStatus.text('Файлы загружены');
                    $("#myImg").val("");
                  }else{
                    myFormStatus.text("С загрузкой что-то не так");
                  }
                  var addImageResultData = data, addImageResultHtml = $("#addImageResult").html(), addImageResultDiv =  $("#addImageResult");
                  for(var j = 0; j < addImageResultData['files'].length; j++){
                    addImageResultHtml += "<img src='" + addImageResultData['files'][j] + "' style='width:100px;'>" + "<br>" + "&lt;img class='artimgstat' src='" + addImageResultData['files'][j] + "' &gt;" + "<br>";
                  }

                    addImageResultDiv.html(addImageResultHtml);
                },
                complete:function(){
                  console.log("Запрос закончен");
                  formImg.find('input').prop("disabled", false);
                }

              });



          });



      //end Добавление изображений на сервер посредством ajax





    });
  </script>

<?php
  require "include/foot.php";
?>
