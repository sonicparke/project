<?
$cfg['db_host'] = 'localhost';
$cfg['db_username'] = 'danf_xpo';
$cfg['db_passwd'] = 'rNjeaTtYp4K4rwwn';
$cfg['db_database'] = 'danf_xpo';

$pdo = new PDO(
               "mysql:host=$cfg[db_host];dbname=$cfg[db_database]",
               $cfg['db_username'],
               $cfg['db_passwd'],
               array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"')
               )
  or die("Can't create PDO");
?>
