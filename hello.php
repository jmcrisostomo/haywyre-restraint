<?php
/**
 * @package Haywyre_Restraint
 * @version 1.6
 */
/*
Plugin Name: Haywyre Restraint
Plugin URI: https://genius.com/Haywyre-restraint-lyrics
Description: This is a custom plugin based from Hello Dolly, the lyrics came from Haywyre's Two Fold, Pt. 2 Album: Restraint. 
Author: JM Crisostomo
Version: 1.6
Author URI: https://jmcrisostomo.github.io/
*/
function restraint_get_lyric() {
	/** These are the lyrics to Restraint */
	$lyrics = "Every concept, every notion has a counterpart
Yet, every idea's opposite
Is just the absence of the idea itself
Absence is the absence of presence
But presence is the absence of absence
Any perceived difference is, in fact, also a deep connection
In this way, opposing forces are unified
And the world becomes a cooperative web
Of interdependent pieces";
	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );
	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}
// This just echoes the chosen line, we'll position it later
function restraint() {
	$chosen = restraint_get_lyric();
	echo "<p id='restraint'>$chosen</p>";
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'restraint' );
// We need some CSS to position the paragraph
function restraint_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#restraint {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}
add_action( 'admin_head', 'restraint_css' );
?>
