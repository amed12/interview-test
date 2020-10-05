<?php
$notSelfNumbers = array();
$allNumbers = array();
for ($i = 1; $i <= 5000; $i++) {
	$b = $i;
	$b = (string)$b;
	$allNumbers[] = $i;
	$number = strlen($i);
	switch (true) {
		case $number == 1:
			$sumOfThisNumbers = $i + $b[0];
			$notSelfNumbers[] = $sumOfThisNumbers;
			break;
		case $number == 2:
			$sumOfThisNumbers = $i + $b[0] + $b[1];
			$notSelfNumbers[] = $sumOfThisNumbers;
			break;
		case $number == 3:
			$sumOfThisNumbers = $i + $b[0] + $b[1] + $b[2];
			$notSelfNumbers[] = $sumOfThisNumbers;
			break;
		case $number == 4:
			$sumOfThisNumbers = $i + $b[0] + $b[1] + $b[2] + $b[3];
			$notSelfNumbers[] = $sumOfThisNumbers;
			break;
	}
}

$selfNumbers = array_diff($allNumbers, $notSelfNumbers);

$sumSelfNumbers = 0;
$numbering = 1;
foreach ($selfNumbers as $eachSelfNumber) {
	echo "<pre>" . $numbering++ . ". " . $eachSelfNumber;
	$sumSelfNumbers += $eachSelfNumber;
}
echo "<pre>jumlah total (sum) semua bilangan self number antara 0 dan 5000 adalah <strong>" . number_format($sumSelfNumbers) . "</strong>";
