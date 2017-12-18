{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">商品管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/goods">商品列表</a></li>
            <li class="active"><a href="/goods/create">商品添加/编辑</a></li>
        </ul>
        <form onsubmit="post(event)" class="layui-form layui-form-pane" id="submitform">
            <div class="layui-colla-item">
                <h2 class="layui-colla-title" style="margin-bottom: 10px;font-weight: bolder">商品区域</h2>
                <div class="layui-colla-content layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">商品名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">所属栏目</label>
                        <div class="layui-input-block">
                            <select name="category_id">
                                <option value="0">--顶级目录--</option>
                                <?php if (is_array($categorydata)): ?>
                                    <?php foreach ($categorydata as $column): ?>
                                        <option value="{$column['id']}">{$column['_name']}</option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">商品价格</label>
                        <div class="layui-input-block">
                            <input type="text" name="price" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">上架时间</label>
                        <div class="layui-input-block">
                            <input type="date" name="uptime" value="<?php echo date('Y-m-d') ?>" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">列表页图片</label>
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <input type="text" name="list_image" id="listImage" readonly
                                       style="background:#dddddd;border: 1px solid #e6e6e6;width: 700px;height: 38px;">
                                <button type="button" class="layui-btn" id="list">上传图片</button>
                                <div class="layui-upload-list">
                                    <img class="layui-upload-img" id="showimage"
                                         style="width:100px;height: 100px;display:none;">
                                    <p id="demoText"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">内容页图册</label>
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <button type="button" class="layui-btn" id="content">多图片上传</button>
                                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                    预览图：
                                    <div class="layui-upload-list" id="showimages"></div>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">点击次数</label>
                        <div class="layui-input-block">
                            <input type="number" name="click" value="0" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">商品详情</label>
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <script id="container" name="content" type="text/plain"></script>
                                <script type="text/javascript">
                                    let ue = UE.getEditor('container');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-colla-item" style="margin: 20px 0;" id="app">
                <h2 class="layui-colla-title" style="margin-bottom: 10px;font-weight: bolder">货品区域</h2>
                <div class="layui-colla-content layui-show" v-for="(v,k) in goodslist">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">组合属性</label>
                        <div class="layui-input-block">
                            <input type="text" v-model="v.attr" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">货品库存</label>
                        <div class="layui-input-block">
                            <input type="number" v-model="v.inventory" class="layui-input">
                        </div>
                    </div>

                    <a class="layui-btn layui-btn-danger layui-btn-xs" @click.prevent="del(k)">删除</a>
                </div>
                <textarea hidden name="goodslist" id="" cols="30" rows="10">{{goodslist}}</textarea>
                <a class="layui-btn layui-btn-normal layui-btn-xs" @click.prevent="add()">增加一项</a>
            </div>

            <div class="layui-form-item">
                <button class="layui-btn">保存商品信息</button>
            </div>
        </form>
    </div>

    <script>
        layui.use('upload', function () {
            let $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            let uploadInst = upload.render({
                elem: '#list'
                , url: '/upload'
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#showimage').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    if (res.valid == 0) {
                        return layer.msg('上传失败');
                    }
                    $('#listImage').val(res.path);
                    $('#showimage').show();
                    return layer.msg('上传成功')
                }
            });

            //多图片上传
            upload.render({
                elem: '#content'
                , url: '/upload'
                , multiple: true
                , done: function (res) {
                    //上传完毕
                    $('#showimages').append('<img src="/'+res.path+'" alt="" class="layui-upload-img" style="width: 100px;height: 100px;">' +
                        '<a onclick="del(this)" style="position: relative;top: -42px;"><i class="layui-icon" style="font-weight: bolder;color: red;">&#x1006;</i></a>' +
                        '<input type="hidden" name="content_image[]" value=' + res.path + '>')
                    // $('#showimages').append('<input type="hidden" name="content_image[]" value=' + res.path + '>')
                }
            });
        });

        //图片删除
        function del(that) {
            $(that).next().remove();
            $(that).prev().remove().end().remove();
        }

        //表单渲染
        layui.use('form', function () {
            let form = layui.form;
            form.render();
        });

        function post(event) {
            event.preventDefault();
            $.ajax({
                url: '/goods',
                method:'post',
                data: $('#submitform').serialize(),
                success: function (response) {
                    if (response.valid == 1) {
                        layer.alert(response.message, {
                            icon: 6,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                        setTimeout(function () {
                            location.href = '/goods';
                        }, 1000)
                    }else{
                        layer.alert(response.message, {
                            icon: 5,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                    }

                }
            })
        }

        new Vue({
            el: '#app',
            data: {
                goodslist: [{attr: '', inventory: ''}]
            },
            methods: {
                add() {
                    this.goodslist.push({attr: '', inventory: ''});
                },
                del(k) {
                    this.goodslist.splice(k, 1)
                }
            }
        })
    </script>
</div>
{/block}