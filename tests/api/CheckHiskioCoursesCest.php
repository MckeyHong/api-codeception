<?php

use \Codeception\Util\HttpCode;

class CheckHiskioCoursesCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /**
     * [Success] 檢查取得課程資料
     *
     * @param  ApiTester $I
     */
    public function testGetDataIsSuccess(ApiTester $I)
    {
        // 測試是否能成功取得 hiskio 的課程資料
        $I->sendGET('courses/professions?type=all&level=all&sort=latest&profession_id=1');
        // 檢查 HTTP status codes
        $I->seeResponseCodeIs(HttpCode::OK);
        // 檢查回傳的Json 內容是否有符合指定的參數及數值
        $I->seeResponseContainsJson([
            'status'  => true,
            'message' => 'success'
        ]);
    }

    /**
     * [Failed] 檢查取得課程資料
     *
     * @param  ApiTester $I
     */
    public function testGetDataIsFailed(ApiTester $I)
    {
        // 測試是否能成功取得 hiskio 的課程資料
        $I->sendGET('courses/professions');
        // 檢查 HTTP status codes
        $I->seeResponseCodeIs(HttpCode::INTERNAL_SERVER_ERROR);
    }
}
