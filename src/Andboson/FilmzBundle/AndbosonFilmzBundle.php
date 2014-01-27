<?php

namespace Andboson\FilmzBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AndbosonFilmzBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
