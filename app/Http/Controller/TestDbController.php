<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Http\Bean\Sandy;
use App\Model\Entity\SandyUser;
use App\Model\Logic\RequestBean;
use App\Model\Logic\RequestBeanTwo;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;

/**
 * Class TestDbController
 *
 * @since 2.0
 *
 * @Controller(prefix="td")
 */
class TestDbController
{



    /**
     * 该方法路由地址为 /td/test
     * @RequestMapping(route="test")
     */
    public function test()
    {
        /*
        $su = SandyUser::new();

        $su->setMobile('15057190640');
        $su->setPassword('123456');

        $su->setCreatetime(date("Y-m-d H:i:s"));

        $su->save();
    // 保存之后获取 ID
        $userId = $su->getId();

        return $userId;
        */

        /*
        $attributes = [
            'mobile'      => '15057190640',
            'password'       => '12345678',
            'createtime' => date("Y-m-d H:i:s")
        ];

        $su = SandyUser::new($attributes);

        $su->save();

        $userId = $su->getId();
        return $userId;
        */
//单行数据查询
        //return SandyUser::find(1, ['id', 'mobile',]);

        //return SandyUser::where('id', 1)->first(['id', 'mobile']);
//多行数据查询
        //return SandyUser::findMany([1, 2, 3, 4], ['id','mobile']);

        //return SandyUser::whereIn('id', [1, 2, 3, 4])->get(['id', 'mobile']);

//对象实体查询
//        $users = SandyUser::where('id', '>=', 5)->getModels(['id', 'mobile']);
//        /* @var SandyUser $user */
//        foreach ($users as $user) {
//            $mobile = $user->getMobile();
//            vdump($mobile);
//        }

//映射关系查询
//        $users = SandyUser::forPage(2, 5)->get(['id', 'mobile','password'])->keyBy('id');
//
//        /* @var SandyUser $user */
//        foreach ($users as $id => $user) {
//            $mobile = $user->getMobile();
//            $password= $user->getPassword();
//            echo "$mobile|$password\n";
//        }

//ID 方式删除
//        $user = SandyUser::find(1);
//        $user->delete();

//数据更新
//        $user = SandyUser::find(2);
//
//        $user->setMobile("15002000000");
//        $user->save();


//数据更新
//        SandyUser::find(2)->update(['password' => "222222222222"]);

//主键批量更新
//        $values = [
//            ['id' => 3, 'password' => "18181818181818"],
//            ['id' => 4, 'password' => "19191919199191"],
//        ];
//
//        SandyUser::batchUpdateByIds($values);
        return "success";



    }

    


}
