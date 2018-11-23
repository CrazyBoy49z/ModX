# Reset for user 1
UPDATE `modx_user_attributes` SET `blocked` = '0', `blockeduntil` = '0', `failedlogincount` = '0' WHERE `modx_user_attributes`.`id` = 1;

# Warning! Reset for all users
#UPDATE `modx_user_attributes` SET `blocked` = '0', `blockeduntil` = '0', `failedlogincount` = '0';