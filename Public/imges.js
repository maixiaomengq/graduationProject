
    //===������ļ��ϴ���ַд���ı��򡿿�ʼ  
    $(function() {  
        $('#doc-form-file').on('change', function() {  
            var fileNames = '';  
            $.each(this.files, function() {  
                fileNames +=  this.name ;  
            });  
            $('#ImgURL').val(fileNames);  
        });  
    });  
    //===������ļ��ϴ���ַд���ı��򡿽���  
          
        //����ͼ��ʾ����  
    function PreviewImage(imgFile)  
    {  
        var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);  
        filextension=filextension.toLowerCase();  
        if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))  
        {  
            alert("�Բ���ϵͳ��֧�ֱ�׼��ʽ����Ƭ������������ʽ�������ϴ���лл !");  
            imgFile.focus();  
        }  
        else  
        {  
            var path;  
            if(document.all)//IE  
            {  
                imgFile.select();  
                path = document.selection.createRange().text;  
                document.getElementById("imgPreview").innerHTML="";  
                document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//ʹ���˾�Ч��        
            }  
            else//FF  
            {  
                path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0����  
                //path = imgFile.files[0].getAsDataURL();// FF 3.0  
                document.getElementById("imgPreview").innerHTML = "<img id='img1' width='200px' height='200px' src='"+path+"'/>";  
                //document.getElementById("img1").src = path;  
            }  
        }  
    }  