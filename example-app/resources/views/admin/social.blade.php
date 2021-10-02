@extends('admin.app')

@section('content')

<div id="socialMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-3">
          <button id="addNewSocialBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            <table id="" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">Facebook</th>
                        <th class="th-sm font-weight-bold">Twitter</th>
                        <th class="th-sm font-weight-bold">Instagram</th>
                        <th class="th-sm font-weight-bold">Youtube</th>
                        <th class="th-sm font-weight-bold">Github</th>
                        <th class="th-sm font-weight-bold">Upwork</th>
                        <th class="th-sm font-weight-bold">Freelancer</th>
                        <th class="th-sm font-weight-bold">Fiverr</th>
                        <th class="th-sm font-weight-bold">PPH</th>
                        <th class="th-sm font-weight-bold">Edit</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="social_table">
  
                </tbody>
            </table>
  
        </div>
    </div>
  </div>
  
                               <!-- Loding animation  -->
  <div id="socialLoderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>
  
  
                                <!-- Something went wrong  -->
  <div id="socialWrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>
                                       <!-- Delete Modal -->

<div class="modal fade" id="socialDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="socialDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">No</button>
                <button id="socialDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>

                                    <!-- Update Modal -->


     <div class="modal fade bd-example-modal-lg" id="socialUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Update Modal</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body text-center">
                <h5 id="socialUpdateId" class="mt-4 "></h5>
                <form id="socialEditForm" class="d-none w-100">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="socialUpdateFbID" class="form-control" />
                                <label class="form-label" for="Facebook">Facebook Url</label>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="socialUpdateTwitID" class="form-control" />
                                <label class="form-label" for="Twitter">Twitter Url</label>
                              </div>
                          </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdateInsID" class="form-control" />
                            <label class="form-label" for="Instagram">Instagram Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdateYtID" class="form-control" />
                            <label class="form-label" for="Youtube">Youtube Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdateGitID" class="form-control" />
                            <label class="form-label" for="GitHub">GitHub Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdateUpID" class="form-control" />
                            <label class="form-label" for="Upwork">Upwork Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdateFreeID" class="form-control" />
                            <label class="form-label" for="Freelancer">Freelancer Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdateFiverrID" class="form-control" />
                            <label class="form-label" for="Fiverr">Fiverr Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialUpdatePphID" class="form-control" />
                            <label class="form-label" for="PPH">PPH Url</label>
                          </div>
                      </div>
                    </div>
                  </form>
                             <!-- modal loading animation  -->
                    <img id="socialEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
                    <h5 id="socialEditWrong" class="d-none">Something Went Wrong !</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button id="socialUpdateConfirmBtn" type="button" class="btn btn-primary">Update</button>
              </div>
          </div>
        </div>
      </div>

                                    <!-- ADD Modal -->


     <div class="modal fade bd-example-modal-lg" id="socialAddModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add New Services</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body text-center">
                <form id="socialAddForm" class="w-100">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="socialAddFbID" class="form-control" />
                                <label class="form-label" for="Facebook">Facebook Url</label>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="socialAddTwitID" class="form-control" />
                                <label class="form-label" for="Twitter">Twitter Url</label>
                              </div>
                          </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddInsID" class="form-control" />
                            <label class="form-label" for="Instagram">Instagram Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddYtID" class="form-control" />
                            <label class="form-label" for="Youtube">Youtube Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddGitID" class="form-control" />
                            <label class="form-label" for="GitHub">GitHub Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddUpID" class="form-control" />
                            <label class="form-label" for="Upwork">Upwork Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddFreeID" class="form-control" />
                            <label class="form-label" for="Freelancer">Freelancer Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddFiverrID" class="form-control" />
                            <label class="form-label" for="Fiverr">Fiverr Url</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="socialAddPphID" class="form-control" />
                            <label class="form-label" for="PPH">PPH Url</label>
                          </div>
                      </div>
                    </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                <button id="socialAddConfirmBtn" type="button" class="btn btn-primary">Save</button>
              </div>
          </div>
        </div>
      </div>


@endsection

@section('script')
<script type="text/javascript">
getSocialData();


//                           load data 

function getSocialData() {
    axios.get('/getSocialData')
        .then(function(response) {
            if (response.status == 200) {
                $('#socialMainDiv').removeClass('d-none');
                $('#socialLoderDiv').addClass('d-none');
                $('#social_table').empty();
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].facebook + "</td>" +
                        "<td>" + jsonData[i].twitter + "</td>" +
                        "<td>" + jsonData[i].instagram + "</td>" +
                        "<td>" + jsonData[i].youtube + "</td>" +
                        "<td>" + jsonData[i].git + "</td>" +
                        "<td>" + jsonData[i].upwork + "</td>" +
                        "<td>" + jsonData[i].freelancer + "</td>" +
                        "<td>" + jsonData[i].fiverr + "</td>" +
                        "<td>" + jsonData[i].pph + "</td>" +
                        "<td><a class='socialUpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='socialDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#social_table');
                });

                //                    Delete Btn modal

                $('.socialDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#socialDeleteId').html(id);
                    $('#socialDeleteModal').modal('show');
                })

                //                  update Btn modal

                $('.socialUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#socialUpdateId').html(id);
                    detailsSocialData(id);
                    $('#socialUpdateModal').modal('show');
                })
            
            } else {
                $('#socialLoderDiv').addClass('d-none');
                $('#socialWrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#socialLoderDiv').addClass('d-none');
            $('#socialWrongDiv').removeClass('d-none');
        });
}


//                        Modal Delete Confrom btn  

$('#socialDeleteConfromBtn').click(function() {
    let id = $('#socialDeleteId').html();
    deleteSocialData(id);

})

//                             Delete  data 

