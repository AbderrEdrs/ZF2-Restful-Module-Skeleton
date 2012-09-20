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

        $callback = $this->getRequest()->getQuery("callback", false);
        if (!$callback || trim($callback) == '') {
            throw new \Zend\Http\Exception\InvalidArgumentException("Missing \"callback\" parameter.");
        }
        $result = sprintf("%s(%s)", $callback, $result);
        $this->getResponse()->setContent($result);
	}
}
