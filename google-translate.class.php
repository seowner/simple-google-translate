<?php

class SimpleGoogleTranslate {

    private $baseUrl = "https://translation.googleapis.com/language/translate/v2";
    private $apiKey;
    private $retryCount;

    public function __construct($apiKey, $retryCount = 5) {
        $this->apiKey = $apiKey;
        $this->retryCount = $retryCount;
    }

public function translate($text, $source, $target) {
    $url = $this->buildRequestUrl($text, $source, $target);

    for ($i = 0; $i < $this->retryCount; $i++) {
        $response = $this->makeRequest($url);
        if ($response['status'] === 200) {
            return $response['data']['data']['translations'][0]['translatedText'];
        } elseif ($response['status'] === 503) {
            continue; // Will retry since it's a 503 error
        } else {
            // If the error is not a 503, return the original text
            return $text;
        }
    }

    // If after retrying the specified number of times a 503 is still received,
    // return the original text.
    return $text;
}


    private function buildRequestUrl($text, $source, $target) {
        return $this->baseUrl . "?" . http_build_query([
            'q' => $text,
            'source' => $source,
            'target' => $target,
            'format' => 'text',
            'key' => $this->apiKey
        ]);
    }

    private function makeRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception("CURL Error: " . curl_error($ch));
        }

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['status' => $httpcode, 'data' => json_decode($result, true)];
    }
}







	
	
?>