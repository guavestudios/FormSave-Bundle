<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\EventListener;

use Contao\Form;
use Guave\FormSaveBundle\Model\FormSaveModel;

class StoreFormDataListener
{
    /**
     * @param array<string> $data
     *
     * @return array<string>
     */
    public function __invoke(array $data, Form $form): array
    {
        if ($form->targetTable !== FormSaveModel::getTable()) {
            return $data;
        }

        $formData = [
            'pid' => $form->id,
            'tstamp' => $data['tstamp'],
            'alias' => $data['alias'],
        ];

        $serialized = array_diff(
            $data,
            $formData
        );

        $formData['form_data'] = serialize($serialized);

        return $formData;
    }
}
