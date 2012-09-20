<?php

namespace Main\PostProcessor;

/**
 *
 */
class Image extends AbstractPostProcessor
{
	public function process()
	{
		$result = $this->_vars['image'];

		$this->getResponse()->setContent($result);

		$headers = $this->getResponse()->getHeaders();
		$headers->addHeaderLine('Content-Type', 'image/' . $this->_vars['type']);
		$headers->addHeaderLine('Cache-Control', 'max-age=86400');
		$this->getResponse()->setHeaders($headers);
	}
}
