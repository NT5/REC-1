<?php

namespace REC1\Components\Page;

/**
 * @todo Documentar
 */
interface PageInterface {

    public function CheckPost();

    public function initVars();

    public function initTwigTemplate();
}
