<?php

namespace ZLabs\Components\Feedback\Fields;

class Toggle extends Checkbox
{
    public function getTypeAsString()
    {
        return 'toggle';
    }
}
