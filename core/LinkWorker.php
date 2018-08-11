<?php

namespace ShortLink;

class LinkWorker{
	
    public $core;
    
	public $md5generator;
    public $randgenerator;
    
    function __construct(Core $core) {
		$this->core = $core;
	}
    
    public function generateRun($link){
        $md5generator = new LinkGenerators\LinkGenerateMD5();
        $md5 = $md5generator->generateLink($link);
        
        $c = $this->core->xpdo->newQuery('ShortLink\Model\ShortLinkDB');
        $c->where(array('md5link' => $md5));
        if ($link_to = $this->core->xpdo->getObject('ShortLink\Model\ShortLinkDB', $c)) {
            $radlink = $link_to->get('randlink');
        }
        else {
            $randgenerator =  new LinkGenerators\LinkGenerateRand();
            
            do {
                $radlink = $randgenerator->generateLink($link);
                $q = $this->core->xpdo->newQuery('ShortLink\Model\ShortLinkDB');
                $q->where(array('randlink' => $radlink));
            }
            while ($this->core->xpdo->getObject('ShortLink\Model\ShortLinkDB', $q));
                
            $newlink = $this->core->xpdo->newObject('ShortLink\Model\ShortLinkDB');
            $newlink->fromArray(array(
                'link' => $link,
                'md5link' => $md5,
                'randlink' => $radlink
            ));
            
		$newlink->save();
        }
        
        return array(
            'md5link' => $md5,
            'randlink' => PROJECT_SITE_URL.$radlink
        );
    }
    
    public function getLink($link){     
        
        $c = $this->core->xpdo->newQuery('ShortLink\Model\ShortLinkDB');
        $c->where(array('randlink' => $link));
        
        $q = $this->core->xpdo->newQuery('ShortLink\Model\ShortLinkDB');
        $q->where(array('md5link' => $link));
        
        if ($link_rand = $this->core->xpdo->getObject('ShortLink\Model\ShortLinkDB', $c)){
            return $link_rand->get('link');
            
        } 
        if($link_md5 = $this->core->xpdo->getObject('ShortLink\Model\ShortLinkDB', $q)) {
            return $link_md5->get('link');
        }
        
        return null;   
    }
}
