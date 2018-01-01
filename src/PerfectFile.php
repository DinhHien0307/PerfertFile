<?php

use Prophecy\Exception\InvalidArgumentException;

class PerfectFile
{
    const PERFECT_FILE = "This is Perfect File";
    const NOT_PERFECT_FILE = "This is not Perfect File";
    public function isFilePerfect($Url)
    {
        $array_of_file = $this->readFile($Url);
        if ($this->isEmptyFile($array_of_file)) {
            return self::NOT_PERFECT_FILE;
        }
        //split lines into each line
        foreach ($array_of_file as $lines) {
            $line = trim(str_replace("\r\n", "", $lines));//chuan hoa chuoi
            if (!$this->isLinePerfect($line)) {
                return self::NOT_PERFECT_FILE;
            }
        }
        return self::PERFECT_FILE;
    }

    private function isEmptyFile($array)
    {
        if($array[0]==false){
            return true;
        }
    }
    /**
     * @param $Url
     *
     * @return array content string
     */
    private function readFile($Url)
    {
        $file = fopen($Url, "r");
        if (!$file) {
            throw new InvalidArgumentException("File doesn't exist!");
        } else {
            while (!feof($file)) {
                $array_of_file[] = fgets($file);
            }
        }
        return $array_of_file;
    }
    private function isLinePerfect($line)
    {
        $sum = 0;
        $positive_numbers = 0;
        $negative_numbers = 0;
        $line = explode(" ", $line);
        //split string to character
        foreach ($line as $number) {
            $number = trim($number);
            if($this->isNotNumber($number)){
                return false;
            }
            $number < 0 ? $negative_numbers++ : $positive_numbers++;
            $sum += $number;
        }
        if ($sum == 0 && $negative_numbers == $positive_numbers) {//condition be perfect line
            return true;
        } else {
            return false;
        }
    }
    private function isNotNumber($number)
    {
        if (!is_numeric($number)) {
            return true;
        }
    }
}

$x = new PerfectFile();
$x->isFilePerfect("emptyFile.txt");
