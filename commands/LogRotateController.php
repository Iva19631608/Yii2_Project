<?php
namespace app\commands;
use app\models\AccessLog;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
/**
 * Ротация логов приложения
 */
class LogRotateController extends Controller
{
    public $defaultAction = 'access';
    /**
     * Удаляем логи
     * @param string $date Дата для удаления логов. Если указана, то будут удалены логи только за указанный день
     * @return int
     */
    public function actionAccess(string $date = ''): int
    {
        $cond = '';
        $params = [];
        if ($date) {
            if (strtotime($date) === false) {
                $msg = Console::ansiFormat('Дата указана в неправильном формате', [Console::FG_RED]);
                Console::error($msg);
                echo \PHP_EOL;
                return ExitCode::UNSPECIFIED_ERROR;
            }
            $cond = 'DATE(access_time) = :date';
            $params[':date'] = $date;
        }
        AccessLog::deleteAll($cond, $params);
        return ExitCode::OK;
    }
}