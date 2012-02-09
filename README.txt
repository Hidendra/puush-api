puu.sh does not offer a custom FTP/SFTP server option and the product they offer is so wonderful that allowing something such as this would benefit some of us greatly.

This is a very simple replacement for the puush.me upload servers. Please note that this only offers uploading, no UI, no tracking, no "fake accounts" (make you show up as Pro), etc etc.

If you love puush, consider supporting them by purchasing Pro

REQUIREMENTS

1. A webserver. Lighttpd rewrite rules are given in docs/.
   If you use Apache, you will need to write your own mod_rewrite rules
2. PHP

USAGE

- Using the hosts file (or your DNS server if you have one?), route PUUSH.ME to the server you setup this script on.
- On the server that will accept these requests, make sure they have a vhost setup to accept requests at PUUSH.ME and also another location so that you (and anyone else) can actually view them.

If you've already changed the domain in config.php, you are good to go. Use puush as normal to upload files and it will work as if it's uploaded to puush.me; it will still happily put the full (and correct) URL into your clipboard.