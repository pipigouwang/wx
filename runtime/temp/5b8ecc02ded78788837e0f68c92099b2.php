<?php /*a:1:{s:56:"E:\PHPTutorial\WWW\wx/themes\pc\mp\mp\editautoreply.html";i:1531363966;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <title>RhaPHP 二哈公众号管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/public/static/admin/css/admin_base.css" />
    <script type="text/javascript" src="/public/static/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/public/static/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/icon/icon.css" />
</head>
<body style="background: rgb(255, 255, 255) none repeat scroll 0 0;">
<br><br>
<form class="layui-form" action="" style="padding-right: 10px;">
    <div class="layui-form-item">
        <label class="layui-form-label">回复关键词</label>
        <div class="layui-input-block">
            <input type="text" name="keyword" placeholder="请输入关键词" value="<?php echo htmlentities($data['keyword']); ?>" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否开启</label>
        <div class="layui-input-block">
            <?php if($data['status']=='1'): ?>
            <input type="checkbox" name="status" value="1" checked="checked" lay-skin="switch">
            <?php else: ?>
            <input type="checkbox" name="status" value="0" lay-skin="switch">
            <?php endif; ?>

        </div>
    </div>
    <?php switch($type): case "text": ?>
    <div class=" reply_text layui-tab-item layui-show"><div class="layui-form-item layui-form-text">
        <label class="layui-form-label">回复内容</label>
        <div class="layui-input-block">
            <textarea name="content" placeholder="请输入内容" class="layui-textarea"><?php echo htmlentities($data['content']); ?></textarea>
        </div>
    </div>
    <?php break; case "news": ?>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" placeholder="请输入标题" value="<?php echo htmlentities($data['title']); ?>" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">封面图</label>
            <div class="layui-input-block">
                <?php echo hook('Upload',['type'=>'image','name'=>'picurl','material'=>true,'value'=>$data['url']]); ?>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">图文描述</label>
            <div class="layui-input-block">
                <textarea name="news_content" placeholder="请输入图文描述" class="layui-textarea"><?php echo htmlentities($data['content']); ?></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">连接地址</label>
            <div class="layui-input-block">
                <input type="text" name="link" value="<?php echo htmlentities($data['link']); ?>" placeholder="请输入连接地址如：http://xxxx.com/……" autocomplete="off" class="layui-input">
            </div>
        </div>
     <?php break; case "addon": ?>
        <div class="layui-form-item">
            <label class="layui-form-label">选择应用</label>
            <div class="layui-input-block">
                <select name="addons">
                    <option value="">请选择应用</option>
                    <?php if(is_array($addons) || $addons instanceof \think\Collection || $addons instanceof \think\Paginator): $i = 0; $__LIST__ = $addons;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <option <?php if($data['addon'] == $v['addon']): ?> selected <?php endif; ?> value="<?php echo htmlentities($v['addon']); ?>"><?php echo htmlentities($v['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <?php break; case "voice": ?>
        <div class="layui-form-item">
            <label class="layui-form-label">语音名称</label>
            <div class="layui-input-block">
                <input type="text" name="voice_title" value="<?php echo htmlentities($data['title']); ?>" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">

            <label class="layui-form-label">语音</label>
            <div class="layui-input-block">
                <?php echo hook('Upload',['type'=>'voice','name'=>'voice','bt_title'=>'上传语音','material'=>true,'value'=>$data['url']]); ?>
                <p class="tip_for_p">临时语音只支持amr/mp3格式,大小不超过为2M,长度不超过60秒,永久语音只支持mp3/wma/wav/amr格式,大小不超过为5M,长度不超过60秒</p>
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型</label>
            <div  class="layui-input-block">
                <input type="radio" <?php if($data['status_type'] == '0'): ?> checked <?php endif; ?> name="voice_staus_type" value="0" title="临时">
                <input type="radio" <?php if($data['status_type'] == '1'): ?> checked <?php endif; ?> name="voice_staus_type" value="1" title="永久" >
            </div>
        </div>
        <?php break; case "image": ?>
        <div class="layui-form-item">
            <label class="layui-form-label">上传图片</label>
            <div class="layui-input-block">
                <?php echo hook('Upload',['type'=>'image','name'=>'reply_image','material'=>true,'value'=>$data['url']]); ?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型</label>
            <div  class="layui-input-block">
                <input type="radio" type="radio" <?php if($data['status_type'] == '0'): ?> checked <?php endif; ?> name="image_staus_type" value="0" title="临时">
                <input type="radio" type="radio" <?php if($data['status_type'] == '1'): ?> checked <?php endif; ?> name="image_staus_type" value="1" title="永久" >
            </div>
        </div>
        <?php break; case "video": ?>
        <div class="layui-form-item">
            <label class="layui-form-label">视频标题</label>
            <div class="layui-input-block">
                <input type="text" name="video_title" value="<?php echo htmlentities($data['title']); ?>" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">视频</label>
            <div class="layui-input-block">
                <?php echo hook('Upload',['type'=>'video','name'=>'reply_video','bt_title'=>'上传视频','material'=>true,'value'=>$data['url']]); ?>
                <p class="tip_for_p">临时视频只支持mp4格式,大小不超过为10M,永久视频只支持rm/rmvb/wmv/avi/mpg/mpeg/mp4格式,大小不超过为20M</p>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述内容</label>
            <div class="layui-input-block">
                <textarea name="video_content" placeholder="请输入内容" class="layui-textarea"><?php echo htmlentities($data['content']); ?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型</label>
            <div  class="layui-input-block">
                <input type="radio" <?php if($data['status_type'] == '0'): ?> checked <?php endif; ?> name="video_staus_type" value="0" title="临时">
                <input type="radio" <?php if($data['status_type'] == '1'): ?> checked <?php endif; ?> name="video_staus_type" value="1" title="永久" >
            </div>
        </div>
        <?php break; case "music": ?>
        <div class="layui-form-item">
            <label class="layui-form-label">音乐标题</label>
            <div class="layui-input-block">
                <input type="text" name="music_title" value="<?php echo htmlentities($data['title']); ?>" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">资源文件</label>
            <div class="layui-input-block">
                <?php echo hook('Upload',['type'=>'media','name'=>'music','bt_title'=>'上传音乐','value'=>$data['url']]); ?>

            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">高品质链接</label>
            <div class="layui-input-block">
                <input type="text" name="music_link" value="<?php echo htmlentities($data['link']); ?>" placeholder="请输入链接" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述内容</label>
            <div class="layui-input-block">
                <textarea name="music_content" placeholder="请输入内容" class="layui-textarea"><?php echo htmlentities($data['content']); ?></textarea>
            </div>
        </div>
        <?php break; endswitch; ?>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="SBT">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script>
    layui.use('form', function(){
        var form = layui.form
        form.on('submit(SBT)', function(data){
            var load = layer.load();
            $.post('',data.field,function (res) {
                if(res.status=='0'){
                    layer.close(load);
                    layer.alert(res.msg);
                }
                if(res.status=='1'){
                    layer.close(load);
                     layer.msg(res.msg,{time:1000},function () {
                         layer.closeAll();
                         //     window.location.href=res.url;
                     });
                }
            })
            return false;
        });

    });
    function getMaterial(paramName,type){
        layer.open({
            type: 2,
            title: '选择素材',
            shadeClose: true,
            shade: 0.8,
            area: ['650px', '280px'],
            content: '<?php echo url("mp/Material/getMeterial","",""); ?>/type/'+type+'/param/'+paramName //iframe的url
        });
    }
    function controllerByVal(value,paramName,type) {
        $('.form_'+paramName).attr('src',value);
        $("input[name="+paramName+"]").val(value);
    }
</script>
</body>
</html>