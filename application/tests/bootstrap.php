<?php
/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */
$tests_dir = __DIR__;
$project_root = dirname($tests_dir, 2);
$application_folder = "$project_root/application";

// The path to the starting file of your project
define('FCPATH', "$project_root/index.php");

/*
 * --------------------------------------------------------------------
 * SET UP THE TEST ENVIRONMENT
 * --------------------------------------------------------------------
 */
// Set the current directory to the project root
chdir($project_root);

// Set the environment to "testing"
define('ENVIRONMENT', 'testing');

/*
 * --------------------------------------------------------------------
 * LOAD THE FRAMEWORK
 * --------------------------------------------------------------------
 */
// The path to the system folder
$system_path = "$project_root/system";

// The path to the framework bootstrap file
require_once "$system_path/core/CodeIgniter.php";

/*
 * --------------------------------------------------------------------
 * LOAD THE TESTCASE
 * --------------------------------------------------------------------
 */
require_once "$tests_dir/TestCase.php";