function deleteSocialData(deleteID) {
    $('#socialDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteSocialData', {
            id: deleteID
        })
        .then(function(response) {
            $('#socialDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#socialDeleteModal').modal('hide');
                toastr.success('Delete Success');
                getSocialData();
            } else {
                $('#socialDeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getSocialData();
            }
        })
        .catch(function(error) {
            $('#socialDeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}

//                          Re fillup  Data

function detailsSocialData(detailsID) {
    axios.post('/detailsSocialData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#socialEditLoader').addClass('d-none');
                $('#socialEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#socialUpdateFbID').val(jsonData[0].facebook);
                $('#socialUpdateTwitID').val(jsonData[0].twitter);
                $('#socialUpdateInsID').val(jsonData[0].instagram);
                $('#socialUpdateYtID').val(jsonData[0].youtube);
                $('#socialUpdateGitID').val(jsonData[0].git);
                $('#socialUpdateUpID').val(jsonData[0].upwork);
                $('#socialUpdateFreeID').val(jsonData[0].freelancer);
                $('#socialUpdateFiverrID').val(jsonData[0].fiverr);
                $('#socialUpdatePphID').val(jsonData[0].pph);
            } else {
                $('#socialEditLoader').addClass('d-none');
                $('#socialEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#socialEditLoader').addClass('d-none');
            $('#socialEditWrong').removeClass('d-none');
        });

}



//                       Modal Update Confrom btn  

$('#socialUpdateConfirmBtn').click(function() {
    var id = $('#socialUpdateId').html();
    var face = $('#socialUpdateFbID').val();
    var twi = $('#socialUpdateTwitID').val();
    var ig = $('#socialUpdateInsID').val();
    var yt = $('#socialUpdateYtID').val();
    var gi = $('#socialUpdateGitID').val();
    var up = $('#socialUpdateUpID').val();
    var free = $('#socialUpdateFreeID').val();
    var fi = $('#socialUpdateFiverrID').val();
    var pph_m = $('#socialUpdatePphID').val();
    updateSocialData(id,face,twi,ig,yt,gi,up,free,fi,pph_m);

})


//                        Update  Data

function updateSocialData(updateId,face,twi,ig,yt,gi,up,free,fi,pph_m) {
    if (face.length == 0) {
        toastr.error('Facebook Url Requred !');
    } else if (twi.length == 0) {
        toastr.error('Twitter Url Requred !');
    } else if (ig.length == 0) {
        toastr.error('Instagram Url Requred !');
    } else if (yt.length == 0) {
        toastr.error('Youtube Url Requred !');
    } else if (gi.length == 0) {
        toastr.error('GitHub Url Requred !');
    }else if (up.length == 0) {
        toastr.error('Upwork Url Requred !');
    }else if (free.length == 0) {
        toastr.error('Freelancer Url Requred !');
    }else if (fi.length == 0) {
        toastr.error('Fiverr Url Requred !');
    }else if (pph_m.length == 0) {
        toastr.error('PPH Url Requred !');
    } else {
        $('#socialUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateSocialData', {
            id:updateId,
            facebook:face,
            twitter:twi,
            instagram:ig,
            youtube:yt,
            git:gi,
            upwork:up,
            freelancer:free,
            fiverr:fi,
            pph:pph_m
            })
            .then(function(response) {
                $('#socialUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#socialUpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getSocialData();
                } else {
                    $('#socialUpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getSocialData();
                }
            })
            .catch(function(error) {
                $('#socialUpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}

//                   ADD New Btn Click

$('#addNewSocialBtnId').click(function() {
    $('#socialAddModal').modal('show');
})

//                   ADD data confrom btn

$('#socialAddConfirmBtn').click(function() {
    var face = $('#socialAddFbID').val();
    var twi = $('#socialAddTwitID').val();
    var ig = $('#socialAddInsID').val();
    var yt = $('#socialAddYtID').val();
    var gi = $('#socialAddGitID').val();
    var up = $('#socialAddUpID').val();
    var free = $('#socialAddFreeID').val();
    var fi = $('#socialAddFiverrID').val();
    var pph_m = $('#socialAddPphID').val();
    addSocialData(face,twi,ig,yt,gi,up,free,fi,pph_m);

})

//                          Add data 

function addSocialData(face,twi,ig,yt,gi,up,free,fi,pph_m) {
    if (face.length == 0) {
        toastr.error('Facebook Url Requred !');
    } else if (twi.length == 0) {
        toastr.error('Twitter Url Requred !');
    } else if (ig.length == 0) {
        toastr.error('Instagram Url Requred !');
    } else if (yt.length == 0) {
        toastr.error('Youtube Url Requred !');
    } else if (gi.length == 0) {
        toastr.error('GitHub Url Requred !');
    }else if (up.length == 0) {
        toastr.error('Upwork Url Requred !');
    }else if (free.length == 0) {
        toastr.error('Freelancer Url Requred !');
    }else if (fi.length == 0) {
        toastr.error('Fiverr Url Requred !');
    }else if (pph_m.length == 0) {
        toastr.error('PPH Url Requred !');
    }else {
        $('#socialAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addSocialData', {
            facebook:face,
            twitter:twi,
            instagram:ig,
            youtube:yt,
            git:gi,
            upwork:up,
            freelancer:free,
            fiverr:fi,
            pph:pph_m
            })
            .then(function(response) {
                $('#socialAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#socialAddModal').modal('hide');
                    toastr.success('Insert Success');
                    getSocialData();
                } else {
                    $('#socialAddModal').modal('hide');
                    toastr.error('Insert Failed');
                    getSocialData();
                }
            })
            .catch(function(error) {
                $('#socialAddModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}

</script>
@endsection