<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>1. Первое задание</h1>

<code>
CREATE TABLE `data_new` (<Br>
  `id` int(11) NOT NULL,<Br>
  `card_number` varchar(20) DEFAULT NULL,<Br>
  `date` datetime NOT NULL,<Br>
  `volume` float NOT NULL,<Br>
  `service` varchar(100) NOT NULL,<Br>
  `address_id` int(11) DEFAULT NULL<Br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8;<Br>
ALTER TABLE `data_new`<Br>
  ADD PRIMARY KEY (`id`);<Br>
ALTER TABLE `data_new`<Br>
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;<Br>
<Br>
INSERT INTO `data_new` (`id`, `card_number`, `date`, `volume`, `service`, `address_id`)<Br>
SELECT `id`, `card_number`,`date`, SUM(`volume`),`service`,`address_id` <Br>
FROM `data` <Br>
GROUP BY `card_number`<Br>
</code>

<h1>2. Второе задание</h1>

<?

//var_dump($quers);

$years = [];
foreach($quers as $quer) {
	
	if($years[$quer['year']])
		$years[$quer['year']] = $years[$quer['year']] + $quer['count'];
	else
		$years[$quer['year']] = $quer['count'];
}

//var_dump($quers);

$y1 = '2000';

echo '<div class="col-md-2">';
foreach($quers as $quer) {
	
	if($y1 != $quer['year']) {
		echo '<div>'.$quer['year'].'('.$years[$quer['year']].')'.'</div>';
		$y1 = $quer['year'];
	}	
	echo '<div>&nbsp;&nbsp;&nbsp;'.$quer['mouth'].'('.$quer['count'].')'.'</div>';
}
echo '</div>';

echo '<div class="col-md-10"><form><table class="table">';
	echo '<tr>';
	echo '<td> </td>';
	echo '<td><input name="card_number"></td>';
	echo '<td><select name="card_year">
				<option value="0">0</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option></select>
			  <select name="card_mouth">
				<option value="0">0</option>
				<option value="01">01</option><option value="02">02</option><option value="03">03</option>
				<option value="04">04</option><option value="05">05</option><option value="06">06</option>
				<option value="07">07</option><option value="08">08</option><option value="09">09</option>
				<option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
		   </td>';
	echo '<td> </td>';
	echo '<td> </td>';
	echo '<td><input type="submit"> </td>';
	echo '</tr>';
foreach($posts as $post) {
	echo '<tr>';
	echo '<td>'.$post['id'].'</td>';
	echo '<td>'.$post['card_number'].'</td>';
	echo '<td>'.$post['date'].'</td>';
	echo '<td>'.$post['volume'].'</td>';
	echo '<td>'.$post['service'].'</td>';
	echo '<td>'.$post['address_id'].'</td>';
	echo '</tr>';
}
echo '</table></form></div>';

?>