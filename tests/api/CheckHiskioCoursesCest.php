<?php


class CheckHiskioCoursesCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        // 測試是否能成功取得 hiskio 的課程資料
        $I->sendGET('courses/professions?type=all&level=all&sort=latest&profession_id=1');
        // 檢查 HTTP status codes
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        // 檢查回傳的Json 內容是否有符合指定的參數及數值
        $I->seeResponseContainsJson([
            'status'  => true,
            'message' => 'success'
        ]);
    }
}
