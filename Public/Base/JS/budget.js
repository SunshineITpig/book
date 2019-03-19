
var cellBoardList;
var powerList;
var receivingCardList;
var sendingCardList;
var videoProcessorList;


/**
 * 页面初始化
 */
$(function () {

    loadBrandModel("CellBoard", createCellBoardBrand);
    loadBrandModel("Power", createPowerBrand);
    loadBrandModel("ReceivingCard", createReceivingCardBrand);
    loadBrandModel("SendingCard", createSendingCardBrand);
    loadBrandModel("VideoProcessor", createVideoProcessorBrand);
});


function loadBrandModel(material,  callback) {
    nowMaterial = material;
    //$("#section-menu").load("submenu/ajaxCellBoard.aspx", { material: material });
    $.ajax({
        url: 'submenu/ajaxCellBoard.aspx',
        type: 'POST', //GET
        async: true,    //或false,是否异步
        data: {
            material: material
        },
        timeout: 5000,    //超时时间
        dataType: 'json',    //返回的数据格式：json/xml/html/script/jsonp/text
        success: function (res, textStatus, jqXHR) {
            console.log(res);
            callback(res);
        },
        error: function (xhr, textStatus) {
            console.log('错误')
            console.log(xhr)
            console.log(textStatus)
        }
    });
}

//单元板列表
function createCellBoardBrand(data) {
    cellBoardList = data;
    var str = "";
    for (var i = 0 ; i < cellBoardList.length ; i++) {
        str += "<option value='" + i + "'>" + cellBoardList[i].title + "</option>";
    }
    $("#cellboardBrand").html(str);
    createCellBoardModel();
}

function createCellBoardModel() {
    var brand = $("#cellboardBrand").val();
    var modelList = eval("cellBoardList[" + brand + "].models");
    var str = "";
    for (var i = 0 ; i < modelList.length ; i++) {
        str += "<option value='" + i + " '>" + modelList[i] + "</option>";
    }
    $("#cellboardModel").html(str);
}

//电源列表
function createPowerBrand(data) {
    powerList = data;
    var str = "";
    for (var i = 0 ; i < powerList.length ; i++) {
        str += "<option value='" + i + "'>" + powerList[i].title + "</option>";
    }
    $("#powerBrand").html(str);
    createPowerModel();
}

function createPowerModel() {
    var brand = $("#powerBrand").val();
    var modelList = eval("powerList[" + brand + "].models");
    var str = "";
    for (var i = 0 ; i < modelList.length ; i++) {
        str += "<option value='" + i + " '>" + modelList[i] + "</option>";
    }
    $("#powerModel").html(str);
}


//接收卡
function createReceivingCardBrand(data) {
    receivingCardList = data;
    var str = "";
    for (var i = 0 ; i < receivingCardList.length ; i++) {
        str += "<option value='" + i + "'>" + receivingCardList[i].title + "</option>";
    }
    $("#receivingCardBrand").html(str);
    createReceivingCardModel();
}

function createReceivingCardModel() {
    var brand = $("#receivingCardBrand").val();
    var modelList = eval("receivingCardList[" + brand + "].models");
    var str = "";
    for (var i = 0 ; i < modelList.length ; i++) {
        str += "<option value='" + i + " '>" + modelList[i] + "</option>";
    }
    $("#receivingCardModel").html(str);
}

//发送卡
function createSendingCardBrand(data) {
    sendingCardList = data;
    var str = "";
    str += "<option value='-1'>----</option>";
    for (var i = 0 ; i < sendingCardList.length ; i++) {
        str += "<option value='" + i + "'>" + sendingCardList[i].title + "</option>";
    }
    $("#sendingCardBrand").html(str);
    createSendingCardModel();
}

function createSendingCardModel() {
    var brand = $("#sendingCardBrand").val();
    if (brand == "-1") {
        $("#sendingCardModel").html("<option value='-1'>----</option>");
        return;
    }
    var modelList = eval("sendingCardList[" + brand + "].models");
    var str = "";
    for (var i = 0 ; i < modelList.length ; i++) {
        str += "<option value='" + i + " '>" + modelList[i] + "</option>";
    }
    $("#sendingCardModel").html(str);
}

