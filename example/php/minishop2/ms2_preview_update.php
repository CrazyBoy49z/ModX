<?php
define('MODX_API_MODE', true);
require 'index.php'; // Этот файл лежит в корне сайта

$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

// Проходимся по всем товарам
$products = $modx->getIterator('msProduct', array('class_key' => 'msProduct'));
foreach ($products as $product) {
	// Получаем оригиналы их картинок
	$files = $product->getMany('Files', array('parent' => 0));
	foreach ($files as $file) {
		// Затем получаем их превью
		$children = $file->getMany('Children');
		foreach ($children as $child) {
			// Удаляем эти превью, вместе с файлами
			$child->remove();
		}
		// И генерируем новые
		$file->generateThumbnails();

		// Если это первый файл в галерее - обновляем ссылку на превью товара
		/** @var msProductData $data */
		if ($file->get('rank') == 0 && $data = $product->getOne('Data')) {
			$thumb = $file->getFirstThumbnail();
			$data->set('thumb', $thumb['url']);
			$data->save();
		}
	}
}

echo microtime(true) - $modx->startTime;