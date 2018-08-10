<?php
/*
Plugin Name: Fast Register
Plugin URI: http://generalchicken.net/
Description: 
Version: 1.1
Author: John Dee
Author URI: http://generalchicken.net/
*/

namespace FastRegister;

//die ('FastRegister.php');

require "FastRegister/FastRegisterPlugin.class.php";

$FastRegisterPlugin = new FastRegisterPlugin;

$FastRegisterPlugin->enableShortCode_fastRegister();
$FastRegisterPlugin->enableSidebarWidget();
$FastRegisterPlugin->enableFormListener();
$FastRegisterPlugin->autoFillLoginScreenForm();
