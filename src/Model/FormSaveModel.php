<?php

namespace Guave\FormSaveBundle\Model;

use Contao\Model;
use Contao\Model\Collection;

/**
 * Class FormSaveModel
 * @package Guave\FormSaveBundle\Model
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $sorting
 * @property integer $tstamp
 * @property string $alias
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $form_data
 *
 * @method static FormSaveModel|null findById($id, array $opt=array())
 * @method static FormSaveModel|null findByPk($id, array $opt=array())
 * @method static FormSaveModel|null findOneBy($col, $val, array $opt=array())
 * @method static FormSaveModel|null findOneByPid($val, array $opt=array())
 * @method static FormSaveModel|null findOneBySorting($val, array $opt=array())
 * @method static FormSaveModel|null findOneByTstamp($val, array $opt=array())
 * @method static FormSaveModel|null findOneByAlias($val, array $opt=array())
 * @method static FormSaveModel|null findOneByFirstName($val, array $opt=array())
 * @method static FormSaveModel|null findOneByLastName($val, array $opt=array())
 * @method static FormSaveModel|null findOneByEmail($val, array $opt=array())
 * @method static FormSaveModel|null findOneByFormData($val, array $opt=array())
 *
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByPid($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findBySorting($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByTstamp($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByAlias($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByFirstName($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByLastName($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByEmail($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findByFormData($val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findMultipleByIds($var, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findBy($col, $val, array $opt=array())
 * @method static Collection|FormSaveModel[]|FormSaveModel|null findAll(array $opt=array())
 *
 * @method static integer countByPid($val, array $opt=array())
 * @method static integer countBySorting($val, array $opt=array())
 * @method static integer countByTstamp($val, array $opt=array())
 * @method static integer countByAlias($val, array $opt=array())
 * @method static integer countByFirstName($val, array $opt=array())
 * @method static integer countByLastName($val, array $opt=array())
 * @method static integer countByEmail($val, array $opt=array())
 * @method static integer countByFormData($val, array $opt=array())
 */
class FormSaveModel extends Model
{
    protected static $strTable = 'tl_form_save';
}
