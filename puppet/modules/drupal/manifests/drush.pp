class drupal::drush{
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

  exec { "install_drush":
    command => "wget http://files.drush.org/drush.phar && php5 drush.phar core-status  && chmod +x drush.phar && sudo mv drush.phar /usr/local/bin/drush",
    creates => '/usr/local/bin/drush'
  }
}
