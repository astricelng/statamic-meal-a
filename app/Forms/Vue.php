<?php

namespace App\Forms;

use Statamic\Forms\JsDrivers\AbstractJsDriver;
use Statamic\Statamic;

class Vue extends AbstractJsDriver
{
    /**
     * Add custom HTML attributes to your <form> element.
     */
    public function addToFormAttributes()
    {

        $data = $this->getInitialFormData();

        foreach ($data as $key => $value) {
            if ($value === null)
                $data[$key] = '';
        }

        return [
            'data' => Statamic::modify($data)->toJson()->fetch(),
        ];
    }

    /**
     * Add to the available data for each field within the fields loop.
     */
    public function addToRenderableFieldData($field, $data)
    {
        $conditions = Statamic::modify($field->conditions())->toJson();

        $fieldRules = isset($data['validate']) ? $data['validate'] : [];
        $rules = [];

        for ($i = 0, $m = count($fieldRules); $i < $m; $i++){
            $transformedRule = $this->getVeeValidateRule($fieldRules[$i], $data['type'] === 'text' ? $data['input_type'] : $data['type']);
            if ($transformedRule !== '')
                $rules[] = $transformedRule;
        }

        $objectRules =  '{'.implode(',', $rules).'}';

        return [
            'show_field' => $conditions->fetch(),
            'rules' => $objectRules
        ];
    }

    /**
     * Add `v-model` to bind each field's input to `formData` object in the vue data
     * add custom HTML attributes to each pre-rendered (field) field input within the (fields) loop.
     */
    public function addToRenderableFieldAttributes($field)
    {
        // Because Vue warns against `v-model` on file inputs, use `@change` to bind data on those inputs
        /*if ($field->type() === 'assets') {
            return [
                '@change' => $dataKey.' = $event.target.files[0].name',
            ];
        }*/
        $dataKey = 'slotProps.formData.'.$field->handle();

        return [
            'v-model' => $dataKey,
        ];
    }

    /**
     * Transform laravel rule to vee-validate rule
     */
    protected function getVeeValidateRule($rule, $type){

        $veeRule = '';

        switch ($rule){
            case 'alpha':
                $veeRule = 'alpha:true';
                break;
            case 'alpha_num':
                $veeRule = 'alpha_num:true';
                break;
            case 'email':
                $veeRule = 'email:true';
                break;
            case 'image':
                $veeRule = 'image:true';
                break;
            case 'integer':
                $veeRule = 'integer:true';
                break;
            case 'numeric':
                $veeRule = 'numeric:true';
                break;
            case 'required':
                $veeRule = 'required:true';
                break;
            case 'url':
                $veeRule = 'url:true';
                break;

            case (preg_match('/^same:[\w]+$/', $rule) ? true : false):
                $values = explode(":", $rule);
                $veeRule = "confirmed:'@".$values[1]."'";
                break;

            case (preg_match('/^digits:[\d]+$/', $rule) ? true : false):
                $veeRule = $rule;
                break;

            case (preg_match('/^min:[\d]+$/', $rule) ? true : false):
                $values = explode(":", $rule);
                $veeRule = ($type === 'number') ? 'min_value:'.$values[1] : 'min:'.$values[1];
                break;

            case (preg_match('/^max:[\d]+$/', $rule) ? true : false):
                $values = explode(":", $rule);
                $veeRule = ($type === 'number') ? 'max_value:'.$values[1] : 'max:'.$values[1];
                break;

            case (preg_match('/^size:[\d]+$/', $rule) ? true : false):
                $values = explode(":", $rule);
                $veeRule =($type !== 'assets') ?  'length:'.$values[1] : '';
                break;

            case (preg_match('/^max_filesize:[\d]+$/', $rule) ? true : false):
                $values = explode(":", $rule);
                $veeRule = 'size:'.$values[1];
                break;

            case (preg_match('/^between:[\d]+,[\d]+$/', $rule) ? true : false):
                $values = explode(":", $rule);
                $between = explode(",", $values[1]);
                $veeRule = 'between: ['.$between[0].','.$between[1].']';
                break;
        }

        return $veeRule;
    }
}
