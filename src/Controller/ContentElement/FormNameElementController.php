<?php

namespace Guave\FormSaveBundle\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement("formName",
 *   category="includes",
 *   template="ce_form-name"
 * )
 */
class FormNameElementController extends AbstractContentElementController
{
    private string $strTemplate = 'ce_form-name';

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        if (\TL_MODE === 'BE') {
            $this->strTemplate = 'be_wildcard';
            $template = new BackendTemplate($this->strTemplate);
            $template->title = 'Form Name';
            $template->wildcard = $model->formName;
        }
        return $template->getResponse();
    }
}
