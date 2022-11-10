<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MB;

use MB\Core\MBController;

/**
 * Description of Pedido
 *
 * @author weslley
 */
class Envio extends MBController{
    
    public function gerar(array $data){
        try{
            $response = $this->http->post('solicitar', array(
                "form_params" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw MBException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw MBException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw MBException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MBException($ex);
        
        }
        
    }    
}
