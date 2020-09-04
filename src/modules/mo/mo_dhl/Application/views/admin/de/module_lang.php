<?php
$sLangName = 'Deutsch';
$aLang = [
    'charset' => 'UTF-8',

    'moOrderBatch'                                 => 'DHL Stapelverarbeitung',
    'MO_DHL__BATCH_TITLE'                          => 'DHL Stapelverarbeitung',
    'MO_DHL__EXPORT'                               => 'Exportieren',
    'MO_DHL__BATCH_ERROR_NO_ORDER_SELECTED'        => 'Bitte wählen Sie mindestens eine Bestellung aus.',
    'MO_DHL__EXPORT_ORDERS_WITHOUT_BILLING_NUMBER' => 'Für die Sendungen mit einer der folgenden Referenzen konnte keine Abrechnungsnummer erzeugt werden: %s',
    'MO_DHL__BATCH_ERROR_CREATION_ERROR'           => 'Beim Erstellen des Labels für Bestellnr. %s trat folgender Fehler auf: %s',
    'MO_DHL__LAST_DHL_STATUS'                      => 'Status der letzten Labelerstellung',
    'MO_DHL__ELEMENTS_PER_PAGE'                    => 'Elemente pro Seite',
    'MO_DHL__ORDER_DHL'                            => 'DHL',
    'MO_DHL__PROCESS_AND_PARTICIPATION'            => 'Verfahrens- und Teilnahmenummern',
    'MO_DHL__WUNSCHPAKET'                          => 'Wunschpaket Optionen',
    'MO_DHL__WUNSCHTAG'                            => 'Wunschtag',
    'MO_DHL__WUNSCHORT'                            => 'Wunschort',
    'MO_DHL__WUNSCHNACHBAR'                        => 'Wunschnachbar',
    'MO_DHL__EKP'                                  => 'EKP',
    'MO_DHL__EKP_ERROR'                            => 'Eine EKP besteht aus genau zehn Ziffern.',
    'MO_DHL__FILIALROUTING_EMAIL_ERROR'            => 'Die alternative E-Mail-Adresse für das Filialrouting war nicht valide und wurde zurückgesetzt.',
    'MO_DHL__PARTICIPATION_NUMBER'                 => 'Teilnahmenummer',
    'MO_DHL__PARTICIPATION_NUMBER_ERROR'           => 'Eine Teilnahmenummer besteht aus genau zwei Zeichen und enthält nur Buchstaben und Ziffern.',
    'MO_DHL__PROCESS_IDENTIFIER'                   => 'Verfahrensnummer',
    'MO_DHL__PROCESS_IDENTIFIER_ERROR'             => 'Bitte wählen Sie eine Verfahrensnummer aus der Liste.',
    'MO_DHL__DELIVERYSET_DHL'                      => 'DHL',
    'MO_DHL__DELIVERY_DHL'                         => 'DHL',
    'MO_DHL__PAYMENTS_DHL'                         => 'DHL',
    'MO_DHL__EXCLUDED'                             => 'Ausschließen',
    'MO_DHL_SAVE_AND_CHECK'                        => 'Speichern und Zugangsdaten prüfen',
    'MO_DHL__NO_DELIVERYSET'                       => 'Bitte konfigurieren Sie mindestens eine Versandsart zur Nutzung der SHL Services',
    'MO_DHL__CHECKING_DELIVERYSET'                 => 'Teste Versandart ',
    'MO_DHL__CORRECT_CREDENTIALS'                  => 'Zugangsdaten korrekt',
    'MO_DHL__INCORRECT_CREDENTIALS'                => 'Zugangsdaten inkorrekt. Bitte überprüfen Sie ihre Zugangsdaten.',
    'MO_DHL__CHECK_FOR_SANDBOX_NOT_POSSIBLE'       => 'Du Überprüfung ihrer Zugangsdaten ist bei aktiviertem Testing-Webservice nicht möglich.',
    'MO_DHL__LOGIN_FAILED'                         => 'Zugangsdaten inkorrekt. Login fehlgeschlagen.',
    'MO_DHL__LABELS'                               => 'Labels',
    'MO_DHL__LABEL'                                => 'Versandlabel',
    'MO_DHL__RETOURE_LABEL'                        => 'Retourenlabel',
    'MO_DHL__RETOURE_QR_LABEL'                     => 'Retoure QR Code',
    'MO_DHL__INSTALL_FOLDER_ERROR'                 => 'Ordner %s konnte nicht erstellt werden. Bitte erstellen Sie den Ordner manuell.',
    'MO_DHL__CREATE_LABEL'                         => 'Neues Versandlabel erstellen',
    'MO_DHL__CREATE_LABELS'                        => 'Neue Labels erstellen',
    'MO_DHL__DELETE_SHIPMENT'                      => 'Versandlabel stornieren',

    'MO_DHL__CUSTOM_LABEL_CREATE'             => 'Individuelles Versandlabel erstellen',
    'MO_DHL__CUSTOM_LABEL_BACK'               => 'Zurück',
    'MO_DHL__CUSTOM_LABEL_GENERAL'            => 'Allgemein',
    'MO_DHL__CUSTOM_LABEL_WEIGHT'             => 'Gewicht (in kg)',
    'MO_DHL__CUSTOM_LABEL_PROCESS'            => 'Verfahrensnummer',
    'MO_DHL__CUSTOM_LABEL_RECEIVER'           => 'Empfänger',
    'MO_DHL__CUSTOM_LABEL_RETURN_RECEIVER'    => 'Retoure - Empfängerdaten',
    'MO_DHL__CUSTOM_LABEL_NAME'               => 'Name',
    'MO_DHL__CUSTOM_LABEL_ADRESS_ADDITION'    => 'Addresszusatz',
    'MO_DHL__CUSTOM_LABEL_STREETNAME'         => 'Straßenname',
    'MO_DHL__CUSTOM_LABEL_STREETNUMBER'       => 'Hausnummer',
    'MO_DHL__CUSTOM_LABEL_ZIP'                => 'Postleitzahl',
    'MO_DHL__CUSTOM_LABEL_CITY'               => 'Stadt',
    'MO_DHL__CUSTOM_LABEL_COUNTRY'            => 'Land',
    'MO_DHL__CUSTOM_LABEL_PACKSTATION_NUMBER' => 'Packstation-Nr.',
    'MO_DHL__CUSTOM_LABEL_POSTFILIAL_NUMBER'  => 'Filial-Nr.',
    'MO_DHL__CUSTOM_LABEL_POST_NUMBER'        => 'Postnummer',
    'MO_DHL__CUSTOM_LABEL_SHIPPER'            => 'Absender',
    'MO_DHL__CUSTOM_LABEL_SERVICES'           => 'Versand-Services',

    'MO_DHL__COUNTRY_DHL'              => 'DHL',
    'MO_DHL__RETOURE_RECEIVER_ID'      => 'Retourenempfängername (receiverID)',
    'HELP_MO_DHL__RETOURE_RECEIVER_ID' => 'Die jeweiligen Retourenempfängernamen (receiverID), finden Sie aufgelistet im DHL Geschäftskundenportal (https://www.dhl-geschaeftskundenportal.de) unter dem Menüpunkt "Retoure" > "Einstellungen" unter dem Eintrag "Receiver ID".',
    'MO_DHL__CREATE_RETOURE'           => 'Retourenlabel erstellen',
    'MO_DHL__NO_RECEIVER_ID'           => 'Für das Absenderland %s ist keine Retoure Receiver Id hinterlegt. Bitte tun Sie das unter Stammdaten > Länder > DHL.',

    'MO_DHL__ARTICLES_DHL'              => 'DHL',
    'MO_DHL__CATEGORIES_DHL'            => 'DHL',
    'MO_DHL__VISUAL_AGE_CHECK16'        => 'Alterssichtprüfung ab 16',
    'MO_DHL__VISUAL_AGE_CHECK18'        => 'Alterssichtprüfung ab 18',
    'MO_DHL__BULKY_GOOD'                => 'Sperrgut',
    'MO_DHL__IDENT_CHECK'               => 'Ident-Check',
    'MO_DHL__CASH_ON_DELIVERY'          => 'Nachnahme',
    'MO_DHL__ADDITIONAL_INSURANCE'      => 'Transportversicherung',
    'HELP_MO_DHL__ADDITIONAL_INSURANCE' => 'Grundsätzlich haftet DHL für Ihr Paket beim deutschlandweiten Versand gegen Verlust oder Beschädigung bis 500 EUR (nur gegen Vorlage des quittierten Einlieferungsbeleges). Für besonders wertvolle Sendungen bietet DHL Ihnen darüber hinaus eine Transportversicherung bis 2.500 EUR (+6,00 EUR Aufpreis) oder 25.000 EUR  (+18,00 EUR Aufpreis) an. Weiter Informationen finden Sie <a href="https://www.dhl.de/de/geschaeftskunden/paket/leistungen-und-services/services/service-loesungen.html#versicherung">hier</a>',
];
