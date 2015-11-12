<?php namespace ffomezolam\Enum;

class EnumTest extends \PHPUnit_Framework_TestCase {
    public function testCanUseConsts() {
        $this->assertEquals("keya", Consts::KEYA);
        $this->assertEquals("keyb", Consts::KEYB);
        $this->assertNotEquals("poe", Consts::KEYC);
    }

    public function testCanSearchKey() {
        $this->assertTrue(Consts::hasKey("KEYA"));
        $this->assertTrue(Consts::hasKey("keyB"));
        $this->assertFalse(Consts::hasKey("porridge"));
    }

    public function testCanSearchKeyStrict() {
        $this->assertTrue(Consts::hasKey("KEYA", true));
        $this->assertFalse(Consts::hasKey("KeyA", true));
    }

    public function testCanSearchValue() {
        $this->assertTrue(Consts::hasValue("keya"));
        $this->assertFalse(Consts::hasValue("keyA"));
        $this->assertTrue(Consts::has(Consts::KEYA));
    }
}

class Consts extends Enum {
    const KEYA = "keya";
    const KEYB = "keyb";
    const KEYC = "keyc";
}

?>
