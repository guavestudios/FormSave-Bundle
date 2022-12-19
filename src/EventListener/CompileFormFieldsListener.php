<?php

namespace Guave\FormSaveBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Guave\FormSaveBundle\Model\ContentModel;
use Contao\Form;
use Contao\FormFieldModel;
use Guave\FormSaveBundle\Model\FormSaveModel;

/**
 * @Hook("compileFormFields")
 */
class CompileFormFieldsListener
{
    public function __invoke(array $fields, string $formId, Form $form): array
    {
        if ($form->targetTable !== FormSaveModel::getTable() && $form->getParent()->pid === null) {
            return $fields;
        }

        /** @var ContentModel $formField */
        $formField = ContentModel::findPublishedByPidAndType($form->getParent()->pid, 'formName');

        if ($formField !== null) {
            /** @var FormFieldModel $alias */
            $alias = $fields['alias'];
            $alias->value = $formField->formName;
        }

        return $fields;
    }
}
