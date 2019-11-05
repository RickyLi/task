<?php
class InverseFizzBuzz {
	protected $list;
    public function __construct($list) {
        $this->list = $list;
    }
    
    public function sequence() {
        if(empty($this->list)){
			return '';
		}

		$mapper = ['fizz' => 3, 'buzz' => 5];
		$results = [];

		$firstOfList = array_shift($this->list);

		for ($i = 1; $i <= 100; $i++) { 
			if ($i % $mapper[$firstOfList] == 0) {
				$results[0][] = $i;
			}
		}

		foreach ($this->list as $k => $word) {
			foreach ($results[$k] as $key => $value) {
				$continue = false;
				do {
					++$value;
					if ($value % $mapper[$this->list[$k]] != 0) {
						$continue = true;
					} else {
						$continue = false;
						$results[$k+1][] = $value;
					}
				} while ($continue);
			}
		}

		$max = count($this->list);
		$res = [];
		foreach ($results[0] as $key => $value) {
			if ($results[$max][$key] > 100) break;
			$num = $results[$max][$key] - $value + 1;
			$res[$key] = $num;
		}

		$num = min($res);
		$result = [];
		foreach ($res as $key => $value) {
			if ($value == $num) {
				$first = $results[0][$key];
				$last = $results[$max][$key];
				$result = range($first,$last);
				break;
			}
		}

		return $result;
    }
}


$arr = [
	['fizz'],
	['buzz'],
	['fizz', 'buzz'],
	['buzz', 'fizz'],
	['fizz', 'buzz', 'fizz'],
	['fizz', 'fizz'],
	['fizz', 'fizz', 'buzz']
];

foreach($arr as $item){
	$model = new InverseFizzBuzz($item);
	$d = $model->sequence();
	var_dump($d);
}

