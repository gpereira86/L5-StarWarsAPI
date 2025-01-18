<?php
/**
 * Entry point for the application.
 *
 * This script initializes the system by including the necessary files,
 * retrieves the current request URI and method, and routes the request
 * to the appropriate handler using the defineRoutes function.
 *
 * Included files:
 * - `Autoloader.php`: Handles automatic loading of classes.
 * - `routes.php`: Defines the routing logic for the application.
 * - `config.php`: Contains application configurations.
 * - `secureConfig.php`: Contains ignored or sensitive configurations.
 *
 * @global string $_SERVER['REQUEST_URI'] The URI of the current request.
 * @global string $_SERVER['REQUEST_METHOD'] The HTTP method of the current request.
 */

require_once './system/Autoloader.php';
require_once './routes.php';
require_once './system/config.php';
require_once './system/secureConfig.php'; // Loads sensitive configurations to be ignored by version control.

$uri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

defineRoutes($uri, $requestMethod);
