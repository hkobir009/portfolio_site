@extends('admin.app')

@section('content')

<div id="parsonalMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-3">
          <button id="addNewParsonalBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            <table id="" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">NAME</th>
                        <th class="th-sm font-weight-bold">DOB</th>
                        <th class="th-sm font-weight-bold">NATIONALITY</th>
                        <th class="th-sm font-weight-bold">LOCATION</th>
                        <th class="th-sm font-weight-bold">PHONE</th>
                        <th class="th-sm font-weight-bold">EMAIL</th>
                        <th class="th-sm font-weight-bold">DESCRIPTION</th>
                        <th class="th-sm font-weight-bold">Edit</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="parsonal_table">
  
                </tbody>
            </table>
  
        </div>
    </div>
  </div>
  
  <!-- Loding animation  -->
  <div id="parsonalLoderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>
  
  
  <!-- Something went wrong  -->
  <div id="parsonalWrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>
                                       <!-- Delete Modal -->

<div class="modal fade" id="parsonaldeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="parsonalDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="parsonalDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>

                                    <!-- Update Modal -->

<div class="modal fade" id="parsonalUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">
          <h5 id="parsonalUpdateId" class="mt-4 d-none"> </h5>
          <div id="parsonalEditForm" class="d-none w-100">
          <input id="parsonalUpdateNameID" type="text" class="form-control mb-4" placeholder="Name">
          <input id="parsonalUpdateDobID" type="text" class="form-control mb-4" placeholder="Date of Birth">
          <input id="parsonalUpdateNationID" type="text" class="form-control mb-4" placeholder="Nationality">
          <input id="parsonalUpdateLocID" type="text" class="form-control mb-4" placeholder="Location">
          <input id="parsonalUpdatePhoneID" type="text" class="form-control mb-4" placeholder="Phone">
          <input id="parsonalUpdateEmailID" type="text" class="form-control mb-4" placeholder="Email">
          <input id="parsonalUpdateDesID" type="text" class="form-control mb-4" placeholder="Description">
          </div>
          <img id="parsonalEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
          <h5 id="parsonalEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="parsonalUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>

                                    <!-- ADD Services Modal -->

<div class="modal fade" id="parsonalAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
          <div id="parsonalAddForm" class=" w-100">
          <h6 class="mb-4">Add New Services</h6>  
          <input id="parsonalAddNameID" type="text" class="form-control mb-4" placeholder="Name">
          <input id="parsonalAddDobID" type="text" class="form-control mb-4" placeholder="Date of Birth">
          <input id="parsonalAddNationID" type="text" class="form-control mb-4" placeholder="Nationality">
          <input id="parsonalAddLocID" type="text" class="form-control mb-4" placeholder="Location">
          <input id="parsonalAddPhoneID" type="text" class="form-control mb-4" placeholder="Phone">
          <input id="parsonalAddEmailID" type="text" class="form-control mb-4" placeholder="Email">
          <input id="parsonalAddDesID" type="text" class="form-control mb-4" placeholder="Description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button  id="parsonalAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getParsonalData();

//                           Parsonal load data 

function getParsonalData() {
    axios.get('/getParsonalData')
        .then(function(response) {
            if (response.status == 200) {
                $('#parsonalMainDiv').removeClass('d-none');
                $('#parsonalLoderDiv').addClass('d-none');
                $('#parsonal_table').empty();
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].name + "</td>" +
                        "<td>" + jsonData[i].birth_date + "</td>" +
                        "<td>" + jsonData[i].nationality + "</td>" +
                        "<td>" + jsonData[i].location + "</td>" +
                        "<td>" + jsonData[i].phone + "</td>" +
                        "<td>" + jsonData[i].email + "</td>" +
                        "<td>" + jsonData[i].myself_des + "</td>" +
                        "<td><a class='parsonalUpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='parsonalDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#parsonal_table');
                });

                //                     Parsonal Delete Btn modal

                $('.parsonalDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#parsonalDeleteId').html(id);
                    $('#parsonaldeleteModal').modal('show');
                })

                //                     Parsonal update Btn modal
                $('.parsonalUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#parsonalUpdateId').html(id);
                    detailsParsonalData(id);
                    $('#parsonalUpdateModal').modal('show');
                })
            
            } else {
                $('#parsonalLoderDiv').addClass('d-none');
                $('#parsonalWrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#parsonalLoderDiv').addClass('d-none');
            $('#parsonalWrongDiv').removeClass('d-none');
        });
}


//                       Parsonal Modal Delete Confrom btn  

$('#parsonalDeleteConfromBtn').click(function() {
    let id = $('#parsonalDeleteId').html();
    deleteParsonalData(id);

})

//                           Parsonal  Delete  data 

