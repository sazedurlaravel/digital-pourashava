<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),

	'font_path' => public_path('assets/fonts/'),
	'font_data' => [
		'solaimanlipi' => [
			'R'  => 'SolaimanLipi.ttf',    // regular font
			// 'B'  => 'SolaimanLipi.ttf',       // optional: bold font
			// 'I'  => 'SolaimanLipi.ttf',     // optional: italic font
			// 'BI' => 'SolaimanLipi.ttf', // optional: bold-italic font
			'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			// 'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
		// ...add as many as you want.
	]
];
