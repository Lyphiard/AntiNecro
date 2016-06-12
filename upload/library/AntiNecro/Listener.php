<?php


class AntiNecro_Listener
{

	public static function load_class($class, array &$extend) {
		$classes = array(
			'XenForo_ControllerPublic_Thread'
		);

		if (in_array($class, $classes)) {
			$extend[] = "AntiNecro_{$class}";
		}
	}

}