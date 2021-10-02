@extends('admin.app')

@section('content')

<div id="countmainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewCountBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            <table id="" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">COUNT TITLE</th>
                        <th class="th-sm font-weight-bold">COUNT NO</th>
                        <th class="th-sm font-weight-bold">Edit</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="count_table">
  
                </tbody>
            </table>
  
        </div>
    </div>
  </div>
  
  <!-- Loding animation  -->
  <div id="countloderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>
  
  
  <!-- Something went wrong  -->
  <div id="countwrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>
  

                                       <!-- Delete Modal -->

<div class="modal fade" id="countdeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="countDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="countDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>
  
  

                                    <!-- Update Modal -->

<div class="modal fade" id="countUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
          <h5 id="countUpdateId" class="mt-4 "> </h5>
          <div id="countEditForm" class="d-none w-100">
          <input id="countUpdateTitleID" type="text" class="form-control mb-4" placeholder="Count Title">
          <input id="updateCountNoID" type="text" class="form-control mb-4" placeholder="Count No">
         
          </div>

          <img id="countEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
          <h5 id="countEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="countUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>



                                    <!-- ADD Services Modal -->

<div class="modal fade" id="countAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          <div id="countAddForm" class=" w-100">
          <h6 class="mb-4">Add New Services</h6>  
          <input id="countTitleAddID" type="text" class="form-control mb-4" placeholder="Count Title">
          <input id="countNoAddID" type="text" class="form-control mb-4" placeholder="Count No">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button  id="countAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('script')
<script type="text/javascript">
getCountData();

//                           Count load data 

function getCountData() {
    axios.get('/getCountData')
        .then(function(response) {
            if (response.status == 200) {
                $('#countmainDiv').removeClass('d-none');
                $('#countloderDiv').addClass('d-none');
                $('#count_table').empty();
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].title + "</td>" +
                        "<td>" + jsonData[i].count_no + "</td>" +
                        "<td><a class='countUpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='countDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#count_table');
                });

                //                     Count Delete Btn modal

                $('.countDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#countDeleteId').html(id);
                    $('#countdeleteModal').modal('show');
                })

                //                     Count update Btn modal
                $('.countUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#countUpdateId').html(id);
                    detailsCountData(id);
                    $('#countUpdateModal').modal('show');
                })
            
            } else {
                $('#countloderDiv').addClass('d-none');
                $('#countwrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#countloderDiv').addClass('d-none');
            $('#countwrongDiv').removeClass('d-none');
        });
}


//                       Count Modal Delete Confrom btn  

$('#countDeleteConfromBtn').click(function() {
    let id = $('#countDeleteId').html();
    deleteCountData(id);

})

//                           Count  Delete  data 

function deleteCountData(deleteID) {
    $('#countDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteCountData', {
            id: deleteID
        })
        .then(function(response) {
            $('#countDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#countdeleteModal').modal('hide');
                toastr.success('Delete Success');
                getCountData();
            } else {
                $('#countdeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getCountData();
            }

        })
        .catch(function(error) {
            $('#countdeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}

//                          Re fillup Count Data

function detailsCountData(detailsID) {
    axios.post('/detailsCountData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#countEditLoader').addClass('d-none');
                $('#countEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#countUpdateTitleID').val(jsonData[0].title);
                $('#updateCountNoID').val(jsonData[0].count_no);
            } else {
                $('#countEditLoader').addClass('d-none');
                $('#countEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#countEditLoader').addClass('d-none');
            $('#countEditWrong').removeClass('d-none');
        });

}



//                       Count Modal Update Confrom btn  

$('#countUpdateConfirmBtn').click(function() {
    var id = $('#countUpdateId').html();
    var title = $('#countUpdateTitleID').val();
    var count = $('#updateCountNoID').val();
    updateCountData(id,title,count);

})


//                        Update Count Data

function updateCountData(updateId, title, count) {
    if (title.length == 0) {
        toastr.error('Title Requred !');
    } else if (count.length == 0) {
        toastr.error('Count No Requred !');
    } else {
        $('#countUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateCountData', {
                id: updateId,
                title: title,
                count_no: count
            })
            .then(function(response) {
                $('#countUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#countUpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getCountData();
                } else {
                    $('#countUpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getCountData();
                }
            })
            .catch(function(error) {
                $('#countUpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}

//                   ADD New Btn Click

$('#addNewCountBtnId').click(function() {
    $('#countAddModal').modal('show');
})

//                   ADD Count data confrom btn

$('#countAddConfirmBtn').click(function() {
    var title = $('#countTitleAddID').val();
    var count = $('#countNoAddID').val();
    addCountData(title, count);

})

//                          Add  Count  data 

function addCountData(title, count) {
    if (title.length == 0) {
        toastr.error('Title Requred !');
    } else if (count.length == 0) {
        toastr.error('Count No Requred !');
    } else {
        $('#countAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addCountData', {
            title: title,
            count_no: count
            })
            .then(function(response) {
                $('#countAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#countAddModal').modal('hide');
                    toastr.success('Insert Success');
                    getCountData();
                } else {
                    $('#countAddModal').modal('hide');
                    toastr.error('Insert Failed');
                    getCountData();
                }
            })
            .catch(function(error) {
                $('#countAddModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}


</script>
@endsection