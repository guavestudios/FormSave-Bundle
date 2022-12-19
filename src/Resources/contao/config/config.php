<?php

use Guave\FormSaveBundle\Controller\CsvExportController;
use Guave\FormSaveBundle\Model\ContentModel;
use Guave\FormSaveBundle\Model\FormSaveModel;

$GLOBALS['TL_MODELS']['tl_content'] = ContentModel::class;
$GLOBALS['TL_MODELS']['tl_form_save'] = FormSaveModel::class;

$GLOBALS['BE_MOD']['content']['form']['export_csv'] = [CsvExportController::class, 'exportCsv'];
