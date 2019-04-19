<?php
require_once DA_GSP_PLUGIN_DIR . '/Includes/vendor/phpass-master/src/Phpass.php';

const STRENGTH_VERY_WEAK   = 0;
const STRENGTH_WEAK        = 1;
const STRENGTH_FAIR        = 2;
const STRENGTH_STRONG      = 3;
const STRENGTH_VERY_STRONG = 4;

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

function classifyScore($score) {
	if ($score <  10) return STRENGTH_VERY_WEAK;
	if ($score < 50) return STRENGTH_WEAK;
	if ($score < 70) return STRENGTH_FAIR;
	if ($score < 90) return STRENGTH_STRONG;

	return STRENGTH_VERY_STRONG;
}

function da_gen_check_strength() {
	$score_label = array(
		0 => 'Very easy',
		1 => 'Easy',
		2 => 'Medium',
		3 => 'Hard',
		4 => 'Very hard',
	);
	$word = $_POST['word'];
	
	// $phpassStrength = new \Phpass\Strength;
	$adapter = new \Phpass\Strength\Adapter\Wolfram;
	$phpassStrength = new \Phpass\Strength($adapter);
	$score = $phpassStrength->calculate($word);
	$level = classifyScore($score);
	
	$res = array();
	$res['score'] = $score;
	$res['score_level'] = $level;
	$res['score_label'] = $score_label[$level];
	
	echo json_encode($res);
	wp_die();
}
