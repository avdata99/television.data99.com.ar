# download
rsync -av --progress \
	--rsh='ssh -p 987' \
	--exclude="error_log" \
	--exclude="PROD" \
	--exclude="application/logs" \
	--exclude="application/config/myconfig.php" \
	--exclude="application/config/database.php" \
	--exclude="application/views/views/" \
	tele@television.data99.com.ar:/home/tele/www/ .
