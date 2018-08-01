<?php

/**
 * This configuration will be read and overlaid on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 */
return [
    'target_php_version' => null,
    'backward_compatibility_checks' => false,
    'quick_mode' => true,
    'analyze_signature_compatibility' => false,
    'minimum_severity' => 10,

    // A list of directories that should be parsed for class and
    // method information. After excluding the directories
    // defined in exclude_analysis_directory_list, the remaining
    // files will be statically analyzed for errors.
    //
    // Thus, both first-party and third-party code being used by
    // your application should be included in this list.
    'directory_list' => [
        'src',
        'vendor/symfony/console',
    ],
    "exclude_analysis_directory_list" => [
        'vendor/'
    ],
];