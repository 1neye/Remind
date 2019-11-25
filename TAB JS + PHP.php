
<?php 

$connect = mysqli_connect('localhost', 'root', '', 'cmslesson') or die("ОШИБКА:" .mysqli_error());

function addForm($connect){
	


	if((isset($_POST['first_name'])) && (isset($_POST['last_name'])) && (isset($_POST['mail']))){
		$first_name = trim(htmlspecialchars($_POST['first_name']));
		$last_name  = trim(htmlspecialchars($_POST['last_name']));
		$mail 		= trim(htmlspecialchars($_POST['mail']));
		$phone 		= trim(htmlspecialchars($_POST['phone']));
		$nick 		= trim(htmlspecialchars($_POST['nick']));
		$else 		= trim(htmlspecialchars($_POST['else']));
		$query = "INSERT INTO multform VALUES (NULL, '".$first_name."', '".$last_name."','".$mail."','".$phone."','".$nick."','".$else."')";
		$res = mysqli_query($connect, $query);
	}
}


addForm($connect);



?>

<style>
form{
	margin: 0 auto;
	width: 100%;
	display: flex;
	justify-content: center;
	flex-flow: column;
	background: #ccc;
	align-items: center;
}
button{
	padding: 20px;
	border: 1px solid #fff;
	color: #fff;
	background: #000;
}
.tab{
	display: block;
}
.button__wrapper{
	display: 	flex;
	flex-flow: row nowrap;
}
</style>


<form id='regForm' action="" method='post'>
	
	<h1>MULTI FORM</h1>
	<div class="tab">
	<p><input placeholder="First name" type="text" name='first_name'></p>
	<p><input placeholder="Last name" type="text" name='last_name'></p>
	</div>
	<div class="tab">
		<p><input placeholder="E-mail..." type="text" name='mail'></p>
		<p><input placeholder="PHONE" type="text" name='phone'></p>
	</div>
	<div class="tab">
		<p><input placeholder="Nick" type="text" name='nick'></p>
		<p><input placeholder="Else" type="text" name='else'></p>
	</div>
	<div class="button__wrapper">
	<button type="button" id='nextBtn' onclick="plusSlides(1)">Next </button>
	<button type="button" id= "prevBtn" onclick="plusSlides(-1)">Prev</button>
	</div>
</form>

<script>



var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n){
	showSlides(slideIndex += n);
}

function showSlides(n){
	var i;
	var slides = document.getElementsByClassName("tab");
	if(slideIndex < 1){ slideIndex = slides.length}
	if(slideIndex > slides.length){ 
		slideIndex = 1;
		document.getElementById("regForm").submit();
	}
	if(slideIndex == 1){
		document.getElementById("prevBtn").style.display = 'none';
	}
	else{
		document.getElementById("prevBtn").style.display = 'block';
	}

	for (i = 0; i< slides.length; i++){
		slides[i].style.display = 'none';
	}
	slides[slideIndex - 1].style.display = 'block';
}
</script>