// 创建一个闭包     
(function ($) {
    // 插件的定义     
    $.fn.modelShowInfo = function (options) {
        debug(this);
        // build main options before element iteration     
        var opts = $.extend({}, $.fn.modelShowInfo.defaults, options);
        dataInfo = opts.data;
        var str = ' <table>';
        for (var key in dataInfo) {
            str += "<tr>";
            str += "<td>";
            str += key;
            str += "</td>";
            str += "<td>";
            str += "<input id='"+key+"' type='text' value='"+ eval("dataInfo."+key) + "' />" ;
            str += "</td>";
            str += "</tr>";
        }
        str += "<tr>";
        str += " <td colspan='2' style='text-align:center;'>";
        str += "<button id='saveInfoBtn' class='btn btn-blue'>保存</button>";
        str += " </td>";
        str += "</tr>";
        str += ' <table>';
        this.html(str);
        $("#saveInfoBtn").click(function () {
            save(dataInfo);
        });

    };

    function save(data) {

        var jsonParams = {};
        jsonParams.material = nowMaterial;
        for (var key in dataInfo) {
            eval("jsonParams." + key + "= $('#" + key + "').val()");
        }
        console.log(jsonParams);
        $.ajax({
            url: 'submenu/ajaxSaveModelInfo.aspx',
            type: 'POST', //GET
            async: true,    //或false,是否异步
            data: jsonParams,
            timeout: 5000,    //超时时间
            dataType: 'json',    //返回的数据格式：json/xml/html/script/jsonp/text
            success: function (data, textStatus, jqXHR) {
                console.log("save : " + data);
                //显示保存结果
                if (data.status == "error")
                    alert(data.msg);
                else if (data.status == "ok")
                    alert("更新完毕");
            },
            error: function (xhr, textStatus) {
                console.log('错误')
                console.log(xhr)
                console.log(textStatus)
            }
        });
    };

    // 私有函数：debugging     
    function debug(str) {
        if (window.console && window.console.log)
            window.console.log(str);
    };
    // 定义暴露format函数     
    $.fn.modelShowInfo.format = function (txt) {
        return '<strong>' + txt + '</strong>';
    };

    // 插件的defaults     
    $.fn.modelShowInfo.defaults = {
        data:{}
    };
    // 闭包结束     
})(jQuery);