# download
rsync -av --progress \
	--rsh='ssh -p 987' \
	--exclude="error_log" \
	--exclude="application/logs" \
	--exclude="application/config/myconfig.php" \
	--exclude="application/config/database.php" \
	tele@television.data99.com.ar:/home/tele/www/ .

#files
echo "Rsync files"
rsync -av --progress --exclude='.git' --rsh='ssh -p 987' . tele@television.data99.com.ar:/home/tele/www/
 
#permissions
echo "Fix file's and forlder's permissions"
ssh -p 987 tele@television.data99.com.ar "find /home/tele/www/ -type d -exec chmod 755 {} \; && find /home/tele/www/ -type f -exec chmod 644 {} \;"