function deleteParsonalData(deleteID) {
    $('#parsonalDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteParsonalData', {
            id: deleteID
        })
        .then(function(response) {
            $('#parsonalDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#parsonaldeleteModal').modal('hide');
                toastr.success('Delete Success');
                getParsonalData();
            } else {
                $('#parsonaldeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getParsonalData();
            }
        })
        .catch(function(error) {
            $('#parsonaldeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}

//                          Re fillup Parsonal Data

function detailsParsonalData(detailsID) {
    axios.post('/detailsParsonalData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#parsonalEditLoader').addClass('d-none');
                $('#parsonalEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#parsonalUpdateNameID').val(jsonData[0].name);
                $('#parsonalUpdateDobID').val(jsonData[0].birth_date);
                $('#parsonalUpdateNationID').val(jsonData[0].nationality);
                $('#parsonalUpdateLocID').val(jsonData[0].location);
                $('#parsonalUpdatePhoneID').val(jsonData[0].phone);
                $('#parsonalUpdateEmailID').val(jsonData[0].email);
                $('#parsonalUpdateDesID').val(jsonData[0].myself_des);
            } else {
                $('#parsonalEditLoader').addClass('d-none');
                $('#parsonalEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#parsonalEditLoader').addClass('d-none');
            $('#parsonalEditWrong').removeClass('d-none');
        });

}



//                       Parsonal Modal Update Confrom btn  

$('#parsonalUpdateConfirmBtn').click(function() {
    var id = $('#parsonalUpdateId').html();
    var name = $('#parsonalUpdateNameID').val();
    var dob = $('#parsonalUpdateDobID').val();
    var nation = $('#parsonalUpdateNationID').val();
    var loc = $('#parsonalUpdateLocID').val();
    var phone = $('#parsonalUpdatePhoneID').val();
    var email = $('#parsonalUpdateEmailID').val();
    var des = $('#parsonalUpdateDesID').val();
    updateParsonalData(id,name,dob,nation,loc,phone,email,des);

})


//                        Update Parsonal Data

function updateParsonalData(updateId, name,dob,nation,loc,phone,email,des) {
    if (name.length == 0) {
        toastr.error('Name Requred !');
    } else if (dob.length == 0) {
        toastr.error('DOB Requred !');
    } else if (nation.length == 0) {
        toastr.error('National Requred !');
    } else if (loc.length == 0) {
        toastr.error('Location Requred !');
    } else if (phone.length == 0) {
        toastr.error('Phone Requred !');
    }else if (email.length == 0) {
        toastr.error('Email Requred !');
    }else if (des.length == 0) {
        toastr.error('Description Requred !');
    } else {
        $('#parsonalUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateParsonalData', {
            id:updateId,
            name:name,
            birth_date:dob,
            nationality:nation,
            location:loc,
            phone:phone,
            email:email,
            myself_des:des
            })
            .then(function(response) {
                $('#parsonalUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#parsonalUpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getParsonalData();
                } else {
                    $('#parsonalUpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getParsonalData();
                }
            })
            .catch(function(error) {
                $('#parsonalUpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}

//                   ADD New Btn Click

$('#addNewParsonalBtnId').click(function() {
    $('#parsonalAddModal').modal('show');
})

//                   ADD Parsonal data confrom btn

$('#parsonalAddConfirmBtn').click(function() {
    var name = $('#parsonalAddNameID').val();
    var dob = $('#parsonalAddDobID').val();
    var nation = $('#parsonalAddNationID').val();
    var loc = $('#parsonalAddLocID').val();
    var phone = $('#parsonalAddPhoneID').val();
    var email = $('#parsonalAddEmailID').val();
    var des = $('#parsonalAddDesID').val();
    addParsonalData(name,dob,nation,loc,phone,email,des);

})

//                          Add  Parsonal  data 

function addParsonalData( name,dob,nation,loc,phone,email,des) {
    if (name.length == 0) {
        toastr.error('Name Requred !');
    } else if (dob.length == 0) {
        toastr.error('DOB Requred !');
    } else if (nation.length == 0) {
        toastr.error('National Requred !');
    } else if (loc.length == 0) {
        toastr.error('Location Requred !');
    } else if (phone.length == 0) {
        toastr.error('Phone Requred !');
    }else if (email.length == 0) {
        toastr.error('Email Requred !');
    }else if (des.length == 0) {
        toastr.error('Description Requred !');
    }else {
        $('#parsonalAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addParsonalData', {
            name:name,
            birth_date:dob,
            nationality:nation,
            location:loc,
            phone:phone,
            email:email,
            myself_des:des
            })
            .then(function(response) {
                $('#parsonalAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#parsonalAddModal').modal('hide');
                    toastr.success('Insert Success');
                    getParsonalData();
                } else {
                    $('#parsonalAddModal').modal('hide');
                    toastr.error('Insert Failed');
                    getParsonalData();
                }
            })
            .catch(function(error) {
                $('#parsonalAddModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}

</script>
@endsection