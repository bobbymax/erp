<?php

namespace App\Http;

use App\Training;
use App\User;
use App\Conversation;
use App\Thread;
use App\MSender;
use App\MRecipient;
use DB;


class MailBox
{

	public $conversations = [];
	public $results = [];

	public function getConversations($user)
	{

		$this->conversations = Conversation::with('threads', 'sender', 'recipient')->where('recipient_id', $user->id)->latest()->get();

		// return $this->conversations->toJson();
		return $this->conversations;
	}
}