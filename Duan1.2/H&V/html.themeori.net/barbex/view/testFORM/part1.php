<?php 
function build_calendar($month, $year){
    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t',$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');

    $prev_month = date('m',mktime(0,0,0,$month-1, 1,$year));
    $prev_year = date('Y',mktime(0,0,0,$month-1, 1,$year));
    $next_month = date('m',mktime(0,0,0,$month+1, 1,$year));
    $next_year = date('Y',mktime(0,0,0,$month+1, 1,$year));



    $calendar = "<center><h2>$monthName $year</h2></center>";
    $calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=".$next_year."'>Next Month</a>";
    $calendar .= "<table class='table table-bordered'>";
    
    
    $calendar .= "<tr>";
    foreach($daysOfWeek as $day){
        $calendar .= "<th class='header'>$day</th>";
    }
    $calendar .= "</tr><tr>";

    $currentDay = 1;
    if($dayOfWeek > 0){
        for($k = 0; $k < $dayOfWeek; $k++){
            $calendar .= "<td class='empty'></td>";
        }
    }
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while($currentDay <= $numberDays){
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $today = $date == date('Y-m-d') ? 'today' : ''; 
        $calendar .= "<td class='$today'><h4>$currentDayRel</h4></td>";
        $currentDay++;
        $dayOfWeek++;
    }
    if($dayOfWeek != 7){
        $remainingDays = 7 - $dayOfWeek;
        for($i = 0; $i < $remainingDays; $i++){
            $calendar .= "<td class='empty'></td>";
        }
    }
    $calendar .= "</tr></table>";

    return $calendar;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 820px) and (max-device-width:1020px){
             table,
             thead,
             tbody,
             th,
             td,
             tr{
                display: block;
             }
             .empty{
                display: none;
             }
             th{
                position: absolute;
                top: -9999px;
                left: -9999px;
             }
             tr{
                border: 1px solid red;
             }
             td{
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
             }
             td:nth-of-type(1)before{
                content:"Sunday";
             }
             td:nth-of-type(2)before{
                content:"Monday";
             }
             td:nth-of-type(3)before{
                content:"Tuesday";
             }
             td:nth-of-type(4)before{
                content:"Wednesday";
             }
             td:nth-of-type(5)before{
                content:"Thursday";
             }
             td:nth-of-type(6)before{
                content:"Friday";
             }
             td:nth-of-type(7)before{
                content:"Saturday";
             }
        }

        /* Samrtphone (portrait and landscape) */
        @media only screen and (min-device-width: 802px) and (max-device-width : 1020px){
            body{
                width: 495px;
            }
            
        }
        @media (min-width:641px){
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
            .row{
                margin-top: 20px;
            }
            .today{
                background: yellow;
            }
        }


    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $dateComponents = getdate();
                    if(isset($_GET['month']) && isset($_GET['year'])){
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                    }else{
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                    }

                    echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>