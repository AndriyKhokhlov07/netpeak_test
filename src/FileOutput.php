<?php

class FileOutput implements OutputMethod {
    private $filePath;

    public function __construct($filePath = 'activity.txt') {
        $this->filePath = $filePath;
    }

    public function output(Activity $activity) {
        file_put_contents($this->filePath, $this->format($activity));
    }

    private function format(Activity $activity) {
        return "Activity: {$activity->activity}\nType: {$activity->type}\nParticipants: {$activity->participants}\n";
    }
}
