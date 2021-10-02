@extends('admin.app')

@section('content')
<div id="mainDiv" class="container d-none">
  <div class="row">
      <div class="col-md-12 p-5">
        <button id="addNewskillBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
          <table id="" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th class="th-sm font-weight-bold">TITLE</th>
                      <th class="th-sm font-weight-bold">PARCENTANCE</th>
                      <th class="th-sm font-weight-bold">PROGRESS</th>
                      <th class="th-sm font-weight-bold">Edit</th>
                      <th class="th-sm font-weight-bold">Delete</th>
                  </tr>
              </thead>
              <tbody id="skill_table">

              </tbody>
          </table>

      </div>
  </div>
</div>

<!-- Loding animation  -->
<div id="loderDiv" class="container">
  <div class="row">
      <div class="col-md-12 text-center mt-5 p-5">
          <img src="{{asset('img/loder-1.svg')}}">
      </div>
  </div>
</div>


<!-- Something went wrong  -->
<div id="wrongDiv" class="container d-none">
  <div class="row">
      <div class="col-md-12 text-center mt-5 p-5">
          <h3>Something went wrong</h3>
      </div>
  </div>
</div>

                                     <!-- Delete Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body text-center">Do You Want To Delete</div>
          <h4 id="skillDeleteId" class="modal-body text-center"></h4>
          <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
              <button id="skilldeleteConfrombtn" type="button" class="btn btn-sm btn-danger">Yes</button>
          </div>
      </div>
  </div>
</div>



                                    <!-- Update Modal -->

<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
          <h5 id="skillUpdateId" class="mt-4 "> </h5>
          <div id="skillEditForm" class="d-none w-100">
          <input id="skillUpdateTitleID" type="text" class="form-control mb-4" placeholder="Skill Title">
          <input id="skillUpdateparcenID" type="text" class="form-control mb-4" placeholder="Skill Parcentance">
          <input id="skillUpdateprogressID" type="text" class="form-control mb-4" placeholder="Skill Progress">
          </div>

          <img id="skillEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
          <h5 id="skillEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="skillUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>

                                    <!-- ADD Skill Modal -->

<div class="modal fade" id="skilladdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          

          <div id="skillAddForm" class=" w-100">
          <h6 class="mb-4">Add New Skills</h6>  
          <input id="skilltitleAddID" type="text" class="form-control mb-4" placeholder="Skill Title">
          <input id="skillparAddID" type="text" class="form-control mb-4" placeholder="Skill Parcentance">
          <input id="skillproAddID" type="text" class="form-control mb-4" placeholder="Skill Progress">
          </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button  id="skillAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

 

@endsection

@section('script')

<script type="text/javascript">
      getSkillData();

//                           Skill  select data 
function getSkillData() {
    axios.get('/getSkillData')
        .then(function(response) {
            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loderDiv').addClass('d-none');

                $('#skill_table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].title + "</td>" +
                        "<td>" + jsonData[i].parcentance + "</td>" +
                        "<td>" + jsonData[i].progress + "</td>" +
                        "<td><a class='UpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='deleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#skill_table');
                });

                //                     Skill Delete Btn modal

                $('.deleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#skillDeleteId').html(id);
                    $('#deleteModal').modal('show');
                })

                //                     Skill update Btn modal

                $('.UpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#skillUpdateId').html(id);
                    detailsSkillData(id);
                    $('#UpdateModal').modal('show');
                })

            } else {
                $('#loderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#loderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });
}
//                       Skill Modal Delete Confrom btn  

$('#skilldeleteConfrombtn').click(function() {
    let id = $('#skillDeleteId').html();
    deleteSkillData(id);

})

//                           Skill  Delete  data 

function deleteSkillData(deleteID) {
    $('#skilldeleteConfrombtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteSkillData', {
            id: deleteID
        })
        .then(function(response) {
            $('#skilldeleteConfrombtn').html("YES")
            if (response.data == 1) {
                $('#deleteModal').modal('hide');
                toastr.success('Delete Success');
                getSkillData();
            } else {
                $('#deleteModal').modal('hide');
                toastr.error('Delete Failed');
                getSkillData();
            }

        })
        .catch(function(error) {
            $('#deleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}


//                          Re fillup Skill Data

function detailsSkillData(detailsID) {
    axios.post('/detailsSkillData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#skillEditLoader').addClass('d-none');
                $('#skillEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#skillUpdateTitleID').val(jsonData[0].title);
                $('#skillUpdateparcenID').val(jsonData[0].parcentance);
                $('#skillUpdateprogressID').val(jsonData[0].progress);
            } else {
                $('#skillEditLoader').addClass('d-none');
                $('#skillEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#skillEditLoader').addClass('d-none');
            $('#skillEditWrong').removeClass('d-none');
        });

}

//                       Skill Modal Update Confrom btn  

$('#skillUpdateConfirmBtn').click(function() {
    var id = $('#skillUpdateId').html();
    var title = $('#skillUpdateTitleID').val();
    var parcentance = $('#skillUpdateparcenID').val();
    var progress = $('#skillUpdateprogressID').val();
    updateSkillData(id, title, parcentance, progress);

})


//                        Update Skill Data

function updateSkillData(updateId, upTitle, upParcen, upProgress) {
    if (upTitle.length == 0) {
        toastr.error('Title Requred !');
    } else if (upParcen.length == 0) {
        toastr.error('Parcentance Requred !');
    } else if (upProgress.length == 0) {
        toastr.error('Progress Requred !');
    } else {
        $('#skillUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateSkillData', {
                id: updateId,
                title: upTitle,
                parcentance: upParcen,
                progress: upProgress
            })
            .then(function(response) {
                $('#skillUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#UpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getSkillData();
                } else {
                    $('#UpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getSkillData();
                }
            })
            .catch(function(error) {
                $('#UpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}

$('#addNewskillBtnId').click(function() {
    $('#skilladdModal').modal('show');
})

//                   ADD skill data confrom btn

$('#skillAddConfirmBtn').click(function() {
    var title = $('#skilltitleAddID').val();
    var parcentance = $('#skillparAddID').val();
    var progress = $('#skillproAddID').val();
    addSkillData(title, parcentance, progress);

})

//                          Add  Skill  data 

function addSkillData(addtitle, addpar, addpro) {
    if (addtitle.length == 0) {
        toastr.error('Title Requred !');
    } else if (addpar.length == 0) {
        toastr.error('Parcentance Requred !');
    } else if (addpro.length == 0) {
        toastr.error('Progress Requred !');
    } else {
        $('#skillAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addSkillData', {
                title: addtitle,
                parcentance: addpar,
                progress: addpro
            })
            .then(function(response) {
                $('#skillAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#skilladdModal').modal('hide');
                    toastr.success('Insert Success');
                    getSkillData();
                } else {
                    $('#skilladdModal').modal('hide');
                    toastr.error('Insert Failed');
                    getSkillData();
                }
            })
            .catch(function(error) {
                $('#skilladdModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}

</script>

@endsection