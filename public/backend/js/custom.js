

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
                jQuery(".nav_status").val(result.data.nav_status);
                if(result.data.nav_status==1){
                    jQuery(".navsta").text("Active");
                }
                else if(result.data.nav_status==0){
                    jQuery(".navsta").text("Inactive");
                }
                else{
                    jQuery(".navsta").text("Err");
                }
            
                
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

    var currentPage = 1; // Track the current page
    var perPage = 10; // Number of items per page
    
    showData(currentPage); // Initial load
    
    function showData(page) {
        $.ajax({
            url: 'catshow?page=' + page, // Include the page number in the URL
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                var sl = (page - 1) * perPage + 1; // Calculate the starting count for the current page
                jQuery(".tbody").html('');
                
                $.each(result.data.data, function (key, item) {
                    var statusText = (item.status === 1) ? 'Active' : 'Inactive';
                    var navText = (item.nav_status === 1) ? 'Active' : 'Inactive';
                    jQuery(".tbody").append('<tr>\
                    <td>' + sl + '</td>\
                    <td>' + item.name + '</td>\
                    <td>' + navText + '</td>\
                    <td>' + statusText + '</td>\
                    <td>\
                      <button data-target="#editCategory" data-toggle="modal" class="btn btn-sm btn-info catEdit" value="' + item.id + '" ><i class="fa fa-edit"></i></button>\
                      <button data-target="#delete" data-toggle="modal" class="btn btn-sm btn-danger catdeletedid" id="catdeletedid" value="' + item.id + '" ><i class="fa fa-trash"></i></button>\
                    </td>\
                  </tr>');
                  sl++;
                });
    
                // Update the current page value
                currentPage = page;
    
                // Add pagination controls if needed
                addPaginationControls(result.data);
            }
        });
    }
    
    function addPaginationControls(paginationData) {
        var totalPages = paginationData.last_page;
        var currentPage = paginationData.current_page;
    
        // Create a container for pagination controls
        var paginationContainer = $("<ul class='pagination'></ul>");
    
        // Create "Previous" button
        if (currentPage > 1) {
            var previousButton = $("<li class='page-item'><a class='page-link' href='#' data-page='" + (currentPage - 1) + "'>Previous</a></li>");
            paginationContainer.append(previousButton);
        }
    
        // Create buttons for each page
        for (var i = 1; i <= totalPages; i++) {
            var pageButton = $("<li class='page-item'><a class='page-link' href='#' data-page='" + i + "'>" + i + "</a></li>");
            if (i === currentPage) {
                pageButton.addClass('active');
            }
            paginationContainer.append(pageButton);
        }
    
        // Create "Next" button
        if (currentPage < totalPages) {
            var nextButton = $("<li class='page-item'><a class='page-link' href='#' data-page='" + (currentPage + 1) + "'>Next</a></li>");
            paginationContainer.append(nextButton);
        }
    
        // Attach a click event handler for pagination buttons
        paginationContainer.find('a.page-link').click(function (e) {
            e.preventDefault();
            var page = $(this).data('page');
            showData(page);
        });
    
        // Append the pagination controls to the page
        $('.pagination-container').html(paginationContainer);
    }
    
    // Initial load of data for the first page
    showData(1);

    jQuery(".addCategory").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name=jQuery(".name").val();
        var nav_status = jQuery(".nav_status").is(":checked") ? 1 : 0; 
        var status=jQuery(".status").val();

        $.ajax({
            url:'catinsert',
            type:'POST',
            dataType:'json',
            data:{
                'name':name,
                'nav_status':nav_status,
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
        var nav_status = jQuery(".nav_status").is(":checked") ? 1 : 0; 
        var status=jQuery('#status').find(":selected").val();
// console.log(status);
        $.ajax({
            url:'catupdate/'+catId,
            type:'POST',
            dataType:'json',
            data:{
                'cname':cname,
                'nav_status':nav_status,
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