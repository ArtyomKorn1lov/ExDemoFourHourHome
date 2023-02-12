<?php

namespace exam_demo;
class HelperTemplate
{
    private const START_DATE = "09:00";
    private const END_DATE = "18:00";

    public static function isWorkTimeNow(): bool
    {
        $todayTimestamp = strtotime(date("G:i"));
        return (($todayTimestamp >= strtotime(date(self::START_DATE)))
            && ($todayTimestamp <= strtotime(date(self::END_DATE))));
    }

    public static function dump($data): void
    {
        ?>
        <pre>
            <?php print_r($data); ?>
        </pre>
        <?php
    }
}