<?php

$links = parse_ini_file('links.ini');

$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_parts = explode('/', rtrim($_SERVER['REQUEST_URI_PATH'], '/'));

$requested = end(array_filter($url_parts));

if(isset($requested) && array_key_exists($requested, $links)){
	$destination = $links[$requested];
}

?>

<!doctype html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bestelb.us</title>
	<meta name="author" content="Mark Oosting">
	<meta name="description" content="">

	<base href="http://localhost/bestelb.us/">

	<link rel="stylesheet" type="text/css" href="./assets/style/style.css">
    <script src="./assets/js/app.js"></script>
	
</head>

<body>

	<div class="logo <?php if($destination) echo 'animated'; ?>">
		<img class="logo" src="./assets/img/delivery-truck.svg" alt="Delivery truck">
	</div>

	<div class="aesthetic text-center">
		<?php if($destination): ?>
			<p>Delivering you to: <p><a href="<?= $destination ?>"><?= parse_url($destination, PHP_URL_HOST) ?></a>
		<?php else: ?>
			<p>Link not found.</p>
		<?php endif; ?>
	</div>

</body>

</html>
