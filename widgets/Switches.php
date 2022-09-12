<?php
namespace app\widgets;

use yii\base\Widget;

class Switches extends Widget{
    public $field, $label, $id, $value, $action;

    public function init(){
        parent::init();
    }

    public function run(){
        $checked = ($this->value) ? 'checked' : '';
        return <<<HTML
            <div class="custom-control custom-switch switchesWidget" data-id="$this->id" data-action="$this->action">
            <input type="checkbox" class="custom-control-input" value="$this->value" id="switches[$this->field]"$checked>
            <label class="custom-control-label" for="switches[$this->field]">$this->label</label>
            </div>

        HTML;
    }
}

?>