@extends('admin.app')

@section('content')

<div id="chooseMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
          <button id="addNewChooseBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            <table id="" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">CHOOSE ICON</th>
                        <th class="th-sm font-weight-bold">CHOOSE DESCRIPTION</th>
                        <th class="th-sm font-weight-bold">Edit</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="choose_table">

                </tbody>
            </table>
        </div>
    </div>
  </div>

  <!-- Loding animation  -->
  <div id="chooseloderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>


  <!-- Something went wrong  -->
  <div id="chooseWrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>


                                       <!-- Delete Modal -->

<div class="modal fade" id="chooseDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="chooseDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="chooseDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>



                                    <!-- Update Modal -->

<div class="modal fade" id="chooseUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
          <h5 id="chooseUpdateId" class="mt-4 "> </h5>
          <div id="chooseEditForm" class="d-none w-100">
          <input id="chooseUpdateIconID" type="text" class="form-control mb-4" placeholder="Services Icon">
          <input id="chooseUpdateDesID" type="text" class="form-control mb-4" placeholder="Services Description">
          </div>

          <img id="chooseEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
          <h5 id="chooseEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="chooseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>



                                    <!-- ADD Services Modal -->

<div class="modal fade" id="chooseAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          <div id="chooseAddForm" class=" w-100">
          <h6 class="mb-4">Add New Services</h6>
          <input id="chooseIconAddID" type="text" class="form-control mb-4" placeholder="Services Icon">
          <input id="chooseDesAddID" type="text" class="form-control mb-4" placeholder="Services Description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button  id="chooseAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
getChooseData();

//                           Choose load data
function getChooseData() {
    axios.get('/getChooseData')
        .then(function(response) {
            if (response.status == 200) {
                $('#chooseMainDiv').removeClass('d-none');
                $('#chooseloderDiv').addClass('d-none');
                $('#choose_table').empty();
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].icon + "</td>" +
                        "<td>" + jsonData[i].des + "</td>" +
                        "<td><a class='chooseUpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='chooseDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#choose_table');
                });

                //                     Choose Delete Btn modal

                $('.chooseDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#chooseDeleteId').html(id);
                    $('#chooseDeleteModal').modal('show');
                })

                //                     Choose update Btn modal
                $('.chooseUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#chooseUpdateId').html(id);
                    detailsChooseData(id);
                    $('#chooseUpdateModal').modal('show');
                })

            } else {
                $('#chooseloderDiv').addClass('d-none');
                $('#chooseWrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#chooseloderDiv').addClass('d-none');
            $('#chooseWrongDiv').removeClass('d-none');
        });
}


//                       Services Modal Delete Confrom btn

$('#chooseDeleteConfromBtn').click(function() {
    let id = $('#chooseDeleteId').html();
    deleteChooseData(id);

})

//                           Choose  Delete  data

function deleteChooseData(deleteID) {
    $('#chooseDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteChooseData', {
            id: deleteID
        })
        .then(function(response) {
            $('#chooseDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#chooseDeleteModal').modal('hide');
                toastr.success('Delete Success');
                getChooseData();
            } else {
                $('#chooseDeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getChooseData();
            }

        })
        .catch(function(error) {
            $('#chooseDeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}

//                          Re fillup Choose Data

function detailsChooseData(detailsID) {
    axios.post('/detailsChooseData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#chooseEditLoader').addClass('d-none');
                $('#chooseEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#chooseUpdateIconID').val(jsonData[0].icon);
                $('#chooseUpdateDesID').val(jsonData[0].des);
            } else {
                $('#chooseEditLoader').addClass('d-none');
                $('#chooseEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#chooseEditLoader').addClass('d-none');
            $('#chooseEditWrong').removeClass('d-none');
        });

}



//                       Choose Modal Update Confrom btn

$('#chooseUpdateConfirmBtn').click(function() {
    var id = $('#chooseUpdateId').html();
    var icon = $('#chooseUpdateIconID').val();
    var des = $('#chooseUpdateDesID').val();
    updateChooseData(id,icon,des);

})


//                        Update Choose Data

function updateChooseData(updateId, upicon, updes) {
    if (upicon.length == 0) {
        toastr.error('Icon Requred !');
    } else if (updes.length == 0) {
        toastr.error('Description Requred !');
    } else {
        $('#chooseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateChooseData', {
                id: updateId,
                icon: upicon,
                des: updes
            })
            .then(function(response) {
                $('#chooseUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#chooseUpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getChooseData();
                } else {
                    $('#chooseUpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getChooseData();
                }
            })
            .catch(function(error) {
                $('#chooseUpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}

//                   ADD New Btn Click

$('#addNewChooseBtnId').click(function() {
    $('#chooseAddModal').modal('show');
})

//                   ADD Choose data confrom btn

$('#chooseAddConfirmBtn').click(function() {
    var icon = $('#chooseIconAddID').val();
    var des = $('#chooseDesAddID').val();
    addChooseData(icon, des);

})

//                          Add  Choose  data

function addChooseData(addicon, adddes) {
    if (addicon.length == 0) {
        toastr.error('Icon Requred !');
    } else if (adddes.length == 0) {
        toastr.error('Description Requred !');
    } else {
        $('#chooseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addChooseData', {
                icon: addicon,
                des: adddes
            })
            .then(function(response) {
                $('#chooseAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#chooseAddModal').modal('hide');
                    toastr.success('Insert Success');
                    getChooseData();
                } else {
                    $('#chooseAddModal').modal('hide');
                    toastr.error('Insert Failed');
                    getChooseData();
                }
            })
            .catch(function(error) {
                $('#chooseAddModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}



</script>

@endsection
