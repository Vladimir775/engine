<?
	require_once 'elements.php';

	if ($_POST['submit'] == 'add_img') {
		$file = 'content/images/'. basename($_FILES['img']['name']);

		move_uploaded_file($_FILES["img"]["tmp_name"], $file);
		header("Location: /admin?action=gallery");

	}

	if($_POST['submit'] == 'add_post'){
		$preview = str_split($_POST['content'],67)[0];
		query('INSERT INTO `posts` (`category`, `title`, `date`, `preview`,`content`) VALUES ("'.$_POST['category'].'","'.$_POST['title'].'","'.$_POST['date'].'","'.$preview.'","'.$_POST['content'].'")');
		header("Location: /admin?action=add");

	}


	$cat = $_GET['cat'];

	$content =<<<HTML
			<div class="display-2 text-center">Выберите действие</div>
HTML;

	$action = $_GET['action'];


	if ($action == 'add') {
		$content = <<<HTML
			<h2>Добавление поста</h2>
			<form action="" method="POST">
				<div class="form-group">
					<label for="">Заголовок</label>
					<input type="text" class="form-control" placeholder="Заголовок" name="title">
				</div>
				<div class="form-group">
					<label for="">Дата</label>
					<input type="date" class="form-control" placeholder="Дата" name="date">
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</button>
				    <div class="dropdown-menu">
				      <a class="dropdown-item" href="#" onclick="$('#category')[0].value = this.innerHTML">Lego</a>
				      <a class="dropdown-item" href="#" onclick="$('#category')[0].value = this.innerHTML">Php</a>
				      <a class="dropdown-item" href="#" onclick="$('#category')[0].value = this.innerHTML">JavaScript</a>
				      <a class="dropdown-item" href="#" onclick="$('#category')[0].value = this.innerHTML">Html</a>
				      <a class="dropdown-item" href="#" onclick="$('#category')[0].value = this.innerHTML">Css</a>
				    </div>
				  </div>
				  <input type="text" class="form-control" id="category" name="category" readonly>
				</div>
				<div class="form-group" id="imagesinp">
					<label for="">текст</label><br>
					<textarea name="content" class="w-100"></textarea>
				</div>


				<div class="text-center">
					<button name="submit" type="submit" class="btn btn-outline-dark" value="add_post">Опубликовать</button>
				</div>
			</form>
HTML;

	}

	if ($action == 'editpost') {
		$step = 10;
		if ($_GET['step']) {
			$step = (int)$_GET['step'];
		}
		$page = $_GET['page'];
		$pagin = '';
		if ($page > 1) {
			$pagin.='<li class="page-item">
				<a class="page-link" href="?action=editpost&page='.($page-1).'" aria-label="Previous">
					<span aria-hidden="true">«</span>
				</a>
			</li>';
		}else{
			$pagin.='<li class="page-item disabled">
				<a class="page-link" href="?action=editpost&page='.$page.'" aria-disabled="true" aria-label="Previous">
					<span aria-hidden="true">«</span>
				</a>
			</li>';
		}

		for ($i=1; $i <= ceil((db_len())/($step)); $i++) {
			if ($i == $page) {
				$pagin.='<li class="page-item active"><a class="page-link" href="?action=editpost&page='.$i.'">'.$i.'</a></li>';
			}else{
				$pagin.='<li class="page-item"><a class="page-link" href="?action=editpost&page='.$i.'">'.$i.'</a></li>';
			}
		}
		if ($page < db_len()/$step) {
			$pagin.='<li class="page-item">
				<a class="page-link" href="?action=editpost&page='.(1+$page).'" aria-label="Next">
					<span aria-hidden="true">»</span>
				</a>
			</li>';
		}else{
			$pagin.='<li class="page-item disabled">
				<a class="page-link" href="?action=editpost&page='.$page.'" aria-disabled="true" aria-label="Next">
					<span aria-hidden="true">»</span>
				</a>
			</li>';
		}




		$inner = '';
		$page = $_GET['page'];
		foreach (get_posts($page,$step) as $post) {
			$inner .= '<tr>';

			$inner .= '<td>'.$post['id'].'</td>';
			$inner .= '<td>'.$post['title'].'</td>';
			$inner .= '<td>'.$post['date'].'</td>';
			$inner .= '<td>'.$post['category'].'</td>';
			$inner .= '<td class="d-flex justify-content-between"><a href="" class="text-dark">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
							</svg></a>
							<a ondblclick="alert(1)" class="text-danger">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
								</svg>
							</a>
						</td>';

			$inner .= '</tr>';
		}

		$content = <<<HTML
			<h2>Список постов для редактирования</h2>
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">№</th>
			      <th scope="col">Заголовок</th>
			      <th scope="col">Дата</th>
			      <th scope="col">Категория</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	{$inner}
			  </tbody>
			</table>
			<nav>
				<ul class="pagination justify-content-end px-md-4">
					{$pagin}
				</ul>
			</nav>
HTML;
	}

	if ($action == 'gallery') {

		$row ='';

		foreach (glob("content/images/*.{jpg,png,gif,webp}",GLOB_BRACE) as $img) {
			$row.='<div class="col-md-4 px-3"><div class="mb-4 border shadow p-1 bg-dark"><img src="/'.$img.'" class="w-100"><p class="text-light my-1 text-center">'.explode('/', $img)[count(explode('/', $img))-1].'</p></div></div>';
		}

		$content = <<<HTML
			<h2>Галерея</h2>
			<div class="container">
				<div class="row">
					{$row}
				</div>
			</div>
HTML;

	}

	if ($action == 'addimg') {
		$content = <<<HTML
			<h2></h2>
			<div class="container">
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="img" class="bg-html px-4 text-center text-light">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="m-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
							<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
						</svg>
						<span>Изображение</span>
					</label>
					<input type="file" accept=".jpg, .jpeg, .png, .webp" placeholder="Заголовок" name="img" id="img" style="opacity: 0; height: 0; width: 0;">
				</div>

				<div class="text-center">
					<button name="submit" type="submit" class="btn btn-outline-dark" value="add_img">Добавить</button>
				</div>
			</form>
			</div>
HTML;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Админпанель</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="container pb-3">
		<header class="blog-header py-3">
			<div class="row flex-nowrap justify-content-center">
				<a class="blog-header-logo text-dark d-flex align-items-center" href="/">
					<svg width="2rem" height="1.5rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
						  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>

					</svg>
					Robomaster.kz
				</a>
			</div>
		</header>
		<div class="nav-scroller py-1 mb-2">
			<nav class="nav d-flex justify-content-between">
				<a class="p-2 text-muted" href="?action=add">Добавить пост</a>
				<a class="p-2 text-muted" href="?action=editpost&page=1">Редактировать пост</a>
				<a class="p-2 text-muted" href="?action=gallery">Галерея</a>
				<a class="p-2 text-muted" href="?action=addimg">Добавить изображение</a>
			</nav>
		</div>
	</div>
	<div class="container">
		<?=$content?>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>