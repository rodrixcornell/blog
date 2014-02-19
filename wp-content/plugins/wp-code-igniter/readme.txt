=== WP Code Igniter ===

Contributors: wildmice
Tags: web application framework, model-view-controller, MVC framework, MVC, framework, CodeIgniter, theme development, plugin development
Requires at least: 3.2
Tested up to: 3.2.1
Stable tag: 1.0

Easy integration of CodeIgniter functionality into Wordpress, making it available for themes and other plugins.

== Description ==

Use this plugin to integrate the CodeIgniter framework into Wordpress, making it available for both themes and other 
plugins.

This plugin emulates a CI bootstrap, without any application environment (because Wordpress does that), and includes a 
configuration file for setting database connection parameters.

CodeIgniter is a powerful PHP framework with a very small footprint, built for PHP coders who need a simple and elegant 
toolkit to create full-featured web applications. It implements a popular application design pattern called 
model-view-controller (MVC). In this case, Wordpress becomes the 'view' instead of a CI application.

This plugin will probably work with versions of Wordpress earlier than 3.2, but if you are running such an earlier 
version check your version of PHP. CodeIgniter requires PHP 5.1.6 or later.

Note: This is the first version of this plugin and it has not had extensive testing. Consider it experimental and use at 
your own risk.

== Installation ==

Requires PHP 5.1.6 or later.

1. Download the plugin, and extract the files.
1. Download CodeIgniter from http://codeigniter.com/downloads/ and 
unpack the files.
1. Copy the contents of the CodeIgniter folder (application folder, system folder, index.php) into the plugin's "ci" folder.
1. Edit the plugin's configuration file, then upload the plugin to your plugins folder.
1. Activate the plugin through the Plugins menu in WordPress.

== Changelog ==

= 1.0 =
* This is the first version. Consider it a beta release, as it has not had much testing.

== Known Limitations ==

CodeIgniter functionality is not available to Wordpress admin.

== Usage ==

You can use CodeIgniter in both themes and other plugins. 
Here are some simple examples of its use in a theme context.

Simple Example 1 - Database Query:

`<?php
  if(defined('WP_CODE_IGNITER_DB')) {
    $res = $db->query('SELECT * FROM wp_users');
    foreach($res->result() as $row) {
      echo '<p>'.$row->user_login.'</p>';
    }
  }
?>`

Simple Example 2 - Pagination:

`<?php
  if(defined('WP_CODE_IGNITER')) {
    class Pagination extends CI_Controller {
      public function pagelinks()
      {
        $this->load->library('pagination');
        $config['base_url'] = 'http://example.com/index.php/test/page/';
        $config['total_rows'] = '200';
        $config['per_page'] = '20';
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
      }
    }
    $pagination = new Pagination;
    $pagination->pagelinks();
  }
?>`

== Frequently Asked Questions ==

= Where can I find documentation on CodeIgniter? =

The online manual is at [CodeIgniter User Guide Version](http://codeigniter.com/user_guide/index.html)
