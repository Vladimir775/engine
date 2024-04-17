<?
require_once 'db.php';

$header =
<<<HTML
	<header class="blog-header py-3">
		<div class="row flex-nowrap justify-content-between align-items-center">
			<div class="col-12 text-center">
				<a class="blog-header-logo text-dark" href="/">Robomaster.kz</a>
			</div>
		</div>
	</header>
	<nav class="navbar navbar-expand-md navbar-light">
		<button class="navbar-toggler m-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav justify-content-between w-100">
				<li class="nav-item">
					<a class="p-2 text-muted" href="/">Главная</a>
				</li>
				<li class="nav-item">
					<a class="p-2 text-muted" href="/category?cat=all&page=1">Посты</a>
				</li>
				<!--<li class="nav-item">
					<a class="p-2 text-muted" href="/category?cat=all">Категории</a>
				</li>-->
				<li class="nav-item">
					<a class="p-2 text-muted" href="/projects">Мои Проекты</a>
				</li>
			</ul>
		</div>
HTML;
/*
	<div class="nav-scroller py-1 mb-2">
		<nav class="nav d-flex justify-content-between">
			<a class="p-2 text-muted" href="/">Главная</a>
			<a class="p-2 text-muted" href="/posts?page=1">Посты</a>
			<a class="p-2 text-muted" href="/category?cat=all">Категории</a>
			<a class="p-2 text-muted" href="/projects">Мои Проекты</a>
		</nav>
	</div>
 */



$header_jb =
<<<HTML
	<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark-cyan">
		<div class="col-md-6 px-0">
		    <h1 class="display-4 font-italic">Robomaster.kz</h1>
		    <p class="lead my-3">Привет. На сайте вы найдете уроки по Lego mindstorms ev3.</p>
		    <p class="lead my-3">А также различные интересные вещи js, php, html, css </p>
		    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">...</a></p>
		</div>
	</div>
HTML;

$header_posts=
<<<HTML
	<div class="row mb-2">
		<div class="col-md-6">
	    	<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
	    		<div class="col p-4 d-flex flex-column position-static">
	    			<b class="d-inline-block mb-2 text-lego">Lego</b>
	    			<h3 class="mb-0">Пост о Лего</h3>
	    			<div class="mb-1 text-muted">10.03.20</div>
	    			<p class="card-text mb-auto">Colour Sorter или сортировщик цветов, модель собираемая из набора EV3 education 45544...</p>
	    			<a href="#" class="stretched-link">Читать дальше</a>
	    		</div>
	    		<div class="col-auto d-none d-lg-block">
	    			<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
	    		</div>
	    	</div>
	    </div>
	    <div class="col-md-6">
	      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
	        <div class="col p-4 d-flex flex-column position-static">
	          <b class="d-inline-block mb-2 text-php">Php</b>
	          <h3 class="mb-0">Пост о Php</h3>
	          <div class="mb-1 text-muted">10.03.20</div>
	          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additionalcontent...</p>
	          <a href="#" class="stretched-link">Читать дальше</a>
	        </div>
	        <div class="col-auto d-none d-lg-block">
	          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
				</div>
			</div>
		</div>
	  </div>
HTML;

$footer = <<<HTML
	<footer>
		<div class="container bg-dark py-5 text-light">
			<div class="row">
				<div class="col-md-4 px-5">
					<div class="h1 font-weight-light">Robomaster.kz</div>
					<p>

					</p>
				</div>
				<div class="col-md-4 mt-2"></div>
				<div class="col-md-4 mt-2">
					<h5>Соц сети</h5>
					<ul class="list-unstyled">
						<li><a href="https://www.youtube.com/channel/UCBs1rFc_OYtsoWQ0AuOSXTQ" class="text-light">Youtube</a></li>
						<li><a href="/sites" class="text-light">Портфолио (сайты)</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
HTML;
