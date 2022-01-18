<?php
namespace Drupal\demo_core\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class demoSettingsForm extends ConfigFormBase {
    protected function getEditableConfigNames()
    {
        return ['demo_core.settings'];
    }
    public function getFormId()
    {
        return 'demo_settings';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('demo_core.settings');

        $form['token'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Recipe content password'),
            '#default_value' => $config->get('token'),
            '#size' => 24,
            '#maxlength' => 24,
            '#pattern' => '[A-Za-z0-9\-_]+',
            '#required' => TRUE,
        ];

        return parent::buildForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $new_password = $form_state->getValue('token');
        $this->config('demo_core.settings')
             ->set('token', $new_password)
             ->save();

        parent::submitForm($form, $form_state);
    }
}
