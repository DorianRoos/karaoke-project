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
    KaraokeBundle\Model\Karaoke;

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

        if($firstTime > $this->newTimeStart) {
            $interval = $this->newTimeStart->diff($firstTime);
        } else {
            $interval = $firstTime->diff($this->newTimeStart);
        }

        var_dump($this->newTimeStart); print '<br>'; var_dump($firstTime);
        print '<br>';
        var_dump($oLines->current()->getStart()->add($interval));
        return $oKaraoke;
    }
}