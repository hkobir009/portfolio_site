@extends('admin.app')

@section('content')

<div id="servicesmainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
          <button id="addNewServicesBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            <table id="" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">SERVICES TITLE</th>
                        <th class="th-sm font-weight-bold">SERVICES ICON</th>
                        <th class="th-sm font-weight-bold">SERVICES DESCRIPTION</th>
                        <th class="th-sm font-weight-bold">Edit</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="services_table">
  
                </tbody>
            </table>
  
        </div>
    </div>
  </div>
  
  <!-- Loding animation  -->
  <div id="servicesloderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>
  
  
  <!-- Something went wrong  -->
  <div id="serviceswrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>
  

                                       <!-- Delete Modal -->

<div class="modal fade" id="servicesdeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="servicesDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="servicesDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>
  
  

                                    <!-- Update Modal -->

<div class="modal fade" id="servicesUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
          <h5 id="servicesUpdateId" class="mt-4 "> </h5>
          <div id="servicesEditForm" class="d-none w-100">
          <input id="servicesUpdateTitleID" type="text" class="form-control mb-4" placeholder="Services Title">
          <input id="servicesUpdateIconID" type="text" class="form-control mb-4" placeholder="Services Icon">
          <input id="servicesUpdateDesID" type="text" class="form-control mb-4" placeholder="Services Description">
          </div>

          <img id="servicesEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
          <h5 id="servicesEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="servicesUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>



                                    <!-- ADD Services Modal -->

<div class="modal fade" id="servicesAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          <div id="servicesAddForm" class=" w-100">
          <h6 class="mb-4">Add New Services</h6>  
          <input id="servicesTitleAddID" type="text" class="form-control mb-4" placeholder="Services Title">
          <input id="servicesIconAddID" type="text" class="form-control mb-4" placeholder="Services Icon">
          <input id="servicesDesAddID" type="text" class="form-control mb-4" placeholder="Services Description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button  id="servicesAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
getservicesData()


//                           Services load data 
function getservicesData() {
    axios.get('/getservicesData')
        .then(function(response) {
            if (response.status == 200) {
                $('#servicesmainDiv').removeClass('d-none');
                $('#servicesloderDiv').addClass('d-none');

                $('#services_table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].title + "</td>" +
                        "<td>" + jsonData[i].icon + "</td>" +
                        "<td>" + jsonData[i].des + "</td>" +
                        "<td><a class='servicesUpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='servicesDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#services_table');
                });

                //                     Services Delete Btn modal

                $('.servicesDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#servicesDeleteId').html(id);
                    $('#servicesdeleteModal').modal('show');
                })

                //                     Services update Btn modal
                $('.servicesUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#servicesUpdateId').html(id);
                    detailsServicesData(id);
                    $('#servicesUpdateModal').modal('show');
                })
            
            } else {
                $('#servicesloderDiv').addClass('d-none');
                $('#serviceswrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#servicesloderDiv').addClass('d-none');
            $('#serviceswrongDiv').removeClass('d-none');
        });
}
//                       Services Modal Delete Confrom btn  

$('#servicesDeleteConfromBtn').click(function() {
    let id = $('#servicesDeleteId').html();
    deleteServicesData(id);

})

//                           Services  Delete  data 

function deleteServicesData(deleteID) {
    $('#servicesDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteServicesData', {
            id: deleteID
        })
        .then(function(response) {
            $('#servicesDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#servicesdeleteModal').modal('hide');
                toastr.success('Delete Success');
                getservicesData();
            } else {
                $('#servicesdeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getservicesData();
            }

        })
        .catch(function(error) {
            $('#servicesdeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}

//                          Re fillup Services Data

function detailsServicesData(detailsID) {
    axios.post('/detailsServicesData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#servicesEditLoader').addClass('d-none');
                $('#servicesEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#servicesUpdateTitleID').val(jsonData[0].title);
                $('#servicesUpdateIconID').val(jsonData[0].icon);
                $('#servicesUpdateDesID').val(jsonData[0].des);
            } else {
                $('#servicesEditLoader').addClass('d-none');
                $('#servicesEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#servicesEditLoader').addClass('d-none');
            $('#servicesEditWrong').removeClass('d-none');
        });

}



//                       Services Modal Update Confrom btn  

$('#servicesUpdateConfirmBtn').click(function() {
    var id = $('#servicesUpdateId').html();
    var title = $('#servicesUpdateTitleID').val();
    var icon = $('#servicesUpdateIconID').val();
    var des = $('#servicesUpdateDesID').val();
    updateServicesData(id,title,icon,des);

})


//                        Update Services Data

function updateServicesData(updateId, upTitle, upicon, updes) {
    if (upTitle.length == 0) {
        toastr.error('Title Requred !');
    } else if (upicon.length == 0) {
        toastr.error('Icon Requred !');
    } else if (updes.length == 0) {
        toastr.error('Description Requred !');
    } else {
        $('#servicesUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateServicesData', {
                id: updateId,
                title: upTitle,
                icon: upicon,
                des: updes
            })
            .then(function(response) {
                $('#servicesUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#servicesUpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getservicesData();
                } else {
                    $('#servicesUpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getservicesData();
                }
            })
            .catch(function(error) {
                $('#servicesUpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}



$('#addNewServicesBtnId').click(function() {
    $('#servicesAddModal').modal('show');
})

//                   ADD Services data confrom btn

$('#servicesAddConfirmBtn').click(function() {
    var title = $('#servicesTitleAddID').val();
    var icon = $('#servicesIconAddID').val();
    var des = $('#servicesDesAddID').val();
    addServicesData(title, icon, des);

})

//                          Add  Services  data 

function addServicesData(addtitle, addicon, adddes) {
    if (addtitle.length == 0) {
        toastr.error('Title Requred !');
    } else if (addicon.length == 0) {
        toastr.error('Icon Requred !');
    } else if (adddes.length == 0) {
        toastr.error('Description Requred !');
    } else {
        $('#servicesAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addServicesData', {
                title: addtitle,
                icon: addicon,
                des: adddes
            })
            .then(function(response) {
                $('#servicesAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#servicesAddModal').modal('hide');
                    toastr.success('Insert Success');
                    getservicesData();
                } else {
                    $('#servicesAddModal').modal('hide');
                    toastr.error('Insert Failed');
                    getservicesData();
                }
            })
            .catch(function(error) {
                $('#servicesAddModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}



</script>

@endsection