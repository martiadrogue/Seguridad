<?php

namespace Mpwarfwk\Templating;

interface TemplateInterface {

    public function render($template);

    public function assignVars(Array $variables);
}
