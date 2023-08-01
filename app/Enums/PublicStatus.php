<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PublicStatus extends Enum
{
    public const PRIVATE = 0;
    public const PUBLIC = 1;
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::PRIVATE:
                return 'PRIVATE';
                break;

            case self::PUBLIC:
                return 'PUBLIC';
                break;

            default:
                return "";
                break;
        }
    }

    public static function parseArray()
    {
        $data = [];
        foreach (self::getValues() as $value) {
            $data[] = ['label' => self::getDescription($value), 'id' => $value];
        }
        return $data;
    }
}
