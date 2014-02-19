<?php
/*
Plugin Name: WP Code Igniter
Description: Integration of CodeIgniter into Wordpress - this plugin makes CodeIgniter functionality available to Wordpress themes and plugins.
Author: Wild Mice Media
Version: 1.0

Copyright 2011  Wild Mice Media

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

if(!is_admin()) {

  // This section emulates the CodeIgniter bootstrap, without any application environment

  try {

    // backuping query string
    $query_string = urlencode($_SERVER['QUERY_STRING']);

    // destroying the $_GET array (but reconstructed when CI leaves)
    $_GET = array();

    // let's use CI a bit to recover our $_GET array
    $_SERVER['PATH_INFO'] = '/ci_mods/recover_get_array/'.$query_string;  

    // application environment
    define('ENVIRONMENT', 'production');

    // system folder
    $system_path = str_replace('\\','/',realpath(__DIR__.'/ci/system'));
    $system_path = rtrim($system_path, '/').'/';
    define('BASEPATH',$system_path);

    // name of system folder
    define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

    // application folder
    $application_folder = str_replace('\\','/',realpath(__DIR__.'/ci/application'));
    define('APPPATH', $application_folder.'/');

    // name of this file
    define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

    // path to front controller (this file)
    define('FCPATH', str_replace(SELF, '', __FILE__));

    // PHP file extension
    define('EXT', '.php');

    // Set the current directory correctly for CLI requests
    if (defined('STDIN')) { chdir(dirname(__FILE__)); }

    // load bootstrap file
    require_once realpath(__DIR__.'/ci_mods/CodeIgniter.php');

    // if everything went well, set a status flag
    define('WP_CODE_IGNITER',TRUE);

  } catch (Exception $e) {
    // try/catch works best in object mode (which we cannot use here), so not all errors will be caught
    echo '<span style="font-weight:bold;">WP Code Igniter:</span> '.nl2br($e);
  }
  
  //////////////////////////////////////////////////////////////////////

  class WP_Code_Igniter extends CI_Controller {

    public function load_db() {

      global $db;

      // load the database config
      include(APPPATH.'config/database'.EXT);

      // get the default config
      $config = $db['default'];

      // get database settings
      $opt = parse_ini_file(realpath(__DIR__.'/config/config.ini.php'), true);
      $opt = parse_ini_file(realpath(__DIR__.'/config/config.ini.php'), true);
      if($opt['default']['dbdriver'] &&
        $opt['default']['hostname'] &&
        $opt['default']['username'] &&
        $opt['default']['password'] &&
        $opt['default']['database']
      ) {

        // override the database name
        $config['dbdriver'] = $opt['default']['dbdriver'];
        $config['hostname'] = $opt['default']['hostname'];
        $config['database'] = $opt['default']['database'];
        $config['username'] = $opt['default']['username'];
        $config['password'] = $opt['default']['password'];
        $config['db_debug'] = FALSE;

        // do not auto initialize the connection
        $config['autoinit'] = FALSE;

        // load the database driver
        if($db = $this->load->database($config, TRUE)) {

          // and see if we can initialize it
          $db->initialize();
          return TRUE;
        
        }
        else return FALSE;

      }
      else return FALSE;

    }

  }

  $wp_code_igniter = new WP_Code_Igniter;
  if($wp_code_igniter->load_db())define('WP_CODE_IGNITER_DB',TRUE);

}
?>