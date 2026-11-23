<?php
// 获取访问者的 IP 地址
$userIP = $_SERVER['REMOTE_ADDR'];

// 截取访问者 IP 的前两位（前两段）
$userIP_prefix = implode('.', array_slice(explode('.', $userIP), 0, 2));

// 定义 IP 黑名单文件路径
$ipListPath = './xl/iplist.txt';

// 检查 IP 黑名单文件是否存在
if (file_exists($ipListPath)) {
    // 读取 IP 黑名单文件内容
    $ipList = file($ipListPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // 检查访问者的 IP 前两位是否在黑名单中
    foreach ($ipList as $blacklistedIP) {
        // 截取黑名单中 IP 的前两位（假设黑名单中的 IP 是完整的，且每个 IP 占一行）
        $blacklistedIP_prefix = implode('.', array_slice(explode('.', $blacklistedIP), 0, 2));
        
        if ($blacklistedIP_prefix === $userIP_prefix) {
            // 如果 IP 前两位在黑名单中，重定向到 Bilibili
            header('Location: https://www.bilibili.com/');     
            exit();
        }
    }
}

Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/include/dbconfig.php');
header('Location:'. htmlspecialchars_decode('../xl').'');

?>