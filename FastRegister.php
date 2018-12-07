<?php
/*
Plugin Name: Fast Register
Plugin URI: http://generalchicken.net/
Description: 
Version: 1.2
Author: John Dee
Author URI: http://generalchicken.net/
*/

namespace FastRegister;

require "FastRegister/FastRegisterPlugin.class.php";

$FastRegisterPlugin = new FastRegisterPlugin;

//It should output a form in a shortcode
//Because the user needs a place to enter their email
$FastRegisterPlugin->enableShortCode_fastRegister();

//It should output the form in the sidebar
//Because the user needs a place to enter their email
$FastRegisterPlugin->enableSidebarWidget();

//It should listen for a form submission
//Because it needs to get the data to process it
$FastRegisterPlugin->enableFormListener();

//Give a user has already registered
//When the same email is entered
//Then it should go to the login screen and autofill the email that was just entered
$FastRegisterPlugin->autoFillLoginScreenForm();