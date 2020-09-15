<?php
namespace App\Services;

use App\Interfaces\IDueDateCalculator;
use DateTime;

class DateCalculator implements IDueDateCalculator
{
    public function due_date_calculator($date){
        if($this->is_weekday_related($date)){
            return $this->handle_weekday_related($date)->format('yy-m-d H:i');
        }else{
            return $this->handle_weekend_related($date)->format('yy-m-d H:i');
        }
    }

    public function is_weekday_related($date){
        $dayofweek = $this->get_weekday($date);
        if ($dayofweek > 3){
            return false;
        }
        else{
            return true;
        }
    }

    public function set_hour_minutes($date, $set_hour, $set_minute){
        $date->settime($hour = $set_hour, $minutes = $set_minute);
        return $date;
    }


    public function handle_weekend_related($date){
        $dayofweek = $this->get_weekday($date);
        $modify_amount = 7 - $dayofweek + 2;
        $date = new DateTime($date);
        if($dayofweek > 5){
            $date->modify('+'.strval($modify_amount).'day');
            $this->set_hour_minutes($date, 17, 0);
            return $date;
        }
        else
        {
            if(intval($date->format('H')) < 9 && $dayofweek == 4){
                $date->modify('+1 day');
                $this->set_hour_minutes($date, 17, 0);
                return $date;
            }
            else if(intval($date->format('H')) < 9){
                $date->modify('+'.strval($modify_amount - 1).'day');
                $this->set_hour_minutes($date, 17, 0);
                return $date;
            }
            else if(intval($date->format('H')) > 17){
                $date->modify('+'.strval($modify_amount).'day');
                $this->set_hour_minutes($date, 17, 0);
                return $date;
            }
            else
            {
                $date->modify('+'.strval($modify_amount).'day');
                return $date;
            }
        }
    }

    public function get_weekday($date){
        $dayofweek = date('w', strtotime($date));
        if($dayofweek == 0){
            return $dayofweek + 7;
        }else{
            return $dayofweek;
        }
    }

    public function handle_weekday_related($date){
        $date = new DateTime($date);
        if(intval($date->format('H')) < 9){
            $date->modify('+1 day');
            $this->set_hour_minutes($date, 17, 0);
            return $date;
        }
        else if(intval($date->format('H')) > 17){
            $date->modify('+2 day');
            $this->set_hour_minutes($date, 17, 0);
            return $date;
        }
        else{
            $date->modify('+2 day');
            return $date;
        }
    }




}
