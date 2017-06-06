<?php
namespace base;

class Errcode
{
    // 配置参数
    public $errcode = array(
        //公用参数
        -1     => "请求失败，请稍后重试",
        -20001 => "参数错误",
        -20002 => "时间格式不对",
        -20003 => "店铺ID不能为空",
        //用户相关
        -10001 => "用户未登录，请先登录",
        -10002 => "用户余额不足",
        -10003 => "用户信息不存在",
        //订单相关
        -30001 => "未指定订单店铺",
        -30002 => "订单信息不能为空",
        -30003 => "订单金额错误",
        -30004 => "请选择订单支付方式",
        -30005 => "订单类型错误",
        -30006 => "请选择配送时间",
        -30007 => "配送时间格式不对",
        -30008 => "请选择配送地址",
        -30009 => "请选择就餐人数",
        -30010 => "请选择预计就餐开始时间",
        -30011 => "就餐时间格式不对",
        -30012 => "请选择预计就餐结束时间",
        -30013 => "就餐时间格式不对",
        -30014 => "用户信息不存在",
        -30015 => "店铺信息不存在",
        -30016 => "订单总金额不正确",
        -30017 => "订单金额不正确",
        -30018 => "地址信息不存在",
        -30019 => "创建订单失败",
        -30020 => "订单信息不存在",
        -30021 => "完成订单失败",
        -30022 => "订单不能取消",
        -30023 => "取消订单更新状态失败",
        -30024 => "未支付订单方可修改订单信息",
        -30025 => "创建子订单时父订单不能为空",
        -30026 => "创建子订单时父订单不存在",
        -30027 => "该订单当前不允许创建子订单",
        -30028 => "设置的订单状态不正确",
        
        //后台相关
        -80001 => "折扣日期不能为空",
        -80002 => "折扣时间段不能为空",
        -80003 => "折扣信息不能为空",
        -80004 => "折扣信息格式错误",
        -80005 => "就餐人数不能为空",
        -80006 => "桌型数量不能为空",
        -80007 => "请输入店铺名称",
        -80008 => "请上传店铺图标",
        -80009 => "请选择菜系",
        -80010 => "请输入店铺联系方式",
        -80011 => "请输入店铺联系地址",
    );

    /**
     * 构造函数
     * @param array $res
     */
    public function __construct($res = array())
    {
        return $this->errcode;
    }
}
?>