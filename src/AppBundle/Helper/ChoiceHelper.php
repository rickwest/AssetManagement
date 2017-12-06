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
            'Public Data' => 'Public Data',
            'Private Data' => 'Private Data',
            'Restricted Data' => 'Restricted Data',
            'Secret Data' => 'Secret Data'
        ];
    }
}