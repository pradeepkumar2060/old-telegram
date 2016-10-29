<?php
class Quote{

    private $categories = array("inspire", "management", "sports", "life", "funny", "art", "students", "love");
    private $endpoint = "http://quotes.rest/qod.json?category=%s";

    private $testResponse = '{ "success": { "total": 1 }, "contents": { "quotes": [ { "quote": "If you like what you do, and you’re lucky enough to be good at it, do it for that reason.", "length": "96", "author": "Phil Grimshaw", "tags": [ "inspire", "luck", "reason", "tso-life" ], "category": "inspire", "date": "2016-10-09", "title": "Inspiring Quote of the day", "background": "https://theysaidso.com/img/bgs/man_on_the_mountain.jpg", "id": "j1sPwFauvgEBPe9xEzmT3weF" } ] } }';

    public function fetchQuote($category=null){
        // fetch the URL to call
        $endpoint = $this->getApiEndpoint($category);

        // Get Content
        $content = $this->testResponse; //$this->callApi($endpoint);

        // Parse response
        $response = json_decode($content, true);

        // Return just the quote
        $toReturn = $response['contents']['quotes'][0];
        $toReturn['requested_category'] = $category;
        return $toReturn;
    }

    private function callApi($url){
        // call URL and get contents
        $content = file_get_contents($url);

        // Check if Backend API has failed to return a successul response
        if($content===FALSE){
            throw new Exception("Backend service failed to return a response. Possibly throttling our request.");
        }

        return $content;
    }

    private function getApiEndpoint($category=null){
        // If a category is specified then great, otherwise pick one randomly from the list
        $category = $category!=null ? strtolower($category) : $this->categories[array_rand($this->categories, 1)];

        // Is it a valid category?
        if( !in_array($category, $this->categories) ){
            throw new Exception("Category: $category is invalid.");
        }

        return sprintf( $endpoint, $category );
    }

    public function getCategories(){
        return $this->categories;
    }
}