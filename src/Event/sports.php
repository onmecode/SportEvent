<?php

function selectSportEvents ($selectedSport){

    if ($selectedSport == 'football') {
            $selectedSportEventType = [
                'kickoff',
                'goal',
                'yellowcard',
                'redcard',
                'penalty',
                'halftime',
                'fulltime',
                'extratime',
                'freekick',
                'corner',
            ];
    }
    #testing
    if($selectedSport == 'tennis') {
        $selectedSportEventType = [
                'matchpoint',
                'set',
            ];
    }
    if (!empty($selectedSportEventType)) {
            return $selectedSportEventType;
    } else {
        echo "Error: no selected event type for ".$selectedSport;
    }

}