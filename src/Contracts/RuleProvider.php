<?php

namespace HoaThis\LaravelHoaRuler\Contracts;

interface RuleProvider
{
	/**
	 * Load the rule as string
	 * 
	 * @param string $ruleSpace
	 * @param string $ruleName
	 * 
	 * @return string|null
	 */
	public function loadRule($ruleSpace, $ruleName);
	
	/**
	 * Load the rule as model
	 * 
	 * @param string $ruleSpace
	 * @param string $ruleName
	 * 
	 * @return \Hoa\Ruler\Model\Model|null
	 */
	public function loadRuleModel($ruleSpace, $ruleName);
}
