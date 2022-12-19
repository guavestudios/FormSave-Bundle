<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['formName'] = '{type_legend},type;{lead_content},formName';

$GLOBALS['TL_DCA']['tl_content']['fields']['formName'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'unique' => true, 'maxlength' => 255, 'tl_class' => 'w50 clr'],
    'sql' => ['type' => 'string', 'default' => '', 'length' => 100],
];
