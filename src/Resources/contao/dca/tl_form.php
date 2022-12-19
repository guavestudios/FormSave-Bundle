<?php

use Guave\FormSaveBundle\Controller\CsvExportController;

$GLOBALS['TL_DCA']['tl_form']['list']['operations']['export'] = [
    'href' => 'key=export_csv',
    'icon' => 'theme_export.svg',
    'button_callback' => [CsvExportController::class, 'checkVisibility'],
];
