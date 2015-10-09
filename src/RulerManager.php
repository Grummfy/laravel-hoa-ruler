<?php

namespace HoaThis\LaravelHoaRuler\Manager;

use \Hoa\Ruler\Ruler as HoaRuler;
use \Hoa\Ruler\Context as HoaContext;
use \Illuminate\Contracts\Cache\Factory as CacheFactory;
use \HoaThis\LaravelHoaRuler\Contracts\RuleProvider;

class RulerManager
{
	protected $_cache;
	protected $_ruleProvider;
	
	public function __construct(CacheFactory $cacheFactory, RuleProvider $ruleProvider, array $config)
	{
		$this->_cache = $cacheFactory->store($config['cache']);
		$this->_ruleProvider = $ruleProvider;
	}
	
	/**
	 * @return HoaRuler
	 */
	public function getNewRuler()
	{
		return new HoaRuler();
	}

	/**
	 * @return HoaContext
	 */
	public function getNewContext()
	{
		return new HoaContext();
	}

	/**
	 * @param HoaRuler   $ruler
	 * @param HoaContext $context
	 * @param string $ruleSpace
	 * @param string $ruleName
	 *
	 * @return bool
	 */
	public function isRespectingTheRule(HoaRuler $ruler, HoaContext $context, $ruleSpace, $ruleName)
	{
		$model = $this->getRuleFromCache($ruleSpace, $ruleName);
		return $ruler->assert($model, $context);
	}

	/**
	 * @param string $ruleSpace
	 * @param string $ruleName
	 *
	 * @return \Hoa\Ruler\Model\Model
	 */
	public function getRuleFromCache($ruleSpace, $ruleName)
	{
		// 7200 minutes = 5 days
		return $this->_cache->remember('ruler' . '_' . $ruleSpace . '-' . $ruleName, '7200', function() use ($ruleSpace, $ruleName)
		{
			return $this->_ruleProvider->loadRuleModel($ruleSpace, $ruleName);
		});
	}
}
