<?php

$sLangName = 'English';
$aLang = [
    'charset' => 'UTF-8',

    'SHOP_MODULE_GROUP_mo_dhl__account'         => 'DHL Business Customer Login',
    'SHOP_MODULE_mo_dhl__account_sandbox'       => 'Use Testing-Webservice',
    'HELP_SHOP_MODULE_mo_dhl__account_sandbox'  => 'Use the testing webservice of DHL instead of the productive webservice. In this case you have to fill in the credentials of your <a href="https://entwickler.dhl.de">DHL Developer Portal</a> account below.',
    'SHOP_MODULE_mo_dhl__account_user'          => 'Username',
    'HELP_SHOP_MODULE_mo_dhl__account_user'     => 'Your Username for the <a href="http://www.dhl-geschaeftskundenportal.de">DHL Business Customer Portal</a>. Please pay attention that the username is case sensitive.',
    'SHOP_MODULE_mo_dhl__account_password'      => 'Password',
    'HELP_SHOP_MODULE_mo_dhl__account_password' => 'Your Password for the <a href="http://www.dhl-geschaeftskundenportal.de">DHL Business Customer Portal</a>.',
    'SHOP_MODULE_mo_dhl__account_check'         => '',

    'SHOP_MODULE_GROUP_mo_dhl__merchant'    => 'Merchant Information',
    'SHOP_MODULE_mo_dhl__merchant_ekp'      => 'EKP',
    'HELP_SHOP_MODULE_mo_dhl__merchant_ekp' => 'The EKP is your DHL customer number',

    'SHOP_MODULE_GROUP_mo_dhl__label'             => 'Label creation',
    'SHOP_MODULE_mo_dhl__only_with_leitcode'      => 'Allow only Codeable shipping addresses',
    'HELP_SHOP_MODULE_mo_dhl__only_with_leitcode' => 'If checkbox is enabled, shipment labels will only be created if the DHL delivery address verification succeeds (address is coedable). There is a surcharge for not codeable shipping addresses.',

    'SHOP_MODULE_GROUP_mo_dhl__services'                       => 'Shipment Services',
    'SHOP_MODULE_mo_dhl__filialrouting_active'                 => 'Parcel Outlet Routing',
    'HELP_SHOP_MODULE_mo_dhl__filialrouting_active'            => 'If checkbox is enabled, the Parcel Outlet Routing Service will be booked. In this case, your undeliverable packages will be held at the nearest parcel collection point for collection by the recipient rather than being returned immediately to you.',
    'SHOP_MODULE_mo_dhl__filialrouting_alternative_email'      => 'Alternative email address for the Parcel Outlet Routing Service (optional)',
    'HELP_SHOP_MODULE_mo_dhl__filialrouting_alternative_email' => 'Please enter your email address in case you wish to receive the notification for the Parcel Outlet Routing Service.',

    'SHOP_MODULE_GROUP_mo_dhl__standortsuche'                 => 'Parcel shop finder',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits'           => 'Maximum number of hits',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_1'         => '1',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_2'         => '2',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_3'         => '3',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_4'         => '4',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_5'         => '5',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_6'         => '6',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_7'         => '7',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_8'         => '8',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_9'         => '9',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_10'        => '10',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_11'        => '11',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_12'        => '12',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_13'        => '13',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_14'        => '14',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_15'        => '15',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_16'        => '16',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_17'        => '17',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_18'        => '18',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_19'        => '19',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_20'        => '20',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_21'        => '21',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_22'        => '22',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_23'        => '23',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_24'        => '24',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_25'        => '25',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_26'        => '26',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_27'        => '27',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_28'        => '28',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_29'        => '29',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_30'        => '30',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_31'        => '31',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_32'        => '32',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_33'        => '33',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_34'        => '34',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_35'        => '35',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_36'        => '36',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_37'        => '37',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_38'        => '38',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_39'        => '39',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_40'        => '40',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_41'        => '41',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_42'        => '42',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_43'        => '43',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_44'        => '44',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_45'        => '45',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_46'        => '46',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_47'        => '47',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_48'        => '48',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_49'        => '49',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits_50'        => '50',
    'SHOP_MODULE_mo_dhl__standortsuche_googleMapsApiKey'      => 'API key',
    'HELP_SHOP_MODULE_mo_dhl__standortsuche_googleMapsApiKey' => '<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">Get an API key here</a>',
    'SHOP_MODULE_mo_dhl__standortsuche_packstation'           => 'Packstation enabled',
    'SHOP_MODULE_mo_dhl__standortsuche_postfiliale'           => 'Postfiliale enabled',
    'SHOP_MODULE_mo_dhl__standortsuche_paketshop'             => 'Paketshop enabled',

    'SHOP_MODULE_GROUP_mo_dhl__wunschtag'          => 'Preferred day',
    'SHOP_MODULE_mo_dhl__wunschtag_active'         => 'Enabled',
    'SHOP_MODULE_mo_dhl__wunschtag_cutoff'         => 'Cut off Time',
    'HELP_SHOP_MODULE_mo_dhl__wunschtag_cutoff'    => 'Cut-off time is the latest possible order time up to which the minimum preferred day (day of order + 2 days) can be guaranteed. As soon as the time is exceeded, the earliest preferred day displayed in the frontend will be shifted to one day later (day of order + 3 days).',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation'    => 'Preparation time for deliveries (Sunday and holidays excluded)',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_0'  => '0',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_1'  => '1',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_2'  => '2',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_3'  => '3',
    'SHOP_MODULE_mo_dhl__wunschtag_surcharge'      => 'Delivery surcharge (EUR)',
    'HELP_SHOP_MODULE_mo_dhl__wunschtag_surcharge' => 'Insert gross value as surcharge for the preferred day. Insert 0 to offer service for free. Use . as decimal separator.',

    'SHOP_MODULE_GROUP_mo_dhl__handing_over' => 'Days for handing over to DHL',
    'SHOP_MODULE_mo_dhl__handing_over_help'  => 'On the working days checked, there is no transfer of parcels to DHL (in addition to sundays and public holidays). This information determines the first displayed preferred day in the frontend.',
    'SHOP_MODULE_mo_dhl__handing_over_mon'   => 'Monday',
    'SHOP_MODULE_mo_dhl__handing_over_tue'   => 'Tuesday',
    'SHOP_MODULE_mo_dhl__handing_over_wed'   => 'Wednesday',
    'SHOP_MODULE_mo_dhl__handing_over_thu'   => 'Thursday',
    'SHOP_MODULE_mo_dhl__handing_over_fri'   => 'Friday',
    'SHOP_MODULE_mo_dhl__handing_over_sat'   => 'Saturday',

    'SHOP_MODULE_GROUP_mo_dhl__wunschzeit'          => 'Preferred time',
    'SHOP_MODULE_mo_dhl__wunschzeit_active'         => 'Enabled',
    'SHOP_MODULE_mo_dhl__wunschzeit_surcharge'      => 'Delivery surcharge (EUR)',
    'HELP_SHOP_MODULE_mo_dhl__wunschzeit_surcharge' => 'Insert gross value as surcharge for the preferred time. Insert 0 to offer service for free. Use . as decimal separator.',

    'SHOP_MODULE_GROUP_mo_dhl__wunschtag_wunschzeit'          => 'Combination of preferred day and preferred time',
    'SHOP_MODULE_mo_dhl__wunschtag_wunschzeit_surcharge'      => 'Delivery surcharge (EUR)',
    'HELP_SHOP_MODULE_mo_dhl__wunschtag_wunschzeit_surcharge' => 'Insert gross value as surcharge for the combination of preferred day and time. Insert 0 to offer service for free. Use . as decimal separator.',

    'SHOP_MODULE_GROUP_mo_dhl__wunschort'  => 'Preferred location',
    'SHOP_MODULE_mo_dhl__wunschort_active' => 'Enabled',

    'SHOP_MODULE_GROUP_mo_dhl__wunschnachbar'  => 'Preferred neighbor',
    'SHOP_MODULE_mo_dhl__wunschnachbar_active' => 'Enabled',

    'SHOP_MODULE_GROUP_mo_dhl__sender'         => 'Sender data',
    'SHOP_MODULE_mo_dhl__sender_line1'         => 'Line 1',
    'SHOP_MODULE_mo_dhl__sender_line2'         => 'Line 2',
    'SHOP_MODULE_mo_dhl__sender_line3'         => 'Line 3',
    'SHOP_MODULE_mo_dhl__sender_street'        => 'Street',
    'SHOP_MODULE_mo_dhl__sender_street_number' => 'Street number',
    'SHOP_MODULE_mo_dhl__sender_zip'           => 'Zip code',
    'SHOP_MODULE_mo_dhl__sender_city'          => 'City',
    'SHOP_MODULE_mo_dhl__sender_country'       => 'Country',
    'SHOP_MODULE_mo_dhl__sender_country_DEU'   => 'Germany',
    'SHOP_MODULE_mo_dhl__sender_country_AUT'   => 'Austria',

    'SHOP_MODULE_GROUP_mo_dhl__logs'             => 'Logging',
    'SHOP_MODULE_mo_dhl__logLevel'               => 'Log level',
    'SHOP_MODULE_mo_dhl__logLevel_ERROR'         => 'ERROR',
    'SHOP_MODULE_mo_dhl__logLevel_INFO'          => 'INFO',
    'SHOP_MODULE_mo_dhl__logLevel_DEBUG'         => 'DEBUG',
    'SHOP_MODULE_mo_dhl__retention'              => 'Retention period',
    'SHOP_MODULE_mo_dhl__retention_ONE_DAY'      => 'one day',
    'SHOP_MODULE_mo_dhl__retention_TWO_DAYS'     => 'two days',
    'SHOP_MODULE_mo_dhl__retention_THREE_DAYS'   => 'three days',
    'SHOP_MODULE_mo_dhl__retention_FOUR_DAYS'    => 'four days',
    'SHOP_MODULE_mo_dhl__retention_FIVE_DAYS'    => 'five days',
    'SHOP_MODULE_mo_dhl__retention_SIX_DAYS'     => 'six days',
    'SHOP_MODULE_mo_dhl__retention_ONE_WEEK'     => 'one week',
    'SHOP_MODULE_mo_dhl__retention_TWO_WEEKS'    => 'two weeks',
    'SHOP_MODULE_mo_dhl__retention_THREE_WEEKS'  => 'three weeks',
    'SHOP_MODULE_mo_dhl__retention_ONE_MONTH'    => 'one month',
    'SHOP_MODULE_mo_dhl__retention_TWO_MONTHS'   => 'two months',
    'SHOP_MODULE_mo_dhl__retention_QUARTER_YEAR' => 'one quarter year',
    'SHOP_MODULE_mo_dhl__retention_HALF_YEAR'    => 'half a year',
    'SHOP_MODULE_mo_dhl__retention_YEAR'         => 'one year',
    'SHOP_MODULE_mo_dhl__retention_UNLIMITED'    => 'unlimited',
    'SHOP_MODULE_mo_dhl__logfiles'               => 'Log files',

    'SHOP_MODULE_GROUP_mo_dhl__privacy'       => 'Privacy',
    'SHOP_MODULE_mo_dhl__privacy_policy'      => 'Privacy Policy',
    'HELP_SHOP_MODULE_mo_dhl__privacy_policy' => 'We expect an idenifier of a CMS page',
];
