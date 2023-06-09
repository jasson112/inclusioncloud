<?php 
namespace Ubuntu\Inclusioncloud;

final class Test
{
    private array $range;
    private array $testInput = [];
    private array $result = [];

    private function __construct($range = 1)
    {
        if(is_array($range)){
            $this->testInput = $range;
            $this->range = range(1, $range[0]);
        }else{
            $this->range = range(1, $range);
        }
        $this->requiredRemainder();
    }

    public static function fromUserInput(): self
    {
        $input = intval(readline('Enter number of test: '));
        return new self($input);
    }

    public static function fromTestInput(): self
    {
        $input = file(__DIR__ . '/../tests/test_input.txt');
        return new self($input);
    }

    public function getResult(): string
    {
        return implode(",", $this->result);
    }

    private function requiredRemainder(): void
    {
        foreach ($this->range as $index => $val) {
            if(!empty($this->testInput)){
                $xyn = explode(" ",  $this->testInput[$index + 1]);
            }else{
                $input = readline('Please enter x,y,n values separated by space: ');
                $xyn = explode(" ", $input);
            }
            
            if(count($xyn) === 3){
                $x = intval($xyn[0]);
                $y = intval($xyn[1]);
                $n = intval($xyn[2]);
                $mod = $n % $x;
                
                if($mod > $y){
                    array_push($this->result, $n - $mod + $y);
                }elseif ($mod === $y) {
                    array_push($this->result, $n);
                }elseif ($mod < $y){
                    array_push($this->result, $n - $mod - $x + $y);
                }
            }
        }
    }
}