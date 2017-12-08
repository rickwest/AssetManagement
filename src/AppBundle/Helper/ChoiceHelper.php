<?php
/**
 * Created by PhpStorm.
 * User: Rick
 * Date: 29/11/2017
 * Time: 10:29
 */

namespace AppBundle\Helper;


class ChoiceHelper {

    public static function getLocationChoices() {
        return [
            'Office' => 'Office'
        ];
    }

    public static function getCategoryChoices() {
        return [
            'Hardware' => 'Hardware',
            'Software' => 'Software',

            'People' => 'People',
            'Infrastructure' => 'Infrastructure'

        ];
    }

    public static function getClassificationChoices() {
        return [
            'Public' => 'Public',
            'Private' => 'Private',
            'Restricted' => 'Restricted',
            'Secret' => 'Secret'
        ];
    }

    public static function getPercentChoices() {
        return [
            '5%' => 0.05,
            '10%' => 0.1,
            '15%' => 0.15,
            '20%' => 0.2,
            '25%' => 0.25,
            '30%' => 0.3,
            '35%' => 0.35,
            '40%' => 0.4,
            '45%' => 0.45,
            '50%' => 0.5,
            '55%' => 0.55,
            '60%' => 0.6,
            '65%' => 0.65,
            '70%' => 0.7,
            '75%' => 0.75,
            '80%' => 0.8,
            '85%' => 0.85,
            '90%' => 0.9,
            '95%' => 0.95,
            '100%' => 1
        ];
    }

    public static function getZeroToHundredChoices() {
        return [
            '5' => 5,
            '10' => 10,
            '15' => 15,
            '20' => 20,
            '25' => 25,
            '30' => 30,
            '35' => 35,
            '40' => 40,
            '45' => 45,
            '50' => 50,
            '55' => 55,
            '60' => 60,
            '65' => 65,
            '70' => 70,
            '75' => 75,
            '80' => 80,
            '85' => 85,
            '90' => 90,
            '95' => 95,
            '100' => 100
        ];
    }
}