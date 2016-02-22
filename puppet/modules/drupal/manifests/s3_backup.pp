class drupal::s3_backup(
$s3_api="https://github.com/tpyo/amazon-s3-php-class/tarball/master",
$drupal_deploy_path = '/usr/share/nginx/html/drupal'
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
exec { 'place_s3_api':
        cwd => "$drupal_deploy_path",
        command => "wget $s3_api && tar -xzvf master && mv tpyo-amazon* $drupal_deploy_path/sites/all/libraries/s3-php5-curl",
        creates => "$drupal_deploy_path/sites/all/libraries/s3-php5-curl",
}
}
