<?php

namespace App\Foundation;

/**
 * 响应状态码表
 *
 * Class ResponseCode
 * @package App\Foundation
 */
class ResponseCode
{
    const OK    = 0;
    const ERROR = 400;

    //参数相关的错误
    const ERROR_HTTP_NOT_FOUND       = 1002;
    const ERROR_PARAM_FLOOD_REQUEST  = 1003;
    const ERROR_PARAM_INVALID_FORMAT = 1004;
    const ERROR_IP_NOT_ALLOWED       = 1005;
    const ERROR_METHOD_NOT_ALLOWED   = 1006;
    const ERROR_FREQUENCE            = 1007;


    //参数不合法错误
    const ERROR_INVALID_PARAMETER                 = 1008;   //参数不合法
    const ERROR_INVALID_PARAMETER_EMAIL           = 1009;
    const ERROR_INVALID_PARAMETER_PHONE           = 1010;
    const ERROR_INVALID_PARAMETER_CREDIT_CODE     = 1011;
    const ERROR_INVALID_PARAMETER_ID_CODE         = 1012;
    const ERROR_INVALID_PARAMETER_APPROVED_STATUS = 1013;
    const ERROR_UNION_BOSS_UID_NOT_FOUND          = 1100;

    //参数为空错误代码
    const ERROR_EMPTY_PARAMETER_REJECT_REASON = 1200;

    const ERROR_NOT_EXIST = 1401;

    //请求相关错误
    const ERROR_NEED_TOKEN     = 2000;
    const ERROR_USER_ERR_TOKEN = 2001;

    //用户相关的错误代码
    const ERROR_USER_NOT_EXIST          = 2002;
    const ERROR_USER_ERR_PASS           = 2003;
    const ERROR_USER_NOT_LOGIN          = 2004;
    const ERROR_USER_SOURCE_NOT_SUPPORT = 2005;
    const ERROR_USER_NOT_REAL_NAME_CA   = 2006;
    const ERROR_USER_UPLOAD_FILE        = 2007;
    const ERROR_USER_MOBILE_PHONE       = 2008;
    const ERROR_USER_SMS_CODE           = 2009;
    const ERROR_UNION_OWNER_CHANGE      = 2010;

    //系统通用错误代码
    const ERROR_SYS_DB_SQL            = 3001;
    const ERROR_SYS_REDIS             = 3002;
    const ERROR_SYS_UNKNOWN           = 3003;
    const ERROR_SYS_BUSY_RETRY        = 3004;
    const ERROR_SYS_REQUEST_FORBIDDEN = 3005;

    //内部错误代码
    const ERROR_CONTROLLER_PARAM_INVALID = 4001;
    const ERROR_SERVICE_PARAM_INVALID    = 4002;

    //家族相关错误代码
    const ERROR_HAS_UNION_IN_AUDIT        = 5001;//您已申请家族，请等待审核
    const ERROR_HAS_UNION_AUDIT_PASS      = 5002;//您已绑定家族，不可重复绑定呦
    const ERROR_COMPANY_NAME_EXIST        = 5003;//公司已经存在
    const ERROR_UNION_NOT_EXIST           = 5004;//家族不存在
    const ERROR_UNION_CAN_APPLY           = 5005;//家族暂停申请
    const ERROR_APPLY_OWN_UNION           = 5006;//无法加入自己创建的家族
    const ERROR_HAS_APPLY_UNION           = 5007;//已经申请了加入家族
    const ERROR_NOT_FIND_USER_UNION       = 5008;
    const ERROR_USER_NOT_BIND_UNION       = 5009;
    const ERROR_NOT_FIND_BIND_INFO        = 5010;
    const ERROR_APPLY_UNION_FAILED        = 5011;
    const ERROR_UNION_CREATE              = 5012; //家族创建失败
    const ERROR_ANCHOR_NOT_CREATE_UNION   = 5013;//主播身份不能创建家族
    const ERROR_ANCHOR_HAS_UNION          = 5014;//主播已经有家族
    const ERROR_ANCHOR_NOT_IN_UNION       = 5027;//主播不在家族
    const ERROR_PARENT_NOT_EXIST          = 5028;//经纪人不存在
    const ERROR_ANCHOR_NOT_EXIST          = 5029;//主播不存在
    const ERROR_ANCHOR_UPDATE_INFO_FAILED = 5030;//更新主播信息失败
    const ERROR_ANCHOR_SELF_SCALE         = 5031;//自提比例数值有误
    const ERROR_UNION_AUDIT_REJECTED      = 5032;//自提比例数值有误
    const ERROR_UNION_HAS_NO_ANCHOR       = 5033;
    const ERROR_UNION_HAS_NO_PARENT       = 5034;


