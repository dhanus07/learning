<?php

interface MobileFactory
{
    public function getBatteryPercentage();

    public function getRam();
}


class AndroidFactory implements MobileFactory
{
    public function getBatteryPercentage()
    {
        return new AndroidBattery();
    }

    public function getRam()
    {
        return new AndroidRam();
    }
}

class IosFactory implements MobileFactory
{
    public function getBatteryPercentage()
    {
        return new IosBattery();
    }

    public function getRam()
    {
        return new IosRam();
    }
}

interface BatteryPercentage
{
    public function getDetails();
}

class AndroidBattery implements BatteryPercentage
{
    public function getDetails()
    {
        return "Battery details of Android ";
    }
}

class IosBattery implements BatteryPercentage
{
    public function getDetails()
    {
        return "Battery details of IOS Phone ";
    }
}

interface Ram
{
    public function getDetails();
}

class AndroidRam implements Ram
{
    public function getDetails()
    {
        return "Ram  details of Android ";
    }
}

class IosRam implements Ram
{
    public function getDetails()
    {
        return "Ram details of IOS Phone ";
    }
}

function executeCode(MobileFactory $factory)
{
    $batteryPercentage = $factory->getBatteryPercentage();
    $ram = $factory->getRam();

    echo $batteryPercentage->getDetails() . "<br>";
    echo $ram->getDetails() . "<br>";
}

$os = "ios";

if ($os == "andoird")
    executeCode(new AndroidFactory());
else
    executeCode(new IosFactory());
