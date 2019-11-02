<?php if (!defined('DOKU_INC')) die();

global $conf;
global $ID;
$orange = "#ff4800";

require_once(dirname(__FILE__) . '/navBar/BootstrapNavBar.php');
require_once(dirname(__FILE__) . '/navBar/NavBarItem.php');

//Code extracted from fkstpl for getting pageId
/*class pageProp {	
	private $pageId;
	/**
	* @param $pageId
	* @return $this
	
	public function setPageId($pageId) {
		$this->pageId = $pageId;
		return $this;
	}
}*/
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']; ?>" lang="<?php echo $conf['lang']; ?>" dir="<?php echo $lang['direction'] ?>">
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
	
	<meta charset="utf-8"/>
	<title><?php
	if($ID == "start"){
		//echo "Vítejte na stránkách Výfuku!";
		echo $pageId;
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
	<div class="dokuwiki" id="dokuwiki" data-do="<?php echo $ACT ?>" >
		<div class="component" id="menuBackground">
			<nav class="navbar navbar-expand-lg sticky-top navbar-dark">
				<?php
				$fullMenu = new \fksTemplate\NavBar\BootstrapNavBar('full');
				$fullMenu->setClassName('container')
					->addMenuText('menu')
					->addBrand('', '', 'images/logo-w.svg', 50, null)
					->addTools('ml-auto justify-content-end', true)
					->render();
				?>
			</div>
		</nav>
		<?php if ($pageId == "start"): ?>
			<div id="mainSlider" class="container-fluid carousel slide" data-ride="carousel" style="text-align: center">
	<ol class="carousel-indicators">
		<li data-target="#mainSlider" data-slide-to="0" class="active"></li>
		<li data-target="#mainSlider" data-slide-to="1"></li>
		<li data-target="#mainSlider" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active" data-interval="12000">
			<img src="/lib/tpl/vyfuk/images/slider1.png" class="d-block w-100">
			<div class="carousel-caption">
				<h5>Kdo jsme?</h5>
				<p>Výfuk je fyzikální soutěž pro základoškoláky a nižší gymnázia. S námi zažiješ fyziku v novém rozměru!</p>
			</div>
		</div>
		<div class="carousel-item" data-interval="10000">
			<img src="/lib/tpl/vyfuk/images/slider2.png" class="d-block w-100">
			<div class="carousel-caption">
				<h5>Výpočty i zábava</h5>
				<p>I u fyziky se můžeš pobavit. Zkus si vlastní pokus nebo s námi vyjeď na zajímavá místa po celé republice!</p>
			</div>
		</div>
		<div class="carousel-item" data-interval="10000">
			<img src="/lib/tpl/vyfuk/images/slider3.png" class="d-block w-100">
			<div class="carousel-caption">
				<h5>Přidej se k nám!</h5>
				<p>Můžeš začít řešit hned, stačí se zaregistrovat a poslat nám svou práci.</p>
			</div>
		</div>
	</div>
</div>
		<?php endif; ?>
		<div class="container-fluid main-container" style="max-width: 1000px">
			<?php tpl_content(); ?>
		</div>
	</div>
</body>