    const ERROR_SETTLE_TYPE                   = 5015;//家族结算类型错误
    const ERROR_SETTLE_METHOD                 = 5016;  //家族结算方式错误
    const ERROR_UNION_REMOVED                 = 5017;//家族已清退
    const ERROR_CREDIT_CODE_USED              = 5018;
    const ERROR_UPDATE_UNION_INFO             = 5019; //家族更新失败
    const ERROR_NOT_ALLOWED_UPDATE_UNION_INFO = 5020;
    const ERROR_BOSS_UID_ERROR                = 5021;
    const ERROR_AUDIT_UNION_ERROR             = 5022;
    const ERROR_CAN_NOT_AUDIT_UNION_ERROR     = 5023;
    const ERROR_ALREADY_AUDITED_UNION_ERROR   = 5024;
    const ERROR_UNION_NAME_USED               = 5025; //家族名称已经被占用
    const ERROR_UPDATE_UNION_INFO_REPEAT      = 5026; //已经提交了修改家族信息的请求

    const ERROR_UID_TS_EXIST     = 6001;//对应UID已经是星探
    const ERROR_ICODE_NOT_EXIST  = 6002;//邀请码不存在
    const ERROR_TS_NOT_BIND_SELF = 6003;  //星探不能绑定自己
    const ERROR_UID_HAS_BIND_TS  = 6004;//大神已经加入了其他星探旗下

    //审核相关错误代码
    const APPLY_RESET_INFO_STATUS_ERROR    = 7001; //申请修改信息失败，审核中
    const APPLY_RESET_TIMES_ERROR          = 7002; //每月只可修改一次
    const APPLY_ALREADY_FAIL_ERROR         = 7003; //已经审核通过，请勿重复审核
    const ERROR_APPLY_TO_JOIN_UNION_FAILED = 7004;
    const ERROR_STATUS_NOT_MATCH           = 7005;  //当前状态不允许审核通过
    const ERROR_AUDIT_AGREE_FAILED         = 7006;  //同意审核，操作失败
    const ERROR_AUDIT_DISAGREE_FAILED      = 7007;  //拒绝审核，操作失败
    const ERROR_ANCHOR_UNION_NOT_MATCHED   = 7008;  //主播与家族不匹配
    const ERROR_AUDIT_STATUS               = 7009;  //审核状态错误
    const ERROR_AUDIT_ANCHOR_REPEAT        = 7010;  //审核主播加入家族  重复请求

