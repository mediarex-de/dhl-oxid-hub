<?php
$sLangName = 'Deutsch';
$aLang = [
    'charset' => 'UTF-8',

    'SHOP_MODULE_GROUP_mo_dhl__account'         => 'Zugangsdaten',
    'SHOP_MODULE_mo_dhl__account_sandbox'       => 'Nutze Testing-Webservice',
    'HELP_SHOP_MODULE_mo_dhl__account_sandbox'  => 'Nutze den Testing-Webservice von DHL anstatt des Productive-Webservice. In diesem Fall müssen Sie unten die Zugangsdaten zu Ihrem <a href="https://entwickler.dhl.de">DHL-Entwickler-Portal</a>-Account angeben.',
    'SHOP_MODULE_mo_dhl__account_user'          => 'Benutzername',
    'HELP_SHOP_MODULE_mo_dhl__account_user'     => 'Ihr Benutzername für das <a href="https://www.dhl-geschaeftskundenportal.de">DHL Geschäftskundenportal</a>. Hierbei ist die korrekte Groß- und Kleinschreibung zu beachten. Noch kein Kunde? Dann registrieren Sie sich <a href="https://www.dhl.de/de/geschaeftskunden/paket/kunde-werden/angebot-dhl-geschaeftskunden-online.html">hier</a>.',
    'SHOP_MODULE_mo_dhl__account_password'      => 'Passwort',
    'HELP_SHOP_MODULE_mo_dhl__account_password' => 'Ihr Passwort für das <a href="https://www.dhl-geschaeftskundenportal.de">DHL Geschäftskundenportal</a>.',
    'SHOP_MODULE_mo_dhl__account_check'         => '',
    'SHOP_MODULE_mo_dhl__merchant_ekp'          => 'EKP',
    'HELP_SHOP_MODULE_mo_dhl__merchant_ekp'     => 'Die EKP ist Ihre DHL Kundennummer',

    'SHOP_MODULE_GROUP_mo_dhl__delivery'          => 'Versand',
    'SHOP_MODULE_mo_dhl__only_with_leitcode'      => 'Nur leitcodierbare Adressen zulassen',
    'HELP_SHOP_MODULE_mo_dhl__only_with_leitcode' => 'Aktivieren Sie die Checkbox, wenn Versandetiketten nur für Adressen erstellt werden sollen, die seitens DHL als leitcodierbar gelten. Für nicht-leitcodierbare Adressen berechnet DHL in der Regel einen Aufschlag.',

    'SHOP_MODULE_GROUP_mo_dhl__delivery_weight'          => 'Versand - Gewichtermittlung',
    'SHOP_MODULE_mo_dhl__default_weight'                 => 'Standardgewicht (in kg)',
    'HELP_SHOP_MODULE_mo_dhl__default_weight'            => 'Die hier eingetragenen Gewichte werden beim Erstellen der Versandetiketten verwendet, falls die automatische Gewichtsberechnung deaktiviert wird oder (bei aktivierter Gewichtsberechnung) für keinen Artikel innerhalb der Bestellung ein Gewicht gepflegt ist.',
    'SHOP_MODULE_mo_dhl__calculate_weight'               => 'Paketgewicht automatisch berechnen',
    'HELP_SHOP_MODULE_mo_dhl__calculate_weight'          => 'Ist dieses Feld aktiviert, werden die Paketgewichte automatisch auf Basis der Gewichte der enthaltenen Artikel sowie der prozentualen und fixen Gewichtsaufschläge berechnet.',
    'SHOP_MODULE_mo_dhl__packing_weight_in_percent'      => 'Prozentualer Gewichtsaufschlag für Füllmaterial',
    'HELP_SHOP_MODULE_mo_dhl__packing_weight_in_percent' => 'Prozentualer Gewichtsaufschlag für Verpackungsmaterial auf Basis der Summe der Artikelgewichte, wenn die automatische Gewichtsberechnung aktiviert ist.',
    'SHOP_MODULE_mo_dhl__packing_weight_absolute'        => 'Gewichtsaufschlag für Verpackungsmaterial (in kg)',
    'HELP_SHOP_MODULE_mo_dhl__packing_weight_absolute'   => 'Fester Gewichtsaufschlag in Kilogramm für Verpackungsmaterial, wenn die automatische Gewichtsberechnung aktiviert ist.',

    'SHOP_MODULE_GROUP_mo_dhl__services'                       => 'Versand - Services',
    'SHOP_MODULE_mo_dhl__go_green_active'                      => 'GoGreen',
    'HELP_SHOP_MODULE_mo_dhl__go_green_active'                 => 'Zeigt im Frontend an, dass für den Versand mit DHL GoGreen verwendet wird. Bitte aktivieren Sie dieses Feld nur, wenn für den Versand GoGreen aktiviert ist.',
    'SHOP_MODULE_mo_dhl__filialrouting_active'                 => 'Filialrouting',
    'HELP_SHOP_MODULE_mo_dhl__filialrouting_active'            => 'Durch Aktivierung wird eine Sendung bei Unzustellbarkeit (z.B. Empfänger nicht ermittelbar) automatisch in die nächstgelegene Postfiliale weitergeleitet.',
    'SHOP_MODULE_mo_dhl__filialrouting_alternative_email'      => 'Alternative E-Mail-Adresse für das Filialrouting (optional)',
    'HELP_SHOP_MODULE_mo_dhl__filialrouting_alternative_email' => 'Geben Sie hier Ihre E-Mail-Adresse an, wenn Sie als Versender die Abholinformation erhalten möchten.',
    'SHOP_MODULE_mo_dhl__paketankuendigung_active'             => 'Automatische Paketankündigungen aktivieren',
    'SHOP_MODULE_mo_dhl__notification_mode'                    => 'Kunden-E-Mail-Adresse an DHL übermitteln',
    'HELP_SHOP_MODULE_mo_dhl__notification_mode'               => 'Legen Sie fest, ob die E-Mail Adresse des Kunden an DHL übermittelt werden soll. Bei der Option Auf Kundenwunsch übermitteln erscheint, im Frontend bei jeder Versandart, der ein DHL-Produkt zugewiesen wurde, eine entsprechende Checkbox im Checkout-Prozess, sodass der Kunde über die Weitergabe seiner E-Mail-Adresse selbst entscheiden kann. Dies ist die empfohlene Einstellung gemäß der DSGVO.',
    'SHOP_MODULE_mo_dhl__notification_mode_NEVER'              => 'Niemals',
    'SHOP_MODULE_mo_dhl__notification_mode_ALWAYS'             => 'Immer',
    'SHOP_MODULE_mo_dhl__notification_mode_ASK'                => 'Auf Kundenwunsch übermitteln',


    'SHOP_MODULE_GROUP_mo_dhl__retoure'          => 'Retoure',
    'SHOP_MODULE_mo_dhl__beilegerretoure_active' => 'Beilegerretoure',

    'SHOP_MODULE_GROUP_mo_dhl__retoure_receiver'           => 'Retoure - Empfängerdaten',
    'SHOP_MODULE_mo_dhl__retoure_receiver_use_sender'      => 'Versand-Absenderdaten nutzen',
    'HELP_SHOP_MODULE_mo_dhl__retoure_receiver_use_sender' => 'Wenn die Checkbox aktiv ist, müssen die weiteren Felder nicht ausgefüllt werden, da für den Retourenempfänger auf die Daten des Versandabsenders zurückgegriffen wird.',
    'SHOP_MODULE_mo_dhl__retoure_receiver_line1'           => 'Zeile 1',
    'SHOP_MODULE_mo_dhl__retoure_receiver_line2'           => 'Zeile 2',
    'SHOP_MODULE_mo_dhl__retoure_receiver_line3'           => 'Zeile 3',
    'SHOP_MODULE_mo_dhl__retoure_receiver_street'          => 'Straße',
    'SHOP_MODULE_mo_dhl__retoure_receiver_street_number'   => 'Hausnummer',
    'SHOP_MODULE_mo_dhl__retoure_receiver_zip'             => 'Postleitzahl',
    'SHOP_MODULE_mo_dhl__retoure_receiver_city'            => 'Stadt',
    'SHOP_MODULE_mo_dhl__retoure_receiver_country'         => 'Land',
    'SHOP_MODULE_mo_dhl__retoure_receiver_country_DEU'     => 'Deutschland',
    'SHOP_MODULE_mo_dhl__retoure_receiver_country_AUT'     => 'Österreich',

    'SHOP_MODULE_GROUP_mo_dhl__standortsuche'                 => 'Wunschpaket - Standortsuche',
    'SHOP_MODULE_mo_dhl__standortsuche_maximumHits'           => 'Maximale Trefferanzahl',
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
    'SHOP_MODULE_mo_dhl__standortsuche_googleMapsApiKey'      => 'API-Schlüssel',
    'HELP_SHOP_MODULE_mo_dhl__standortsuche_googleMapsApiKey' => 'Sie können einen API-Schlüssel <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">hier anfordern</a>.',
    'SHOP_MODULE_mo_dhl__standortsuche_packstation'           => 'Packstation wählbar',
    'SHOP_MODULE_mo_dhl__standortsuche_postfiliale'           => 'Postfiliale wählbar',
    'SHOP_MODULE_mo_dhl__standortsuche_paketshop'             => 'Paketshop wählbar',

    'SHOP_MODULE_GROUP_mo_dhl__wunschtag'       => 'Wunschpaket - Wunschtag',
    'SHOP_MODULE_mo_dhl__wunschtag_active'      => 'Aktiv',
    'SHOP_MODULE_mo_dhl__wunschtag_cutoff'      => 'Täglicher Endzeitpunkt zur Berücksichtigung eines Wunschtags',
    'HELP_SHOP_MODULE_mo_dhl__wunschtag_cutoff' => 'Spätester Bestellzeitpunkt bis zu dem eine Sendung zum frühesten Wunschtag (Bestelltag+2) eingehalten werden kann. Sobald diese Zeit überschritten ist, wird der im Front-End angezeigte frühstmögliche Wunschtag um einen Tag nach hinten verschoben (Bestelltag+3).',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation'    => 'Bearbeitungszeit für Lieferung (Sonn- und Feiertage ausgenommen)',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_0'  => '0',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_1'  => '1',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_2'  => '2',
    'SHOP_MODULE_mo_dhl__wunschtag_preparation_3'  => '3',
    'SHOP_MODULE_mo_dhl__wunschtag_surcharge'      => 'Aufpreis auf Versandkosten (EUR)',
    'HELP_SHOP_MODULE_mo_dhl__wunschtag_surcharge' => 'Geben Sie hier einen Aufpreis als Bruttowert für den Service Wunschtag an. Geben Sie 0 ein, um den Service konstenfrei anzubieten. Nutzen Sie . als Dezimalzeichen.',
    'SHOP_MODULE_mo_dhl__wunschtag_surcharge_text' => 'Anzeigetext für den Aufpreis bei aktivem Wunschtag im Frontend',

    'SHOP_MODULE_GROUP_mo_dhl__handing_over' => 'Übergabetage an DHL',
    'SHOP_MODULE_mo_dhl__handing_over_help'     => 'An den angekreuzten Werktagen findet (zusätzlich zu Sonn- und Feiertagen) keine Übergabe von Paketen an DHL statt. Diese Angabe bestimmt den ersten angezeigten Wunschtag im Frontend.',
    'SHOP_MODULE_mo_dhl__handing_over_mon'      => 'Montag',
    'SHOP_MODULE_mo_dhl__handing_over_tue'      => 'Dienstag',
    'SHOP_MODULE_mo_dhl__handing_over_wed'      => 'Mittwoch',
    'SHOP_MODULE_mo_dhl__handing_over_thu'      => 'Donnerstag',
    'SHOP_MODULE_mo_dhl__handing_over_fri'      => 'Freitag',
    'SHOP_MODULE_mo_dhl__handing_over_sat'      => 'Samstag',

    'SHOP_MODULE_GROUP_mo_dhl__wunschort'  => 'Wunschpaket - Wunschort',
    'SHOP_MODULE_mo_dhl__wunschort_active' => 'Aktiv',

    'SHOP_MODULE_GROUP_mo_dhl__wunschnachbar'  => 'Wunschpaket - Wunschnachbar',
    'SHOP_MODULE_mo_dhl__wunschnachbar_active' => 'Aktiv',

    'SHOP_MODULE_GROUP_mo_dhl__sender'         => 'Versand - Absenderdaten',
    'SHOP_MODULE_mo_dhl__sender_line1'         => 'Zeile 1',
    'SHOP_MODULE_mo_dhl__sender_line2'         => 'Zeile 2',
    'SHOP_MODULE_mo_dhl__sender_line3'         => 'Zeile 3',
    'SHOP_MODULE_mo_dhl__sender_street'        => 'Straße',
    'SHOP_MODULE_mo_dhl__sender_street_number' => 'Hausnummer',
    'SHOP_MODULE_mo_dhl__sender_zip'           => 'Postleitzahl',
    'SHOP_MODULE_mo_dhl__sender_city'          => 'Stadt',
    'SHOP_MODULE_mo_dhl__sender_country'       => 'Land',
    'SHOP_MODULE_mo_dhl__sender_country_DEU'   => 'Deutschland',
    'SHOP_MODULE_mo_dhl__sender_country_AUT'   => 'Österreich',

    'SHOP_MODULE_GROUP_mo_dhl__logs'             => 'Logging',
    'SHOP_MODULE_mo_dhl__logLevel'               => 'Loglevel',
    'SHOP_MODULE_mo_dhl__logLevel_ERROR'         => 'ERROR',
    'SHOP_MODULE_mo_dhl__logLevel_INFO'          => 'INFO',
    'SHOP_MODULE_mo_dhl__logLevel_DEBUG'         => 'DEBUG',
    'SHOP_MODULE_mo_dhl__retention'              => 'Aufbewahrungszeitraum',
    'SHOP_MODULE_mo_dhl__retention_ONE_DAY'      => 'ein Tag',
    'SHOP_MODULE_mo_dhl__retention_TWO_DAYS'     => 'zwei Tage',
    'SHOP_MODULE_mo_dhl__retention_THREE_DAYS'   => 'drei Tage',
    'SHOP_MODULE_mo_dhl__retention_FOUR_DAYS'    => 'vier Tage',
    'SHOP_MODULE_mo_dhl__retention_FIVE_DAYS'    => 'fünf Tage',
    'SHOP_MODULE_mo_dhl__retention_SIX_DAYS'     => 'sechs Tage',
    'SHOP_MODULE_mo_dhl__retention_ONE_WEEK'     => 'eine Woche',
    'SHOP_MODULE_mo_dhl__retention_TWO_WEEKS'    => 'zwei Wochen',
    'SHOP_MODULE_mo_dhl__retention_THREE_WEEKS'  => 'drei Wochen',
    'SHOP_MODULE_mo_dhl__retention_ONE_MONTH'    => 'ein Monat',
    'SHOP_MODULE_mo_dhl__retention_TWO_MONTHS'   => 'zwei Monate',
    'SHOP_MODULE_mo_dhl__retention_QUARTER_YEAR' => 'ein Quartal',
    'SHOP_MODULE_mo_dhl__retention_HALF_YEAR'    => 'ein halbes Jahr',
    'SHOP_MODULE_mo_dhl__retention_YEAR'         => 'ein Jahr',
    'SHOP_MODULE_mo_dhl__retention_UNLIMITED'    => 'unbegrenzt',
    'SHOP_MODULE_mo_dhl__logfiles'               => 'Logdateien',

    'SHOP_MODULE_GROUP_mo_dhl__privacy'       => 'Datenschutz',
    'SHOP_MODULE_mo_dhl__privacy_policy'      => 'Datenschutzerklärung',
    'HELP_SHOP_MODULE_mo_dhl__privacy_policy' => 'Wir erwarten einen Bezeichner eine CMS-Seite.',
];
