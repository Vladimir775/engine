<?
//http://127.0.0.1/openserver/phpmyadmin/index.php?db=shop_data&table=products&target=sql.php
$db = new PDO('mysql:host=localhost;dbname=robomaster','root','');

function query($req){
	$res = $GLOBALS['db']->prepare($req);
	$res->execute();
	$result = $res->fetchAll(PDO::FETCH_ASSOC);
	return($result);
}

function get_post($id){
	return query('SELECT * FROM `posts` WHERE `id`='.(db_len()-$id));
}

function get_posts($page,$step = 10){
	return query('SELECT * FROM `posts` WHERE `id`>='.(($page-1)*$step+1).' AND `id`<='.($page*$step));
}

function get_posts_cat($page,$cat,$step = 10){
	if ($cat == 'all') {
		return get_posts($page,$step);
	}
	$result = query('SELECT * FROM `posts` WHERE `category` = "'.$cat.'"');

	$res = [];
	if ($page*$step < count($result)) {
		for ($i=($page-1)*$step; $i < $page*$step; $i++) {
			$res[] = $result[$i];
		}
	}else{
		for ($i=($page-1)*$step; $i < count($result); $i++) {
			$res[] = $result[$i];
		}
	}

	return $res;
}


function db_len($type = "all"){
	if ($type == "all") {
		return count(query('SELECT * FROM `posts`'));
	}else{
		return count(query('SELECT * FROM `posts` WHERE `category` = "'.$type.'"'));
	}
}