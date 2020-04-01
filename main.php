<?php if (!defined('DOKU_INC')) die();
	
	global $conf;
	global $ID;
	
	require_once(dirname(__FILE__) . '/navBar/BootstrapNavBar.php');
	require_once(dirname(__FILE__) . '/navBar/NavBarItem.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']; ?>" lang="<?php echo $conf['lang']; ?>" dir="<?php echo $lang['direction'] ?>">
	<!DOCTYPE html>
	<head>
		<!--Files important for Bootstrap-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<!--Rules for creating page title-->
		<meta charset="utf-8"/>
		<title><?php
			if($ID == "start"){
				echo "Tady je Výfučí!";
			}
			else{
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
		<div class="dokuwiki" id="dokuwiki" data-do="<?php echo $ACT; tpl_flush(); ?>">
			<div class="content">
				<div class="sticky-top" id="navbar">
					<?php
						if (page_exists("system:menu")) {
							$fullMenu = new \fksTemplate\NavBar\BootstrapNavBar('full');
							$fullMenu->setClassName('container navbar-dark')
							->addMenuText('menu')
							->addBrand('', '', 'images/logo.svg', 50, null)
							->addTools('ml-auto justify-content-end', true)
							->render();
						}
						else {
							echo "<p style='color: #fff'>Please create page <b>system:menu</b> containing menu structure.<br>Založte prosím stránku <b>system:menu</b> obsahující strukturu menu.</p>";
						}
					?>
				</div>
				<?php if ($ID == "start"): ?>
				<div style="max-width: 1200px; margin: auto;">
					<div class="row">
						<div class="d-none d-lg-block col-6 cloud-left">
							<h2>Tady je Výfučí!</h2>
							<p><b>Výfuk</b>, jméno našeho korespondenčního semináře, je vlastně zkratka jeho dlouhého názvu – <b>Vý</b>počty <b>f</b>yzikálních <b>úk</b>olů. Touto soutěží se snažíme ukázat, že fyzika je vlastně velmi zábavné a fascinující téma.</p>
						</div>
						<div class="d-none d-lg-block col-6 cloud-right">
							<h2>Jak to probíhá?</h2>
							<p>Během školního roku postupně zveřejňujeme zadání šesti sérií. Každá z nich obsahuje pět úloh z různých oblastí fyziky, jeden problém týkajícího se našeho odborného textu (tzv. Výfučtení) a jeden zábavný experiment. Zapojit se můžete kdykoliv!</p>
						</div>
					</div>
					<div class="row">
						<div class="d-none d-lg-block col-6 cloud-left">
							<h2>Co tím získám?</h2>
							<p>Kromě mnoha zkušeností, které uplatníte po celý svůj život, můžete vyhrát hmotné ceny, ale především na našich akcích; dvou setkání a letním táboře. Na obojím můžete zakusit zajímavé exkurze, poutavé přednášky, spoustu her, výletů a přivést si domů spousty neopakovatelných zážitků.</p>
						</div>
						<div class="d-none d-lg-block col-6 cloud-right" id="timer">
							<?php
								if(page_exists("system:timer")){;
									tpl_include_page("system:timer");
								} 
								else {
									echo "<p style='font-size: 100%'>Please create page <b>system:timer</b> with wanted content.<br>Založte prosím stránku <b>system:timer</b> s chtěným obsahem.</p>";
								}
							?>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="container-fluid" id="main-container">
					<div class="d-lg-none">
						<h2>Tady je Výfučí!</h2>
					<p><b>Výfuk</b>, jméno našeho korespondenčního semináře, je vlastně zkratka jeho dlouhého názvu – <b>Vý</b>počty <b>f</b>yzikálních <b>úk</b>olů. Touto soutěží se snažíme ukázat, že fyzika je vlastně velmi zábavné a fascinující téma.</p>
					
					<h2>Jak to probíhá?</h2>
					<p>Během školního roku postupně zveřejňujeme zadání šesti sérií. Každá z nich obsahuje pět úloh z různých oblastí fyziky, jeden problém týkajícího se našeho odborného textu (tzv. Výfučtení) a jeden zábavný experiment. Zapojit se můžete kdykoliv!</p>
					
					<h2>Co tím získám?</h2>
					<p>Kromě mnoha zkušeností, které uplatníte po celý svůj život, můžete vyhrát hmotné ceny, ale především na našich akcích; dvou setkání a letním táboře. Na obojím můžete zakusit zajímavé exkurze, poutavé přednášky, spoustu her, výletů a přivést si domů spousty neopakovatelných zážitků.</p>	
				</div>
				<?php tpl_content(); ?>
				</div>
			</div>
			<footer>
				<div class="upper-cloud"></div>
			<div class="container-fluid footer row">
			<div class="col-12 col-lg-4">
			Korespondenční seminář Výfuk<br>
			Matematicko-fyzikální fakulta UK<br>
			V Holešovičkách 2<br>
			180 00 Praha 8
			</div>
			<div class="col-12 col-lg-4">
			<img src="/lib/tpl/vyfuk/images/logo.svg" style="width: 100px" alt="Výfuk"><br>
			©2020 Výfuk<br>
			In case of fire call<br>
			<a href="mailto:webmaster@vyfuk.mff.cuni.cz">webmaster@vyfuk.mff.cuni.cz</a>
			</div>
			<div class="col-12 col-lg-4">
			<a href="https://facebook.com/ksvyfuk" id="fb-icon">
			<img src="/lib/tpl/vyfuk/images/fb.svg" style="width: 70px" alt="FB">
			</a>
			<a href="https://www.instagram.com/ksvyfuk/" id="ig-icon">
			<img src="/lib/tpl/vyfuk/images/ig.svg" style="width: 70px" alt="IG">
			</a>
			<a href="https://www.youtube.com/channel/UCUBv3Ydd-laLSY5DMimoE7w" id="yt-icon">
			<img src="/lib/tpl/vyfuk/images/yt.svg" style="width: 70px" alt="YT">
			</a>
			</div>
			</div>
			</footer>
			<div class="loader-wrapper">
			<span class="loader"></span>
			</div>
			</div>
			</body>									