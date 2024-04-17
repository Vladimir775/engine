<?
	require_once 'elements.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Мои Проекты</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container pb-3">
		<?=$header?>
	</div>
	<div class="container">
		<div class="jumbotron p-4 p-md-5 text-white rounded bg-cover" style="background-image: url('/content/images/mineeditorbg.webp');">
			<div class="col-md-6 px-0">
			    <h1 class="display-4 font-italic">Mineeditor</h1>
			    <p class="lead my-1">Простой онлайн редактор 3д моделей в стиле Minecraft.</p>
			    <p class="lead my-1">Огромный выбор блоков. Стройте в одиночку или с друзьями.</p>
			    <p class="lead my-1">Создавайте собственные блоки, скайбоксы или плагины для редактора</p>
			    <p class="lead mt-1 mb-3">Экспортируйте модели в форматы .stl, .ply или .gltf</p>
			    <p class="lead mb-0">
			    	<a href="http://mineeditor.robomaster.kz/" target="_blank" class="text-white font-weight-bold">
			    		Попробуйте сами
			    		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  						<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
	  					</svg>
			    	</a></p>
			</div>
		</div>

		<div class="jumbotron p-4 p-md-5 text-white rounded bg-cover" style="background-image: url('/content/images/robocorebg.webp');">
			<div class="col-md-6 px-0">
			    <h1 class="display-4 font-italic">Robocore</h1>
			    <p class="lead my-1">CMS система</p>
			    <p class="lead my-1">Большой выбор блоков.</p>
			    <p class="lead my-1">Возможность сменить тему</p>
			    <p class="lead mt-1 mb-3"></p>
			    <p class="lead mb-0">
			    	<a class="text-white font-weight-bold">
			    		В разработке...
			    		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  						  <path fill-rule="evenodd" d="M4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0zm-.999-3.124a.5.5 0 0 1 .33.625l-4 13a.5.5 0 0 1-.955-.294l4-13a.5.5 0 0 1 .625-.33z"/>

	  					</svg>
			    	</a>
			    </p>
			</div>
		</div>

		<div class="jumbotron p-4 p-md-5 text-white rounded bg-cover bg-dark">
			<div class="col-md-6 px-0">
			    <h1 class="display-4 font-italic">TileGame-editor</h1>
			    <p class="lead my-1">Простой игровой 2D движок</p>
			    <p class="lead my-1">Создание карт на основе "тайлов"</p>
			    <p class="lead my-1">Создавай простые платформеры и встраивай их на свой сайт парой кликов</p>
			    <p class="lead mt-1 mb-3"></p>
			    <p class="lead mb-0">
			    	<a class="text-white font-weight-bold">
			    		В супер-мега ранней разработке...
			    		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  						  <path fill-rule="evenodd" d="M4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0zm-.999-3.124a.5.5 0 0 1 .33.625l-4 13a.5.5 0 0 1-.955-.294l4-13a.5.5 0 0 1 .625-.33z"/>

	  					</svg>
			    	</a>
			    </p>
			</div>
		</div>
	</div>
</body>
</html>