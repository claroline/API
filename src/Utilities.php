<?php

namespace Claroline\API;

class Utilities
{
    public function instantiateDirectory($directory)
    {
        foreach (new \DirectoryIterator($directory) as $file) {
            if (!$file->isDot()) {
                $sourceFile = realpath($file->getPathName());
                require_once $sourceFile;
                $includedFiles[] = $sourceFile;
            }
        }

        $declared = get_declared_classes();
        $objectList = [];

        foreach ($declared as $className) {
            $reflClass = new \ReflectionClass($className);
            $sourceFile = $reflClass->getFileName();

            if (in_array($sourceFile, $includedFiles)) {
                $objectList[strtolower($className)] = new $className();
            }
        }

        return $objectList;
    }
}
