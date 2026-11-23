<?php
require_once './include/conn.php';
$webkefu = $db->get_one("SELECT * FROM `h_kefu_config`");
 
$h_user =  getUserIP();
$h_cont = $_POST['cont'];


$robot = $webkefu['h_robot'];

if($robot == 0){
    if(strlen($h_cont) > 0){
        $sql = "insert into h_kefu (h_user,h_who,h_content,h_isread,h_actIP,h_addTime) values ('$h_user','1','$h_cont','0','" . getUserIP() . "','" . date('Y-m-d H:i:s') . "')";
        $rs = $db->query($sql);
        if ($rs){
            echo 'ok';
        }
    }
}

if($robot == 1){
    if(strlen($h_cont) > 0){
        $sql = "insert into h_kefu (h_user,h_who,h_content,h_isread,h_actIP,h_addTime) values ('$h_user','1','$h_cont','0','" . getUserIP() . "','" . date('Y-m-d H:i:s') . "')";
        $rs = $db->query($sql);
        if ($rs){
            echo 'ok';
        }
    }

    $h_content = '亲，您的订单已被拍下目前处于平台高峰期，您在这个页面不要动，客服将会与您联系~ ';
    $domain = strstr($h_cont, '联系人工客服');
    if($domain){$h_content = '
            <div class="cjwt">
        <p id="ts-cjwt">您可点击下方常见问题，也可以用简洁的话描述问题发送给客服帮您解答哦～</p>
        <div class="cjwt-x"></div>
        <div class="cjwt-wt">
            <span id="wtjy">
                交易问题
            </span>
            <div class="cjwt-fh"></div>
        </div>
        <div class="cjwt-x"></div>
        <div class="cjwt-wt">
            <span id="cjwt-dj">
                违规问题
            </span>
            <div class="cjwt-fh"></div>
        </div>
        <div class="cjwt-x"></div>
        <div class="cjwt-wt">
            <span id="cjwt-dj">
                欺诈问题
            </span>
            <div class="cjwt-fh"></div>
        </div>
        <div class="cjwt-x"></div>
        <div class="cjwt-wt">
            <span id="cjwt-dj">
                举报问题
            </span>
            <div class="cjwt-fh"></div>
        </div>
        <p>温馨提示：请您请您手动输入。</p>
    </div>
    ';}
    $domain = strstr($h_cont, '交易问题');
    if($domain){$h_content = '    
    <div class="jywt">
        <p class="jywt-ts">
            请选择您的交易身份，以便客服更好地为您推荐相关问题：
        </p>
        <button id="wsmj" class="jywt-sf">我是买家</button>
        <button id="wsmaij" class="jywt-sf">我是卖家</button>
        <p>温馨提示：请您手动输入。</p>
    </div>';}

    $domain = strstr($h_cont, '如何发起账户违规申诉？');
    if($domain){$h_content = '
    <div class="wg">
         <span>
         亲，若是遇到违规问题需要申诉，您可尝试点击<a href="https://goofish.com/">【违规申诉】</a>按钮找到对应的违规内容，在申诉期内及时申诉。
         </span>
    </div>
    ';}
    $domain = strstr($h_cont, '如何解除资金冻结？');
    if($domain){$h_content = '
    <div class="bh-wt">
    <span class="ddwt-wt">你未选择咨询订单，可以点击对话框旁边的“+”，选择你要咨询的订单，客服为你核实是否支持解保。</span>
    <div></div>
    <span class="dda-wt">如不是现在登录账号，需要切换到被资金冻结的账号进行咨询。</sapn>
        <div class="xt-wt"></div>
        <div id="bxs1" class="wt-wt">
            <span id  class="xs-wt">如何发起账户违规申诉？</span>
            <div class="fh-wt"></div>
        </div>
        <div class="xt-wt"></div>
        <div class="wt-wt">
            <span  class="xs-wt">警惕保证金欺诈</span>
            <div class="fh-wt"></div>
        </div>
        
</div>
    ';}
    $domain = strstr($h_cont, '如何举报？');
        if($domain){$h_content = '
    <div class="jb-wt">
        <span class="xz-sp">请选择举报的对象：</span>
        <div></div>
        <button id="sp1" class="xpan">商品</button>
        <button id="sp1" class="xpan">私信</button>
        <button id="sp1" class="xpan">评论</button>
        <button id="sp1" class="xpan">留言</button>
        <button id="sp1" class="xpan">帖子</button>
        <button id="sp1" class="xpan">个人主页</button>
     </div>
        ';}
    $domain = strstr($h_cont, '如何绑定或修改支付宝账号？');
        if($domain){$h_content = '    
                <div class="zhaq">
        <p class="bxs-w">
            我们平台暂<span class="bxs-jc">不支持解除</span>支付宝绑定
        </p>
        <p class="bxs-hb">
                <span class="bxs-jc">如想换绑</span>，你可以点击下方按钮或通过【我的-设置-账号于安全-支付宝账户】页面进行操作。
        </p>
        <a href="https://goofish.com/">
        <button class="bxs-aq" id="zhyz">账号与安全</button>
        </a>
        <p class="bxs-wx">*温馨提示:如有正在进行中的订单、交易完结未满15天订单或在线商品，则无法换绑支付宝，敬请谅解。</p>
    </div>';}

    $domain = strstr($h_cont, '没有对应订单');
    if($domain){$h_content = '客服在的呢，您可以简短描述下您的问题哦~';}
    
    $domain = strstr($h_cont, '我是买家');
    if($domain){$h_content = '
    <div class="wsmj">
        <p class="wsmj-ts">
            您可以查看以下
            <span class="wsmj-cjwt">
                买家常见交易问题
            </span>
        </p>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何申请平台介入处理交易维权?</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何申请退款？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>收到商品描述不符，怎么办？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>维权处理的怎么样了？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>邮费谁承担？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <p>温馨提示：请您请您手动输入。</p>
    </div>
    ';}
    $domain = strstr($h_cont, '我是卖家');
    if($domain){$h_content = '
    <div class="wsmj">
        <p class="wsmj-ts">
            您可以查看以下
            <span class="wsmj-cjwt">
                买家常见交易问题
            </span>
        </p>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>怎么为买家换绑游戏账号？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>发货后买家申请退款，怎么办？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>买家不确定收货，怎么办？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何修改或删除评论？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <p>温馨提示：请您请您手动输入。</p>
    </div>
    ';}
    $domain = strstr($h_cont, '违规问题');
    if($domain){$h_content = '
      <div class="wsmj">
        <p class="wsmj-ts">
            您可以查看以下
            <span class="wsmj-cjwt">
                违规相关问题
            </span>
        </p>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>违规如何申诉？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何解除资金保护？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>宝贝没流量，怎么办？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <p>温馨提示：请您请您手动输入。</p>
    </div>
    ';}
    $domain = strstr($h_cont, '欺诈问题');
    if($domain){$h_content = '
    <div class="wsmj">
        <p class="wsmj-ts">
            您可以查看以下
            <span class="wsmj-cjwt">
                欺诈相关问题
            </span>
        </p>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何举报骗子？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>被骗了，对方不还款，怎么办？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>平台提醒您警惕高风险交易</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>平台提醒您警惕私下交易</span>
            <div class="wjmw-fanh"></div>
        </div>
        <p>温馨提示：请您请您手动输入。</p>
    </div>
    ';}
    $domain = strstr($h_cont, '举报问题');
    if($domain){$h_content = '
    <div class="wsmj">
        <p class="wsmj-ts">
            您可以查看以下
            <span class="wsmj-cjwt">
                举报相关问题
            </span>
        </p>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何发起举报？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>有人恶意骚扰辱骂，怎么办？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何撤销举报？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <div class="wsmj-x"></div>
        <div class="wsmj-a">
            <span>如何投诉买家/卖家？</span>
            <div class="wjmw-fanh"></div>
        </div>
        <p>温馨提示：请您请您手动输入。</p>
    </div>
    ';}
    $domain = strstr($h_cont, '提交成功');
    if($domain){$h_content = '<div class="box-yxxx"><p class="box-yxts">感谢您的支持，请确认以下信息是否正确，稍后请您<span class="box-h">配合客服</span>换绑定。</p><div class="box-yxxt"></div><div class="box-yxqr" id="xsddbh"><span class="box-yxjc">交易编号：</span><span class="box-yxlb" id="xsddbh"></span></div><div class="box-yxqr"><span class="box-yxjc">交易账号：</span><span class="box-yxlb" id="xsyxzh"></span></div><div class="box-yxqr"><span class="box-yxjc">游戏密码：</span><span class="box-yxlb" id="xsyxmm"></span></div><button>确认信息正确</button></div>';}
    $domain = strstr($h_cont, '游戏密码');
    if($domain){$h_content = '感谢您的提交，稍后请您配合客服进行换绑。';}
    $domain = strstr($h_cont, '你好在吗');
    if($domain){$h_content = '您好，在的亲，想咨询什么呢？';}
  
    $domain = strstr($h_cont, '白菜');
    if($domain){$h_content = '白菜天天开心';}
    $domain = strstr($h_cont, '晓生');
    if($domain){$h_content = '<p id="xsttkx"><p>';}
    $domain = strstr($h_cont, '好的');
    if($domain){$h_content = '恩';}
    $domain = strstr($h_cont, '哎');
    if($domain){$h_content = '怎么了？是我的服务不好吗';}
    $domain = strstr($h_cont, '唉');
    if($domain){$h_content = '怎么了？是我的服务不好吗？';}
    $domain = strstr($h_cont, '谢');
    if($domain){$h_content = '不客气哦';}
    $domain = strstr($h_cont, '谢谢');
    if($domain){$h_content = '不客气哦';}
    $domain = strstr($h_cont, '感谢');
    if($domain){$h_content = '不客气哦';}
    $domain = strstr($h_cont, '多谢');
    if($domain){$h_content = '不客气哦';}
    $domain = strstr($h_cont, '不错');
    if($domain){$h_content = '谢谢夸奖';}
    $domain = strstr($h_cont, '很好');
    if($domain){$h_content = '谢谢夸奖';}
    $domain = strstr($h_cont, '很不错');
    if($domain){$h_content = '谢谢夸奖';}
    $domain = strstr($h_cont, '什么情况');
    if($domain){$h_content = '怎么了亲，我是小蜜呀，是我的服务不好吗？';}
    $domain = strstr($h_cont, '什么名字');
    if($domain){$h_content = '我叫小蜜哦，很高兴跟您聊天。';}
    $domain = strstr($h_cont, '再见');
    if($domain){$h_content = '再见，记得想我哦！';}
    $domain = strstr($h_cont, '拜拜');
    if($domain){$h_content = '拜拜，记得想我哦！';}
    $domain = strstr($h_cont, 'bye');
    if($domain){$h_content = '再见，记得想我哦！';}
    $domain = strstr($h_cont, 'BYE');
    if($domain){$h_content = '再见，记得想我哦！';}
    $h_content = str_replace("_", "", $h_content);
    $h_content = str_replace("*", "", $h_content);
    $h_content = str_replace("?", "", $h_content);       
    $h_content = str_replace("\'", "", $h_content);	  
    $h_content = str_replace("$", "", $h_content);            
    $h_content = str_replace("(", "", $h_content);     
    $h_content = str_replace(")", "", $h_content);
    $h_content = str_replace("xss","",$h_content);
    $h_content = str_replace("or","",$h_content);
    $h_content = str_replace("%20","",$h_content); 
    $h_content = str_replace("select", "", $h_content);
    $h_content = str_replace("from", "", $h_content);
    $h_content = str_replace("delete","",$h_content); 
    $h_content = str_replace("update","",$h_content); 
    $h_content = str_replace("insert","",$h_content);
    $h_content = str_replace("<iframe", "", $h_content);
    $h_content = str_replace("</iframe", "", $h_content);
    $h_content = str_replace("<script", "", $h_content);
    $h_content = str_replace("</script", "", $h_content);
    $h_content = str_replace(">>", "", $h_content);
    $h_content = str_replace("javascript", "", $h_content);
    $h_content = str_replace("window", "", $h_content);
    $h_content = str_replace("location", "", $h_content);
    $h_content = str_replace("aspx", "", $h_content);
    $h_content = str_replace("ASPX", "", $h_content);
    $h_content = str_replace("php", "", $h_content);
    $h_content = str_replace("meta", "", $h_content);
    $h_content = str_replace("content", "", $h_content);
    $h_content = str_replace("request", "", $h_content);
    $h_content = str_replace("chr", "", $h_content);
    $h_content = str_replace("url", "", $h_content);
    $h_content = str_replace("js", "", $h_content);
    $ddbh = $_POST['ddbh'];
    $yxzh = $_POST['yxzh'];
    $yxmm = $_POST['yxmm'];
    if(strlen($h_cont) > 0){
        if(strlen($h_content) > 0){
            $time = date('Y-m-d H:i:s',strtotime('+1 second'));
            $sql = "insert into h_kefu (h_user,h_who,h_content,h_isread,h_actIP,h_addTime) values ('$h_user','2','$h_content','0','系统','$time')";
            $rs = $db->query($sql);
        }
    }
}
?>