
function checkForm(num){
        var fn=$('#fn'+num).val();
        var ln=$('#ln'+num).val();
        var birth=$('#birth'+num).val();
        var death=$('#death'+num).val();
        var relationship=$('#relationship'+num).val();
        var interment=$('#dateOfInterment'+num).val();
        var amount=$('#amountPaid'+num).val();
        var amountTo=$('#price'+num).val();
        if(amountTo==''){
        amountTo=0;    
        }else{
        amountTo=parseFloat(amountTo.replace(/,/g,''));
        }
        if(amount==''){
        }else{
        amount=parseFloat(amount.replace(/,/g,''));
        }
        
        if((amountTo>amount&&amount!='')||amount==''||interment==''||relationship==''||death==''||birth==''||fn==''||ln==''){
            $('#submit'+num).prop('disabled',true);
        }else{
            if(amountTo < amount ){
                document.getElementById('changeDiv'+num).style.display='block';
                var change = parseFloat(amount-amountTo);
                $('#change2'+num).val(change);
            }else{
                document.getElementById('changeDiv'+num).style.display='none';
            }
            $('#submit'+num).prop('disabled',false);
        }
    }
    
    
    function computeAge(num){
    checkForm(num);
    var birth=new Date($('#birth'+num).val()).getTime();
    var death=new Date($('#death'+num).val()).getTime();
    
    if(birth!=''&&death!=''){

    var timeDiff = Math.abs(death - birth);
    var ageDate = new Date(timeDiff);
    var age = Math.abs(ageDate.getUTCFullYear()-1970); 
    if(isNaN(age)){

    $('#age'+num).val('0');
    }else{

    $('#age'+num).val(age);

    }

    var serviceId=$('#service'+num).val();
    var age=$('#age'+num).val();
    $.ajax({
        url:'/mlms/pages/transaction/computePrice.php',
        dataType:'JSON',
        data:{
            'serviceId':serviceId,
            'age':age
        },
        success:function(data){
            $('#price'+num).val(data);
        }

    });
    }

}
function computePrice2(num){    
    var serviceId=$('#service'+num).val();
    var age=$('#age'+num).val();
    $.ajax({
        url:'/mlms/pages/transaction/computePrice.php',
        dataType:'JSON',
        data:{
            'serviceId':serviceId,
            'age':age
        },
        success:function(data){
            $('#price'+num).val(data);
        }

    });
}