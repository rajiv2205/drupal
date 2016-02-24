# A drupal website

A new PCI compliant server using Nginx on an AWS micro instance.

Installation of Drupal 7 and CiviCRM this server in a secure fashion with different database instances. Installation is done with the help of Drush.

Drupal have a private files folder and CiviCRM extension directory configured correctly outside the modules.

The Nginx configuration is secure for CiviCRM.

Configured Drupal so that Drupal views can use the CiviCRM database (https://wiki.civicrm.org/confluence/display/CRMDOC/Views3+Integration)

Configured suitable backup and recovery script to Amazon S3 using the Backup and Migrate Drupal module and document what will be backed up.

--------------------
The above said is automated with Puppet.
--------------------
