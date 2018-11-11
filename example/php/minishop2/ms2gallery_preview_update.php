<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 10.06.2018
 * Time: 6:51
 *
 * Перегенерировать все превью ms2Gallery из консоли
 */

//https://ilyaut.ru/cheats/to-rebuild-all-previews-of-products/#cut

$step = 5;
$offset = isset($_SESSION['galgenoffset']) && $_SESSION['galgenoffset'] ? $_SESSION['galgenoffset'] : 0;
$ms2Gallery = $modx->getService('ms2gallery', 'ms2Gallery', MODX_CORE_PATH . 'components/ms2gallery/model/ms2gallery/');
$modx->setLogLevel(MODX_LOG_LEVEL_ERROR);
$q = $modx->newQuery('msResourceFile', array('parent' => 0));
$total = $modx->getCount('msResourceFile', $q);
$q->sortby('resource_id', 'ASC');
$q->sortby('rank', 'DESC');
$q->limit($step,$offset);
$resources = $modx->getCollection('msResourceFile', $q);
foreach ($resources as $resource) {
	$modx->runProcessor('mgr/gallery/generate', array('id' => $resource->id),
		array('processors_path' => $modx->getOption('core_path').'components/ms2gallery/processors/'));
}

$_SESSION['galgenoffset'] = $offset + $step;
if ($_SESSION['galgenoffset'] >= $total) {
	$sucsess = 100;
	$_SESSION['Console']['completed'] = true;
	unset($_SESSION['galgenoffset']);
} else {
	$sucsess = round($_SESSION['galgenoffset'] / $total, 2) * 100;
	$_SESSION['Console']['completed'] = false;
}
for ($i=0; $i<=100; $i++) {
	if ($i <= $sucsess) {
		print '=';
	} else {
		print '_';
	}
}
$current = $_SESSION['galgenoffset'] ?
	$_SESSION['galgenoffset'] :
	($sucsess == 100 ? $total : 0);
print "\n";
print $sucsess.'% ('.$current.')'."\n\n";