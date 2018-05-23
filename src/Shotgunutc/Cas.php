<?php
 /*
 * ----------------------------------------------------------------------------
 * "LICENCE BEERWARE" (Révision 42):
 * <matthieu@guffroy.com> a créé ce fichier. Tant que vous conservez cet avertissement,
 * vous pouvez faire ce que vous voulez de ce truc. Si on se rencontre un jour et
 * que vous pensez que ce truc vaut le coup, vous pouvez me payer une bière en
 * retour. Matthieu Guffroy
 * ----------------------------------------------------------------------------
 */

namespace Shotgunutc;
use \SimpleXMLElement;
use \Httpful\Request;

class Cas {
    protected $url;
    protected $timeout;
    
    public function __construct($url, $timeout=10) {
        $this->url = $url;
        $this->timeout = $timeout;
    }
    
    public function authenticate($ticket, $service) {
        $r = Request::get($this->getValidateUrl($ticket, $service))
          ->sendsXml()
          ->timeoutIn($this->timeout)
          ->send();
        $user = trim(str_replace("\n", "", $r->raw_body));
        /*
        try {
            $xml = new SimpleXMLElement($r->body);
        }
        catch (\Exception $e) {
            throw new \UnexpectedValueException("Return cannot be parsed : '{$r->body}'");
        }
        
        $namespaces = $xml->getNamespaces();
        
        $serviceResponse = $xml->children($namespaces['cas']);
        $user = $serviceResponse->authenticationSuccess->user;
        //*/
        if ($user) {
            return (string)$user; // cast simplexmlelement to string
        } else { /*
            $authFailed = $serviceResponse->authenticationFailure;
            if ($authFailed) {
                $attributes = $authFailed->attributes();
                throw new \Exception((string)$attributes['code']);
            } else { //*/
                throw new \Exception($user." service:".$service);
            // }
        }
        // never reach there
    }
    
    public function getValidateUrl($ticket, $service)
    {
        return $this->url."serviceValidate?ticket=".urlencode($ticket)."&service=".urlencode($service);
    }
}
