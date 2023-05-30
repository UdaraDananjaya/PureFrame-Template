<?php

/**
 * Framework Autoloading Library
 * temp_eng -> Template Engine
 * mail_lib -> Mail Library
 */

if (CONFIG['temp_eng']) {
    require_once 'App/libraries/Template_Engine/Template.php';
}
if (CONFIG['mail_lib']) {
    require_once 'App/libraries/Mail/mail.php';
}