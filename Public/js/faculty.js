// JavaScript Document
        //这个 请选择 选项 加的很好。
        var jiaArr =["请选择","文学与传媒学院","政治与历史文化学院","外国语学院","数学与统计学院","物理与机电工程学院","化学与生物工程学院","计算机与信息工程学院","体育学院","艺术学院","教师教育学院","经济与管理学院"];
        var exampleArr = [
                ["请选择"],
                ["汉语言文学", "文秘", "新闻学","国际教育"],
                ["思想政治教育", "历史学", "社会与工作力量"],
                ["师范英语", "商务英语", "应用英语"],
                ["经济统计", "应用统计", "数学与应用数学","数学与应用数学"],
                ["物理学", "电子信息工程", "电气工程及其自动化"],
                ["生物工程", "环境工程", "应用化学","化学","生物科学","制药工程"],          
                ["计算机科学与技术", "软件工程", "网络工程","物联网工程"],  
                ["体育教育", "社会指导"],
                ["舞蹈学", "视觉传达","产品设计","服装设计","美术学","音乐学"],
                ["小学语文教育", "小学数学教育","学前教育本科","学前教育专科","小学教育全科五年制","小学教育全科三年制"],
                ["旅游管理","会计学","行政管理","贸易经济","人力资源管理","市场营销"]
            ];
        window.onload = function () {
             
            var selJia = document.getElementById("jia");
            //申请空间
            selJia.length = jiaArr.length;
            //添加元素
            for (var i = 0; i < jiaArr.length; i++) {
                selJia.options[i].text = jiaArr[i];
                selJia.options[i].value = jiaArr[i];
            }
        }
 
        function ChangeExampleSelect(index)
        {
            var selExa = document.getElementById("example");
 
            selExa.length = exampleArr[index].length;
 
            for (var i = 0; i < exampleArr[index].length; i++)
            {
                selExa.options[i].text = exampleArr[index][i];
                selExa.options[i].value = exampleArr[index][i];
            }
        }