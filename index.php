<!DOCTYPE html>
<html lang="ru">
<head>
	<?php	
	$website_title = 'Comments';
	require 'blocks/head.php'; 
	?>
	<script>
	function delItm (event) {
		alert(event.target.style.width);
	}	
	$(document).ready(function(){
		$('#delItem').bind('click', delItm);
	});
	</script>
</head>
<body>	
<?php require 'blocks/header.php';?>
	<main class="comtainer mt-5"> 
		<div class="row">
			<div class="col-md-12 p-5">				
				<h3 class="mt-5">Комментарии:</h3>				
				<form action="/db.php" method="post">
					
					<label for="username">Ваше имя</label>
					<input type="text" name="username" id="username" class="wid form-control">

					<label for="mess">Сообщение</label>
					<textarea name="mess" id="mess" class="wid form-control"></textarea>					

					<button type="submit"	id="mess_send" class="btn btn-success mt-2 mb-5">
						Добавить комментарий
					</button>	

				</form>	
				<?php 
					require 'mysql_connect.php';
					$sql = 'SELECT * FROM `comments` ORDER BY `date` DESC';
					$query = $pdo->prepare($sql);

					$query->execute(['id' => $_GET['id']]);

					$comments = $query->fetchAll(PDO::FETCH_OBJ);
				?>

				<?foreach ($comments as $comment): ?>
					<div class='hid wid alert alert-info mb-2'> 
						<h4><?= $comment->name ?></h4>
						<p><?=$comment->mess ?></p>
						<a href="" id="delItem" class="delItem">Удалить</a>
					</div>
				<? endforeach; ?>
			</div>

		</div>
	</main>  



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/script.js"></script>	
<?php require 'blocks/footer.php'; ?>		
</body>
</html>