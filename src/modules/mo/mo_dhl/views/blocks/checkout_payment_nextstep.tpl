[{$smarty.block.parent}]
[{if $oView->moDHLShowCheckboxForNotificationAllowance()}]
    <input type="hidden" id="moDHLAllowNotificationHidden" name="dynvalue[mo_dhl_allow_notification]">
[{/if}]
[{if $oView->moDHLShowIdentCheckFields()}]
    <input type="hidden" id="moDHLIdentCheckBirthdayHidden" name="dynvalue[mo_dhl_ident_check_birthday]" value="[{$oView->moDHLGetBirthday()}]">
[{/if}]
