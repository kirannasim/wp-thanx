<?php

class autopilot {
    
    private $api_protocol = "https://";
    private $api_url = "api2.autopilothq.com/";
    private $api_version = "v1/";
    private $api_key = "b92fa25f3a1f4ab2819293e75db118c4";
    private $tracking = true;
    private $tracking_file = './ap_tracking.log';
    
    function __construct() {
        $this->apiBase = $this->api_protocol.$this->api_url.$this->api_version;
        $this->tracking("Initialised session...");
    }

    private function tracking($message) {
        if ($this->tracking) {
            $log = "[".date("F j, Y, g:i a")."] - ".$message.PHP_EOL;
            file_put_contents($this->tracking_file, $log, FILE_APPEND);
        }
    }
    
    private function post($endpoint, $body = NULL) {
        if (is_array($body)) {
            $body = json_encode($body);
        }

        $this->tracking("Posting data to ".$endpoint."..."."\r\n".$body);

        $timeout = 5;
        
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $this->apiBase.$endpoint);
        curl_setopt($cURL, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($cURL, CURLOPT_CONNECTTIMEOUT, $timeout);
        
        if (!is_null($body)) {
            curl_setopt($cURL, CURLOPT_POSTFIELDS, $body);
            curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Accept: application/json',
                'autopilotapikey: '.$this->api_key
            ));
        } else {
            curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
                'autopilotapikey: '.$this->api_key
            ));
        }
        
        $result = curl_exec($cURL);
        curl_close($cURL);

        $this->tracking("Posting result..."."\r\n".$result);
        return $result;
    }

    private function get($endpoint) {
        $this->tracking("Getting data from ".$endpoint."...");

        $timeout = 5;
        
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $this->apiBase.$endpoint);
        curl_setopt($cURL, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'autopilotapikey: '.$this->api_key
        ));
        
        $result = curl_exec($cURL);
        curl_close($cURL);

        $this->tracking("Getting result..."."\r\n".$result);
        return $result;
    }

    /**
     * Get lists
     *
     * @return Lists
     */
    public function getLists()
    {
        $this->tracking("Getting lists...");
        $response = $this->get('lists');
        
        return $response;
    }

    /**
     * Get triggers
     *
     * @return Triggers
     */
    public function getTriggers()
    {
        $this->tracking("Getting triggers...");
        $response = $this->get('triggers');
        
        return $response;
    }

    /**
     * Add contact
     *
     * @param $contactData
     *
     * @return ContactID
     */
    public function addContact($contactData)
    {
        $this->tracking("Adding Contact...");
        $response = $this->post('contact', $contactData);
        
        return $response;
    }
    
    /**
     * Add contact to list
     *
     * @param $listId
     * @param $contactId
     *
     * @return bool
     */
    public function addContactToList($listId, $contactId)
    {
        $this->tracking("Adding Contact (".$contactId.") and to a list (".$listId.")...");
        $listId = str_replace('contactlist_', '', $list_id);
        $response = $this->post('list/contactlist_' . $listId . '/contact/' . $contactId);
        
        return true;
    }

    /**
     * Add contact to journey
     *
     * @param $triggerId
     * @param $contactId
     *
     * @return bool
     */
     public function addContactToJourney($triggerId, $contactData)
     {
        $this->tracking("Creating Contact and add to a Journey (".$triggerId.")...");
        $response = $this->post('trigger/' . $triggerId . '/contact', $contactData);
        
        return true;
     }

     /**
     * Assign contact to journey
     *
     * @param $triggerId
     * @param $contactId
     *
     * @return bool
     */
    public function assignContactToJourney($triggerId, $contactId)
    {
        $this->tracking("Assign Contact (".$contactId.") to a Journey (".$triggerId.")...");
        $response = $this->post('trigger/' . $triggerId . '/contact/' . $contactId);
       
       return true;
    }

    /**
     * Record Page Visit
     *
     * @param $visitData
     *
     * @return bool
     */
    public function recordPageVisit($visitData)
    {
        $this->tracking("Track a Page View...");
        $response = $this->post('pagevisit/visit', $visitData);
       
       return true;
    }

    /**
     * Associate Session
     *
     * @param $visitData
     *
     * @return bool
     */
    public function associateSession($sessionData)
    {
        $this->tracking("Associate Session...");
        $response = $this->post('pagevisit/associate', $sessionData);
       
       return true;
    }
}
