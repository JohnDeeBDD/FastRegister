<?php
/*
Plugin Name: Fast Register
Plugin URI: http://customrayguns.com/
Description: 
Version: 0.1
Author: Jim Maguire
Author URI: http://customrayguns.com/
*/

namespace FastRegister;

//die ('FastRegister.php');

require "FastRegister/FastRegisterPlugin.class.php";

$FastRegisterPlugin = new FastRegisterPlugin;

$FastRegisterPlugin->enableShortCode_fastRegister();
$FastRegisterPlugin->enableSidebarWidget();
$FastRegisterPlugin->enableFormListener();
$FastRegisterPlugin->autoFillLoginScreenForm();