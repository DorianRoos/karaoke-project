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

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $layer;

    /**
     * TODO
     */
    protected $start;
    protected $end;

    /**
     * @var string
     */
    protected $style;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $marginL;

    /**
     * @var string
     */
    protected $marginR;

    /**
     * @var string
     */
    protected $marginV;

    /**
     * @var string
     */
    protected $effect;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        if (0 >= mb_strlen($id)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }
        $this->id = $id;
    }
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
        if (0 >= mb_strlen($layer)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

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
        if (0 >= mb_strlen($style)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

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
        if (0 >= mb_strlen($name)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

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
        if (0 >= mb_strlen($marginL)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

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
        if (0 >= mb_strlen($marginR)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

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
        if (0 >= mb_strlen($marginV)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

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
        if (0 >= mb_strlen($effect)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

        $this->effect = $effect;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        if (0 >= mb_strlen($text)) {
            throw new \InvalidArgumentException('You have to provide a string of at least one character');
        }

        $this->text = $text;
    }

}