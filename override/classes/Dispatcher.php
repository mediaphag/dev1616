<?php

class Dispatcher extends DispatcherCore
{
    /*
    * module: yamodule
    * date: 2018-05-16 09:18:59
    * version: 1.4.7
    */
    protected function setRequestUri()
    {
        parent::setRequestUri();
        if (Module::isInstalled('yamodule') && strpos($this->request_uri, 'module/yamodule/')) {
            $this->request_uri = iconv('windows-1251', 'UTF-8', $this->request_uri);
        }
    }
}
