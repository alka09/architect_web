<?php

namespace Framework\Command;


interface CommandInterface
{
    public function execute();
    public function registerConfig();
    public function registerRoutes();

}