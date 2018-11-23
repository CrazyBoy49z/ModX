
--SQL to disable caching in MODX Revolution for Development purpose
-- disable all cache options
UPDATE `modx_system_settings` SET value = 0
WHERE `area` = 'caching' AND `xtype` = 'combo-boolean';

-- reactivate cache_disabled :)
UPDATE `modx_system_settings` SET value = 1
WHERE `key` = 'cache_disabled';

-- disable compress JS and CSS
UPDATE `modx_system_settings` SET value = 0
WHERE `key` IN ('compress_js', 'compress_css');

-- set session cookie path to webroot
UPDATE `modx_system_settings` SET value = '/'
WHERE `key` = 'session_cookie_path';