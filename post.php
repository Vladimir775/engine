<?
	require_once 'elements.php';


	$post = query('SELECT * FROM `posts` WHERE `id`='.$_GET['id'])[0];
	$also = query('SELECT * FROM `posts` WHERE `id`>='.($_GET['id']-2).' AND `id`<='.($_GET['id']+2).' AND `category`="'.$post['category'].'"');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Пост №<?=$post['id']?> || <?=$post['title']?></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
	<div class="container pb-3">
		<?=$header?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="bg-white p-2">
					<div class="px-3 my-3">
						<b class="text-<?=strtolower($post['category'])?>"><?= $post['category']?></b>
						<h3><?= $post['title']?>
							<br>
							<small class="font-weight-light h6"> <?=$post['date']?></small>
						</h3>
					</div>
					<div class=" px-3">
						<?=$post['content']?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="bg-white p-3">
					Смотрите также:
					<ul class="list-unstyled">
						<?
							for ($i=0; $i < count($also); $i++) {
								if ($also[$i]!= $post) {
									print('<li><a href="?id='.$also[$i]['id'].'">'.$also[$i]['title'].'</a></li>');
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>