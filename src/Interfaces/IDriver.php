<?php

namespace ModelToTables\Interfaces;

interface IDriver{

    function setDriver(array $config) : IDriver;
    function getDriver(): IDriver;
    function getClient();
}