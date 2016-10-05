<?php

class GoogleTranslateClient {

    static $GOOGLE_API_URL = "https://www.googleapis.com/language/translate/v2?key=%s&source=%s&target=%s";

    const LANGUAGE_ENGLISH      = "en";
    const LANGUAGE_RUSSIAN      = "ru";
    const LANGUAGE_UKRAINIAN    = "ua";

    private $apiKey;
    private $sourceLanguage;
    private $targetLanguage;

    function __construct($apiKey, $sourceLanguage = self::LANGUAGE_RUSSIAN, $targetLanguage = self::LANGUAGE_ENGLISH) {
        $this->apiKey = $apiKey;
    }

    public function setSourceLanguage ($sourceLanguage) {
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }

    public function getSourceLanguage () {
        return $this->sourceLanguage;

    }

    public function setTargetLanguage ($targetLanguage) {
        $this->targetLanguage = $targetLanguage;
        return $this;
    }

    public function getTargetLanguage () {
        return $this->targetLanguage;
    }

    public function translate (array $arguments){
        if (count($arguments)) {
            $parameters = '';

            foreach ($arguments as $argument) {
                $parameters .= sprintf('&q=%s', rawurlencode($argument));
            }

            $url = sprintf(self::$GOOGLE_API_URL, $this->apiKey, $this->sourceLanguage, $this->targetLanguage);
            $url .= $parameters;
            
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);
            $responseDecoded = json_decode($response, true);
            $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            curl_close($handle);

            if ($responseCode != 200) {
                return false;
            } else {
                return $responseDecoded['data']['translations'];
            }
        }

        return false;
    }
}