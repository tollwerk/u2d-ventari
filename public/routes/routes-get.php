<?php
if (isset($_SERVER['REQUEST_URI'])) {
    // Fixture file path
    $fixtureFileName = '';

    // String to array
    $requestUri = array_diff(array_filter(explode('/', $_SERVER['REQUEST_URI'])), ['?']);

    $pathIndex = 0;
    foreach ($requestUri as $path) {
        ++$pathIndex;

        // Skip empty spaces created by delimiter
        if (!empty($path)) {

            if (is_bool(strpos($path, '?'))) {
                // Append fixture file path string
                $fixtureFileName .= $path;
                $fixtureFileName .= ($pathIndex < count($requestUri)) ? '-' : '';
            } else {
                // Shish kebab the query string
                parse_str(str_replace('?', '', $path), $queryString);

                $queryIndex = 0;
                foreach ($queryString as $query => $value) {
                    ++$queryIndex;

                    if (is_bool(strpos($value, '{'))) {
                        // Normal query (key => value)
                        $fixtureFileName .= $query.'-'.substr($value, 0, 1);
                    } else {
                        // Abnormal query (key => object)
                        $fixtureFileName .= ($queryIndex < count($queryString)) ? '-' : '';
                    }
                }
            }

            // Connect of end the fixture file path string
            $fixtureFileName .= ($pathIndex < count($requestUri)) ? '' : '.json';
        }
    }

    // Fixture file
    $fixtureFilePath = dirname(__DIR__).DIRECTORY_SEPARATOR.'fixtures'.DIRECTORY_SEPARATOR.$fixtureFileName;

    if (is_file($fixtureFilePath) && file_exists($fixtureFilePath)) {
        require $fixtureFilePath;

        return;
    } else {
        echo json_encode([
            'message'  => 'Bad Route:',
            'input'    => $_SERVER['REQUEST_URI'],
            'filepath' => $fixtureFilePath,
            'paths'    => $requestUri
        ]);
    }
}
