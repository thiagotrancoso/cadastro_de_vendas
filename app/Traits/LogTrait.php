<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Exception;

trait LogTrait
{
    /**
     * @param string $message
     * @param string $class
     * @param string $function
     * @param Exception|null $exception
     * @param array $extraData
     */
    protected function logInfo(string $message, string $class = '', string $function = '', ?Exception $exception = null, array $extraData = []): void
    {
        if (config('app.env') === 'production') {
            $this->saveInMongo('info', $message, $class, $function, $exception, $extraData);
            return;
        }

        Log::info(PHP_EOL . "\t=> {$message}" . PHP_EOL . $this->getLogString($class, $function, $exception, $extraData));
    }

    /**
     * @param string $message
     * @param string $class
     * @param string $function
     * @param Exception|null $exception
     * @param array $extraData
     */
    protected function logWarning(string $message, string $class = '', string $function = '', ?Exception $exception = null, array $extraData = []): void
    {
        if (config('app.env') === 'production') {
            $this->saveInMongo('warning', $message, $class, $function, $exception, $extraData);
            return;
        }

        Log::warning(PHP_EOL . "\t=> {$message}" . PHP_EOL . $this->getLogString($class, $function, $exception, $extraData));
    }

    /**
     * @param string $message
     * @param string $class
     * @param string $function
     * @param Exception|null $exception
     * @param array $extraData
     */
    protected function logError(string $message, string $class = '', string $function = '', ?Exception $exception = null, array $extraData = []): void
    {
        if (config('app.env') === 'production') {
            $this->saveInMongo('error', $message, $class, $function, $exception, $extraData);
            return;
        }

        Log::error(PHP_EOL . "\t=> {$message}" . PHP_EOL . $this->getLogString($class, $function, $exception, $extraData));
    }

    /**
     * Structure for displaying log in file "laravel.log"
     *
     * @param string $class
     * @param string $function
     * @param Exception|null $exception
     * @param array $extraData
     * @return string
     */
    private function getLogString(string $class, string $function, ?Exception $exception = null, array $extraData = []): string
    {
        $log = "\tClass.......: " . $class . PHP_EOL;
        $log .= "\tFunction....: " . $function . PHP_EOL;

        if ($exception) {
            $log .= "\tCode error..: " . $exception->getCode() . PHP_EOL;
            $log .= "\tFile........: " . $exception->getFile() . PHP_EOL;
            $log .= "\tLine........: " . $exception->getLine() . PHP_EOL;
            $log .= "\tMessage.....: " . $exception->getMessage() . PHP_EOL;
        }

        if (count($extraData)) {
            $log .= "\tExtra data..: " . PHP_EOL;

            foreach ($extraData as $key => $value) {
                $log .= "\t\t{$key} => {$value}" . PHP_EOL;
            }
        }

        return $log;
    }
}
