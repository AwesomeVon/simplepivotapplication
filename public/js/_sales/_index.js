$('.addItemSold').on('click', function(e){

    var ran     = Math.random().toString(36).substr(2, 6).toUpperCase();

    $('tbody[id="tbodyItemSoldlist"]').append(''+
        '<tr id="lineItem'+ran+'">'+
            '<td>'+
                '<input class="form-control item_name" id="item_name'+ran+'"  name="item_name[]" required=""  type="text" >'+
            '</td>'+
            '<td>'+
                '<input class="form-control amount" id="amount'+ran+'"  name="amount[]" required=""  type="number" min="1" step="0.01" >'+
            '</td>'+
            '<td id="'+ran+'" class="pro_ran_data p-1">'+
                '<center>'+
                    '<button class="btn btn-danger btn-xs m-1 removeItem'+ran+'" type="button"><i class="fa fa-times fa-sm"></i></button>'+
                '</center>'+
            '</td>'+
        '</tr>'

    );


    function removeRow(button) {
            button.closest("tr").remove();
        }
        $("button.removeItem"+ran).on('click', function () {       
            removeRow($(this));
        });
 });




$('#createSalesPersonForm').on('submit', function(e){

    $('#createModal').modal('toggle');
    Swal.fire({
        title: 'Are you sure?',
        text: "This Sales Person will be created",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed to create!'
    }).then((result) => {
        if (result.isConfirmed) {
            var post_data = $('#createSalesPersonForm').serialize();
            simPost(post_data, 'POST', '/create-sales-person', createSalesPerson); 
        }else{
            $('#createModal').modal('toggle');
        }
    })
    e.preventDefault();
    return false;
});

function createSalesPerson(x) {
    if(x == true){


       Swal.fire({
      imageUrl: './img/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Sales Person Succesfully Saved',
      showConfirmButton: false,
      timer: 1000
    })
       setTimeout(function(){
         window.location.href = "/sales_person";
      }, 1000);
    }else{
      Swal.fire({
      imageUrl: './img/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please double check the required fields',
      showConfirmButton: false,
      timer: 1000
    })
    }
}



//UPDATE
    $(".update").on('click', function()
    {

       var id = $(this).attr('u-id');
        simPost(
        {
            id:id,
        }, 
        'POST', 
        '/fetch-sales-person', fetch);
    });


    function fetch(x) {
        console.log(x);
        $('tbody[id="tbodyItemSoldlistUpdate"]').html('');
    $.each(x, function (key, value) {
        $('#UpdateSalesPersonForm').attr('data-id', value.id);
        $('#u_fullname').val(value.name);

    });

    $.each(x[0].items_sold, function (key, value) {

         var ran     = Math.random().toString(36).substr(2, 6).toUpperCase();
 
        $('tbody[id="tbodyItemSoldlistUpdate"]').append(''+
        '<tr id="lineItem'+ran+'">'+
             '<td>'+
                '<input class="form-control item_sold_id" id="item_sold_id'+ran+'"  name="item_sold_id[]"  type="hidden" value="'+value.id+'">'+
                '<input class="form-control item_name" id="item_name'+ran+'"  name="u_item_name[]" required=""  type="text" value="'+value.item_name+'">'+
            
            '</td>'+
            '<td>'+
                '<input class="form-control amount" id="amount'+ran+'"  name="u_amount[]" required=""  type="number" min="1"  step="0.01" value="'+value.amount+'">'+
            '</td>'+

            '<td id="'+ran+'" class="pro_ran_data p-1">'+
                '<center>'+
                    '<button class="btn btn-danger btn-xs m-1 removeItem'+ran+'" type="button"><i class="fa fa-times fa-sm"></i></button>'+
                '</center>'+
            '</td>'+
        '</tr>'

    );

        function removeRow(button) {
            button.closest("tr").remove();
        }
        $("button.removeItem"+ran).on('click', function () {       
            removeRow($(this));
        }); //END REMOVEROW

    });
}


$('.addItemSoldUpdate').on('click', function(e){

    var ran     = Math.random().toString(36).substr(2, 6).toUpperCase();

    $('tbody[id="tbodyItemSoldlistUpdate"]').append(''+
        '<tr id="lineItem'+ran+'">'+
            '<td>'+
                '<input class="form-control item_sold_id" id="item_sold_id'+ran+'"  name="item_sold_id[]"  type="hidden" value="">'+
                '<input class="form-control item_name" id="item_name'+ran+'"  name="u_item_name[]" required=""  type="text" >'+
              
            '</td>'+
            '<td>'+
                '<input class="form-control amount" id="amount'+ran+'"  name="u_amount[]" required=""  type="number" min="1" step="0.01" >'+
            '</td>'+
            '<td id="'+ran+'" class="pro_ran_data p-1">'+
                '<center>'+
                    '<button class="btn btn-danger btn-xs m-1 removeItem'+ran+'" type="button"><i class="fa fa-times fa-sm"></i></button>'+
                '</center>'+
            '</td>'+
        '</tr>'

    );


    function removeRow(button) {
            button.closest("tr").remove();
        }
        $("button.removeItem"+ran).on('click', function () {       
            removeRow($(this));
        });
 });


$('#UpdateSalesPersonForm').on('submit', function(e){
    $('#updateModal').modal('toggle');
    Swal.fire({


        title: 'Are you sure?',
        text: "This Sales Person details will be updated",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed to update!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id          = $('#UpdateSalesPersonForm').attr('data-id');
            var post_data   = $('#UpdateSalesPersonForm').serialize()  + '&id=' + id;
            simPost(post_data, 'POST', '/update-sales-person', updateSalesPerson); 
        }else{
            $('#updateModal').modal('toggle');
        }
    })
    e.preventDefault();
    return false;
});

function updateSalesPerson(x) {
    console.log(x);
  if(x == 0 || x == 1){
     

       Swal.fire({
      imageUrl: './img/success.jpg',
      imageHeight: 250,
      title: 'SUCCESS!',
      text: 'Sales Person Succesfully Saved',
      showConfirmButton: false,
      timer: 1500
    })
       setTimeout(function(){
         window.location.href = "/sales_person";
      }, 2000);
    }else{
      Swal.fire({
      imageUrl: './img/error.jpg',
      imageHeight: 250,
      title: 'Oops Sorry!',
      text: 'Please double check the required fields',
      showConfirmButton: false,
      timer: 1500
    })
    }
}




$('.delete').on('click', function(e){
    Swal.fire({
        title: 'Are you sure?',
        text: "This Sales Person Data will be Deleted",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed to cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id          = $(this).attr('id');
            simPost({id:id}, 'POST', '/delete-sales-person', deleteSalesPersonData); 
        }
    })
    e.preventDefault();
    return false;
});


function deleteSalesPersonData(x) {
    if(x == true){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Sales Person Data Deleted!',
            showConfirmButton: false,
            timer: 1500
        });

        window.setInterval(function(){
            location.href = '/sales_person';
        }, 1200);
    }
}