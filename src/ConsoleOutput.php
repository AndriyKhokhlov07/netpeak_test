<?php

class ConsoleOutput implements OutputMethod {
    public function output(Activity $activity) {
        echo $this->format($activity);
    }

    private function format(Activity $activity) {
        return "Activity: {$activity->activity}\nType: {$activity->type}\nParticipants: {$activity->participants}\n";
    }
}
