<?php
/**
 * Modules definition file reader
 *
 * @example
 * # Example of making module as required (e.g. impossible to disable).
 * !module
 * # Example of removing module from module list
 * -module
 */

$moduleDefinitions = glob(__DIR__ . DIRECTORY_SEPARATOR . 'data/modules/*.mod');

$modules = array();

// Organize easy way to control module activity
foreach ($moduleDefinitions as $moduleDefinitionFile) {
    // Gets data from mod files and build modules array
    $modules = array_merge(
        $modules,
        array_map( // Auto-trimming of white-spaces
            'trim',
            explode("\n", file_get_contents($moduleDefinitionFile))
        )
    );
}

return array_filter($modules, function ($module) use ($modules) {
    $module = ltrim($module, '-!'); // Trim special control chars

    // Check that string is a valid PHP Namespace
    if (!preg_match('/[a-zA-Z][a-zA-Z0-9_\\\\]+/', $module)) {
        return false;
    }

    // Return true only if module is not disabled or required
    if (array_search('!' . $module, $modules) !== false
        || array_search('-' . $module, $modules) === false) {
        return true;
    }

    return false;
});