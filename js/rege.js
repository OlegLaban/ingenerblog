var	regInput = document.getElementsByClassName("regInput");
	var	regInputAr = [];
	var p = document.getElementById("er");
	function regIn(){
		
		for(var i = 0; i < regInput.length; i++){
			regInputAr[i] = regInput[i].value; 
		}
	}
	
	function funcSuccess(data){
		console.log(data);
		data = JSON.parse(data);
		if(data['bool'] == 1){
				p.innerHTML = data['error'];
		}else if(data['bool'] == 0){
				p.style.color="green";
				p.innerHTML = "Регистрация прошла";
				
		}
	}
	
	$(document).ready(function(){
		
		$("#subBut").bind("click", function(){
			
				regIn();
				$.ajax({
						url: "../controllers/regController.php",
						type: "POST",
						data: ({ name: regInputAr[0], login: regInputAr[1], email: regInputAr[2], password: regInputAr[3], passwordRepeat: regInputAr[4], tokenCsrf: regInputAr[5]}),
						dataType: "html",
						success: funcSuccess
				});
			});
		});


