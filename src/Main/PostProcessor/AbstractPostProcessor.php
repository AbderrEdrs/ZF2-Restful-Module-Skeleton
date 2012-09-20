<?php

namespace Main\PostProcessor;

/**
 *
 */
abstract class AbstractPostProcessor
{
	/**
	 * @var array|null
	 */
	protected $_vars = null;

    /**
     * @var null|\Zend\Http\Request
     */
    private $_request = null;

	/**
	 * @var null|\Zend\Http\Response
	 */
	private $_response = null;

	/**
	 * @param $vars
	 * @param \Zend\Http\Response $response
	 */
    public function __construct(
        \Zend\Http\Request $request,
        \Zend\Http\Response $response,
        $vars = null)
	{
		$this->_vars = $vars;
		$this->_response = $response;
        $this->_request = $request;
	}

	/**
	 * @return null|\Zend\Http\Response
	 */
	public function getResponse()
	{
		return $this->_response;
	}

    public function getRequest()
    {
        return $this->_request;
    }

	/**
	 * @abstract
	 */
	abstract public function process();
}
