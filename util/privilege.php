<?php

class privilege {
    
    static public function images($level)
    {
        if($level <= 3)
        {
            if($level == 1)
            {
                return 10;
            } else if($level == 2)
            {
                return 50;
            } else if($level == 3)
            {
                return 100;
            }
        } else {
            return 10000;
        }
    }
    
    static public function videos($level)
    {
        if($level >= 3)
        {
            return 3;
        } else {
            return 0;
        }
    }
    
}
