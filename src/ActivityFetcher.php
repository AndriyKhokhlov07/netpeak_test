<?php

class ActivityFetcher {
    private $participants;
    private $type;

    public function __construct($participants, $type) {
        $this->participants = $participants;
        $this->type = $type;
    }

    /**
     * @throws Exception
     */
    public function fetch() {
        $url = "https://www.boredapi.com/api/activity?participants={$this->participants}&type={$this->type}";
        $response = file_get_contents($url);
        $data = json_decode($response);

        if (isset($data->error)) {
            throw new Exception("Error fetching activity: " . $data->error);
        }

        return new Activity($data);
    }
}