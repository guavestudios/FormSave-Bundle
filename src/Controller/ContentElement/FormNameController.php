<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\System;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement("formName", category="includes", template="content_element/form-name")
 */
#[AsContentElement('formName', category: 'includes', template: 'content_element/form-name')]
class FormNameController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response|null
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $template = new BackendTemplate('be_wildcard');
            $template->title = 'Form Name';
            $template->wildcard = $model->formName;
        }

        return $template->getResponse();
    }
}
