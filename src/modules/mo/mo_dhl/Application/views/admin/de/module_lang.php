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
    'MO_DHL__WUNSCHPAKET'                          => 'Wunschzustellung Optionen',
    'MO_DHL__WUNSCHTAG'                            => 'Liefertag',
    'MO_DHL__WUNSCHORT'                            => 'Ablageort',
    'MO_DHL__WUNSCHNACHBAR'                        => 'Nachbar',
    'MO_DHL__EKP'                                  => 'EKP',
    'MO_DHL__EKP_ERROR'                            => 'Eine EKP besteht aus genau zehn Ziffern.',
    'MO_DHL__FILIALROUTING_EMAIL_ERROR'            => 'Die alternative E-Mail-Adresse für das Filialrouting war nicht valide und wurde zurückgesetzt.',
    'MO_DHL__PARTICIPATION_NUMBER'                 => 'Teilnahmenummer',
    'MO_DHL__INTERNETMARKE_PRODUCT_NUMBER'         => 'Produktnummer',
    'HELP_MO_DHL__INTERNETMARKE_PRODUCT_NUMBER'    => 'Bitte verwenden Sie eine ID aus der Liste unter DHL > Internetmarke > Produkte.',
    'MO_DHL__INTERNETMARKE_PRODUCT_ERROR'          => 'Das angegebene Produkt für die Internetmarke wurde nicht gefunden. Bitte verwenden Sie eine ID aus der Liste unter DHL > Internetmarke > Produkte.',
    'MO_DHL__WARENPOST_PRODUCT_REGION_ERROR'       => 'Die angegebene Region für die Warenpost Produkt wurde nicht gefunden. Bitte verwenden Sie einen Wert aus dem Selektor in Shopeinstellungen > Versandarten > DHL > Kundenregion.',
    'MO_DHL__WARENPOST_PRODUCT_TRACKING_TYPE_ERROR'=> 'Der angegebene Trackingtyp für die Warenpost Produkt wurde nicht gefunden. Bitte verwenden Sie einen Wert aus dem Selektor in Shopeinstellungen > Versandarten > DHL > Trackingtyp.',
    'MO_DHL__WARENPOST_PRODUCT_PACKAGE_TYPE_ERROR' => 'Der angegebene Pakettyp für die Warenpost Produkt wurde nicht gefunden. Bitte verwenden Sie einen Wert aus dem Selektor in Shopeinstellungen > Versandarten > DHL > Pakettyp.',
    'MO_DHL__PARTICIPATION_NUMBER_ERROR'           => 'Eine Teilnahmenummer besteht aus genau zwei Zeichen und enthält nur Buchstaben und Ziffern.',
    'MO_DHL__OPERATOR'                             => 'Zusteller',
    'HELP_MO_DHL__OPERATOR'                        => 'Tragen Sie hier den Zusteller der Lieferung an. Dieser wird für eine mögliche Retoure außerhalb der EU benötigt.',
    'MO_DHL__CUSTOMER_RETOURE_REQUEST_STATUS'      => 'Status der Kundenretourenlabelanforderung',
    'MO_DHL__REQUESTED'                            => 'Angefordert',
    'MO_DHL__CREATED'                              => 'Erstellt',
    'MO_DHL__DECLINED'                             => 'Abgelehnt',
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
    'MO_DHL__CHECK_FOR_SANDBOX_NOT_POSSIBLE'       => 'Die Überprüfung Ihrer Zugangsdaten ist bei aktiviertem Testing-Webservice nicht möglich.',
    'MO_DHL__LOGIN_FAILED'                         => 'Zugangsdaten inkorrekt. Login fehlgeschlagen.',
    'MO_DHL__LABELS'                               => 'Labels',
    'MO_DHL__LABEL'                                => 'Versandlabel',
    'MO_DHL__EXPORT_LABEL'                         => 'Ausfuhrlabel',
    'MO_DHL__RETOURE_LABEL'                        => 'Retourenlabel',
    'MO_DHL__RETOURE_QR_LABEL'                     => 'Retoure QR Code',
    'MO_DHL__INSTALL_FOLDER_ERROR'                 => 'Ordner %s konnte nicht erstellt werden. Bitte erstellen Sie den Ordner manuell.',
    'MO_DHL__CREATE_LABEL'                         => 'Neues Versandlabel erstellen',
    'MO_DHL__CREATE_LABELS'                        => 'Neue Labels erstellen',
    'MO_DHL__CREATE_RETOURE_LABELS'                => 'Neue Retourenlabels erstellen',
    'MO_DHL__DELETE_SHIPMENT'                      => 'Versandlabel stornieren',

    'MO_DHL__CUSTOM_LABEL_CREATE'             => 'Individuelles Versandlabel erstellen',
    'MO_DHL__CUSTOM_LABEL_BACK'               => 'Zurück',
    'MO_DHL__CUSTOM_LABEL_GENERAL'            => 'Allgemein',
    'MO_DHL__CUSTOM_LABEL_WEIGHT'             => 'Gewicht (in kg)',
    'MO_DHL__CUSTOM_LABEL_PROCESS'            => 'Verfahrensnummer',
    'MO_DHL__CUSTOM_LABEL_RECEIVER'           => 'Empfänger',
    'MO_DHL__CUSTOM_LABEL_RETURN_RECEIVER'    => 'Retoure - Empfängerdaten',
    'MO_DHL__CUSTOM_LABEL_NAME'               => 'Name',
    'MO_DHL__CUSTOM_LABEL_COMPANY'            => 'Firma',
    'MO_DHL__CUSTOM_LABEL_ADRESS_ADDITION'    => 'Adresszusatz',
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

    'MO_DHL__WARENPOST_PRODUCT_REGION'        => 'Kundenregion',
    'MO_DHL__WARENPOST_PRODUCT_TRACKING_TYPE' => 'Trackingtyp',
    'MO_DHL__WARENPOST_PRODUCT_PACKAGE_TYPE'  => 'Pakettyp',

    'MO_DHL__COUNTRY_DHL'              => 'DHL',
    'MO_DHL__RETOURE_RECEIVER_ID'      => 'Retourenempfängername (receiverID)',
    'HELP_MO_DHL__RETOURE_RECEIVER_ID' => 'Die jeweiligen Retourenempfängernamen (receiverID), finden Sie aufgelistet im DHL Geschäftskundenportal (https://www.dhl-geschaeftskundenportal.de) unter dem Menüpunkt "Retoure" > "Einstellungen" unter dem Eintrag "Receiver ID".',
    'MO_DHL__CREATE_RETOURE'           => 'Retourenlabel erstellen',
    'MO_DHL__NO_RECEIVER_ID'           => 'Für das Absenderland %s ist keine Retoure Receiver Id hinterlegt. Bitte tun Sie das unter Stammdaten > Länder > DHL.',

    'MO_DHL__ARTICLES_DHL'              => 'DHL',
    'MO_DHL__CATEGORIES_DHL'            => 'DHL',
    'MO_DHL__VISUAL_AGE_CHECK'          => 'Alterssichtprüfung',
    'MO_DHL__VISUAL_AGE_CHECK16'        => 'Alterssichtprüfung ab 16',
    'MO_DHL__VISUAL_AGE_CHECK18'        => 'Alterssichtprüfung ab 18',
    'MO_DHL__BULKY_GOOD'                => 'Sperrgut',
    'MO_DHL__IDENT_CHECK'               => 'Ident-Check',
    'MO_DHL__FOR_IDENT_CHECK'           => 'für Ident-Check',
    'MO_DHL__CASH_ON_DELIVERY'          => 'Nachnahme',
    'MO_DHL__ADDITIONAL_INSURANCE'      => 'Transportversicherung',
    'HELP_MO_DHL__ADDITIONAL_INSURANCE' => 'Grundsätzlich haftet DHL für Ihr Paket beim deutschlandweiten Versand gegen Verlust oder Beschädigung bis 500 EUR (nur gegen Vorlage des quittierten Einlieferungsbeleges). Für besonders wertvolle Sendungen bietet DHL Ihnen darüber hinaus eine Transportversicherung bis 2.500 EUR (+6,00 EUR Aufpreis) oder 25.000 EUR  (+18,00 EUR Aufpreis) an. Weiter Informationen finden Sie <a href="https://www.dhl.de/de/geschaeftskunden/paket/leistungen-und-services/services/service-loesungen.html#versicherung" target="_blank" rel="noopener noreferrer">hier</a>',
    'MO_DHL__PREMIUM'                   => 'Service Premium',
    'HELP_MO_DHL__PREMIUM'              => 'Das DHL Paket International und Warenpost International mit Service Premium wird bevorzugt und immer auf dem schnellsten Weg transportiert. Ihr Paket nimmt immer den nächstmöglichen Flug oder LKW in Richtung Zieldestination und wird auch im Zielland prioritär behandelt. So erreicht es deutlich schneller seinen Bestimmungsort.',
    'MO_DHL__ZOLLTARIF'                 => 'Zolltarifnummer',
    'HELP_MO_DHL__ZOLLTARIF'            => 'Optionaler Parameter bei der Erzeugung von Exportdokumenten für DHL Paket International. International standardisiertes System von Namen und Nummern zur Klassifizierung gehandelter Produkte.',

    'MO_DHL__ENDORSEMENT'                              => 'Vorausverfügung bei Unzustellbarkeit',
    'HELP_MO_DHL__ENDORSEMENT'                         => 'Dieser Service gibt an, was mit einem Paket passieren soll, wenn es nicht zugestellt werden kann. Dieser Service ist nur für Paket International relevant.',
    'MO_DHL__ENDORSEMENT_IMMEDIATE'                    => 'Rücksendung an den Absender',
    'MO_DHL__ENDORSEMENT_ABANDONMENT'                  => 'Preisgabe des Pakets (Verzicht auf die Rücksendung)',
    'MO_DHL__LABEL_CREATED_WITH_WEAK_VALIDATION_ERROR' => 'Bei der Anfrage ist ein schwacher Fehler aufgetreten. Die Anfrage konnte trotzdem erfolgreich umgesetzt werden.',

    'MO_DHL__WALLAT_BALANCE_CHECK'    => 'Die Zugangsdaten für die Portokasse sind korrekt. Ihr Guthaben beträgt %.2f €',

    'MO_DHL'                                         => 'DHL',
    'MO_DHL__INTERNETMARKE'                          => 'Internetmarke',
    'MO_DHL__INTERNETMARKE_PRODUCT'                  => 'Produkte',
    'MO_DHL__INTERNETMARKE_REFUND'                   => 'Rückerstattung',
    'MO_DHL__RETOURE_TRANSACTION_ID'                 => 'Transaction Id',
    'MO_DHL__RETOURE_STATUS'                         => 'Status',
    'MO_DHL__RETOURE_REQUESTED'                      => 'Rückerstattung beantragt',
    'MO_DHL__RETOURE_REFUNDED'                       => 'Bisher zurückerstattet',
    'MO_DHL__INTERNETMARKE_REFUND_REQUESTED_MESSAGE' => 'Die Rückerstattung wurde mit der Transaction ID %s erstellt. Den Status können Sie unter DHL > Internetmarke > Rückerstattung überprüfen.',
    'MO_DHL__INTERNETMARKE_REFUND_STATUS_FINISHED'   => 'fertiggestellt',
    'MO_DHL__INTERNETMARKE_REFUND_STATUS_REQUESTED'  => 'beantragt',
    'MO_DHL__INTERNETMARKE_REFUND_STATUS_IN_PROGRESS'=> 'in Arbeit',
    'MO_DHL__UPDATE_STATUS'                          => 'Status aktualisieren',
    'MO_DHL__INTERNETMARKE_DETAILS'                  => 'Details',
    'MO_DHL__PRODWSID'                               => 'ProdWS-Id',
    'MO_DHL__NAME'                                   => 'Name',
    'MO_DHL__DESCRIPTION'                            => 'Beschreibung',
    'MO_DHL__PRICE'                                  => 'Preis',
    'MO_DHL__UPDATE_PRODUCTLIST'                     => 'Produktliste aktualisieren',
    'MO_DHL__WEIGHT'                                 => 'Gewichtsbeschränkungen',
    'MO_DHL__DIMENSION'                              => 'Größenbeschränkungen',
    'MO_DHL__BASE_SERVICE'                           => 'Basisprodukt',
    'MO_DHL__ADDITIONAL_SERVICES'                    => 'Zusatzprodukte',

    'MO_DHL__ERROR_PRINT_FORMAT'       => 'Ein Fehler %s ist aufgetreten in Zeile %d in der Datei %s',
    'MO_DHL__ERROR_WHILE_EXECUTION'    => 'Bei der Ausführung ist folgender Fehler aufgetreten:',
    'MO_DHL__ERROR_PROCESS_IS_MISSING' => 'Der Versandart fehlt die Zuordnung zu einem DHL-Produkt anhand einer Verfahrensnummer.',
    'MO_DHL__ERROR_ WEIGHT_WITH_COMMA' => 'Bei der Gewichtsangabe wurde statt eines Punkts ein Komma verwendet. Dies wurde automatisch korrigiert.',
];
