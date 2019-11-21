<div style="display: none;">

    <p>
        <button id="moDHLButton" type="button" class="btn btn-info" data-toggle="modal"
                data-target="#moDHLFinder">
            [{if $oViewConf->moCanPackstationBeSelected()}]
                [{if $oViewConf->moCanFilialeBeSelected()}]
                    [{oxmultilang ident="MO_DHL__OPEN_MODAL_SERVICE_PROVIDER"}]
                [{else}]
                    [{oxmultilang ident="MO_DHL__OPEN_MODAL_PACKSTATION"}]
                [{/if}]
            [{else}]
                [{oxmultilang ident="MO_DHL__OPEN_MODAL_FILIALE"}]
            [{/if}]
        </button>
    </p>

    <img class="mo-thumbnail" id="thumbnail-packstation"
         src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-packstation.png")}]"/>
    <img class="mo-thumbnail" id="thumbnail-postfiliale"
         src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-postfiliale.png")}]"/>
    <img class="mo-thumbnail" id="thumbnail-paketshop"
         src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-paketshop.png")}]"/>

    <span id="packstation-number-label">Packstationsnr.:</span>
    <span id="postfiliale-number-label">Filialnr.:</span>
    <span id="paketshop-number-label">Filialnr.:</span>

    <a id="moDHLFind"
       href="[{$oViewConf->getSslSelfLink()}]cl=MoDHLFinder"></a>

    <span id="moPostnummerErrorMessage">[{oxmultilang ident="MO_DHL__ERROR_POSTNUMMER_MALFORMED"}]</span>

    <div id="moDHLWindow">
        <h4></h4>
        <address></address>

        <div class="icons">
            <img class="icon packstation"
                 src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-packstation-red.png")}]"/>
            <img class="icon filiale"
                 src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-postfiliale-red.png")}]"/>
            <img class="icon paketshop"
                 src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-paketshop-red.png")}]"/>
            <img class="icon wheelchair"
                 src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-wheelchair.png")}]"/>
            <img class="icon parking"
                 src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-parking.png")}]"/>
        </div>

        <br/>

        <h5 class="moDHLOpeningHours"
            style="display: none;">[{oxmultilang ident="MO_DHL__OPENING_HOURS"}]</h5>
        <ul class="moDHLOpeningHours" style="display: none;">
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_1"}]: <span
                        class="opening-hours-day-1">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_2"}]: <span
                        class="opening-hours-day-2">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_3"}]: <span
                        class="opening-hours-day-3">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_4"}]: <span
                        class="opening-hours-day-4">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_5"}]: <span
                        class="opening-hours-day-5">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_6"}]: <span
                        class="opening-hours-day-6">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
            <li>[{oxmultilang ident="MO_DHL__OPENING_HOURS_7"}]: <span
                        class="opening-hours-day-7">[{oxmultilang ident="MO_DHL__OPENING_HOURS_CLOSED"}]</span>
            </li>
        </ul>

        <button class="btn btn-outline-dark submitButton btn-sm pull-left" id="provider_' + provider.id + '"
                data-dismiss="modal">[{oxmultilang ident="MO_DHL__SELECT"}]</button>

    </div>

    <p id="moDHLUnknownError">[{oxmultilang ident="MO_DHL__ERROR_FINDER_UNKNOWN"}]</p>
</div>

<div id="moDHLFinder" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" id="modalMap" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="moDHLFinderForm" class="col-12">
                    <div id="moDHLAddressInputs">
                        <input type="text" placeholder="[{oxmultilang ident="MO_DHL__STREET"}]"
                               id="moDHLStreet" name="street"/>
                        <input type="text" placeholder="[{oxmultilang ident="MO_DHL__POSTCODE"}] &amp; [{oxmultilang ident="MO_DHL__CITY"}]"
                               id="moDHLLocality" name="locality"/>
                    </div>
                    <div id="moDHLProviders">
                    [{if $oViewConf->moCanPackstationBeSelected()}]
                        [{if $oViewConf->moCanFilialeBeSelected()}]
                            <label for="moDHLPackstation">
                                <input type="checkbox" id="moDHLPackstation" name="packstation" checked/>
                                Packstation
                                <img class="icon packstation"
                                     src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-packstation.png")}]"/>
                            </label>
                        [{else}]
                            <input type="hidden" id="moDHLPackstation" name="packstation" value="on"/>
                        [{/if}]
                    [{/if}]
                    [{if $oViewConf->moCanFilialeBeSelected()}]
                        [{if $oViewConf->moCanPackstationBeSelected()}]
                            <label for="moDHLFiliale">
                                <input type="checkbox" id="moDHLFiliale" name="filiale" checked/>
                                Filiale
                                <img class="icon packstation postfiliale"
                                     src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-postfiliale.png")}]"/>
                                <img class="icon packstation paketshop"
                                     src="[{$oViewConf->getModuleUrl("mo_dhl", "out/src/img/icon-paketshop.png")}]"/>
                            </label>
                        [{else}]
                            <input type="hidden" id="moDHLFiliale" name="filiale" value="1"/>
                        [{/if}]
                    [{/if}]
                    <button class="btn btn-outline-dark submitButton">[{oxmultilang ident="MO_DHL__SEARCH"}]</button>
                    </div>
                </form>
            </div>

            <div class="modal-body">
                <div id="moDHLErrors" class="status error corners" style="display:none;"></div>
                <div id="moDHLMap"></div>
            </div>
        </div>
    </div>
</div>

<div id="moDHLInfo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>[{oxmultilang ident="MO_DHL__POSTNUMMER_INFO_TITLE"}]</h4>
            </div>

            <div class="modal-body text-center">
                <img class="info--figure"
                     src="[{$oViewConf->getModuleUrl('mo_dhl', 'out/src/img/dhl-postnumber-info.jpg')}]">
            </div>

            <div class="modal-footer">
                <div class="text-center"><p>[{oxmultilang ident="MO_DHL__POSTNUMMER_INFO_TEXT"}]</p>
                </div>
            </div>
        </div>
    </div>
</div>