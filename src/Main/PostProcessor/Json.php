<?php

namespace Main\PostProcessor;

/**
 *
 */
class Json extends AbstractPostProcessor
{
	public function process()
	{
        $result = json_encode($this->_vars);
		$this->getResponse()->setContent($result);
		$headers = $this->getResponse()->getHeaders();
		$headers->addHeaderLine('Content-Type', 'application/json');
		$this->getResponse()->setHeaders($headers);
	}
}
