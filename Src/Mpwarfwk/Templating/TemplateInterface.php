<?php

namespace Mpwarfwk\Templating;

interface TemplateInterface {

    public function render($template, $variables);

    public function assignVars($variables);
}
