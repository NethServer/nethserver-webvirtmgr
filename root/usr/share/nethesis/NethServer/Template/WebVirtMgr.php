<?php
// set title
echo $view->header()->setAttribute('template', $T('WebVirtMgr_Title'));

// add simple panel
echo $view->panel()
    ->insert($view->fieldset('WebvirtStatus')->setAttribute('template', $T('Webvirt_label'))
            ->insert($view->radioButton('WebvirtStatus', 'enabled')->setAttribute('label', $T('WebvirtStatus_enabled_label')))
            ->insert($view->radioButton('WebvirtStatus', 'disabled')->setAttribute('label', $T('WebvirtStatus_disabled_label')))
    )
    ->insert($view->fieldset('NovncStatus')->setAttribute('template', $T('Novnc_label'))
            ->insert($view->radioButton('NovncStatus', 'enabled')->setAttribute('label', $T('NovncStatus_enabled_label')))
            ->insert($view->radioButton('NovncStatus', 'disabled')->setAttribute('label', $T('NovncStatus_disabled_label')))
    )
    ->insert($view->fieldset()->setAttribute('template',$T('Auth_label'))
            ->insert($view->textInput('User', $view::STATE_READONLY )->setAttribute('label', $T('User_label')))
            ->insert($view->textInput('Password')->setAttribute('label', $T('Password_label')))
    )
;

// show submit and help buttons
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
