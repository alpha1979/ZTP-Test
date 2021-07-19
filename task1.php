<?php

$array_london = [
    ['2021-09-01', 11],
    ['2021-09-02', 23],
    ['2021-09-03', 15],
    ['2021-09-04', 16],
    ['2021-09-05', 21],
    ['2021-09-06', 21],
    ['2021-09-07', 16],
    ['2021-09-08', 18],
    ['2021-09-13', 21],
    ['2021-09-14', 20],
    ['2021-09-15', 17],
    ['2021-09-16', 22],
    ['2021-09-17', 22],
    ['2021-09-18', 21],
    ['2021-09-19', 10],
    ['2021-09-25', 15],
    ['2021-09-26', 15],
    ['2021-09-27', 11],
    ['2021-09-28', 17],
    ['2021-09-09', 16],
    ['2021-09-10', 11],
    ['2021-09-20', 16],
    ['2021-09-21', 21],
    ['2021-09-22', 18],
    ['2021-09-23', 20],
    ['2021-09-24', 14],
    ['2021-09-11', 15],
    ['2021-09-29', 24],
    ['2021-09-30', 14]
];


$array_edinburgh = [
    ['2021-09-01', 15],
    ['2021-09-02', 14],
    ['2021-09-03', 12],
    ['2021-09-04', 19],
    ['2021-09-05', 14],
    ['2021-09-06', 17],
    ['2021-09-15', 19],
    ['2021-09-16', 14],
    ['2021-09-22', 10],
    ['2021-09-23', 12],
    ['2021-09-24', 15],
    ['2021-09-25', 13],
    ['2021-09-26', 19],
    ['2021-09-18', 19],
    ['2021-09-19', 18],
    ['2021-09-20', 19],
    ['2021-09-21', 16],
    ['2021-09-07', 18],
    ['2021-09-08', 19],
    ['2021-09-09', 18],
    ['2021-09-10', 12],
    ['2021-09-11', 11],
    ['2021-09-12', 19],
    ['2021-09-13', 13],
    ['2021-09-14', 14],
    ['2021-09-27', 18],
    ['2021-09-28', 12],
    ['2021-09-29', 12],
    ['2021-09-30', 17]
];


// merging two arrays according to date

function merging_arr($arr, &$result)
{
    foreach ($arr as $dates)
    {
        $result[$dates[0]][] = $dates[1];
    }
}
$result = array();
merging_arr($array_london, $result);
merging_arr($array_edinburgh, $result);

$merged_arr = array();
$i = 0;
foreach ($result as $date => $res)
{
    $merged_arr[$i][0] = $date;
    $merged_arr[$i][1] = $res[0];
    if (count($res) == 1)
    {
        $merged_arr[$i][2] = 0;
    } else {
        $merged_arr[$i][2] = $res[1];
    }
    $i++;
}

// Sorting the according to date 
function compare_date($a, $b){
    $lon_date =strtotime($a[0]);
    $edin_date =strtotime($b[0]);
    return $lon_date-$edin_date;
}
usort($merged_arr, 'compare_date');




//Converting to Associative array
$assoc_array = array();
foreach($merged_arr as $row){
    $assoc_arr[]= array(
        'date'=>$row[0],
        'london'=>$row[1],
        'edinburgh'=>$row[2]
    );
}



//converting array into the JSON Object

print_r(json_encode($assoc_arr));

?>