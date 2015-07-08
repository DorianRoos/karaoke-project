<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 01/07/15
 * Time: 15:23
 */

namespace KaraokeBundle\Model;

class Karaoke {

    /** @var  Lines $lines */
    protected $lines;

    public function __construct()
    {
        $this->lines = new Lines();
    }

    /**
     * @param  mixed    $lines
     * @return Karaoke
     */
    public function setLines($lines)
    {
        $this->lines->clear();
        $this->addLines($lines);

        return $this;
    }

    /**
     * @param  mixed    $lines
     * @return Karaoke
     */
    public function addLines($lines)
    {
        foreach ($lines as $line) {
            $this->addLine($line);
        }

        return $this;
    }

    /**
     * @param  Line    $line
     * @return Karaoke
     */
    public function addLine(Line $line)
    {
        $this->lines->attach($line, $line);

        return $this;
    }

    /**
     * @param  Line    $line
     * @return Karaoke
     */
    public function removeLine(Line $line)
    {
        if ($this->lines->contains($line)) {
            $this->lines->detach($line);
        }

        return $this;
    }

    /**
     * @return Lines
     */
    public function getLines()
    {
        return $this->lines;
    }

}