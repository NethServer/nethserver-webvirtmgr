<?php
// set title
echo $view->header()->setAttribute('template', $T('WebVirtMgr_Title'));

// add simple panel
echo $view->panel()
    ->insert($view->fieldset('WebvirtStatus')->setAttribute('template', $T('Webvirt_label'))
            ->insert($view->radioButton('WebvirtStatus', 'enabled'))
            ->insert($view->radioButton('WebvirtStatus', 'disabled'))
    )
    ->insert($view->fieldset()->setAttribute('template',$T('Auth_label'))
            ->insert($view->textLabel('User'))
            ->insert($view->textLabel('Password'))
    )
;

// show submit and help buttons
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
