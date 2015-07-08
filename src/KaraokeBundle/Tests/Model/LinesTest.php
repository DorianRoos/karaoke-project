<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 11:49
 */

namespace KaraokeBundle\Tests\Model;

use KaraokeBundle\Model\Line,
    KaraokeBundle\Model\Lines;

class LinesTest extends \PHPUnit_Framework_TestCase {
    public function testUniqueness()
    {
        $storage = new Lines();

        foreach (array(0, 1, 2, 3, 4, 5, 0, 1, 2, 3, 4, 5) as $id) {
            $line = new Line();
            $line->setId($id);

            $storage->attach($line);
        }
        
        $this->assertCount(6, $storage);
        $this->assertEquals($line, $storage->getObjectByKey(5));
        $this->assertEquals($line, $storage->getObjectByHash($storage->getHash($line)));
        $this->assertEquals($line, $storage->getObjectByHash($line->getId()));
        $this->assertEquals($line->getId(), $storage->getHashByKey(5));
        $this->assertEquals($storage->getHash($line), $storage->getHashByKey(5));

        foreach (array(0, 1, 2, 3, 4, 5) as $id) {
            $line = new Line();
            $line->setId($id);

            $this->assertEquals($line, $storage->getObjectByKey($id));
        }

        $storage->clear();
        $this->assertCount(0, $storage);
    }
}
