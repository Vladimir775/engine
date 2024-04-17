<?
	require_once 'elements.php';

	$page = $_GET['page'];
	$step = 10;
	if ($_GET['step']) {
		$step = (int)$_GET['step'];
	}
	$posts = get_posts($page,$step);
	// [
	// 	[
	// 		'id'=>1,
	// 		'category'=>'Lego',
	// 		'title'=>'Lego title 1',
	// 		'date'=>'03.05.20',
	// 		'preview'=>'Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.'
	// 	],
	// 	[
	// 		'id'=>2,
	// 		'category'=>'Php',
	// 		'title'=>'Php title 1',
	// 		'date'=>'03.05.20',
	// 		'preview'=>'Informing new readers quickly and efficiently about what’s most interesting in this post’s contents.'
	// 	],
	// ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Пост №</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container pb-3">
		<?=$header?>

	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!-- Посты -->
				<i class="px-4">Посты</i>
				<?
				$posts = array_reverse($posts);
				foreach ($posts as $post) {

					$class = strtolower($post['category']);
					$content = <<<Html

				<div class="m-md-4 mb-3 p-4 border rounded shadow position-relative">
					<b class="d-inline-block mb-2 text-{$class}">{$post['category']}</b>
					<h3 class="text-dark">
						{$post['title']}
						<br>
						<small class="font-weight-light h6">{$post['category']} {$post['date']}</small>
					</h3>
					<p>{$post['preview']} ...</p>
					<a href="/post?id={$post['id']}" class="stretched-link text-info">Читать дальше</a>
				</div>

Html;
					print($content);
				}
				?>

				<!-- Нумерация страниц -->
				<nav>
					<ul class="pagination justify-content-end px-md-4">
						<?
						if ($page > 1) {
							print('<li class="page-item">
								<a class="page-link" href="?page='.($page-1).'" aria-label="Previous">
									<span aria-hidden="true">«</span>
								</a>
							</li>');
						}else{
							print('<li class="page-item disabled">
								<a class="page-link" href="?page='.$page.'" aria-disabled="true" aria-label="Previous">
									<span aria-hidden="true">«</span>
								</a>
							</li>');
						}

						for ($i=1; $i <= ceil(db_len()/$step); $i++) {
							if ($i == $page) {
								print('<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>');
							}else{
								print('<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>');
							}
						}
						if ($page < db_len()/$step) {
							print('<li class="page-item">
								<a class="page-link" href="?page='.(1+$page).'" aria-label="Next">
									<span aria-hidden="true">»</span>
								</a>
							</li>');
						}else{
							print('<li class="page-item disabled">
								<a class="page-link" href="?page='.$page.'" aria-disabled="true" aria-label="Next">
									<span aria-hidden="true">»</span>
								</a>
							</li>');
						}
						?>
					</ul>
				</nav>
			</div>
			<div class="col-md-4">
				<div class="p-4 mb-3 bg-light rounded">
					<h4 class="font-italic">About</h4>
					<p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				</div>

				<div class="p-4">
					<h4 class="font-italic">Категории</h4>
					<ol class="list-unstyled mb-0 font-weight-bold">
						<li><a class="text-lego" href="/category?cat=Lego">Lego</a></li>
						<li><a class="text-php" href="/category?cat=Php">Php</a></li>
						<li><a class="text-js" href="/category?cat=JavaScript">JavaScript</a></li>
						<li><a class="text-html" href="/category?cat=Html">Html</a></li>
						<li><a class="text-css" href="/category?cat=Css">Css</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</body>
</html>