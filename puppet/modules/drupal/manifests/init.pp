# == Class: drupal
#
# Full description of class drupal here.
#
# === Parameters
#
# Document parameters here.
#
# [*sample_parameter*]
#   Explanation of what this parameter affects and what it defaults to.
#   e.g. "Specify one or more upstream ntp servers as an array."
#
# === Variables
#
# Here you should define a list of variables that this module would require.
#
# [*sample_variable*]
#   Explanation of how this variable affects the funtion of this class and if
#   it has a default. e.g. "The parameter enc_ntp_servers must be set by the
#   External Node Classifier as a comma separated list of hostnames." (Note,
#   global variables should be avoided in favor of class parameters as
#   of Puppet 2.6.)
#
# === Examples
#
#  class { drupal:
#    servers => [ 'pool.ntp.org', 'ntp.local.company.com' ],
#  }
#
# === Authors
#
# Author Name <author@domain.com>
#
# === Copyright
#
# Copyright 2016 Your name here, unless otherwise noted.
#
class drupal(
$server_name = 'default',
$drupal_deploy_path = '/usr/share/nginx/html/drupal',
$drupal_password='password',
$db_host_ip = 'localhost',
$db_username = 'root',
$db_password = 'password',
$db_name = 'drupal',
$web_root = '/usr/share/nginx/html',
$drupal_modules = ['admin', 'ctools', 'views', 'backup_migrate']
) {
Exec {
                path => [
                        '/usr/local/bin',
                        '/opt/local/bin',
                        '/usr/bin',
                        '/usr/sbin',
                        '/bin',
                        '/sbin'],
                        logoutput => true
        }

exec { 'place_drupal':
	cwd => "$web_root",
	command => "drush dl drupal-7.42 && mv drupal-7.42 drupal && chown -R www-data:www-data $drupal_deploy_path",
	creates => "$drupal_deploy_path",
}

exec { 'setting_php':
	command => "cp $drupal_deploy_path/sites/default/default.settings.php $drupal_deploy_path/sites/default/settings.php && chown -R www-data:www-data $drupal_deploy_path/sites/default/settings.php && chmod 644 $drupal_deploy_path/sites/default/settings.php",
	require => Exec['place_drupal'],
	creates => "$drupal_deploy_path/sites/default/settings.php"
}

exec { 'install_drupal':
        require => Exec['setting_php'],
        cwd => "$drupal_deploy_path",
	command => "bash -c \"drush site-install standard -y --account-pass=$drupal_password --db-url=mysql://$db_username:$db_password@$db_host_ip:3306/$db_name;chown -R www-data:www-data $drupal_deploy_path/sites/default/files\"",
	creates => "$drupal_deploy_path/sites/default/files",
}

file {'/var/drupal_modules_dir':
        ensure => ['directory','present']
}

drupal_modules{ $drupal_modules:
	drupal_deploy_path => "$drupal_deploy_path",
	require => Exec['install_drupal'],
}

drupal_modules{ 'views_ui':
	drupal_deploy_path => "$drupal_deploy_path",
	require => Drupal_modules[$drupal_modules],
}
}
