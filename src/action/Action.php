<?php
namespace action;

interface Action
{
    public function init();
    public function execute();
    public function respond();
}