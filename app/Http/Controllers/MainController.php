<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    const BOAT_API_ROUTE = 'https://idealboat.com/';    // URL of the data
    const BOAT_API_FILE = 'feed.xml';                   // Resource name

    /*
     * Main function, get the data from the boat and send it to a Laravel View
     * */
    public function getBoatsInfo() {
        $fileUrl = self::BOAT_API_ROUTE . self::BOAT_API_FILE;
        if (!file_exists('./' . self::BOAT_API_FILE)) { // If we don't have the file yet, download it
            $res = $this->downloadFile($fileUrl);
        }
        $data = ['xml' => $this->getData("xml")];

        // TODO: save this data in a database, probably with a process, and save it in database
        return view('index', $data);
    }

    /*
     * Get the data in different formats (from a downloaded file in XML or from web in Json format)
     * */
    private function getData($format, $fileUrl = "") {
        switch (strtolower(trim($format))) {
            case "xml":
                return $this->getAsXml("./" . self::BOAT_API_FILE);
                break;
            case "json":
                return $this->getAsJson($fileUrl);
                break;
            default:
                return false;
        }
    }

    /*
     * Load data from a file in XML format
     * */
    private function getAsXml($fileUrl) {
        $xml = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $fileUrl);
        return simplexml_load_file($xml,'SimpleXMLElement', LIBXML_NOCDATA);
    }

    /*
     * Get data from and url and return in Json format
     * */
    private function getAsJson($fileUrl) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $fileUrl, [
            'headers' => [
                'Accept' => 'text/xml'
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            $response = json_decode(json_encode(simplexml_load_string($response->getBody()->getContents())), true);
        }
        return $response;
    }

    /*
     * Download the file from an url
     * */
    private function downloadFile($fileUrl) {
        $fp = fopen($fileUrl, 'w+');
        if($fp === false) { // TODO: inform the user
            throw new Exception('Could not open: ' . self::BOAT_API_FILE);
        }
        $ch = curl_init($fileUrl);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_exec($ch);
        if(curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        fclose($fp);

        return $statusCode; // 200 = success
    }
}
