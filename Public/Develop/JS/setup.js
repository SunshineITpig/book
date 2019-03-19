 /**
 * 页面初始化
 */
$(function () {
    
    $("#passwdDialog").dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    });
    $("#Dialog").dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    });
    $("#leftDialog").dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    });
    $("#reportDialog").dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    });

    $('#bookbutton').click(function(){
        var datacache = $('#selected-seats').html();   
        $.ajax({
            type:"get",  
            url:url,
            async:true,
            data:{
                seatname:datacache,
                floorname:cache
            },
            dataType:'json',
            success:function(data){
                console.log(data);
                if (data.status) {
                    $("#Dialog").dialog("open");
                    printbookseat(data.rseat);
                } else {
                    alert(data.msg);  
                }
             },
        });
    });

    $('#leftbutton').click(function(){
        $.ajax({
            type:"get",  
            url:urlleft,
            async:true,
            dataType:'json',
            success:function(data){
                console.log(data);
                if (data.status) {
                    $("#leftDialog").dialog("open");
                    printleftseat(data.rseat);
                } else {
                    alert(data.msg);
                }
             },
        });
    });

    $('#reportbutton').click(function(){
        var username = $('#username').val();
        var userpwd = $('#userpwd').val();
        
        $.ajax({
            type:"get",  
            url:urlreport,
            async:true,
            data:{
                seat:username,
                content:userpwd,
            },
            dataType:'json',
            success:function(data){
                console.log(data);
                if (data.status) {
                    alert(data.msg);
                } else {
                    alert(data.msg);
                }
             },
        });
    });

    $('#changebutton').click(function(){
        var repwd = $('#repwd').val(); 
        var pwd = $('#pwd').val(); 
        $.ajax({
            type:"get",  
            url:urlchange,
            async:true,
            data:{
                name:pwd,
                rename:repwd,
            },
            dataType:'json',
            success:function(data){
                console.log(data);
                if (data.status) {
                    alert(data.msg);
                    alert(data.dmsg);
                } else {
                    alert(data.msg); 
                }
            },
        });
    });

    setseat();

    setbookseat(str);
});
         
//加载座位架构
function setseat(){
    // alert(data);
    var sc = $('#seat-map').seatCharts({
        map: data,
        seats: {
            e: {
                classes : 'economy-class', 
                category: '可选座'
            }    
        },
        naming : {
            top : false,
            getLabel : function (character, row, column) {
                return firstSeatLabel++;
            },
        },
        legend : {
            node : $('#legend'),
            items : [
                [ 'e', 'available',   '可选座'],
                [ 'f', 'unavailable', '已预定']
            ]   
        },
        click: function () {
            if (this.status() == 'available') {
                $('#counter').text(sc.find('selected').length+1);
                sc.find('selected').each(function(){
                this.status('available');
                });
                document.getElementById('selected-seats').innerText = this.settings.label;
                return 'selected';
            } else if (this.status() == 'selected') {
                //update the counter
                $('#counter').text(sc.find('selected').length-1);        
                //remove the item from our cart
                $('#cart-item-'+this.settings.id).remove();
                document.getElementById('selected-seats').innerText = " ";
                //seat has been vacated
                return 'available';
            } else if (this.status() == 'unavailable') {
                return 'unavailable';
            } else {
                return this.style();
            }
        }
    });    
}

//渲染预定的座位
function setbookseat(attr){
    var str = attr;
    $('#seat-map').seatCharts().get(str).status('unavailable');
}

//渲染预定座位
function printbookseat(attr){
    var str = attr;
    $('#seat-map').seatCharts().get([str]).status('unavailable');
}
//渲染签离座位
function printleftseat(attr){
    var str = attr;
    $('#seat-map').seatCharts().get([str]).status('available');
}

//打开修改密码对话框
function openpasswdDialog() {    
    $("#passwdDialog").dialog("open");
} 

//打开举报对话框
function openreportDialog() {    
    $("#reportDialog").dialog("open");
} 
