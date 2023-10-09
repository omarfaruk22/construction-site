

jQuery(document).ready(function(){

    jQuery(document).on('click', '.catEdit',function(e){
        e.preventDefault();

        var catId=jQuery(this).val();
        $.ajax({
            url:'catedit/'+catId,
            type:'GET',
            dataType:'json',
            success:function(result){
                jQuery("#cat_id").val(result.data.id);

                jQuery("#name").val(result.data.name);
            
                
                jQuery(".sts").val(result.data.status);
                if(result.data.status==1){
                    jQuery(".sts").text("Active");
                }
                else if(result.data.status==2){
                    jQuery(".sts").text("Inactive");
                }
                else{
                    jQuery(".sts").text("Err");
                }
                
            }
        });
    });


    showData();
    function showData(){
        $.ajax({
            url:'catshow',
            type:'GET',
            datatype:'json',
            success:function(result){
                var sl=1;
                jQuery(".tbody").html('');
                $.each(result.data, function(key, item){
                    jQuery(".tbody").append('<tr>\
                    <td>'+sl+'</td>\
                    <td>'+item.name+'</td>\
                    <td>'+item.status+'</td>\
                    <td>\
                      <button data-target="#editCategory" data-toggle="modal" class="btn btn-sm btn-info catEdit" value="'+item.id+'" ><i class="fa fa-edit"></i></button>\
                      <button data-target="#delete" data-toggle="modal" class="btn btn-sm btn-danger catdeletedid" id="catdeletedid" value="'+item.id+'" ><i class="fa fa-trash"></i></button>\
                    </td>\
                  </tr>');
                  sl++;
                });
            }
        });
    }

    jQuery(".addCategory").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name=jQuery(".name").val();
        var status=jQuery(".status").val();

        $.ajax({
            url:'catinsert',
            type:'POST',
            dataType:'json',
            data:{
                'name':name,
                'status':status
            },
            success: function(result){
                if(result.success == 'faild'){
                    jQuery(".nameError").text(result.errors.name);
                  

                }
                else{
                    showData();
                    jQuery(".msg").append('<div class="alert alert-success">'+result.msg+'</div>');
                    jQuery("#addCategory").modal('hide');
                    jQuery("#addCategory").find('input').val('');
                    jQuery("#addCategory").find('textarea').val('');
                    jQuery(".msg").fadeOut(5000);
                    
                }
            }
        });
    });

    // this is update section 
    jQuery(".updatecategory").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var catId=jQuery(".cat_id").val();
        var cname=jQuery(".cname").val();
        var status=jQuery('#status').find(":selected").val();
// console.log(status);
        $.ajax({
            url:'catupdate/'+catId,
            type:'POST',
            dataType:'json',
            data:{
                'cname':cname,
                'status':status
            },
            success: function(result){
                if(result.success == 'faild'){
                    jQuery(".nameError").text(result.errors.name);
                  

                }
                else{
                    showData();
                    jQuery(".msg").append('<div class="alert alert-success">'+result.msg+'</div>');
                    jQuery("#editCategory").modal('hide');
                    jQuery("#editCategory").find('input').val('');
                    jQuery("#editCategory").find('textarea').val('');
                    jQuery(".msg").fadeOut(5000);
                    
                }
            }
        });
    });
   
// end  update section 
// start delete section 
$(document).on('click','.catdeletedid', function(e){
e.preventDefault();

var catId=$(this).val();
$('#catid').val(catId);
$('#delete').model('show');
});
jQuery(".catdelete").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var catId=jQuery('.catid').val();

// alert(catId);
    $.ajax({
        url:'delete/'+catId,
        type:'get',
        dataType:'json',
       
        success: function(result){
            
                showData();
                jQuery(".msg").append('<div class="alert alert-success">'+result.msg+'</div>');
                jQuery("#delete").modal('hide');
                jQuery("#delete").find('input').val('');
                jQuery("#delete").find('textarea').val('');
                jQuery(".msg").fadeOut(5000);
                
            
        }
    });
});


// end delete section 



});