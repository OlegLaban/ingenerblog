window.onload = function(){

  var dataForm = {}, dataFormValue = document.getElementsByClassName('dataForm');

  function dataF(){
   for( var i = 0; i < dataFormValue.length; i++ ){
     name = dataFormValue[i].name;
     value = dataFormValue[i].value;
      dataForm[name] = value;
    }
    dataForm['id'] = <?php echo (int) htmlspecialchars($_GET['id']); ?>;
  }
  $("#subm").bind("click", addComments);

  function addComments(){
    dataF();
    $.ajax({
      url:"controllers/FormCommentsController.php",
      type:"POST",
      data:dataForm,
      dataType:"html",
      success: successFunc
    });

  };
  function successFunc(data){
    console.log(data);
    $("#textAreaDataForm").val('');
      $("#comments").empty();
    dropData();
  }

}
