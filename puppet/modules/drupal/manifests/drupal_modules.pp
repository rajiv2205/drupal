define drupal::drupal_modules(
$drupal_deploy_path = '/usr/share/nginx/html/drupal',
){

exec { "install_module_${name}":
        cwd => "$drupal_deploy_path",
        command => "bash -c \"drush en -y ${name} && touch /var/drupal_modules_dir/.${name}\"",
        creates => "/var/drupal_modules_dir/.${name}",
}

}
