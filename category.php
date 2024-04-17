<?
	require_once 'elements.php';

	$step = 10;
	if ($_GET['step']) {
		$step = (int)$_GET['step'];
	}

	$cat = $_GET['cat'];
	$page = $_GET['page'];

	if (!$page) {
		$page = 1;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Категории</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container pb-3">
		<?=$header?>
	</div>
	<div class="container">
		<div class="display-3">
			<?
				if ($cat != 'all') {
					print($cat);
				}else{
					print("Все посты");
				}
			?>
		</div>
		<div class="row">
			<div class="col-md-8">
				<?
				foreach (get_posts_cat($page,$cat,$step) as $post) {
					$class = strtolower($post['category']);

					$content = <<<Html

				<div class="m-md-4 mb-3 p-4 border rounded shadow position-relative">
					<b class="d-inline-block mb-2 text-{$class}">{$post['category']}</b>
					<h3 class="text-dark">
						{$post['title']}
						<br>
						<small class="font-weight-light h6"> {$post['date']}</small>
					</h3>
					<p>{$post['preview']} ...</p>
					<a href="/post?id={$post['id']}" class="stretched-link text-info">Читать дальше</a>
				</div>

Html;
					print($content);
				}
				?>
				<nav>
					<ul class="pagination justify-content-end px-md-4">
						<?
						// ========================= << =========================
						if ($page > 1) {
							print('<li class="page-item">
								<a class="page-link" href="?cat='.$cat.'&page='.($page-1).'" aria-label="Previous">
									<span aria-hidden="true">«</span>
								</a>
							</li>');
						}else{
							print('<li class="page-item disabled">
								<a class="page-link" href="?cat='.$cat.'&page='.$page.'" aria-disabled="true" aria-label="Previous">
									<span aria-hidden="true">«</span>
								</a>
							</li>');
						}

						// ========================= 1|2|3|4 =========================

						for ($i=1; $i <= ceil((db_len($cat))/($step)); $i++) {
							if ($i == $page) {
								print('<li class="page-item active"><a class="page-link" href="?cat='.$cat.'&page='.$i.'">'.$i.'</a></li>');
							}else{
								print('<li class="page-item"><a class="page-link" href="?cat='.$cat.'&page='.$i.'">'.$i.'</a></li>');
							}
						}

						// ========================= >> =========================
						if ($page < floor(db_len($cat)/$step)) {
							print('<li class="page-item">
								<a class="page-link" href="?cat='.$cat.'&page='.(1+$page).'" aria-label="Next">
									<span aria-hidden="true">»</span>
								</a>
							</li>');
						}else{
							print('<li class="page-item disabled">
								<a class="page-link" href="?cat='.$cat.'&page='.$page.'" aria-disabled="true" aria-label="Next">
									<span aria-hidden="true">»</span>
								</a>
							</li>');
						}
						?>
					</ul>
				</nav>
				<br>
			</div>
			<div class="col-md-4 position-relative">
				<div class="shadow p-2 sticky-top">
					<h4 class="font-italic">Категории</h4>
					<ol class="list-unstyled mb-0 font-weight-bold&page=1">
						<li><a class="text-lego" href="?cat=Lego&page=1">Lego</a></li>
						<li><a class="text-php" href="?cat=Php&page=1">Php</a></li>
						<li><a class="text-js" href="?cat=JavaScript&page=1">JavaScript</a></li>
						<li><a class="text-html" href="?cat=Html&page=1">Html</a></li>
						<li><a class="text-css" href="?cat=Css&page=1">Css</a></li>
						<li><a class="text-dark" href="?cat=all&page=1">Все посты</a></li>

					</ol>
				</div>
			</div>
		</div>
	</div>
</body>
</html>