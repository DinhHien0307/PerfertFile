<?php

namespace spec;

use PerfectFile;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class PerfectFileSpec extends ObjectBehavior
{
    const PERFECT_FILE = "This is Perfect File";
    const NOT_PERFECT_FILE = "This is not Perfect File";

    function it_false_if_file_is_empty()
    {
        $this->isFilePerfect("emptyFile.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }

    function it_false_if_file_has_character()
    {
        $this->isFilePerfect("hasCharacter.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }

    function it_false_if_file_has_line_not_perfect()
    {
        $this->isFilePerfect("hasLineNotPerfect.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }

    function it_false_if_file_is_not_perfect()
    {
        $this->isFilePerfect("notPerfectFile.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }

    function it_false_if_file_contain_empty_line()
    {
        $this->isFilePerfect("containEmptyLine.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }
    function it_true_if_file_is_perfect()
    {
        $this->isFilePerfect("PerfectFile.txt")->shouldBe(self::PERFECT_FILE);
    }
}
