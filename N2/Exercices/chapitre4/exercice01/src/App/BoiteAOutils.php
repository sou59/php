<?php

namespace App;

class BoiteAOutils
{

    public static function getGeoZoneFromPhoneNumber($telephone)
    {
        $prefix = substr($telephone, 0, 2);
        switch ($prefix) {
            case '01':
                return 'Région parisienne';
            case '02':
                return 'Région nord-ouest et « Océan Indien »';
            case '03':
                return 'Région nord-est';
            case '04':
                return 'Région sud-est dont Corse';
            case '05':
                return 'Région sud-ouest et « Océan Atlantique »';
            case '06':
            case '07':
                return 'Téléphone mobile';
            case '08':
                return 'Numéro spéciaux';
            case '09':
            default:
                return 'Pas de zone';
        }
    }
}
