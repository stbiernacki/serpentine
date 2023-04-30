<?php


namespace App\Infrastructure\Traits;

/**
 * Trait DomainResolve
 * @package App\Infrastructure\Traits
 */
trait DomainResolve
{
    /**
     * Returns Domain Directory Name
     * including internal folders,
     * backwards does not work,
     *
     * @param null $append
     * @return false|string
     */
    protected function domainPath($append = null)
    {
        try {
            $domainPath = realpath(dirname((new \ReflectionClass($this))->getFileName()) . '/../');
        } catch (\ReflectionException $e) {
            return $e->getMessage();
        }

        if (! $append) {
            return $domainPath;
        }

        return $domainPath . DIRECTORY_SEPARATOR . $append;
    }
}
