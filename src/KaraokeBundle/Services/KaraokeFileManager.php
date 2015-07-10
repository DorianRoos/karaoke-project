<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 15:31
 */

namespace KaraokeBundle\Services;

use KaraokeBundle\Model\Lines,
    KaraokeBundle\Model\Line,
    KaraokeBundle\Model\Karaoke,
    KaraokeBundle\Model\KaraokeTime;

class KaraokeFileManager {

    /**
     * @array
     */
    protected $content;

    /**
     * @string
     */
    protected $extention;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getExtention()
    {
        return $this->extention;
    }

    /**
     * @param mixed $extention
     */
    public function setExtention($extention)
    {
        $this->extention = $extention;
    }

    /**
     * @return Karaoke
     */
    public function generateKaraokeObject(){

        foreach($this->content as $key => $data){
            if($data != 'Format: Layer, Start, End, Style, Name, MarginL, MarginR, MarginV, Effect, Text') unset($this->content[$key]);
            else { unset($this->content[$key]); break; }
        }

        /** @var Karaoke $karaoke */
        $karaoke = New Karaoke();
        $id = 0;
        foreach($this->content as $data){
            /** @var Line $line */
            $line = new Line();

            $data = explode(": ", $data,2);

            $arrayData = explode(",", $data[1], 10);

            $line->setId($id++);
            ( 0 == mb_strlen($arrayData[0]) ) ?: $line->setLayer($arrayData[0]);
            ( 0 == mb_strlen($arrayData[1]) ) ?: $line->setStart(new KaraokeTime($arrayData[1]));
            ( 0 == mb_strlen($arrayData[2]) ) ?: $line->setEnd(new KaraokeTime($arrayData[2]));
            ( 0 == mb_strlen($arrayData[3]) ) ?: $line->setStyle($arrayData[3]);
            ( 0 == mb_strlen($arrayData[4]) ) ?: $line->setName($arrayData[4]);
            ( 0 == mb_strlen($arrayData[5]) ) ?: $line->setMarginL($arrayData[5]);
            ( 0 == mb_strlen($arrayData[6]) ) ?: $line->setMarginR($arrayData[6]);
            ( 0 == mb_strlen($arrayData[7]) ) ?: $line->setMarginV($arrayData[7]);
            ( 0 == mb_strlen($arrayData[8]) ) ?: $line->setEffect($arrayData[8]);
            ( 0 == mb_strlen($arrayData[9]) ) ?: $line->setText($arrayData[9]);
            $karaoke->addLine($line);
        }
        return $karaoke;

    }
}