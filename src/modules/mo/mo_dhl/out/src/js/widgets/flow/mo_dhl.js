(function ($) {
    // noinspection JSUnusedGlobalSymbols
    mo_dhl = {
        dhl: null,
        isWunschboxAvailable: null,
        initialResults: {
            branch: {},
            packstation: {}
        },
        addPostnummer: function () {
            var $addInfoField = $("[name='deladr[oxaddress__oxaddinfo]']");
            $addInfoField.after($('<div></div>').addClass('help-block'));
            var addressInformation = $addInfoField.closest('div.form-group');
            var defaultLabel = addressInformation
                .find('label').first()
                .attr('id', 'oxaddinfoDefault');
            var postnummerLabel = defaultLabel.clone()
                .attr('id', 'oxaddinfoService')
                .removeClass('col-lg-3')
                .addClass('pull-right moDHLLabel ttip')
                .text('PostNummer: ' + "\u00A0\u00A0\u00A0\u00A0");
            $("<button type='button' data-toggle='modal' data-target='#moDHLInfo'></button>")
                .attr('id', 'oxaddinfoButton')
                .addClass('col-lg-3')
                .append(postnummerLabel)
                .insertAfter(defaultLabel);
        },
        showPostnummer: function (empty) {
            var postnummerInput = $("[name='deladr[oxaddress__oxaddinfo]']");
            postnummerInput
                .attr('pattern', '[0-9][0-9][0-9][0-9][0-9][0-9]+')
                .attr('data-validation-pattern-message', $("span#moPostnummerErrorMessage").text())
                .removeAttr('aria-invalid')
                .parent()
                .siblings("button").show()
                .siblings("label").hide();
            if (empty) {
                postnummerInput.val("");
            }
        },
        hidePostnummer: function (empty) {
            var postnummer = $("[name='deladr[oxaddress__oxaddinfo]']");
            postnummer
                .jqBootstrapValidation("destroy")
                .removeData()
                .removeClass("js-oxValidate js-oxValidate_notEmpty")
                .removeAttr('pattern')
                .removeAttr('data-validation-pattern-message')
                .removeAttr('required')
                .jqBootstrapValidation()
                .parent().removeClass("oxInValid")
                .siblings("button").hide()
                .siblings("label").show();
            if (empty) {
                postnummer.val("")
            }
        },
        requirePostnummer: function () {
            var postnummer = $("[name='deladr[oxaddress__oxaddinfo]']");
            postnummer
                .jqBootstrapValidation("destroy")
                .removeData()
                .addClass("js-oxValidate js-oxValidate_notEmpty")
                .attr('required', 'required')
                .jqBootstrapValidation()
                .parent().siblings("button").find("label").addClass("req");
        },
        doNotRequirePostnummer: function () {
            var postnummer = $("[name='deladr[oxaddress__oxaddinfo]']");
            postnummer
                .jqBootstrapValidation("destroy")
                .removeData()
                .removeClass('js-oxValidate js-oxValidate_notEmpty')
                .removeAttr('required')
                .jqBootstrapValidation()
                .parent().siblings("button").find("label").removeClass("req");
        },
        addServiceProviderNumber: function () {
            $("[name='deladr[oxaddress__oxstreet]']")
                .parent()
                .before($("<label class='control-label col-xs-12 col-lg-3 moDHLLabel req'></label>"));
        },
        showServiceProviderNumber: function (type, label, empty) {
            $("[name='deladr[oxaddress__oxstreet]']")
                .val(type)
                .parent().hide()
                .siblings("label:not(.moDHLLabel)").hide()
                .siblings("label.moDHLLabel").text(label).show();
            if (empty) {
                $("[name='deladr[oxaddress__oxstreetnr]']").val("");
            }
        },
        hideServiceProviderNumber: function (empty) {
            var street = $("[name='deladr[oxaddress__oxstreet]']");
            street
                .parent().show()
                .siblings("label:not(.moDHLLabel)").show()
                .siblings("label.moDHLLabel").text("").hide();
            if (empty) {
                street.val("");
                $("[name='deladr[oxaddress__oxstreetnr]']").val("");
            }
        },
        showAdditionalInformation: function () {
            ['oxcompany', 'oxfon', 'oxfax'].map(function (key) {
                var element = $("[name='deladr[oxaddress__" + key + "]']");
                element.parents('.form-group').show();
            });
        },
        hideAdditionalInformation: function () {
            ['oxcompany', 'oxfon', 'oxfax'].map(function (key) {
                var element = $("[name='deladr[oxaddress__" + key + "]']");
                if (!element.hasClass("js-oxValidate")) {
                    element.val("").parents(".form-group").hide();
                }
            });
        },
        addFixedCountry: function () {
            // Nothing to do.
        },
        fixCountryToGermany: function () {
            var germany = $("#germany-oxid").text();
            var $hiddenInput = $('<input type="hidden" class="mo-hidden-deladr-country" name="deladr[oxaddress__oxcountryid]">');
            $hiddenInput.val(germany);
            $("[name='deladr[oxaddress__oxcountryid]']")
                .val(germany)
                .attr('disabled', 'disabled')
                .selectpicker('refresh')
                .parent()
                .append($hiddenInput)
            ;
        },
        loosenFixedCountry: function () {
            $("[name='deladr[oxaddress__oxcountryid]']").removeAttr("disabled").selectpicker('refresh');
            $(".mo-hidden-deladr-country").remove();
        },
        addAddressChangeListener: function () {
            var self = this;
            $("#addressId").change(function () {
                switch ($(this).children(":selected").prop("id")) {
                    case "selectPackstation":
                        self.dhl.toPackstation();
                        break;
                    case "selectFiliale":
                        self.dhl.toPostfiliale();
                        break;
                    case "selectPaketshop":
                        self.dhl.toPaketshop();
                        break;
                    default:
                        self.dhl.toRegularAddress();
                        break;
                }
                if (self.isWunschboxAvailable) {
                    mo_dhl__wunschpaket.showOrHideWunschbox();
                }
            });
        },
        addNewAddressTypeSelectionListener: function () {
            $('#addressTypeSelectToMove').find('[name=oxaddressid]').parent().click(function () {
                window.setTimeout(function (timeOutId) {
                    $("#addressId").change();
                    window.clearTimeout(timeOutId);
                }, 500);
            });
        },
        differentShippingAddressHandler: function () {
            var self = this;
            document.querySelectorAll('.moDhlAddressChangeButton').forEach((element) => {
                element.classList.remove('btn-primary', 'btn-default');
            });
            var checkedInput = $('[name="moDhlAddressChange"]:checked');
            if (checkedInput.length === 0) {
                return
            }
            var active = checkedInput.next()[0];
            active.classList.add('btn-primary');
            $('[name="moDhlAddressChange"]:not(:checked)').each(function () {
                this.nextElementSibling.classList.add('btn-default');
            });
            $('#showShipAddress').prop('checked', (checkedInput.val() === "1")).change();
            switch (active.id) {
                case 'moDhlDifferentAddressBtn':
                    $('#addressId').val("-1").change();
                    break;
                case 'moDhlBranchAddress':
                    self.apply(self.initialResults.branch);
                    break;
                case 'moDhlPackstationAddress':
                    self.apply(self.initialResults.packstation);
                    break;
                default:
                    break;
            }
        },
        addDhlAddressButtonListener: function() {
            var self = this;
            $('[name="moDhlAddressChange"]').change(function () {
                self.differentShippingAddressHandler();
            });
        },
        addShippingAddressListener: function () {
            var self = this;
            $("#showShipAddress").change(function () {
                if ($("#showShipAddress").is(':checked')) {
                    mo_dhl.dhl.state = "regular";
                    mo_dhl.dhl.toRegularAddress();
                    if (self.isWunschboxAvailable) {
                        mo_dhl__wunschpaket.showOrHideWunschbox();
                    }
                } else {
                    $(".dd-add-delivery-address").find('label.btn').click();
                    $('[name="deladr[oxaddress__oxsal]"]').val($('[name="invadr[oxuser__oxsal]"]').val());
                    $('[name="deladr[oxaddress__oxfname]"]').val($('[name="invadr[oxuser__oxfname]"]').val());
                    $('[name="deladr[oxaddress__oxlname]"]').val($('[name="invadr[oxuser__oxlname]"]').val());
                    $("#addressId").change();
                }
            });
        },
        isShippedToSeparateAddress: function () {
            return $('#showShipAddress').is(':not(:checked)');
        },
        getCountryIdOfBillingAddress: function () {
            return $('#invCountrySelect').find(":selected").val();
        },
        getDestinationCountryId: function () {
            if (this.isShippedToSeparateAddress()) {
                return $("[name='deladr[oxaddress__oxcountryid]']").val();
            } else {
                return this.getCountryIdOfBillingAddress();
            }
        },
        initialSearch: function () {
            var self = this;
            this.dhlfinder.preEmptiveSearch().then(results => {
                if (results.status === "error") {
                    console.error(results.payload);
                    return;
                }
                var branch = results.payload.filter(payload => (payload.type === 'Paketshop' || payload === 'Filiale'));
                var station = results.payload.filter(payload => payload.type === 'Packstation');
                if (branch.length) {
                    var branchElement = document.getElementById('moDhlBranchAddress');
                    branchElement.classList.remove('hidden');
                    var text = branchElement.querySelector('.moDhlPickupDistance').innerText.replace('PLACEHOLDER', branch[0].location.distance);
                    branchElement.querySelector('.moDhlPickupDistance').innerText = text;
                    self.initialResults.branch = branch[0];
                }
                if (station.length) {
                    var stationElement = document.getElementById('moDhlPackstationAddress');
                    stationElement.classList.remove('hidden');
                    var text = stationElement.querySelector('.moDhlPickupDistance').innerText.replace('PLACEHOLDER', station[0].location.distance);
                    stationElement.querySelector('.moDhlPickupDistance').innerText = text;
                    self.initialResults.packstation = station[0];
                }
            });
        },
        setInitialState: function () {
            var self = this;
            if (self.isShippedToSeparateAddress()) {
                $('#moDhlDifferentAddressBtn').click();
            } else {
                $('#moDhlSameAddressBtn').click();
            }
            self.differentShippingAddressHandler();
            var availableAddresses = $(".dd-available-addresses");
            if (!availableAddresses.is(":visible")) {
                $("#showShipAddress").change();
                return;
            }

            var shippingAddressText = availableAddresses
                .find("input:checked").first()
                .parents(".panel-footer")
                .siblings()
                .text();

            if (shippingAddressText.includes("Postfiliale") || shippingAddressText.includes("Filiale")) {
                this.dhl.state = "postfiliale";
                this.dhl.toPostfiliale();
                $("select#addressId").find("option#selectFiliale").attr("selected", true);
                return;
            }
            if (shippingAddressText.includes("Paketshop")) {
                this.dhl.state = "paketshop";
                this.dhl.toPaketshop();
                $("select#addressId").find("option#selectFiliale").attr("selected", true);
                return;
            }
            if (shippingAddressText.includes("Packstation")) {
                this.dhl.state = "packstation";
                this.dhl.toPackstation();
                $("select#addressId").find("option#selectPackstation").attr("selected", true);
                return;
            }

            this.dhl.state = "regular";
            this.dhl.toRegularAddress();
        },
        rearrangeAddresses: function () {
            $("div.dd-available-addresses")
                .find("div.moDhlAddressCardAddress")
                .html(function () {
                    return mo_dhl__deliveryAddress.reformatAndStyleAddressString(this);
                });
            $('.dd-edit-shipping-address').click(function() {
                $('#shippingAddressForm').show();
                $('html, body').animate( {
                    scrollTop: $( '#shippingAddressForm' ).offset().top - 80
                }, 600 );
            });
        },
        handleInvoiceAddresses: function() {
            if (!this.isWunschboxAvailable) return;
            var $street = $('input[name="invadr[oxuser__oxstreet]"]');
            var $city = $('input[name="invadr[oxuser__oxcity]"]');
            var $translationHelper = $('#moDHLWunschpaket');
            var translationError = $translationHelper.data('translatefailedblacklist');

            [$street, $city].map(function (value) {
                value.data('validation-callback-callback', 'mo_dhl.validatePreferredAddress');
                value.data('validation-callback-message', translationError);
                value.jqBootstrapValidation();
            });
        },
        initialize: function (isWunschboxAvailable) {
            var self = this;
            self.isWunschboxAvailable = isWunschboxAvailable;
            self.dhl = new Empfaengerservices($, self);
            this.addPostnummer();
            this.addServiceProviderNumber();
            this.addFixedCountry();
            this.addAddressChangeListener();
            this.addNewAddressTypeSelectionListener();
            this.addShippingAddressListener();
            this.setInitialState();
            this.handleInvoiceAddresses();
            this.addDhlAddressButtonListener();

            this.rearrangeAddresses();
            this.integrateAddressDropdown();
            if ($("#addressId").length === 0) {
                self.dhl.toRegularAddress();
                return;
            }

            if (!self.isWunschboxAvailable) {
                return;
            }
            $('#delCountrySelect').on('change', function () {
                mo_dhl__wunschpaket.showOrHideWunschbox();
            });
            $('#invCountrySelect').on('change', function () {
                mo_dhl__wunschpaket.showOrHideWunschbox();
            });
            mo_dhl__wunschpaket.showOrHideWunschbox();


            $("#moDHLWunschnachbarName").focus(function () {
                $(this).parent().removeClass('has-error custom-error');
            });

            $("#moDHLWunschnachbarAddress").focus(function () {
                $(this).parent().removeClass('has-error custom-error');
            });

            $('.moDhlAddressCard label').click(function () {
                $(this.nextElementSibling).click();
            });

            $('.moDhlNewAddressSaveButton').click(function () {
                $("[name='deladr[oxaddress__oxfname]']").val($("[name='moDhlNewAddressFName']").val());
                $("[name='deladr[oxaddress__oxlname]']").val($("[name='moDhlNewAddressLName']").val());
                $("[name='deladr[oxaddress__oxaddinfo]']").val($("[name='moDhlNewAddressStreetAdditional']").val());
                $(this).parents('form').submit();
            });

            $('.moDhlAddressCardOption').click(function () {
                $('.moDhlAddressCardActions').show();
            });

            $('.moDhlAddressChangeName').click(function () {
                $('.moDhlAddressCardActions').hide();
                $('.moDhlAddressSpanName').hide();
                $('.moDhlAddressCardChangeName').show();
                $('.moDhlAddressChangeSpanSave').show();
                $("[name='deladr[oxaddress__oxstreet]']").val($('.moDhlAddressSpanStreet').data('streetname'));
                $("[name='deladr[oxaddress__oxstreetnr]']").val($('.moDhlAddressSpanStreet').data('streetnr'));
                $("[name='deladr[oxaddress__oxcity]']").val($('.moDhlAddressSpanZipCity').data('city'));
                $("[name='deladr[oxaddress__oxzip]']").val($('.moDhlAddressSpanZipCity').data('zip'));
            });

            $('.moDhlAddressChangeSpanSave').click(function () {
                $("[name='deladr[oxaddress__oxfname]']").val($("[name='moDhlAddressChangeFName']").val());
                $("[name='deladr[oxaddress__oxlname]']").val($("[name='moDhlAddressChangeLName']").val());
                $(this).parents('form').submit();
            });

            $("form").submit(function (event) {
                var wunschName = $("#moDHLWunschnachbarName");
                var wunschAddress = $("#moDHLWunschnachbarAddress");
                var wunschortCheckbox = $('#moDHLWunschortCheckbox');
                var wunschnachbarCheckbox = $('#moDHLWunschnachbarCheckbox');
                var wunschort = $('#moDHLWunschort');

                /*
                set null objects if elements did not exist
                 */
                var $nullObject = $("<div></div>");
                wunschName = wunschName.length ? wunschName : $nullObject;
                wunschAddress = wunschAddress.length ? wunschAddress : $nullObject;
                wunschortCheckbox = wunschortCheckbox.length ? wunschortCheckbox : $nullObject;
                wunschnachbarCheckbox = wunschnachbarCheckbox.length ? wunschnachbarCheckbox : $nullObject;
                wunschort = wunschort.length ? wunschort : $nullObject;

                wunschAddress.parent().removeClass('has-error custom-error');
                wunschName.parent().removeClass('has-error custom-error');
                if (wunschName.val().length > 0 && wunschAddress.val().length === 0) {
                    event.preventDefault();
                    wunschAddress.parent().addClass('has-error custom-error');
                }

                if (wunschAddress.val().length > 0 && wunschName.val().length === 0) {
                    event.preventDefault();
                    wunschName.parent().addClass('has-error custom-error');
                }

                if (wunschortCheckbox.prop('checked') && wunschort.val().length === 0) {
                    event.preventDefault();
                    wunschort.parent().addClass('has-error custom-error');
                }

                if (wunschnachbarCheckbox.prop('checked')) {
                    if (wunschName.val().length === 0) {
                        event.preventDefault();
                        wunschName.parent().addClass('has-error custom-error');
                    }
                    if (wunschAddress.val().length === 0) {
                        event.preventDefault();
                        wunschAddress.parent().addClass('has-error custom-error');
                    }
                }
            });

        },
        initializeFinder: function () {
            this.dhlfinder = new DHLFinder($, this);
            mo_dhl__finder.initialize(this);
            this.initialSearch();
        },
        validatePreferredAddress: function ($input, value, callback) {
            var validator = new DHLValidator();
            callback({
                value: value,
                valid: validator.validateAgainstBlacklist(value),
                message: $input.next().text()
            });
        },
        integrateAddressDropdown: function () {
            var availableAddresses = $('.dd-available-addresses');
            if (!availableAddresses.length) {
                // noinspection JSCheckFunctionSignatures
                $('#addressTypeSelectToMove')
                    .insertBefore($('#shippingAddressForm'))
                    .removeClass('col-md-4')
                    .addClass('col-md-3 col-lg-offset-3')
                    .after($("<div class='clearfix'></div>"));
            } else {
                $('#addressTypeSelectToMove').insertAfter(availableAddresses.find('.col-xs-12').last());
            }
        },
        getProviderId: function (provider) {
            return provider.number;
        },
        apply: function (provider) {
            var self = this;
            $('#select' + this.dhl.fromProviderTypeToLabel(provider.type)).prop('selected', true);
            $("#addressId").change();

            var providerIdentifier = this.dhl.fromProviderTypeToIdentifier(provider.type);
            $('#deladr_oxaddress__oxsal').val('').selectpicker('refresh');
            var $newAddressCard = $('.moDhlNewAddressCard')
            $newAddressCard.find('.moDhlAddressCard').addClass('active').removeClass('moDhlShipping');
            if (provider.type === 'regular') {
                self.dhl.toRegularAddress();
                $("[name='deladr[oxaddress__oxstreet]']").val(provider.addressParts.street);
                $("[name='deladr[oxaddress__oxstreetnr]']").val(provider.addressParts.streetNr);
                $("[name='deladr[oxaddress__oxzip]']").val(provider.addressParts.postalCode);
                $("[name='deladr[oxaddress__oxcity]']").val(provider.addressParts.city);
                $('.moDhlAddressSpanStreetAdditional').find('input').prop('placeholder', 'Adresszusatz');
            } else {
                $newAddressCard.find('.moDhlAddressCard').addClass('moDhlShipping');
                $("[name='deladr[oxaddress__oxstreet]']").val(providerIdentifier).parent().removeClass('oxInValid');
                $("[name='deladr[oxaddress__oxstreetnr]']").val(this.getProviderId(provider));
                $("[name='deladr[oxaddress__oxzip]']").val(provider.address.zip).parent().removeClass('oxInValid');
                $("[name='deladr[oxaddress__oxcity]']").val(provider.address.city);
                self.fixCountryToGermany();
                $('.moDhlAddressSpanStreetAdditional').find('input').prop('placeholder', 'Postnummer');
            }
            $('.moDhlAddressCard.active').removeClass('active');

            $newAddressCard.find('.moDhlAddressCard').addClass('active');
            $newAddressCard.find('.moDhlAddressSpanStreet').text($("[name='deladr[oxaddress__oxstreet]']").val() + ' ' + $("[name='deladr[oxaddress__oxstreetnr]']").val());
            $newAddressCard.find('.moDhlAddressSpanZipCity').text($("[name='deladr[oxaddress__oxzip]']").val() + ' ' + $("[name='deladr[oxaddress__oxcity]']").val());
            $newAddressCard.show();
        },
        setDeliveryCountryToBillingCountry: function () {
            if ($('#delCountrySelect').val()) {
                return;
            }
            var invCountry = $("#invCountrySelect").val();
            $('#delCountrySelect').val(invCountry).selectpicker('refresh');
        }
    };
})(jQuery);
