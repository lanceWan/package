<?php
return [
	'providers' => [
		GeniusTS\Roles\RolesServiceProvider::class,//权限包
        Prettus\Repository\Providers\RepositoryServiceProvider::class,//l5-repository
        Laracasts\Flash\FlashServiceProvider::class, // flash 通知
        HieuLe\Active\ActiveServiceProvider::class, //Active
        Krucas\Settings\Providers\SettingsServiceProvider::class,//setting
	],
	'aliases' => [
		'Settings' => Krucas\Settings\Facades\Settings::class,
	],
];