<?php
/* @autor CrazyBoy49z
 * @site https://yura.finiv.in.ua
 * @date 12.08.2018
 */
if ($modx->event->name != "OnHandleRequest") {return;}

$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/robots.txt') return;
$url = $_SERVER['HTTP_HOST'];
$site_url = explode('/',$modx->getOption('site_url'));
if ($url != $site_url[2] || !$_SERVER['HTTPS']) {
	$modx->sendRedirect('https://'.$site_url[2].$uri, array(
			'responseCode' => 'HTTP/1.1 301 Moved Permanently')
	);
}