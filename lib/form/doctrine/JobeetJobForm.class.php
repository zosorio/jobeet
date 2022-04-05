<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class JobeetJobForm extends BaseJobeetJobForm
{
    public function configure()
    {
        //Remove fields from a form
        $this->removeFields();

        //Replacing the default validator
        //$this->validatorSchema['email'] = new sfValidatorEmail();

        //add validator

        $this->validatorSchema['email'] = new sfValidatorAnd(array(
            $this->validatorSchema['email'],
            new sfValidatorEmail(),
        ));

        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
            'choices'  => Doctrine_Core::getTable('JobeetJob')->getTypes(),
            'expanded' => true,
        ));

        $this->validatorSchema['type'] = new sfValidatorChoice(array(
            'choices' => array_keys(Doctrine_Core::getTable('JobeetJob')->getTypes()),
        ));

        $this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
            'label' => 'Company logo'
        ));

        $this->widgetSchema->setLabels(array(
            'category_id'    => 'Category',
            'is_public'      => 'Public?',
            'how_to_apply'   => 'How to apply?',
        ));
        $this->validatorSchema['logo'] = new sfValidatorFile(array(
            'required'   => false,
            'path'       => sfConfig::get('sf_upload_dir').'/jobs',
            'mime_types' => 'web_images',
        ));
        $this->widgetSchema->setHelp('is_public', 'Whether the job can also be published on affiliate websites or not.');

        $this->widgetSchema->setNameFormat('job[%s]');
    }

    protected function removeFields()
    {
      unset(
        $this['created_at'], $this['updated_at'],
        $this['expires_at'], $this['is_activated'],
        $this['token']
      );
    }
}