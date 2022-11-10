<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MB\Core;

/**
 * Description of MSController
 *
 * @author weslley
 */
class MBController extends MBHttp{    
    public function __construct(array $config = []) {        
        parent::__construct($config);
    }
}
