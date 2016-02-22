class drupal::civicrm(
$server_name = 'default',
$drupal_deploy_path = '/usr/share/nginx/html/drupal',
$civi_link = 'https://download.civicrm.org/civicrm-4.7.2-drupal.tar.gz?src=donate',
$civi_tarball = 'civicrm-4.7.2-drupal.tar.gz?src=donate',
$civi_user = 'root',
$civi_pass = 'password',
$civi_host = 'localhost',
$civi_db = 'mycv',
){	
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


	file { [ '/root/.drush', '/root/.drush/commands/', '/root/.drush/commands/civicrm' ]:
	ensure => 'directory',
	before => File['civicrm_drush_file'],
	owner  => 'root',
	group  => 'root',
  }

file { 'civicrm_drush_file':
        path => "/root/.drush/commands/civicrm/civicrm.drush.inc",
    ensure => 'file',
    source => "puppet:///modules/drupal/civicrm.drush.inc",
    owner => 'root',
    group => 'root',
    mode => '644',
  }


exec { 'download_civicrm':
        cwd => "/opt",
        command => "bash -c \"wget $civi_link && mv $civi_tarball civi.tar.gz\"",
	creates => "/opt/civi.tar.gz",
	require => File['civicrm_drush_file'],
}

exec { 'install_civicrm':
        cwd => "$drupal_deploy_path",
        require => Exec['download_civicrm'],
        command => "bash -c \"drush cache-clear drush && drush civicrm-install --dbuser=$civi_user --dbpass=$civi_pass --dbhost=$civi_host --dbname=$civi_db --tarfile=/opt/civi.tar.gz --destination=sites/all/modules --site_url=$server_name --ssl=on && chown -R www-data:www-data $drupal_deploy_path\"",
        creates => "$drupal_deploy_path/sites/all/modules/civicrm",
	user => "root",
	environment => ["HOME=/root"]
}

}
