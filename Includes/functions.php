<?php
require_once DA_GSP_PLUGIN_DIR . '/Includes/vendor/autoload.php';
require_once DA_GSP_PLUGIN_DIR . '/Includes/vendor/phpass-master/src/Phpass.php';
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

const STRENGTH_VERY_WEAK   = 0;
const STRENGTH_WEAK        = 1;
const STRENGTH_FAIR        = 2;
const STRENGTH_STRONG      = 3;
const STRENGTH_VERY_STRONG = 4;
$SCORE_LABELS = array(
	0 => 'very-weak',
	1 => 'weak',
	2 => 'fair',
	3 => 'strong',
	4 => 'very-strong',
);

function da_gen_plugin_path( $path = '' ) {
	return path_join( DA_GSP_PLUGIN_DIR, trim( $path, '/' ) );
}

function da_gen_plugin_url( $path = '' ) {
	$url = plugins_url( $path, DA_GSP_PLUGIN );

	if ( is_ssl()
	and 'http:' == substr( $url, 0, 5 ) ) {
		$url = 'https:' . substr( $url, 5 );
	}

	return $url;
}

function render_view($view) {
	ob_start();
	include(DA_GSP_PLUGIN_DIR . "/Views/{$view}.view.php");
	return ob_get_clean();
}

function classify_score($score) {
	if ($score <  10) return STRENGTH_VERY_WEAK;
	if ($score < 50) return STRENGTH_WEAK;
	if ($score < 70) return STRENGTH_FAIR;
	if ($score < 90) return STRENGTH_STRONG;

	return STRENGTH_VERY_STRONG;
}

function calc_strength_score($word) {
	$adapter = new \Phpass\Strength\Adapter\Wolfram;
	$phpassStrength = new \Phpass\Strength($adapter);
	$score = $phpassStrength->calculate($word);
	return $score;
}

// ajax event to detect strength
function da_gen_check_strength() {
	global $SCORE_LABELS;

	$word = $_POST['word'];
	
	$score = calc_strength_score($word);
	$level = classify_score($score);
	
	$res = array();
	$res['score'] = $score;
	$res['score_level'] = $level;
	$res['score_label'] = $SCORE_LABELS[$level];
	
	echo json_encode($res);
	wp_die();
}

// ajax event to generate secure password
function da_gen_random_password() {
	global $SCORE_LABELS;

	$generator = new ComputerPasswordGenerator();
	
	try {
		$generator->setLength($_POST['length']*1);
		$generator
			->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, $_POST['allow_uppers'] ? true : false)
			->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, $_POST['allow_lowers'] ? true : false)
			->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, $_POST['allow_numbers'] ? true : false)
			->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, $_POST['allow_symbols'] ? true : false)
		;
		if ($_POST['easy_to_read'])
			$generator->setAvoidSimilar();
	
		$res = array();
		$res['password'] = $generator->generatePassword();
	} catch (Exception $e) {
		error_log(print_r($e, true));
		$res = array();
		$res['password'] = '';
	} finally {
		// calc strength
		$score = calc_strength_score($res['password']);
		$level = classify_score($score);
		
		// temp; should be removed two of them.
		$res['score'] = $score;
		$res['score_level'] = $level;
		$res['score_label'] = $SCORE_LABELS[$level];
	
		echo json_encode($res);
		wp_die();
	}
}
