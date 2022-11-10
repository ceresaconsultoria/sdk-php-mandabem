<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MB\Exceptions;

use Exception;

/**
 * Description of MSException
 *
 * @author weslley
 */
class MBException extends Exception{
    
    public function __construct(Exception $ex) {
        $message = $ex->getMessage() . PHP_EOL . $ex->getTraceAsString();        
        parent::__construct($message, $ex->getCode(), $ex->getPrevious());
    }
    
    public static function fromObjectMessage($message, $code, $previous = null){
        
        if(is_object($message)){
            
            $newMessageString = [];
            
            if(isset($message->general_errors))
                foreach($message->general_errors as $error){

                    $newMessageString[] =  $error->message;

                }                           
            
            if(isset($message->validation_errors))
                foreach($message->validation_errors as $error){

                    $newMessageString[] =  $error->message_complete;

                }                           
            
            return new MBException( new Exception(implode("\n", $newMessageString), $code, $previous) );     
        }
        
        if(is_string($message)){
            
            return new MBException( new Exception($message, $code, $previous) );     
            
        }
        
    }
    
}
