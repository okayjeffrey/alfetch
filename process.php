<?php
require_once('workflows.php');
$w = new Workflows();

# php -f process.php -- '{query}'
# php -f process.php -- "/Users/jeffreylarrimore/Desktop/TaskRabbit_Logos.sketch"

  # $q = urldecode( $argv[1] );

  $q = shell_exec('/usr/bin/sketchtool list artboards ~/Desktop/logos.sketch');

	$q = json_decode( $q );
  $q = $q->pages;

  foreach( $q as $qs ):

    $uid = $qs->id;
    $pgName = $qs->name;

    $w->result( $uid, 'na', $pgName, $uid, 'icon.png', 'yes' );

  endforeach;

  echo $w->toxml();

?>
