<?php
if (isset($_SERVER['REQUEST_URI'])) {
    // Data file path
    $dataFileName = '';
    // Directory name
    $dataDirectory = 'json';

    // String to array
    $requestUri = array_diff(array_filter(explode('/', $_SERVER['REQUEST_URI'])), ['?']);

    $pathIndex = 0;
    foreach ($requestUri as $path) {
        ++$pathIndex;

        // Skip empty spaces created by delimiter
        if (!empty($path)) {

            if (is_bool(strpos($path, '?'))) {
                // Append data file path string
                $dataFileName .= $path;
                $dataFileName .= ($pathIndex < count($requestUri)) ? '-' : '';
            } else {
                // Shish kebab the query string
                parse_str(str_replace('?', '', $path), $queryString);

                $queryIndex = 0;
                foreach ($queryString as $query => $value) {
                    ++$queryIndex;

                    if (is_bool(strpos($value, '{'))) {
                        // Normal query (key => value)
                        $dataFileName .= $query.'-'.substr($value, 0, 1);
                    } else {
                        // Abnormal query (key => object)
                        $dataFileName .= ($queryIndex < count($queryString)) ? '-' : '';
                    }
                }
            }

            // Connect of end the data file path string
            $dataFileName .= ($pathIndex < count($requestUri)) ? '' : '.json';
        }
    }

    // Data file
    $dataFilePath = dirname(__DIR__).DIRECTORY_SEPARATOR.$dataDirectory.DIRECTORY_SEPARATOR.$dataFileName;

    if (is_file($dataFilePath) && file_exists($dataFilePath)) {
        echo file_get_contents($dataFilePath);
    } else {
        echo json_encode([
            'message'  => 'Bad Route:',
            'input'    => $_SERVER['REQUEST_URI'],
            'filepath' => $dataFilePath,
            'paths'    => $requestUri
        ]);
    }
}
