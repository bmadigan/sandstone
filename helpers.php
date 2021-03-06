<?php

use Carbon\Carbon;

/*
 *
 * No current uses - could deprecate/remove
 *
 * Converts money and decimal to cents for DB Storage
 * Eg. $1,500.65   converted to  150065
 * */
function convertCurrencyToCents($str)
{
    return str_replace(['$',',',' '], ['','',''], trim($str)) * 100;
}

/*
 * @param $amount
 *
 * @return string
 * */
function formatAsCurrency($amount)
{
    return '$' . number_format($amount / 100, 2);
}

/*
 * @param $amount
 *
 * @return string
 * */
function formatAsMoney($amount)
{
    return number_format($amount / 100, 2);
}

/*
 * @param $amount
 *
 * @return string
 * */
function formatAsPlainMoney($amount)
{
    return number_format($amount / 100, 2, '.', '');
}

function convertDateForApi(Carbon $date)
{
    //return $date->toRfc2822String(); // Thu, 25 Dec 1975 14:15:16 -0500
    return $date->timestamp;  // EPOC
    //return $date->toDateTimeString(); // 2012-09-05 23:26:11
    //echo $date->toAtomString();   // 1975-12-25T14:15:16-05:00
}

function displayLongDate(Carbon $date)
{
    return $date->format('F d, Y');  // January 8, 2011
}

function displayShortDate(Carbon $date)
{
    return $date->toFormattedDateString();  // Jan 8, 2011
}

function displayHumanDate(Carbon $date)
{
    return $date->diffForHumans();
}

function getUSStates()
{
    return [
        'AL'=>'Alabama',
        'AK'=>'Alaska',
        'AZ'=>'Arizona',
        'AR'=>'Arkansas',
        'CA'=>'California',
        'CO'=>'Colorado',
        'CT'=>'Connecticut',
        'DE'=>'Delaware',
        'DC'=>'District of Columbia',
        'FL'=>'Florida',
        'GA'=>'Georgia',
        'HI'=>'Hawaii',
        'ID'=>'Idaho',
        'IL'=>'Illinois',
        'IN'=>'Indiana',
        'IA'=>'Iowa',
        'KS'=>'Kansas',
        'KY'=>'Kentucky',
        'LA'=>'Louisiana',
        'ME'=>'Maine',
        'MD'=>'Maryland',
        'MA'=>'Massachusetts',
        'MI'=>'Michigan',
        'MN'=>'Minnesota',
        'MS'=>'Mississippi',
        'MO'=>'Missouri',
        'MT'=>'Montana',
        'NE'=>'Nebraska',
        'NV'=>'Nevada',
        'NH'=>'New Hampshire',
        'NJ'=>'New Jersey',
        'NM'=>'New Mexico',
        'NY'=>'New York',
        'NC'=>'North Carolina',
        'ND'=>'North Dakota',
        'OH'=>'Ohio',
        'OK'=>'Oklahoma',
        'OR'=>'Oregon',
        'PA'=>'Pennsylvania',
        'RI'=>'Rhode Island',
        'SC'=>'South Carolina',
        'SD'=>'South Dakota',
        'TN'=>'Tennessee',
        'TX'=>'Texas',
        'UT'=>'Utah',
        'VT'=>'Vermont',
        'VA'=>'Virginia',
        'WA'=>'Washington',
        'WV'=>'West Virginia',
        'WI'=>'Wisconsin',
        'WY'=>'Wyoming',
    ];
}