    public static $codeMsg = [
        self::OK => '请求成功',

        self::ERROR_HTTP_NOT_FOUND                    => '路由未找到',
        self::ERROR_PARAM_FLOOD_REQUEST               => '不能重复请求',
        self::ERROR_PARAM_INVALID_FORMAT              => '参数格式错误',
        self::ERROR_IP_NOT_ALLOWED                    => 'IP未授权',
        self::ERROR_METHOD_NOT_ALLOWED                => '方法未授权',
        self::ERROR_INVALID_PARAMETER                 => '参数不合法',
        self::ERROR_INVALID_PARAMETER_EMAIL           => '邮箱不合法',
        self::ERROR_INVALID_PARAMETER_PHONE           => '手机号不合法',
        self::ERROR_INVALID_PARAMETER_CREDIT_CODE     => '统一社会信用代码不合法',
        self::ERROR_INVALID_PARAMETER_ID_CODE         => '身份证号不合法',
        self::ERROR_INVALID_PARAMETER_APPROVED_STATUS => '审批状态不合法',
        self::ERROR_EMPTY_PARAMETER_REJECT_REASON     => '拒绝审核通过的理由不能为空',
        self::ERROR_FREQUENCE                         => '手速太快啦',

        self::ERROR_UNION_BOSS_UID_NOT_FOUND => 'parent_id参数获取失败',

        self::ERROR_NOT_EXIST               => '数据不存在',
        //用户
        self::ERROR_USER_NOT_LOGIN          => '用户未登录',
        self::ERROR_USER_NOT_EXIST          => '用户不存在',
        self::ERROR_USER_ERR_PASS           => '账号或密码错误，请确认使用已注册的花吱账户登录哦～',
        self::ERROR_USER_ERR_TOKEN          => 'token无效',
        self::ERROR_NEED_TOKEN              => 'token错误',
        self::ERROR_USER_SOURCE_NOT_SUPPORT => '不支持的用户来源',
        self::ERROR_USER_NOT_REAL_NAME_CA   => '用户未实名认证',
        self::ERROR_USER_UPLOAD_FILE        => '用户文件上传错误',
        self::ERROR_USER_MOBILE_PHONE       => '用户输入的手机号码格式错误',
        self::ERROR_USER_SMS_CODE           => '验证码输入错误，请重新输入',
        self::ERROR_UNION_OWNER_CHANGE      => '家族长ID已经修改,请使用龙猫ID：%d重新登录',

        //系统通用
        self::ERROR_SYS_DB_SQL              => '数据库SQL操作失败:%s',
        self::ERROR_SYS_REDIS               => 'REDIS错误',
        self::ERROR_SYS_UNKNOWN             => '系统未知错误',
        self::ERROR_SYS_BUSY_RETRY          => '系统繁忙，请重试',
        self::ERROR_SYS_REQUEST_FORBIDDEN   => '拒绝访问',

        self::ERROR_CONTROLLER_PARAM_INVALID => '接口传入参数错误',
        self::ERROR_SERVICE_PARAM_INVALID    => '参数错误',

        self::ERROR_HAS_UNION_IN_AUDIT          => '您已申请家族，请等待审核',
        self::ERROR_HAS_UNION_AUDIT_PASS        => '您已绑定家族，不可重复绑定呦',
        self::ERROR_COMPANY_NAME_EXIST          => '该公司已入驻花音，无法提交您的申请',
        self::ERROR_UNION_NOT_EXIST             => '家族不存在',
        self::ERROR_UNION_CAN_APPLY             => '对不起，您申请的家族目前已经停止主播招募',
        self::ERROR_APPLY_OWN_UNION             => '对不起，您无法申请加入自己创建的家族',
        self::ERROR_HAS_APPLY_UNION             => '主播提交了一个申请就不可以提交其他申请了哦～',
        self::ERROR_NOT_FIND_USER_UNION         => '没有找到用户的家族信息',
        self::ERROR_USER_NOT_BIND_UNION         => '该用户不属于该家族',
        self::ERROR_NOT_FIND_BIND_INFO          => '没有找到绑定信息',
        self::ERROR_UNION_NAME_USED             => '家族名称已存在请重新输入',
        self::ERROR_UNION_HAS_NO_ANCHOR         => '当前家族没有签约任何主播',
        self::ERROR_UNION_HAS_NO_PARENT         => '当前家族没有经纪人',
        self::ERROR_AUDIT_UNION_ERROR           => '家族审核失败',
        self::ERROR_CAN_NOT_AUDIT_UNION_ERROR   => '当前状态不允许审核家族',
        self::ERROR_ALREADY_AUDITED_UNION_ERROR => '当前家族已被审核过',
        self::ERROR_UPDATE_UNION_INFO_REPEAT    => '您已经提交了修改家族信息的申请，请等待审核结果',

        self::ERROR_UNION_CREATE                  => '家族创建失败，请重试',
        self::ERROR_UPDATE_UNION_INFO             => '修改家族信息失败，请重试',
        self::ERROR_NOT_ALLOWED_UPDATE_UNION_INFO => '当前状态不允许修改家族信息',
        self::ERROR_BOSS_UID_ERROR                => '家族长ID与当前家族不一致',

        self::ERROR_ANCHOR_NOT_IN_UNION => '当前主播不在家族中',

        self::ERROR_ANCHOR_NOT_CREATE_UNION   => '主播身份不能创建家族，请退出家族之后再试',
        self::ERROR_ANCHOR_HAS_UNION          => '此主播已有家族，无法多次加入',
        self::ERROR_ANCHOR_NOT_EXIST          => '主播不存在',
        self::ERROR_ANCHOR_UPDATE_INFO_FAILED => '更新主播信息失败',
        self::ERROR_ANCHOR_SELF_SCALE         => '主播自提比例有误',

        self::ERROR_SETTLE_TYPE   => '家族结算类型错误',
        self::ERROR_SETTLE_METHOD => '家族结算方式错误',
        self::ERROR_UNION_REMOVED => '链接已失效',

        self::ERROR_APPLY_UNION_FAILED => '申请加入家族失败，请重新申请',

        self::ERROR_CREDIT_CODE_USED => '此统一社会信用代码已被使用',

        self::ERROR_UID_TS_EXIST     => '您已经是星探啦',
        self::ERROR_ICODE_NOT_EXIST  => '邀请码不正确，请重新输入',
        self::ERROR_TS_NOT_BIND_SELF => '星探不能绑定自己',
        self::ERROR_UID_HAS_BIND_TS  => '您已加入星探通道',

        self::APPLY_RESET_INFO_STATUS_ERROR    => '审核中，请稍后再试',
        self::APPLY_RESET_TIMES_ERROR          => '每月只可修改一次',
        self::APPLY_ALREADY_FAIL_ERROR         => '当前主播已审核，请勿重复审核',
        self::ERROR_APPLY_TO_JOIN_UNION_FAILED => '申请加入家族失败',
        self::ERROR_STATUS_NOT_MATCH           => '当前状态不允审核',
        self::ERROR_AUDIT_AGREE_FAILED         => '同意审核时，操作失败',
        self::ERROR_AUDIT_DISAGREE_FAILED      => '拒绝审核时，操作失败',
        self::ERROR_ANCHOR_UNION_NOT_MATCHED   => '主播与家族没有任何联系，请确认再提交',
        self::ERROR_AUDIT_STATUS               => '审核状态有误',
        self::ERROR_AUDIT_ANCHOR_REPEAT        => '已经审核过当前主播，请勿重复审核',
    ];
}
