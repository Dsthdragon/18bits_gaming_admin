<?php

class relative_time {

    /**
     * Relative_Time: Get relative time past
     * eg. 1 minute ago, 2 day ago
     */

    public static function day($date)
    {
        $time = strtotime($date);
        return relative_time::days(date("w", $time));
    }

    public static function days($day)
    {
        $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        return $days[$day];
    }

    public static function time_stamp($time) {
        $session_time = strtotime($time);
        $current_time = time();
        $time_difference = $current_time - $session_time;

        $seconds = $time_difference;
        
        $minutes = round($time_difference / 60);
        $hours = round($time_difference / 3600);
        $days = round($time_difference / 86400);
        $weeks = round($time_difference / 604800);
        $months = round($time_difference / 2419200);
        $years = round($time_difference / 29030400);

        // Seconds
        if ($seconds <= 60) {
            echo "$seconds seconds ago";
        }

        // Minutes
        elseif ($minutes <= 60) {
            if ($minutes == 1) {
                echo "1 minute ago";
            } else {
                echo "$minutes minutes ago";
            }
        }

        // Hours
        elseif ($hours <= 24) {
            if ($hours == 1) {
                echo "1 hour ago";
            } else {
                echo "$hours hours ago";
            }
        }

        // Days
        elseif ($days <= 7) {
            if ($days == 1) {
                echo "1 day ago";
            } else {
                echo "$days days ago";
            }
        }

        // Weeks
        elseif ($weeks <= 4) {
            if ($weeks == 1) {
                echo "1 week ago";
            } else {
                echo "$weeks weeks ago";
            }
        }

        // Months
        elseif ($months <= 12) {
            if ($months == 1) {
                echo "1 month ago";
            } else {
                echo "$months months ago";
            }
        }

        // Years
        else {
            if ($years == 1) {
                echo "1 year ago";
            } else {
                echo "$years years ago";
            }
        }
    }

    /**
     * Relative_Time: Get relative time future
     * eg. in 1 minute, in 2 days 
     */
    public static function futuredate($time) {

        $session_time = strtotime($time);
        $current_time = time() + 3600;
        $time_difference = $session_time - $current_time;

        $seconds = $time_difference;
        $minutes = round($time_difference / 60);
        $hours = round($time_difference / 3600);
        $days = round($time_difference / 86400);
        $weeks = round($time_difference / 604800);
        $months = round($time_difference / 2419200);
        $years = round($time_difference / 29030400);

        // Seconds
        if ($seconds <= 60) {
            echo "in $seconds seconds";
        }

        // Minutes
        elseif ($minutes <= 60) {
            if ($minutes == 1) {
                echo "in 1 minute";
            } else {
                echo "in $minutes minutes";
            }
        }

        // Hours
        elseif ($hours <= 24) {
            if ($hours == 1) {
                echo "in 1 hour";
            } else {
                echo "in $hours hours";
            }
        }

        // Days
        elseif ($days <= 7) {
            if ($days == 1) {
                echo "in 1 day";
            } else {
                echo "in $days days";
            }
        }

        // Weeks
        elseif ($weeks <= 4) {
            if ($weeks == 1) {
                echo "in 1 week";
            } else {
                echo "in $weeks weeks";
            }
        }

        // Months
        elseif ($months <= 12) {
            if ($months == 1) {
                echo "in 1 month";
            } else {
                echo "in $months months";
            }
        }

        // Years
        else {
            if ($years == 1) {
                echo "in 1 year";
            } else {
                echo "in $years years";
            }
        }
    }

    /**
     * Relative_Time: Get just date from timestamp
     * 
     */
    public static function justdate($session_time) {
        $timesplit = explode(" ", $session_time);
        return $timesplit[0];
    }

    /**
     * Relative_Time: Get just time from timestamp
     * 
     */
    public static function justtime($session_time) {
        $timesplit = explode(" ", $session_time);
        return $timesplit[1];
    }

    public static function wordmonth($session_time, $len=1) {
        $timesplit = explode(" ", $session_time);
        $datesplit = explode("-", $timesplit[0]);
        if ($datesplit[1] == 1) {
            $month = "January";
            if($len == 0)
            {                
            $month = "Jan";
            }
            
        } elseif ($datesplit[1] == 2) {
            $month = "February";
            if($len == 0)
            {
             $month = "Feb";
            }
        } elseif ($datesplit[1] == 3) {
            $month = "March";
            if($len == 0)
            {
             $month = "Mar";
            }
        } elseif ($datesplit[1] == 4) {
            $month = "April";
            if($len == 0)
            {
             $month = "Apr";
            }
        } elseif ($datesplit[1] == 5) {
            $month = "May";
        } elseif ($datesplit[1] == 6) {
            $month = "June";
            if($len == 0)
            {
             $month = "Jun";
            }
        } elseif ($datesplit[1] == 7) {
            $month = "July";
            if($len == 0)
            {
             $month = "Jul";
            }
        } elseif ($datesplit[1] == 8) {
            $month = "August";
            if($len == 0)
            {
             $month = "Aug";
            }
        } elseif ($datesplit[1] == 9) {
            $month = "September";
            if($len == 0)
            {
             $month = "Sept";
            }
        } elseif ($datesplit[1] == 10) {
            $month = "October";
            if($len == 0)
            {
             $month = "Oct";
            }
        } elseif ($datesplit[1] == 11) {
            $month = "November";
            if($len == 0)
            {
             $month = "Nov";
            }
        } elseif ($datesplit[1] == 12) {
            $month = "December";
            if($len == 0)
            {
             $month = "Dec";
            }
        }

        echo $month . " " . $datesplit[2] . ', ' . $datesplit[0];
    }
    
    public static function pm_am($session_time) {
        $timesplit = explode(" ", $session_time);
        $time = explode(":", $timesplit[1]);
        $ext = "AM";
        if($time[0] >= 12 && $time[0] < 24){
            $ext = "PM";
        }
        if($time[0] > 12){
            return ($time[0]-12).':'.$time[1].' '.$ext;
        }
        return $time[0].':'.$time[1].' '.$ext;
    
    }

}
