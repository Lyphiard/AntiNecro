<?php


class AntiNecro_XenForo_ControllerPublic_Thread extends XFCP_AntiNecro_XenForo_ControllerPublic_Thread
{

	public function actionAddReply() {
		$this->_assertPostOnly();

		$visitor = XenForo_Visitor::getInstance();
		$db = XenForo_Application::get('db');
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

		$result = $db->fetchRow('
			SELECT last_post_date, user_id
			FROM xf_thread
			WHERE thread_id = ?
		', $threadId);

		$lastPostDate = isset($result['last_post_date']) ? $result['last_post_date'] : 0;
		$threadOwner = isset($result['user_id']) ? $result['user_id'] : 0;
		$necroTime = $visitor->hasPermission('antinecroPermissions', 'necroTime');
		$necroTime = $necroTime ? $necroTime * 86400 : 0;

		if ($necroTime <= 0 || ($visitor->hasPermission('antinecroPermissions', 'canNecroOwnThread') && $visitor['user_id'] == $threadOwner))
			return parent::actionAddReply();

		if ($necroTime + $lastPostDate < time())
			throw new XenForo_Exception(new XenForo_Phrase('antinecro_cannot_necro_post', array('days' => $necroTime / 86400)), 200);

		return parent::actionAddReply();
	}

}