<?php // Moodle configuration file

// Boilerplate
unset($CFG);
global $CFG;
$CFG = new stdClass();

// Database server
// MySQL
//$CFG->dbtype    = 'mysqli';
//$CFG->dblibrary = 'native';
//$CFG->dbhost    = '192.168.120.155';
//$CFG->dbname    = 'moodle';
//$CFG->dbuser    = 'moodle';
//$CFG->dbpass    = 'Password123';
//$CFG->prefix    = 'mdl_';
//$CFG->dboptions = array (
//    'dbpersist' => 0,
//    'dbport'    => 3306,
//    'dbsocket'  => '',
//);

// PostgreSQL
$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = '192.168.120.150';
$CFG->dbname    = 'ubuntu';
$CFG->dbuser    = 'ubuntu';
$CFG->dbpass    = 'gibberish';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
    'dbpersist' => 0,
    'dbport'    => 5432,
    'dbsocket'  => '',
);

// SQL Server
//$CFG->dbtype    = 'sqlsrv';
//$CFG->dblibrary = 'native';
//$CFG->dbhost    = 'tcp:192.168.120.155';
//$CFG->dbname    = 'moodle';
//$CFG->dbuser    = 'moodle';
//$CFG->dbpass    = 'Password123';
//$CFG->prefix    = 'mdl_';
//$CFG->dboptions = array(
//    'dbpersist' => 0,
//    'dbport'    => 1433,
//    'dbsocket'  => '',
//);

// Base URLs
$CFG->wwwroot = 'http://192.168.120.50';
$CFG->admin   = 'admin';

// Data directory
$CFG->dataroot             = '/home/ubuntu/data/base';
$CFG->directorypermissions = 0770;

// Send mails via MailCatcher on mail-debug
$CFG->smtphosts = '192.168.120.200:1025';

// Enable debugging
$CFG->debug        = E_ALL;
$CFG->debugdisplay = true;

// bmdisco_domain and local_signin settings
$CFG->forced_plugin_settings = array(
    'bmdisco_domain' => array(
        'defaultwwwroot' => '192.168.120.50',
    ),
);
$CFG->local_signin_userdomain = 'bmdisco_domain\\user_domain';
$CFG->alternateloginurl = '/local/signin/index.php';
$CFG->forgottenpasswordurl = $CFG->wwwroot . '/local/signin/forgot.php';

// Common developer options
//$CFG->debugstringids = true;
$CFG->langstringcache = false;
$CFG->cachejs = false;
//$CFG->themedesignermode = true;

// Behat testing environment
$CFG->behat_prefix        = 'b_';
$CFG->behat_dataroot      = '/home/ubuntu/data/behat';
$CFG->behat_faildump_path = '/home/ubuntu/data/behat-faildump';
$CFG->behat_wwwroot       = 'http://192.168.120.50/behat';
$CFG->behat_profiles = array(
    'chrome' => array(
        'extensions' => array(
            'Behat\MinkExtension' => array(
                'selenium2' => array(
                    'browser' => 'chrome',
                    'capabilities' => array(
                        'browser' => 'chrome',
                        'browserName' => 'chrome',
                    ),
                ),
            ),
        ),
    ),
    'firefox' => array(
        'extensions' => array(
            'Behat\MinkExtension' => array(
                'selenium2' => array(
                    'browser' => 'firefox',
                    'capabilities' => array(
                        'browser' => 'firefox',
                        'browserName' => 'firefox',
                    ),
                ),
            ),
        ),
    ),
    'iexplore' => array(
        'extensions' => array(
            'Behat\MinkExtension' => array(
                'selenium2' => array(
                    'browser' => 'iexplore',
                    'capabilities' => array(
                        'browser' => 'iexplore',
                        'browserName' => 'iexplore',
                    ),
                ),
            ),
        ),
    ),
);
$CFG->behat_config = array_merge(array(
    'default' => array(
        'extensions' => array(
            'Behat\MinkExtension' => array(
                'selenium2' => array(
                    'wd_host' => 'http://192.168.120.100:4444/wd/hub',
                    'capabilities' => array(
                        'browserVersion'    => 'ANY',
                        'deviceType'        => 'ANY',
                        'name'              => 'ANY',
                        'deviceOrientation' => 'ANY',
                        'ignoreZoomSetting' => 'ANY',
                        'version'           => 'ANY',
                        'platform'          => 'ANY',
                    ),
                ),
            ),
        ),
    ),
), $CFG->behat_profiles);

// Selenium node path configuration
// Requires https://github.com/moodle/moodle/compare/master...LukeCarrier:MDL-NOBUG-selenium-remote-node-file-upload-master
$CFG->behat_node_dirroot = '/home/ubuntu/moodle1';
$CFG->behat_node_dir_sep = '/';

// PHPUnit testing environment
$CFG->phpunit_prefix   = 'phpu_';
$CFG->phpunit_dataroot = dirname($CFG->dataroot) . '/phpunit';

// Bootstrap Moodle
require_once __DIR__ . '/lib/setup.php';
