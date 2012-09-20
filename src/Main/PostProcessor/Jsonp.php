<?php
namespace Main\PostProcessor;

/**
 *
 */
class Jsonp extends Json
{
	public function process()
	{
        parent::process();
        $result = $this->getResponse()->getContent();

        $callback = $this->getRequest()->getQuery("callback");
        $result = sprintf("%s(%s)", $callback, $result);
        $this->getResponse()->setContent($result);
	}
}
