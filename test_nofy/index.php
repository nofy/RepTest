<?php
if (!empty($_GET['c']) && $_GET['c']=='sitecamp'):
	include('sitecamp/index.php');
else:
	// Définir le fuseau
	date_default_timezone_set('Europe/Paris');

	// Définir le séparateur de dossier
	define('DS', DIRECTORY_SEPARATOR);

	// Définir la racine de l'extranet
	$etnRoot = str_replace('\\', DS, str_replace('/', DS, realpath(dirname(__FILE__).'/../../..')));
	$etnRoot = ($etnRoot{STRLEN($etnRoot)-1} !== DS) ? ($etnRoot.DS) : $etnRoot;
	define('ETN_ROOT', $etnRoot);

	// Définir les chemins
	define('MOD_CAMP_PATH', ETN_ROOT.'modules'.DS.'onglets'.DS.'campagne'.DS);
	define('MOD_CAMP_LIBS_PATH', MOD_CAMP_PATH.'libs'.DS);
	define('MOD_CAMP_CONTROLLERS_PATH', MOD_CAMP_PATH.'controllers'.DS);
	define('MOD_CAMP_MODELS_PATH', MOD_CAMP_PATH.'models'.DS);
	define('MOD_CAMP_VIEWS_PATH', MOD_CAMP_PATH.'views'.DS);

	global $select_bdd;
	if (empty($select_bdd)) {
		require ETN_ROOT.'env.php';
		$select_bdd = $environnement;
	}

	// Inclure les classes principales
	require MOD_CAMP_LIBS_PATH.'Logger.class.php';
	require MOD_CAMP_LIBS_PATH.'Registry.class.php';
	require MOD_CAMP_LIBS_PATH.'DB.class.php';
	require MOD_CAMP_LIBS_PATH.'Module.class.php';
	require MOD_CAMP_LIBS_PATH.'Controller.class.php';
	require MOD_CAMP_LIBS_PATH.'Model.class.php';
	require MOD_CAMP_LIBS_PATH.'Utils.class.php';

	Module::init();
endif;
?>
