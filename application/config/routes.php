<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route = array(
    'default_controller'   	=> 'login',
    '404_override'         	=> '',
    'logout'    => 'login/logout',
    'admin/device'    => 'device',
    'admin/setting'    => 'setting',
    'admin/data=jabatan'    => 'data/jabatan',
    'admin/appsinfo'    => 'setting/info',
    'admin/data=master'    => 'data/master',
    'cs/chatframe' => 'cs/chatframe',
    'cs/rest_sendchat' => 'cs/rest_sendchat',
    'cs/rest_sendchatfile' => 'cs/rest_sendchatfile',
    'admin/data/disable_id=(:any)'    => 'data/disable/$1',
    'admin/data/enable_id=(:any)'    => 'data/enable/$1',
    'admin/data/AddCS=(:any)'    => 'data/AddCS/$1',
    'admin/data/DelCS=(:any)'    => 'data/DelCS/$1',
    'translate_uri_dashes' 	=> FALSE
);
