<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <matthieu@guffroy.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Matthieu Guffroy
 * ----------------------------------------------------------------------------
 */

 /*
 * ----------------------------------------------------------------------------
 * "LICENCE BEERWARE" (Révision 42):
 * <matthieu@guffroy.com> a créé ce fichier. Tant que vous conservez cet avertissement,
 * vous pouvez faire ce que vous voulez de ce truc. Si on se rencontre un jour et
 * que vous pensez que ce truc vaut le coup, vous pouvez me payer une bière en
 * retour. Matthieu Guffroy
 * ----------------------------------------------------------------------------
 */

namespace Shotgunutc;

class Select {
    /**
     * Constructeur.
     */
    public function __construct($label, $field_name, &$selectedValues, $options, $explanation="") {
        $this->label = $label;
        $this->options = $options;
        $this->selectedValues = &$selectedValues;
        $this->field_name = $field_name;
        if($explanation) {
            $this->explanation = '<a href="#" data-toggle="tooltip" title="'.$explanation.'">?</a>';
        } else {
            $this->explanation = "&nbsp;";
        }

    }


    public function html() {

        $renduHtml = '
        <div class="form-group">
            <label for="'.$this->field_name.'">'.$this->label.'</label>
            <div class="controls">
            <select required name="'.$this->field_name.'[]" id="'.$this->field_name.'" class="" multiple="multiple" size="12">';
                foreach ($this->options as $k => $v) {
                    if (is_array($v)) {
                        $renduHtml .= '<optgroup label="'.$k.'">';
                            foreach ($v as $key => $val) {
                                if(isset($this->selectedValues) && !is_array($this->selectedValues) && ($key == $this->selectedValues || $this->selectedValues == 'all'))
                                    $renduHtml .= '<option value="'.$key.'" selected="selected">'.$val.'</option>';
                                else if(isset($this->selectedValues) && is_array($this->selectedValues) && (in_array($val,$this->selectedValues) || in_array($key,$this->selectedValues)))
                                    $renduHtml .= '<option value="'.$key.'" selected="selected">'.$val.'</option>';
                                else
                                    $renduHtml .= '<option value="'.$key.'">'.$val.'</option>';
                            }
                        $renduHtml .= '</optgroup>';
                    }else{
                        if(isset($this->selectedValues) && !is_array($this->selectedValues) && ($k == $this->selectedValues || $this->selectedValues == 'all'))
                            $renduHtml .= '<option value="'.$k.'" selected="selected">'.$v.'</option>';
                        else if(isset($this->selectedValues) && is_array($this->selectedValues) && (in_array($v,$this->selectedValues) || in_array($k,$this->selectedValues)))
                            $renduHtml .= '<option value="'.$k.'" selected="selected">'.$v.'</option>';
                        else
                            $renduHtml .= '<option value="'.$k.'">'.$v.'</option>';
                    }
                }
            $renduHtml .= '</select>
                </div>
            </div>';
            return $renduHtml;
    }

    public function load() {
        global $_REQUEST;
        $this->selectedValues = $_REQUEST[$this->field_name];
    }
}

class Select_simple {
    /**
     * Constructeur.
     */
    public function __construct($label, $field_name, &$selectedValues, $options, $explanation="") {
        $this->label = $label;
        $this->options = $options;
        $this->selectedValues = &$selectedValues;
        $this->field_name = $field_name;
        if($explanation) {
            $this->explanation = '<a href="#" data-toggle="tooltip" title="'.$explanation.'">?</a>';
        } else {
            $this->explanation = "&nbsp;";
        }

    }

    public function html() {

        $renduHtml = '
        <div class="form-group">
            <label for="'.$this->field_name.'">'.$this->label.'</label>
            <div class="controls">
            <select required name="'.$this->field_name.'[]" id="'.$this->field_name.'">';
                foreach ($this->options as $k => $v) {
                    if (is_array($v)) {
                        $renduHtml .= '<optgroup label="'.$k.'">';
                            foreach ($v as $key => $val) {
                                if(isset($this->selectedValues) && !is_array($this->selectedValues) && ($key == $this->selectedValues || $this->selectedValues == 'all'))
                                    $renduHtml .= '<option value="'.$key.'" selected="selected">'.$val.'</option>';
                                else if(isset($this->selectedValues) && is_array($this->selectedValues) && (in_array($val,$this->selectedValues) || in_array($key,$this->selectedValues)))
                                    $renduHtml .= '<option value="'.$key.'" selected="selected">'.$val.'</option>';
                                else
                                    $renduHtml .= '<option value="'.$key.'">'.$val.'</option>';
                            }
                        $renduHtml .= '</optgroup>';
                    }else{
                        if(isset($this->selectedValues) && !is_array($this->selectedValues) && ($k == $this->selectedValues || $this->selectedValues == 'all'))
                            $renduHtml .= '<option value="'.$k.'" selected="selected">'.$v.'</option>';
                        else if(isset($this->selectedValues) && is_array($this->selectedValues) && (in_array($v,$this->selectedValues) || in_array($k,$this->selectedValues)))
                            $renduHtml .= '<option value="'.$k.'" selected="selected">'.$v.'</option>';
                        else
                            $renduHtml .= '<option value="'.$k.'">'.$v.'</option>';
                    }
                }
            $renduHtml .= '</select>
                </div>
            </div>';
            return $renduHtml;
    }

    public function load() {
        global $_REQUEST;
        $this->selectedValues = $_REQUEST[$this->field_name];
    }
}