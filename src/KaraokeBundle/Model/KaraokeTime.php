<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 10/07/15
 * Time: 11:48
 */

namespace KaraokeBundle\Model;


class KaraokeTime
{
    /**
     * @var int $heure
     */
    private $heure;

    /**
     * @var int $minute
     */
    private $minute;

    /**
     * @var int $seconde
     */
    private $seconde;

    /**
     * @var int $milliseconde
     */
    private $milliseconde;

    public function __construct($dateTime)
    {
        list($this->heure, $this->minute, $rest) = explode(':',$dateTime);
        list($this->seconde, $this->milliseconde) = explode('.',$rest);
    }

    /**
     * @return int
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param int $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return int
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param int $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return int
     */
    public function getSeconde()
    {
        return $this->seconde;
    }

    /**
     * @param int $seconde
     */
    public function setSeconde($seconde)
    {
        $this->seconde = $seconde;
    }

    /**
     * @return int
     */
    public function getMilliseconde()
    {
        return $this->milliseconde;
    }

    /**
     * @param int $milliseconde
     */
    public function setMilliseconde($milliseconde)
    {
        $this->milliseconde = $milliseconde;
    }
}