<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 25.09.2018
 * Time: 21:56
 */

$phone = $hook->getValue('phone');
$success = true;
if (!preg_match('/^[\+]?([\d]{0,3})?[\(\.\-\s\ ]?([\d]{3})[\)\.\-\s\ ]*([\d]{3})[\.\-\s\ ]?([\d]{2}[\)\.\-\s\ ]*[\d]{2})$/', $phone)) {
	$hook->addError('phone', 'Неверный формат номера телефона!');
	$success = false;
}
return $success;