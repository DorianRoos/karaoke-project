<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 02/07/15
 * Time: 10:48
 */

namespace KaraokeBundle\Services;

use KaraokeBundle\Model\Lines,
    KaraokeBundle\Model\Line,
    KaraokeBundle\Model\Karaoke,
    KaraokeBundle\Model\KaraokeTime;

class KaraokeTimeManager {

    /** @var \DateTime  */
    protected $newTimeStart;

    /**
     * @return \DateTime
     */
    public function getNewTimeStart()
    {
        return $this->newTimeStart;
    }

    /**
     * @param \DateTime $newTimeStart
     */
    public function setNewTimeStart($newTimeStart)
    {
        $this->newTimeStart = $newTimeStart;
    }

    /**
     * @param Karaoke $oKaraoke
     * @return Karaoke
     */
    public function generateKaraokeWithNewTime($oKaraoke)
    {

        $oLines = $oKaraoke->getLines();
        $oLines->rewind();
        $firstTime = $oLines->current()->getStart();

        var_dump($this->newTimeStart); print '<br>'; var_dump($firstTime);

        return $oKaraoke;
    }

    /**
     * @param KaraokeTime $oCurrentTime
     * @param KaraokeTime $oAddTime
     * @return KaraokeTime
     */
    public function addTime($oCurrentTime, $oAddTime){

        $temp_milliseconde = $oCurrentTime->getMilliseconde() + $oAddTime->getMilliseconde();
        if($temp_milliseconde >= 100){
            $temp_milliseconde = $temp_milliseconde - 100;
            $oCurrentTime->setSeconde($oCurrentTime->getSeconde() + 1);
        }
        $oCurrentTime->setMilliseconde($temp_milliseconde);

        $temp_seconde = $current['seconde'] + $add['seconde'];
        if($temp_seconde >= 60){
            $temp_seconde = $temp_seconde - 60;
            $current['minute'] += 1;
        }
        $current['seconde'] = $temp_seconde;
        $temp_minute = $current['minute'] + $add['minute'];
        if($temp_minute >= 60){
            $temp_minute = $temp_minute - 60;
            $current['heure'] += 1;
        }
        $current['minute'] = $temp_minute;
        $temp_heure = $current['heure'] + $add['heure'];
        $current['heure'] = $temp_heure;

        return $oCurrentTime;
    }
}