<?php

namespace HoaThis\LaravelHoaRuler\RuleProvider;

use \HoaThis\LaravelHoaRuler\Contracts\RuleProvider;
use \Hoa\Ruler\Ruler as HoaRuler;

class FileProvider implements RuleProvider
{
	public function __construct(array $config)
	{
		// TODO use config to get the path to rules
		// TODO use flysystem to get the good space for rule ;)
	}
	
	public function loadRule($ruleSpace, $ruleName)
	{
		$rules = $this->_loadRuleFiles($rulerSpace);

		return isset($rules[ $ruleName ]) ? $rules[ $ruleName ] : null;
	}

	public function loadRuleModel($ruleSpace, $ruleName)
	{
		$rule = $this->loadRule($ruleSpace, $ruleName);
		return $rule ? HoaRuler::interpret($rule) : null;
	}

	protected function _loadRuleFiles($space)
	{
		// TODO check file exist & use flysystem
		// TODO use config path
		$content = include base_path('ressources/rules/' . $space . '.php');
		return $content;
	}
}
