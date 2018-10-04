<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for device management
 */
class DeviceHelper
{
    /**
     * Get the number of CPU cores of the Linux based device it is running on
     *
     * @return integer
     */
    public static function getProcessorCoresNumber(): int
    {
        $command = "cat /proc/cpuinfo | grep processor | wc -l";

        return  (int) shell_exec($command);
    }
}