//视频处理器
function createVideoProcessorBrand(data) {
    videoProcessorList = data;
    var str = "";
    str += "<option value='-1'>----</option>";
    for (var i = 0 ; i < videoProcessorList.length ; i++) {
        str += "<option value='" + i + "'>" + videoProcessorList[i].title + "</option>";
    }
    $("#videoProcessorBrand").html(str);
    createVideoProcessorModel();
}

function createVideoProcessorModel() {
    var brand = $("#videoProcessorBrand").val();
    if (brand == "-1") {
        $("#videoProcessorModel").html("<option value='-1'>----</option>");
        return;
    }
    var modelList = eval("videoProcessorList[" + brand + "].models");
    var str = "";
    for (var i = 0 ; i < modelList.length ; i++) {
        str += "<option value='" + i + " '>" + modelList[i] + "</option>";
    }
    $("#videoProcessorModel").html(str);
}

// 估算
function calculate() {
   
    $.ajax({
        url: 'ajaxBudget/budget.aspx',
        type: 'POST', //GET
        async: true,    //或false,是否异步
        data: {
            origWidth: $("#origWidth").val(),
            origHeight: $("#origHeight").val(),
            isFullColor: $("input[name='fullColor']:checked").val(),
            cellboardBrand: $("#cellboardBrand").find("option:selected").text(),
            cellboardModel: $("#cellboardModel").find("option:selected").text(),
            powerBrand: $("#powerBrand").find("option:selected").text(),
            powerModel: $("#powerModel").find("option:selected").text(),
            receivingCardBrand: $("#receivingCardBrand").find("option:selected").text(),
            receivingCardModel: $("#receivingCardModel").find("option:selected").text(),
            sendingCardBrand: $("#sendingCardBrand").find("option:selected").text(),
            sendingCardModel: $("#sendingCardModel").find("option:selected").text(),
            videoProcessorBrand: $("#videoProcessorBrand").find("option:selected").text(),
            videoProcessorModel: $("#videoProcessorModel").find("option:selected").text(),
            install: $("input[name='install']:checked").val(),
            installHeight: $("#installHeight").val(),
            LaborDays: $("#LaborDays").val()
        },
        timeout: 5000,    //超时时间
        dataType: 'json',    //返回的数据格式：json/xml/html/script/jsonp/text
        success: function (res, textStatus, jqXHR) {
            console.log(res);
  
            $("#Text1").val(res.CellBoard + "元");
            $("#Text2").val(res.Power + "元");
            $("#Text3").val(res.ReceivingCard + "元");
            $("#Text4").val(res.SendingCard + "元");
            $("#Text5").val(res.VideoProcessor + "元");
            $("#Text6").val(res.BorderAndFrame + "元");
            $("#Text7").val(res.Laber + "元");
            $("#Text8").val(res.Total + "元");
        },
        error: function (xhr, textStatus) {
            console.log('错误')
            console.log(xhr)
            console.log(textStatus)
        }
    });
}


// 估算
function createWord() {

    $.ajax({
        url: 'ajaxBudget/word.aspx',
        type: 'POST', //GET
        async: true,    //或false,是否异步
        data: {
            AmountCellBoard: $("#Text1").val(),
            AmountPower: $("#Text2").val(),
            AmountReceivingCard: $("#Text3").val(),
            AmountSendingCard: $("#Text4").val(),
            AmountVideoProcessor: $("#Text5").val(),
            AmountBorderAndFrame: $("#Text6").val(),
            AmountLaber: $("#Text7").val(),
            AmountTotal: $("#Text8").val()
        },
        timeout: 5000,    //超时时间
        dataType: 'script',    //返回的数据格式：json/xml/html/script/jsonp/text
        success: function (res, textStatus, jqXHR) {
            console.log(res);
            
        },
        error: function (xhr, textStatus) {
            console.log('错误')
            console.log(xhr)
            console.log(textStatus)
        }
    });
}