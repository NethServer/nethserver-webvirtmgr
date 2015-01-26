<?php
/*
 * Copyright (C) 2013 Nethesis S.r.l.
 * http://www.nethesis.it - support@nethesis.it
 *
 * This script is part of NethServer.
 *
 * NethServer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License,
 * or any later version.
 *
 * NethServer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with NethServer.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace NethServer\Module;
use Nethgui\System\PlatformInterface as Validate;

class WebVirtMgr extends \Nethgui\Controller\AbstractController
{

    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Configuration', 80);
    }

    // Declare all parameters
    public function initialize()
    {
        parent::initialize();

        $this->declareParameter('WebvirtStatus', Validate::SERVICESTATUS, array('configuration', 'webvirtmgr', 'status'));
        $this->declareParameter('NovncStatus', Validate::SERVICESTATUS, array('configuration', 'webvirtmgr-console', 'status'));
        $this->declareParameter('Password', Validate::NOTEMPTY, array('configuration', 'webvirtmgr', 'Password'));
        $this->declareParameter('User', Validate::NOTEMPTY, array('configuration', 'webvirtmgr', 'User'));
    }



    // Execute actions when saving parameters
    protected function onParametersSaved($changes)
    {
        // Signal nethserver-nut-save event after saving props to db
        $this->getPlatform()->signalEvent('nethserver-webvirtmgr-save');
    }

}
