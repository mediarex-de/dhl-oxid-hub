<?php

$sLangName = 'English';
$aLang = [
    'charset' => 'UTF-8',

    'SHOP_MODULE_GROUP_mo_dhl__account'         => 'Credentials',
    'SHOP_MODULE_mo_dhl__account_sandbox'       => 'Use Testing-Webservice',
    'HELP_SHOP_MODULE_mo_dhl__account_sandbox'  => 'Use the testing webservice of DHL instead of the productive webservice. In this case you have to fill in the credentials of your <a href="https://entwickler.dhl.de" target="_blank" rel="noopener noreferrer">DHL Developer Portal</a> account below.',
    'SHOP_MODULE_mo_dhl__account_user'          => 'Username',
    'HELP_SHOP_MODULE_mo_dhl__account_user'     => 'Your Username for the <a href="https://www.dhl-geschaeftskundenportal.de" target="_blank" rel="noopener noreferrer">DHL Business Customer Portal</a>. Please pay attention that the username is case sensitive. Not a customer yet? Then register <a href="https://www.dhl.de/en/geschaeftskunden/paket/kunde-werden/angebot-dhl-geschaeftskunden-online.html">here</a>.',
    'SHOP_MODULE_mo_dhl__account_password'      => 'Password',
    'HELP_SHOP_MODULE_mo_dhl__account_password' => 'Your Password for the <a href="https://www.dhl-geschaeftskundenportal.de" target="_blank" rel="noopener noreferrer">DHL Business Customer Portal</a>.',
    'SHOP_MODULE_mo_dhl__account_check'         => '',
    'SHOP_MODULE_mo_dhl__merchant_ekp'          => 'EKP',
    'HELP_SHOP_MODULE_mo_dhl__merchant_ekp'     => 'The EKP is your DHL customer number',

    'SHOP_MODULE_GROUP_mo_dhl__portokasse'         => 'Portokasse',
    'SHOP_MODULE_mo_dhl__portokasse_user'          => 'Portokasse Username (for Internetmarke and Warenpost)',
    'HELP_SHOP_MODULE_mo_dhl__portokasse_user'     => 'Your E-Mail Adress for the <a href="https://portokasse.deutschepost.de/">Portokasse</a>. Not a customer yet? Then register <a href="https://portokasse.deutschepost.de/portokasse/#!/register/">here</a>.',
    'SHOP_MODULE_mo_dhl__portokasse_password'      => 'Portokasse Password',
    'HELP_SHOP_MODULE_mo_dhl__portokasse_password' => 'Your Password for the <a href="https://portokasse.deutschepost.de/">Portokasse</a>.',

    'SHOP_MODULE_GROUP_mo_dhl__internetmarke'         => 'Internetmarke',
    'SHOP_MODULE_mo_dhl__internetmarke_layout'        => 'Layout ID for printing the Internetmarke',
    'SHOP_MODULE_mo_dhl__internetmarke_check'         => '',

    'SHOP_MODULE_GROUP_mo_dhl__delivery'          => 'Delivery',
    'SHOP_MODULE_mo_dhl__only_with_leitcode'      => 'Allow only Codeable shipping addresses',
    'HELP_SHOP_MODULE_mo_dhl__only_with_leitcode' => 'If checkbox is enabled, shipment labels will only be created if the DHL delivery address verification succeeds (address is coedable). There is a surcharge for not codeable shipping addresses.',

    'SHOP_MODULE_GROUP_mo_dhl__delivery_weight'          => 'Delivery - Weight calculation',
    'SHOP_MODULE_mo_dhl__default_weight'                 => 'Default weight (in kg)',
    'HELP_SHOP_MODULE_mo_dhl__default_weight'            => 'The weight entered here is used when creating the shipping labels, if the automatic weight calculation is deactivated or (if weight calculation is activated) no weight is maintained for any item within the order.',
    'SHOP_MODULE_mo_dhl__calculate_weight'               => 'Calculate weight automatically',
    'HELP_SHOP_MODULE_mo_dhl__calculate_weight'          => 'If this box is checked, the package weights will be automatically calculated based on the weights of the items included, as well as the percentage and fixed surcharges.',
    'SHOP_MODULE_mo_dhl__packing_weight_in_percent'      => 'Percentage of weight surcharge for filling material',
    'HELP_SHOP_MODULE_mo_dhl__packing_weight_in_percent' => 'Percentage weight surcharge for packaging material based on the sum of the article weights when automatic weight calculation is activated.',
    'SHOP_MODULE_mo_dhl__packing_weight_absolute'        => 'Absolute weight surcharge for packaging material (in kg)',
    'HELP_SHOP_MODULE_mo_dhl__packing_weight_absolute'   => 'Fixed weight surcharge in kilograms for packaging material when automatic weight calculation is activated.',

    'SHOP_MODULE_GROUP_mo_dhl__services'                       => 'Delivery - Services',
    'SHOP_MODULE_mo_dhl__go_green_active'                      => 'GoGreen',
    'HELP_SHOP_MODULE_mo_dhl__go_green_active'                 => 'Displays that GoGreen is used for the DHL deliveries. Activate this option only, if GoGreen is acitvated for the deliveries.',
    'SHOP_MODULE_mo_dhl__filialrouting_active'                 => 'Parcel Outlet Routing',
    'HELP_SHOP_MODULE_mo_dhl__filialrouting_active'            => 'If checkbox is enabled, the Parcel Outlet Routing Service will be booked. In this case, your undeliverable packages will be held at the nearest parcel collection point for collection by the recipient rather than being returned immediately to you.',
    'SHOP_MODULE_mo_dhl__filialrouting_alternative_email'      => 'Alternative email address for the Parcel Outlet Routing Service (optional)',
    'HELP_SHOP_MODULE_mo_dhl__filialrouting_alternative_email' => 'Please enter your email address in case you wish to receive the notification for the Parcel Outlet Routing Service.',
    'SHOP_MODULE_mo_dhl__paketankuendigung_active'             => 'Activate automatic delivery notification',
    'SHOP_MODULE_mo_dhl__notification_mode'                    => 'Send customer e-mail address to DHL',
    'SHOP_MODULE_mo_dhl__notification_mode_NEVER'              => 'Never',
    'SHOP_MODULE_mo_dhl__notification_mode_ALWAYS'             => 'Always',
    'SHOP_MODULE_mo_dhl__notification_mode_ASK'                => 'Ask the customer',

    'SHOP_MODULE_GROUP_mo_dhl__cod'        => 'Cash on Delivery - Bank account',
    'SHOP_MODULE_mo_dhl__cod_accountOwner' => 'Name of bank account owner',
    'SHOP_MODULE_mo_dhl__cod_bankName'     => 'Name of bank',
    'SHOP_MODULE_mo_dhl__cod_iban'         => 'IBAN',

    'SHOP_MODULE_mo_dhl__ident_check_min_age'    => 'Minimal age for Ident-Check',
    'SHOP_MODULE_mo_dhl__ident_check_min_age_0'  => 'no minimal age',
    'SHOP_MODULE_mo_dhl__ident_check_min_age_16' => '16 years',
    'SHOP_MODULE_mo_dhl__ident_check_min_age_18' => '18 years',

    'SHOP_MODULE_GROUP_mo_dhl__retoure'                            => 'Return Shipment',
    'SHOP_MODULE_mo_dhl__retoure_reference_prefix'                 => 'Prefix for reference number',
    'HELP_SHOP_MODULE_mo_dhl__retoure_reference_prefix'            => 'You can specify a prefix which will be compined with the order number to build a reference number. This will only be used in the overview for created return labels in the DHL Business Customer Portal.',
    'SHOP_MODULE_mo_dhl__retoure_allow_frontend_creation'          => 'Create Return labels in the Shop Frontend',
    'HELP_SHOP_MODULE_mo_dhl__retoure_allow_frontend_creation'     => 'You can specify whether customers can create return labels in the Shop Frontend at Account > Order history . Its possible to allow the creation only for orders which were sent via DHL.',
    'SHOP_MODULE_mo_dhl__retoure_allow_frontend_creation_NEVER'    => 'never',
    'SHOP_MODULE_mo_dhl__retoure_allow_frontend_creation_ONLY_DHL' => 'only for DHL orders',
    'SHOP_MODULE_mo_dhl__retoure_allow_frontend_creation_ALWAYS'   => 'always',
    'SHOP_MODULE_mo_dhl__retoure_days_limit'                       => 'Max. time for customers to create return labels (in days)',
    'HELP_SHOP_MODULE_mo_dhl__retoure_days_limit'                  => 'Customers can only create return labels in a given time frame after products were sent.',
    'SHOP_MODULE_mo_dhl__retoure_admin_approve'                     => 'Customers should ask for return label creation.',
    'HELP_SHOP_MODULE_mo_dhl__retoure_admin_approve'                => 'You can specify whether customers should get permission to create return label.',

    'SHOP_MODULE_GROUP_mo_dhl__beilegerretoure'            => 'Return Shipment',
    'SHOP_MODULE_mo_dhl__beilegerretoure_active'           => 'Attached return shipment label',
    'SHOP_MODULE_GROUP_mo_dhl__retoure_receiver'           => 'Return Shipment - Receiver data',
    'SHOP_MODULE_mo_dhl__retoure_receiver_use_sender'      => 'Use delivery sender address',
    'HELP_SHOP_MODULE_mo_dhl__retoure_receiver_use_sender' => 'If the checkbox is active, the other fields do not have to be filled out because the data of the shipping sender is used for the returns receiver.',
    'SHOP_MODULE_mo_dhl__retoure_receiver_line1'           => 'Line 1',
    'SHOP_MODULE_mo_dhl__retoure_receiver_line2'           => 'Line 2',
    'SHOP_MODULE_mo_dhl__retoure_receiver_line3'           => 'Line 3',
    'SHOP_MODULE_mo_dhl__retoure_receiver_street'          => 'Street',
    'SHOP_MODULE_mo_dhl__retoure_receiver_street_number'   => 'Street number',
    'SHOP_MODULE_mo_dhl__retoure_receiver_zip'             => 'Zip code',
    'SHOP_MODULE_mo_dhl__retoure_receiver_city'            => 'City',
    'SHOP_MODULE_mo_dhl__retoure_receiver_country'         => 'Country',
    'SHOP_MODULE_mo_dhl__retoure_receiver_country_DEU'     => 'Germany',
    'SHOP_MODULE_mo_dhl__retoure_receiver_country_AUT'     => 'Austria',

    'SHOP_MODULE_GROUP_mo_dhl__standortsuche'                 => 'Preferred delivery - Parcel shop finder',
    'SHOP_MODULE_mo_dhl__prod_standortsuche_password'         => 'DHL Location Finder Password',
    'HELP_SHOP_MODULE_mo_dhl__prod_standortsuche_password'    => 'Your Password for the <a href="https://developer.dhl.com/api-reference/location-finder" target="_blank">DHL Location Finder API</a>.',
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
    'HELP_SHOP_MODULE_mo_dhl__standortsuche_googleMapsApiKey' => '<a target="_blank" rel="noopener noreferrer" href="https://developers.google.com/maps/documentation/javascript/get-api-key">Get an API key here</a>',
    'SHOP_MODULE_mo_dhl__standortsuche_packstation'           => 'Packstation enabled',
    'SHOP_MODULE_mo_dhl__standortsuche_postfiliale'           => 'Postfiliale enabled',
    'SHOP_MODULE_mo_dhl__standortsuche_paketshop'             => 'Paketshop enabled',

    'SHOP_MODULE_GROUP_mo_dhl__wunschtag'          => 'Preferred delivery - Preferred day',
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
    'SHOP_MODULE_mo_dhl__wunschtag_surcharge_text' => 'Displayed text for the surcharge for the preferred day in the frontend',

    'SHOP_MODULE_GROUP_mo_dhl__handing_over' => 'Days for handing over to DHL',
    'SHOP_MODULE_mo_dhl__handing_over_help'  => 'On the working days checked, there is no transfer of parcels to DHL (in addition to sundays and public holidays). This information determines the first displayed preferred day in the frontend.',
    'SHOP_MODULE_mo_dhl__handing_over_mon'   => 'Monday',
    'SHOP_MODULE_mo_dhl__handing_over_tue'   => 'Tuesday',
    'SHOP_MODULE_mo_dhl__handing_over_wed'   => 'Wednesday',
    'SHOP_MODULE_mo_dhl__handing_over_thu'   => 'Thursday',
    'SHOP_MODULE_mo_dhl__handing_over_fri'   => 'Friday',
    'SHOP_MODULE_mo_dhl__handing_over_sat'   => 'Saturday',

    'SHOP_MODULE_GROUP_mo_dhl__wunschort'  => 'Preferred delivery - Drop-off location',
    'SHOP_MODULE_mo_dhl__wunschort_active' => 'Enabled',

    'SHOP_MODULE_GROUP_mo_dhl__wunschnachbar'  => 'Preferred delivery - Neighbor',
    'SHOP_MODULE_mo_dhl__wunschnachbar_active' => 'Enabled',

    'SHOP_MODULE_GROUP_mo_dhl__sender'                  => 'Delivery - Sender data',
    'SHOP_MODULE_mo_dhl__paketankuendigung_custom'      => 'DHL parcel custom announcement',
    'HELP_SHOP_MODULE_mo_dhl__paketankuendigung_custom' => 'Do you want to customize the DHL parcel announcement? You can now display your logo and the desired shop name in the package announcement. Use the following  <a href="https://www.dhl.de/de/geschaeftskunden/paket/versandsoftware/dhl-paketankuendigung/formular.html" target="_blank" rel="noopener noreferrer">form</a>.',
    'SHOP_MODULE_mo_dhl__sender_line1'                  => 'Line 1',
    'SHOP_MODULE_mo_dhl__sender_line2'                  => 'Line 2',
    'SHOP_MODULE_mo_dhl__sender_line3'                  => 'Line 3',
    'SHOP_MODULE_mo_dhl__sender_street'                 => 'Street',
    'SHOP_MODULE_mo_dhl__sender_street_number'          => 'Street number',
    'SHOP_MODULE_mo_dhl__sender_zip'                    => 'Zip code',
    'SHOP_MODULE_mo_dhl__sender_city'                   => 'City',
    'SHOP_MODULE_mo_dhl__sender_country'                => 'Country',
    'SHOP_MODULE_mo_dhl__sender_country_DEU'            => 'Germany',
    'SHOP_MODULE_mo_dhl__sender_country_AUT'            => 'Austria',

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

    'SHOP_MODULE_mo_dhl__standortsuche_map_radius'      => 'Radius in meter for location searches',
    'HELP_SHOP_MODULE_mo_dhl__standortsuche_map_radius' => 'Giving an explicit radius can improve search results. Having 0 as value will ignore this field.',
];
