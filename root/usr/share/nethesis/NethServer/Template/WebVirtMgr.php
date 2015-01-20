<?php
// set title
echo $view->header()->setAttribute('template', $T('WebVirtMgr_Title'));

// add simple panel
echo $view->panel()
    ->insert($view->fieldset('WebvirtStatus')->setAttribute('template', $T('Webvirt_label'))
            ->insert($view->radioButton('WebvirtStatus', 'enabled'))
            ->insert($view->radioButton('WebvirtStatus', 'disabled'))
    )
    ->insert($view->fieldset('NovncStatus')->setAttribute('template', $T('Novnc_label'))
            ->insert($view->radioButton('NovncStatus', 'enabled'))
            ->insert($view->radioButton('NovncStatus', 'disabled'))
    )
    ->insert($view->fieldset()->setAttribute('template',$T('Auth_label'))
            ->insert($view->textInput('User', $view::STATE_READONLY ))
            ->insert($view->textInput('Password'))
    )
;

// show submit and help buttons
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
