<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 10:24
 */

namespace KaraokeBundle\Tests\Model;

use KaraokeBundle\Model\Line;

class LineTest extends \PHPUnit_Framework_TestCase {

    public function testValidLayer()
    {
        $line = new Line();
        $line->setLayer('0');
        $this->assertEquals('0', $line->getLayer());
    }

    public function testInvalidLayer()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setLayer('');
    }

    public function testValidStyle()
    {
        $line = new Line();
        $line->setStyle('Default');
        $this->assertEquals('Default', $line->getStyle());
    }

    public function testInvalidStyle()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setStyle('');
    }

    public function testValidName()
    {
        $line = new Line();
        $line->setName('kara');
        $this->assertEquals('kara', $line->getName());
    }

    public function testInvalidName()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setName('');
    }

    public function testValidMarginL()
    {
        $line = new Line();
        $line->setMarginL('0000');
        $this->assertEquals('0000', $line->getMarginL());
    }

    public function testInvalidMarginL()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setMarginL('');
    }

    public function testValidMarginR()
    {
        $line = new Line();
        $line->setMarginR('0000');
        $this->assertEquals('0000', $line->getMarginR());
    }

    public function testInvalidMarginR()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setMarginR('');
    }

    public function testValidMarginV()
    {
        $line = new Line();
        $line->setMarginV('0000');
        $this->assertEquals('0000', $line->getMarginV());
    }

    public function testInvalidMarginV()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setMarginV('');
    }

    public function testValidEffect()
    {
        $line = new Line();
        $line->setEffect('effect');
        $this->assertEquals('effect', $line->getEffect());
    }

    public function testInvalidEffect()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setEffect('');
    }

    public function testValidText()
    {
        $line = new Line();
        $line->setText('Ce nest pas ce que tu penses.');
        $this->assertEquals('Ce nest pas ce que tu penses.', $line->getText());
    }

    public function testInvalidText()
    {
        $line = new Line();
        $this->setExpectedException('\InvalidArgumentException');
        $line->setText('');
    }
}
