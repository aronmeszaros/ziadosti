<?php

namespace App\Providers;
use Form;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
      Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
      Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
      Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
      Form::component('bsdate', 'components.form.date', ['name', 'value', 'attributes' => []]);
      Form::component('bsdropdown', 'components.form.dropdown', ['name', 'value'=> null, 'attributes' => []]);
      Form::component('bsnumber', 'components.form.number', ['name', 'value' => null, 'attributes' => []]);

    }
}
