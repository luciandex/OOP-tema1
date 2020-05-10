<?php declare(strict_types=1);


class ComplexNoCalc
{

    private $c1;

    private $c2;

    public function __construct(array $c1, array $c2)
    {
        $this->c1 = $c1;
        $this->c2 = $c2;
    }

    private function intermediate($c1, $c2 = ""): array
    {
        list($e1, $s2) = $c1;
        list($e3, $s4) = $c2;
        $e2 = intval(str_replace("i", ((strpos("$s2", "-i") === 0 ? "1" : strpos("$s2", "i") === 0) ? "1" : ""), "$s2"));
        $e4 = intval(str_replace("i", ((strpos("$s4", "-i") === 0 ? "1" : strpos("$s4", "i") === 0) ? "1" : ""), "$s4"));

        $arr = [$e1, $e2, $e3, $e4];
        return $arr;
    }

    public function sum($c1, $c2): string
    {
        list($e1, $e2, $e3, $e4) = $this->intermediate($c1, $c2);

        $real = ($e1 + $e3 === 0 ? "" : $e1 + $e3);
        $sign = ($e2 + $e4 <= 0 ? "" : "+");
        $imaginary = ($e2 + $e4 === 0 || $e2 + $e4 === 1 ? "" : ($e2 + $e4 === -1 ? "-" : $e2 + $e4));
        $i = (($e2 + $e4) === 0 ? "" : "i");

        $sum = ($real . $sign . $imaginary . $i == "" ? "0" : $real . $sign . $imaginary . $i);

        return $sum;
    }

    public function difference($c1, $c2): string
    {
        list($e1, $e2, $e3, $e4) = $this->intermediate($c1, $c2);

        $real = ($e1 - $e3 === 0 ? "" : $e1 - $e3);
        $sign = ($e2 - $e4 <= 0 ? "" : "+");
        $imaginary = ($e2 - $e4 === 0 || $e2 - $e4 === 1 ? "" : ($e2 - $e4 === -1 ? "-" : $e2 - $e4));
        $i = (($e2 - $e4) === 0 ? "" : "i");

        $diff = ($real . $sign . $imaginary . $i == "" ? "0" : $real . $sign . $imaginary . $i);

        return $diff;
    }

    public function product($c1, $c2): string
    {
        list($e1, $e2, $e3, $e4) = $this->intermediate($c1, $c2);

        list($a1, $a2) = $c1;
        list($a3, $a4) = $c2;
        $ifi = ((strpos("$a2", "i") >= 0 && strpos("$a4", "i") >= 0) ? -1 : "1");

        $n1 = ($e1 * $e3 === 0 ? 0 : $e1 * $e3);
        $n2 = ($e1 * $e4 === 0 ? 0 : $e1 * $e4);

        $n3 = ($e2 * $e4 * $ifi === 0 ? 0 : $e2 * $e4 * $ifi);
        $n4 = ($e2 * $e3 === 0 ? 0 : $e2 * $e3);

        $r1 = [$n1, $n2 . "i"];
        $r2 = [$n3, $n4 . "i"];

        $result = $this->sum($r1, $r2);

        return $result;
    }

    private function conjugate($c2): array
    {
        list($e3, $e4) = $this->intermediate($c2);
        $rev = (strpos("$e4", "-") > 0 ? $e4 : abs($e4));
        $conjugate = [$e3, $rev];

        return $conjugate;
    }

    public function division($c1, $c2): string
    {
        $conj = $this->conjugate($c2);

        list($e1, $e2) = $this->intermediate($c1);
        list($e3, $e4) = $this->intermediate($conj);

        $div1 = $this->product($c1, $conj);
        $a1 = str_replace("i", ((strpos("$div1", "-i") === 0 ? "1" : strpos("$div1", "i") === 0) ? "1" : ""), "$div1");
        $arr = explode(",", (strpos("$a1", "+") > 0 ? str_replace("+", ",", $a1) : preg_replace("/-(?!.*-)/", ",-", "$a1")));

        list($d1, $d2) = $this->intermediate($arr);
        $d2 = (count($arr) < 2 ? null : $d2);
        $div2 = intval($this->product($c2, $conj));

        $r1 = (is_int($div1) ? $div1 : $d1) / $div2;

        $sign = (strpos("$d2/$div2", "-") === 0 ? " - " : " + ");

        return $r1 . $sign . (($d2 / $div2 === 0 ? "" : $d2 / $div2 === 1) ? "i" : $d2 / $div2 . "i")
            . PHP_EOL . "OR...: " . $d1 . "/" . $div2 . $sign . (($d2 / $div2 === 0 ? "" : $d2 / $div2 === 1) ? ($d2 . "/" . $div2 . "i") : "");
    }

}