<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 01.06.2018
 * Time: 4:57
 * Удаление старых сессий в таблице MODX посредством плагина, а не настройками PHP.
 */

<?php
$rand = rand(1, 1000);
if ($rand === 1) {
	$gcMaxlifetime = (integer) $modx->getOption('session_gc_maxlifetime', null, @ini_get('session.gc_maxlifetime'), true);
	$access = time() - $gcMaxlifetime;
	$modx->exec("
        DELETE FROM {$modx->getTableName('modSession')} WHERE `access` < {$access};
        OPTIMIZE TABLE {$modx->getTableName('modSession')};
    ");
	$modx->log(modX::LOG_LEVEL_ERROR, 'clearOldSessions: old sessions have been removed.');
}