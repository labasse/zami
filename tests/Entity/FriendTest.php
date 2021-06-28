<?php

namespace App\Tests\Entity;

use App\Entity\Friend;
use PHPUnit\Framework\TestCase;

class FriendTest extends TestCase
{
    public function testInitialization()
    {

    }
    public function testSetEmail()
    {

    }

    public function testSetLastName()
    {

    }

    public function testSetBirthDate()
    {

    }

    public function testSetFirsName()
    {

    }

    public function testSetTagsUsual()
    {
        // Arrange
        $friend = new Friend();

        // Act
        $friend->setTags("Homme,Vedette,Jeune");

        // Assert
        $this->assertEquals("Homme,Vedette,Jeune", $friend->getTags());
        $this->assertEquals(3, $friend->getTagNum());
    }

    public function testSetTagsEmptyThrowsException()
    {
        $friend = new Friend();

        $this->expectException(\InvalidArgumentException::class);

        $friend->setTags("");
    }

    public function testSetTagsNullOk()
    {
        // Arrange
        $friend = new Friend();

        // Act
        $friend->setTags(null);

        // Assert
        $this->assertEquals(null, $friend->getTags());
        $this->assertEquals(0, $friend->getTagNum());
    }

    public function testSetTagsTooLongTruncatesExceedingTags()
    {
        $tags = "Lorem,ipsum,dolor,sit,amet,consectetur,adipisicing,elit.,Officiis,velit,magnam,quod,voluptatibus,dolor,ipsam,ratione,similique,ea,asperiores,omnis,nam,reprehenderit,ad,officia,deserunt,iste,recusandae.,Placeat,magni,commodi,Lorem,ipsum,dolor,sit,amet,consectetur,adipisicing,elit.,Officiis,velit,magnam,quod,voluptatibus,dolor,ipsam,ratione,similique,ea,asperiores,omnis,nam,reprehenderit,ad,officia,deserunt,iste,recusandae.,Placeat,magni,commodi";
        $truncated
              = "Lorem,ipsum,dolor,sit,amet,consectetur,adipisicing,elit.,Officiis,velit,magnam,quod,voluptatibus,dolor,ipsam,ratione,similique,ea,asperiores,omnis,nam,reprehenderit,ad,officia,deserunt,iste,recusandae.,Placeat,magni,commodi,Lorem,ipsum,dolor,sit,amet";
        $friend = new Friend();

        // Act
        $friend->setTags($tags);

        // Assert
        $this->assertEquals($truncated, $friend->getTags());
        $this->assertEquals(35, $friend->getTagNum());
    }

    public function testSetTagsSingle()
    {
        // Arrange
        $friend = new Friend();

        // Act
        $friend->setTags("Homme");

        // Assert
        $this->assertEquals("Homme", $friend->getTags());
        $this->assertEquals(1, $friend->getTagNum());
    }

    public function testSetTagsSuccessiveComasThrowsException()
    {
        // Arrange

        // Act

        // Assert
    }

}
