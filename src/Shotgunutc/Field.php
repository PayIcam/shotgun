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

class Field {
	/**
	 * Constructeur.
	 */
	public function __construct($label, $field_name, &$value, $explanation="", $type="text", $is_typeahead=false) {
        $this->label = $label;
        $this->value =& $value;
        $this->field_name = $field_name;
        $this->type = $type;
        if($explanation) {
            $this->explanation = '<a href="#" data-toggle="tooltip" title="'.$explanation.'">?</a>';
        } else {
            $this->explanation = "&nbsp;";
        }
        if($is_typeahead) {
            $this->typeahead_class = ' typeahead-user';
            $this->typeahead_autocomplete = ' autocomplete=off';
            $this->required = '';
        }
        else {
            $this->typeahead_class = "";
            $this->typeahead_autocomplete = "";
            $this->required = 'required';
        }
	}

    public function html() {
        if($this->type == "euro") {
            $type = "number";
            $more = 'step="0.01"';
            $value = $this->value / 100;
        } else {
            $type = $this->type;
            $value = $this->value;
            $more = "";
        }
        return '
            <div class="form-group">
                <label for="'.$this->field_name.'">'.$this->label.'</label>
                    '.$this->explanation.'
                <div class="controls">
                    <input ' . $this->required . ' type="'.$type.'" class="form-control' . $this->typeahead_class . '" name="'.$this->field_name.'" value="'.$value . '" ' . $more . $this->typeahead_autocomplete . '>
                </div>
            </div>';
    }

    public function load() {
        global $_REQUEST;
        if($this->type == "euro") {
            $this->value = $_REQUEST[$this->field_name] * 100;
        } else {
            $this->value = $_REQUEST[$this->field_name];
        }
    }
}
