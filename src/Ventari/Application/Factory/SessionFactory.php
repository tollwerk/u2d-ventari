<?php

namespace Tollwerk\Ventari\Application\Factory;

use Tollwerk\Ventari\Domain\Contract\SessionInterface;
use Tollwerk\Ventari\Domain\Model\Session;

/**
 * Session Factory
 *
 * @package Tollwerk\Ventari\Application\Factory
 */
class SessionFactory
{
    /**
     * Date based properties
     * TODO: Fill dateProperties Array and redefine Session Class
     * @var string[]
     */
    protected static $dateProperties = [];

    protected static $sessionApi = [
        'sessionId'            => 'Id',
        'sessionName'          => 'SessionName',
        'sessionRemark'        => 'SessionRemark',
        'sessionStart'         => 'SessionStart',
        'sessionEnd'           => 'SessionEnd',
        'rowNum'               => 'RowNum',
        'eventId'              => 'EventId',
        'sessionCategoryColor' => 'SessionCategoryColor',
        'sessionCategoryId'    => 'SessionCategoryId',
        'sessionCategoryName'  => 'SessionCategoryName',
        'sessionSignposting'   => 'SessionSignposting',
        'sessionLineId'        => 'SessionLineId',
        'sessionLineName'      => 'SessionLineName',
    ];

    /**
     * Create a Session from a JSON object
     *
     * @param \stdClass $json JSON object
     *
     * @return SessionInterface Session
     * @throws \Exception
     */
    public static function createSessionFromJson($json): SessionInterface
    {
        $session = new Session();

        foreach ($json as $key => $value) {
            $setter = 'set'.self::$sessionApi[$key];

            if (\is_callable([$session, $setter], true)) {
                $session->$setter($value);
            }
        }

        return $session;
    }
}