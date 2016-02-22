include ::php
include ::nginx
include git
class{'drupal::drush':
require => Class['php']
}

class { 'mysql::server':
  root_password => "password",
  before => Class['drupal']
} 
  
mysql::db { 'new_drupal':
  user     => 'user',
  password => 'pass',
  host     => 'localhost',
  grant    => ['ALL'],
  require  => Class['mysql::server'],
  before   => Class['drupal'],
}
 
mysql::db { 'mycv':
  user     => 'user',
  password => 'pass',
  host     => 'localhost',
  grant    => ['ALL'],
  require  => Class['mysql::server'],
  before   => Class['drupal'],
}

class{'drupal':
        server_name => 'drupcrm1.com',
        web_root => '/usr/share/nginx/html',
        db_host_ip => 'localhost',
        db_username => 'user',
        db_password => 'pass',
        db_name => 'new_drupal',
        drupal_deploy_path => '/usr/share/nginx/html/drupal',
        require => Class['drupal::drush']
}

class { 'drupal::civicrm': 
server_name => 'drupcrm1.com',
drupal_deploy_path => '/usr/share/nginx/html/drupal',
civi_link => 'https://download.civicrm.org/civicrm-4.7.2-drupal.tar.gz?src=donate',
civi_tarball => 'civicrm-4.7.2-drupal.tar.gz?src=donate',
civi_user => 'user',
civi_pass => 'pass',
civi_host => 'localhost',
civi_db => 'mycv',
require => Class['drupal'],
}

class{'drupal::s3_backup':
drupal_deploy_path => '/usr/share/nginx/html/drupal',
require => Class['drupal'],
}
