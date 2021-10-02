//                           load data 


function getContactData() {
    axios.get('/getContactData')
        .then(function(response) {
            if (response.status == 200) {
                $('#contactMainDiv').removeClass('d-none');
                $('#contactLoderDiv').addClass('d-none');
                $('#contact_table').empty();
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].contact_name + "</td>" +
                        "<td>" + jsonData[i].contact_email + "</td>" +
                        "<td>" + jsonData[i].contact_phone + "</td>" +
                        "<td>" + jsonData[i].contact_website + "</td>" +
                        "<td>" + jsonData[i].contact_massege + "</td>" +
                        "<td>" + jsonData[i].created_date + "</td>" +
                        "<td><a class='contactDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#contact_table');
                });

                //                    Delete Btn modal

                $('.contactDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#contactDeleteId').html(id);
                    $('#contactDeleteModal').modal('show');
                })
            
            } else {
                $('#contactLoderDiv').addClass('d-none');
                $('#contactWrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#contactLoderDiv').addClass('d-none');
            $('#contactWrongDiv').removeClass('d-none');
        });
}


//                        Modal Delete Confrom btn  

$('#contactDeleteConfromBtn').click(function() {
    let id = $('#contactDeleteId').html();
    deleteContactData(id);

})

//                             Delete  data 

function deleteContactData(deleteID) {
    $('#contactDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteContactData', {
            id: deleteID
        })
        .then(function(response) {
            $('#contactDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#contactDeleteModal').modal('hide');
                toastr.success('Delete Success');
                getContactData();
            } else {
                $('#contactDeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getContactData();
            }
        })
        .catch(function(error) {
            $('#contactDeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}
