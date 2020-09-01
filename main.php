<?php if (!defined('DOKU_INC')) die();
	global $conf;
	global $ID;
	
	require_once(dirname(__FILE__) . '/navBar/BootstrapNavBar.php');
	require_once(dirname(__FILE__) . '/navBar/NavBarItem.php');
	
	function drawContent($path){
		if(page_exists($path)){
			tpl_include_page($path);
		} else {
			echo sprintf("<p style='color: red'>Chybějící stránka <b>%s</b>.</p>", $path);
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']; ?>" lang="<?php echo $conf['lang']; ?>" dir="<?php echo $lang['direction'] ?>">
	<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Miroslav Jarý, jason@vyfuk.mff.cuni.cz">
		<meta name="description" content="Výfuk, jméno našeho korespondenčního semináře, je vlastně zkratka jeho dlouhého názvu – Výpočty fyzikálních úkolů. Touto soutěží se snažíme ukázat, že fyzika je vlastně velmi zábavné a fascinující téma.">
		<meta name="keywords" content="vyfuk, výfuk,  fyzika, fyzikalni, fyzikální, seminar, seminář, soutez, soutěž">
		<meta name="robots" content="index,follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/lib/tpl/vyfuk/css/font-awesome.min.css">
		<script src="/lib/tpl/vyfuk/js/jquery.slim.min.js"></script>
		<script src="/lib/tpl/vyfuk/js/popper.min.js"></script>
		<link rel="stylesheet" href="/lib/tpl/vyfuk/css/bootstrap.min.css">
		<script src="/lib/tpl/vyfuk/js/bootstrap.min.js"></script>
		<title>
			<?php
				if($ID == "start"){
					echo "Tady je Výfučí!";
				} elseif (!page_exists($ID)) {
					echo "Stránka nenalezena - Výfuk";
				} else {
					tpl_pagetitle(); echo " - Výfuk";
				}
			?>
		</title>
		<?php
			echo tpl_favicon(['favicon', 'mobile']);
			tpl_metaheaders();
		?>
	</head>
	
	<body data-act="<?php echo $ACT; ?>" data-namespace="<?php echo getNS($ID); ?>" data-page_id="<?php echo $ID; ?>">
		<div class="sticky-top navbar-bg">
			<?php
				if (page_exists("system:menu_cs")) {
					$leftMenu = new \fksTemplate\NavBar\BootstrapNavBar('full');
					$leftMenu->setClassName('navbar-expand-lg navbar-content')
					->addMenuText('menu', 'mr-auto')
					->addMenuText('login')
					->addBrand('', '', '', 50, null)
					->addTools('justify-content-end', true)
					->render();
				} else {
					echo "<p style='color: #fff'>Please create page <b>system:menu</b> containing menu structure.<br>Založte prosím stránku <b>system:menu</b> obsahující strukturu menu.</p>";
				}
			?>
		</div>
		<div class="dokuwiki" id="dokuwiki" data-do="<?php echo $ACT; tpl_flush(); ?>">
			<?php if ($ID == "start"): ?>
			<div id="landing-page">
				<div class="row" id="clouds">
					<div class="col-12 col-lg-6">
						<div class="cloud-left">
							<h2>Tady je Výfučí!</h2>
							<p><b>Výfuk</b>, jméno našeho korespondenčního semináře, je vlastně zkratka jeho dlouhého názvu – <b>Vý</b>počty <b>f</b>yzikálních <b>úk</b>olů. Touto soutěží se snažíme ukázat, že fyzika je vlastně velmi zábavné a fascinující téma.</p>
						</div>
						<div class="cloud-left">
							<h2>Co tím získám?</h2>
							<p>Kromě mnoha zkušeností, které uplatníte po celý svůj život, můžete vyhrát hmotné ceny, ale především účast na našich akcích; dvou setkáních a letním táboře. Na obojím můžete zakusit zajímavé exkurze, poutavé přednášky, spoustu her, výletů a přivést si domů spousty neopakovatelných zážitků.</p>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="cloud-right">
							<h2>Jak to probíhá?</h2>
							<p>Během školního roku postupně zveřejňujeme zadání šesti sérií. Každá z nich obsahuje pět úloh z různých oblastí fyziky, jeden problém týkajícího se našeho odborného textu (tzv. Výfučtení) a jeden zábavný experiment. Zapojit se můžete kdykoliv!</p>
						</div>
						<div class="cloud-right timer">
							<?php drawContent("system:timer");?>
						</div>
					</div>
				</div>
				<div id="quickLinks" class="row">
					<div class="col-12 col-lg-4">
						<a href="">Výfučtení</a>
					</div>
					<div class="col-12 col-lg-4">
						<a href="">Aktuální zadání úloh</a>
					</div>
					<div class="col-12 col-lg-4">
						<a href="">Další odkaz</a>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div id="content">
				<?php tpl_content(); ?>
			</div>
			<footer>
				<div class="cloud-down"></div>
				<div class="container-fluid footer row">
					<div class="social col-12 col-lg-4">
						<a href="https://facebook.com/ksvyfuk" id="fb-icon">
							<img class="no-filter" src="/lib/tpl/vyfuk/icons/vyfucek1.svg" alt="FB">
						</a>
						<a href="https://www.instagram.com/ksvyfuk/" id="ig-icon">
							<img class="no-filter" src="/lib/tpl/vyfuk/icons/vyfucek1.svg" alt="IG">
						</a>
						<a href="https://www.youtube.com/channel/UCUBv3Ydd-laLSY5DMimoE7w" id="yt-icon">
							<img class="no-filter" src="/lib/tpl/vyfuk/icons/vyfucek1.svg" alt="YT">
						</a>
					</div>
					<div class="col-12 col-lg-4">
						<a href="/"><img id="footerLogo" src="/lib/tpl/vyfuk/images/logo-white.svg" style="width: 100px" alt="Výfuk"></a><br>
						©2020 <a href="mailto:jason@vyfuk.mff.cuni.cz">Miroslav Jarý</a><br>
						In case of fire call<br>
						<a href="mailto:webmaster@vyfuk.mff.cuni.cz">webmaster@vyfuk.mff.cuni.cz</a>
					</div>
					<div class="col-12 col-lg-4">
						Korespondenční seminář Výfuk<br>
						Matematicko-fyzikální fakulta UK<br>
						V Holešovičkách 2<br>
						180 00 Praha 8
					</div>
				</div>
			</footer>
			<div class="loader-wrapper">
				<span class="loader"></span>
			</div>
			<div id="new-era-wrapper">
				<div id="new-era-content">
					<h2 style="text-align: center">Vítej ve Výfučím!</h2>
					<p>Zdravíme tě, poutníku! Jak si jistě všimneš, oblékli jsme náš web do nového kabátu. Dali jsme mu svěží design, zjednodušili hlavní menu, aby ses u náš neztratil, a čeká na tebe spousta překvapení.</p>
					<p>Pokud se ti na webu cokoliv nelíbí, nezdá nebo ti připadá, že tu něco důležitého chybí, neváhej nás kontaktovat pomocí e-mailu, který nalezneš dole na stránce. Rádi si tvůj názor přečteme a pokusíme se ti pomoct, poradit nebo vyhovět.</p>
					<p>Tak na co ještě čekáš? Vzhůru na průzkum!</p>
					<button class="btn btn-primary" onclick="closeWelcome()">Rozumím!</button>
				</div>
			</div>
		</div>
	</body>
</html>	