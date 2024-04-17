<?
	require_once 'elements.php';

	$page = 1;
	$step = 3;
	if ($_GET['page']) {
		$page = $_GET['page'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<?=$header?>
	</div>
	<div class="container">
		<?=$header_jb?>
		<?=$header_posts?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!-- Посты -->
				<!-- <i class="px-4">Посты</i> -->
				<?
					foreach (get_posts($page,$step) as $post) {
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
// ($page-1)*$step
						for ($i=1; $i <= ceil((db_len())/($step)); $i++) {
							if ($i == $page) {
								print('<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>');
							}else{
								print('<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>');
							}
						}
						if ($page < ceil(db_len()/$step)) {
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
				<div class="p-4 mb-3 bg-light rounded mt-4">
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
	<?=$footer?>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>