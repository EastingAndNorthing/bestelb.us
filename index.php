<?php

// Hard coded links for for simplicity's sake.
// TODO: some kind of bijection function to translate urls back and forth

$links = parse_ini_file('links.ini');

$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_parts = explode('/', rtrim($_SERVER['REQUEST_URI_PATH'], '/'));

$requested = end(array_filter($url_parts));

if(isset($requested) && array_key_exists($requested, $links)){
	$destination = $links[$requested];
	header( "refresh:2;url=$destination" );
}

?>

<!doctype html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if($destination): ?>
		<meta http-equiv="refresh" content="2;url=<?= $destination ?>">
	<?php endif; ?>
	<title>Bestelb.us</title>
	<meta name="author" content="Mark Oosting">
	<link rel="stylesheet" type="text/css" href="./assets/style/style.css">
</head>

<body>

	<div class="logo <?php if($destination) echo 'animated'; ?>">
		<img class="logo" src="./assets/img/delivery-truck.svg" alt="Delivery truck">
	</div>

	<div class="text-center">
		<?php if($destination): ?>
			<p class="aesthetic">Delivering you to: <p><a href="<?= $destination ?>"><?= parse_url($destination, PHP_URL_HOST) ?></a>
		<?php else: ?>
			<p class="aesthetic">Bestelb.us</p>
			<p>&copy; Mark Oosting, 2017</p>
		<?php endif; ?>
	</div>

</body>

</html>
