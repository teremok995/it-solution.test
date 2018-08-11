@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../xpdo/xpdo/bin/xpdo
php "%BIN_TARGET%" %*
