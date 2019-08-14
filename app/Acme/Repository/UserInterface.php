<?php

namespace Acme\Repository;


interface UserInterface
{
    public function all();

    public function get($id);
}
