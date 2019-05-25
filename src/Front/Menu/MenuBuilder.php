<?php

declare(strict_types=1);

namespace App\Front\Menu;

class MenuBuilder
{
	/**
	 * @return MenuItem[]
	 */
	public function buildMenu(): array
	{
		return [
			'homepage' => new MenuItem('Homepage', 'default', 'users', 'Homebvcxbcxvpage'),
			'user' => new MenuItem('User', 'default', 'users', 'Users'),
			'right' => new MenuItem('Right', 'default', 'users', 'Rights'),
			'notification' => new MenuItem('Notification', 'default', 'users', 'Notifications'),
		];

//		return [
//			'user' => new MenuItem('User', 'default', 'users', 'Users'),
//			'right' => new MenuItem('Right', 'default', 'users', 'Rights'),
//			'notification' => new MenuItem(
//				'Notification',
//				'default',
//				'users',
//				'Notifications',
//				[
//					new MenuItem(
//						'Homepage',
//						'default',
//						'useres',
//						'Homebvcxbcxvpage',
//						[
//							new MenuItem('User', 'default', 'useres', 'fdsafasd'),
//						]
//					),
//				]
//			),
//		];
	}
}
