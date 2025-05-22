$(function() {
    $('#e39gh5D3kt').text('[EXAM] Employee');
    genericLoad();
});

function genericLoad() {
    $('#createAccountForm')[0].reset();
    var filter = '';
    simPost(
        {filter:filter}, 
        'POST', 
        '/show-users', 
        showUsers
    );
    simPost(
        null,
        'GET', 
        '/preload-users', 
        preloadUsers
    );
}

function preloadUsers(x) {
    console.log(x);
      var active = x[0]?.number ?? '0';
    var inactive = x[1]?.number ?? '0';
    console.log(active,inactive);
    $('.counterActive').text(active);
    $('.counterInactive').text(inactive);
}

function showUsers(x) {
    console.log(x);
    $('tbody[t-id="userTableBody"]').html('');
    var ca = 1;
    $.each(x, function (key, value) {
        var counter             = ca++;
      
        $('tbody[t-id="userTableBody"]').append(''+
            '<tr class="text-center" id="rowPA_'+value.id+'">'+
                '<td scope="row">'+counter+'</td>'+
                '<td scope="row">'+value.fullname+'</td>'+
                '<td scope="row">'+value.address+'</td>'+
                '<td scope="row">'+value.birthdate+'</td>'+
                '<td scope="row">'+value.age+'</td>'+
                '<td scope="row">'+value.gender+'</td>'+
                '<td scope="row">'+value.civilstat+'</td>'+
                '<td scope="row">'+value.contactnum +'</td>'+
                '<td scope="row">'+value.salary+'</td>'+
                // '<td scope="row">'+value.isactive+'</td>'+
                // '<td scope="row" id="accountStatus_'+value.id+'"></td>'+
                '<td>'+(value.isactive == 1 ? 'Actvie' : 'InActive' )+'</td>'+

                '<td scope="row">'+
                    '<a class="btn btn-default updateUser" u-id="'+value.id+'" data-toggle="modal" data-target="#updateModal">'+
                        '<i class="fa fa-pen fa-sm text-secondary"></i>'+
                    '</a>'+
                    
                '</td>'+
                '<td>'+
                '<a scope="row" id="accountStatus_'+value.id+'" >'+
                    '</a>'+    
                '</td>'+
            '</tr>'
        );

        if(value.isactive == '1' || value.isactive == '0'){
            var color   = "danger";
            var icon    = "times";
            var title   = "Delete?";
            var status  = "0";
            var thumb   = 'sold';
       }
        $('#accountStatus_'+value.id).append(''+
            '<a class="btn btn-sm '+thumb+'-thumb deleteEmployee" u-id="'+value.id+'" data-id="'+status+'" title="'+title+'">'+
                '<i class="fa fa-'+icon+' text-'+color+'"></i>'+
            '</a>'
        )
    });

    $(".updateUser").on('click', function()
    {
        var userId = $(this).attr('u-id');
        simPost(
        {
            userId:userId,
        }, 
        'POST', 
        '/fetch-user', fetchUser);
    });
    $(".deleteEmployee").on('click', function(e)
    {
        var userId = $(this).attr('u-id');
        var dataId = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This Employee will be Deleted",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed to Delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                simPost(
                {
                    userId:userId,
                    dataId:dataId,
                }, 
                'POST', 
                '/delete-employee', updateUsers);
            }
        })
        e.preventDefault();
        return false;
    });
}
function fetchUser(x) {
    console.log(x);
    $('#updateAccountForm')[0].reset();
    $.each(x, function (key, value) {
        $('#updateAccountForm').attr('u-id', value.id);
        $('#u_fullname').val(value.fullname);
        $('#u_age').val(value.age);
        $('#u_address').val(value.address);
        $('#u_contact_number').val(value.contactnum);
    
        $('#u_birthdate').val(value.birthdate);
        $('#u_civil_status').val(value.civilstat);
        $('#u_salary').val(value.salary);
  
        $('input[name="u_status"][value="' + value.isactive + '"]').prop('checked', true);
        $('input[name="u_gender"][value="' + value.gender + '"]').prop('checked', true);

    });
}
$('#updateAccountForm').on('submit', function(e){
    $('#updateModal').modal('toggle');
    Swal.fire({
        title: 'Are you sure?',
        text: "This Account details will be updated",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed to update!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id          = $('#updateAccountForm').attr('u-id');
            var post_data   = $('#updateAccountForm').serialize()  + '&id=' + id;
            simPost(post_data, 'POST', '/update-user', updateUsers); 
        }else{
            $('#updateModal').modal('toggle');
        }
    })
    e.preventDefault();
    return false;
});

function updateUsers(x) {
    genericLoad();
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Employee Updated!',
        showConfirmButton: false,
        timer: 1500
    });
}

$('#createAccountForm').on('submit', function(e){
    $('#createModal').modal('toggle');
    Swal.fire({
        title: 'Are you sure?',
        text: "This Employee details will be created",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed to create!'
    }).then((result) => {
        if (result.isConfirmed) {
            var post_data = $('#createAccountForm').serialize();
            // console.log(post_data);
            simPost(post_data, 'POST', '/create-user', createUsers); 
        }else{
            $('#createModal').modal('toggle');
        }
    })
    e.preventDefault();
    return false;
});

function createUsers(x) {
    if(x == true){
        genericLoad();
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Employee Created!',
            showConfirmButton: false,
            timer: 1500
        });
    }
}