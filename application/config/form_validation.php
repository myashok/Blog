<?php
$config  =   [
	'add_article_rules' => [
								[ 
								  'field' => 'title',
								  'label' => 'Article Title',
								  'rules' => 'required|alphadash'
								],
								[
								  'field' => 'body',
								  'label' => 'Article Body',
								  'rules' => 'required'

								]
							],
	 'login_rules' =>      [
	 							'field' => 'username',
								'label' => 'User Name',
								'rules' => 'trim|required|alpha'
	 					   ],
	 					   [
								  'field' => 'password',
								  'label' => 'Password',
								  'rules' => 'required'

						   ]

		    ];
	