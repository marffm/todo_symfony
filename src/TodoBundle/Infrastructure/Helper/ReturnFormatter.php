<?php
declare(strict_types=1);

namespace TodoBundle\Infrastructure\Helper;

final class ReturnFormatter
{

    /**
     * @param $data
     * @param string $message
     * @param int $code
     * @return array
     */
    public static function successReturn($data, string $message = null, int $code = null): array
    {
        return [
            'data' => $data,
            'message' => $message?? 'Successful Action',
            'code' => $code?? 200
        ];
    }

}