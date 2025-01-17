<?php

namespace system\controller;

use system\core\Helpers;

/**
 * SiteController is responsible for handling the rendering of different pages for the site.
 *
 * This controller manages the logic for rendering pages like the homepage, movie detail page, and error page.
 * It uses the `renderHTML` method to load the corresponding HTML files from the front-end views.
 */
class SiteController
{
    /**
     * Renders the homepage of the site.
     *
     * This method loads the `index.html` file from the front-end views and outputs it to the browser.
     * It does not require any data to be passed and simply renders the static homepage.
     */
    public function index()
    {
        $this->renderHTML('./front-end/view/index.html', ['Teste']);
    }

    /**
     * Renders the movie details page for a specific movie.
     *
     * This method loads the `movie-details.html` file from the front-end views, and it may include
     * specific movie data if provided. The movie details are expected to be passed as part of the
     * data array.
     *
     * @param string $movieName The name of the movie whose details are to be displayed.
     * @param array $data Optional data to be passed to the view, such as movie information.
     */
    public function movieDetailPage()
    {
        $this->renderHTML('./front-end/view/movie-details.html');
    }


    /**
     * Downloads a file to the user.
     *
     * This method checks if the specified file exists on the server. If it does, it sends the necessary
     * headers to the browser to trigger the file download. It then outputs the file content to the user.
     * If the file does not exist, it sends a 404 HTTP response and redirects the user to an error page.
     *
     * @return void
     */
    public function downloadFile()
    {
        $filePath = './arquivo-site-l5test/test-l5-compactado.rar';

        if (file_exists($filePath)) {

            header('Content-Description: File Transfer');
            header('Content-Type: application/x-rar-compressed');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            ob_clean();
            flush();

            readfile($filePath);

            exit;
        } else {
            http_response_code(404);
            sleep(2);
            Helpers::redirectUrl('error-page');
        }
    }



    /**
     * Renders the error page.
     *
     * This method loads the `error.html` file from the front-end views and displays an error message.
     * It can be used for handling various types of errors that occur on the site.
     */
    public function errorPage()
    {
        $this->renderHTML('./front-end/view/error.html');
    }

    /**
     * Renders an HTML file and outputs its content to the browser.
     *
     * This method is responsible for loading the specified HTML file, extracting any data passed
     * as an associative array, and rendering the content. If the HTML file does not exist, it throws
     * an exception with an error message.
     *
     * It utilizes output buffering to capture the content of the HTML file and pass any variables
     * extracted from the data array.
     *
     * @param string $file The path to the HTML file to be rendered.
     * @param array $data Optional associative array of data to be passed to the HTML file.
     * @throws \Exception If the specified HTML file is not found.
     */
    public function renderHTML($file, $data = [])
    {
        try {
            if (!file_exists($file)) {
                throw new \Exception("HTML file not found: " . $file);
            }

            ob_start();
            extract($data);
            include($file);
            $content = ob_get_clean();
            echo $content;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
