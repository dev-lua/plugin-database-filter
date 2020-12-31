<?php 
/*
 Plugin Name: Search and filter data in database table 
 Author: Luana Carvalho
 Description: Plugin for search and filter data in database table 
 github: dev-lua
 Version: 1.0
 Update: 31th December 2020
*/ 

//Directory security
if(!defined('ABSPATH')){
    exit("Acesso Negado");
}

// Form and search result
define('DiretorioPlugin', plugin_dir_path(__FILE__));
require_once(DiretorioPlugin.'class/form.php');