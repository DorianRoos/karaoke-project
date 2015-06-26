<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 10:17
 *
 * Format: Layer, Start, End, Style, Name, MarginL, MarginR, MarginV, Effect, Text
 */

namespace KaraokeBundle\Model;


class Line {

    protected $layer;
    protected $start;
    protected $end;
    protected $style;
    protected $name;
    protected $marginL;
    protected $marginR;
    protected $marginV;
    protected $effect;

    /**
     * @return string
     */
    public function getLayer()
    {
        return $this->layer;
    }

    /**
     * @param string $layer
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param string $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMarginL()
    {
        return $this->marginL;
    }

    /**
     * @param string $marginL
     */
    public function setMarginL($marginL)
    {
        $this->marginL = $marginL;
    }

    /**
     * @return string
     */
    public function getMarginR()
    {
        return $this->marginR;
    }

    /**
     * @param string $marginR
     */
    public function setMarginR($marginR)
    {
        $this->marginR = $marginR;
    }

    /**
     * @return string
     */
    public function getMarginV()
    {
        return $this->marginV;
    }

    /**
     * @param string $marginV
     */
    public function setMarginV($marginV)
    {
        $this->marginV = $marginV;
    }

    /**
     * @return string
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param string $effect
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;
    }

}