<?php

$root = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}


$result = array(
	timeout		=> $udesign_options['c3_timeout'],
	autostop	=> ( $udesign_options['c3_autostop'] ) ? 1 : 0
);

// create a new XML document
$doc = new DomDocument('1.0');

// create root node
$root = $doc->createElement( 'settings' );
$root = $doc->appendChild( $root );

foreach( $result as $param_name=>$param_value ){

    $child = $doc->createElement( $param_name );
    $child->appendChild(
	$doc->createTextNode( $param_value )
    );
    $root->appendChild( $child );
    $doc->appendChild( $root );

}

// get complete xml document
$xml_string = $doc->saveXML();

header('Content-Type: application/xml; charset=ISO-8859-1');

echo $xml_string;


