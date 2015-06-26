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
        $line->setLayer('a-random-shop-name');
        $this->assertEquals('a-random-shop-name', $line->getLayer());
    }
}
