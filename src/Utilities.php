<?php

namespace Claroline\API;

class Utilities
{
    public function instantiateDirectory($directory, array $constructor = [])
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
            $idx = substr(strtolower($className), strrpos(strtolower($className), '\\') + 1);

            if (in_array($sourceFile, $includedFiles)) {
                $objectList[strtolower($idx)] = $reflClass->newInstanceArgs($constructor);
            }
        }

        return $objectList;
    }
}
