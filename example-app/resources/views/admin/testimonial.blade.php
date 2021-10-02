@extends('admin.app')

@section('content')

<div id="testimonialmainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
          <button id="addNewTestimonialBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            <table id="" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">TEATIMONIAL NAME</th>
                        <th class="th-sm font-weight-bold">TEATIMONIAL OWNER</th>
                        <th class="th-sm font-weight-bold">TEATIMONIAL IMG</th>
                        <th class="th-sm font-weight-bold">TEATIMONIAL DESCRIPTION</th>
                        <th class="th-sm font-weight-bold">Edit</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="testimonial_table">
  
                </tbody>
            </table>
  
        </div>
    </div>
  </div>
  
  <!-- Loding animation  -->
  <div id="testimonialLoderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>
  
  
  <!-- Something went wrong  -->
  <div id="testimonialWrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>
  

                                       <!-- Delete Modal -->

<div class="modal fade" id="testimonialDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="testimonialDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="testimonialDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>
  
  

                                    <!-- Update Modal -->

<div class="modal fade" id="testimonialUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
          <h5 id="testimonialUpdateId" class="mt-4 "> </h5>
          <div id="testimonialEditForm" class="d-none w-100">
          <input id="testimonialUpdateNameID" type="text" class="form-control mb-4" placeholder="Testimonial Name">
          <input id="testimonialUpdateOwnerID" type="text" class="form-control mb-4" placeholder="Testimonial Owner">
          <input id="testimonialUpdateImgID" type="text" class="form-control mb-4" placeholder="Testimonial Img">
          <input id="testimonialUpdateDesID" type="text" class="form-control mb-4" placeholder="Testimonial Description">
          </div>

          <img id="testimonialEditLoader" class="loading-icon m-5" src="{{asset('img/Loder-2.svg')}}">
          <h5 id="testimonialEditWrong" class="d-none">Something Went Wrong !</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="testimonialUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>



                                    <!-- ADD Services Modal -->

<div class="modal fade" id="testimonialAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          <div id="testimonialAddForm" class=" w-100">
          <h6 class="mb-4">Add New Services</h6>  
          <input id="testimonialNameAddID" type="text" class="form-control mb-4" placeholder="Testimonial Name">
          <input id="testimonialOwnerAddID" type="text" class="form-control mb-4" placeholder="Testimonial Owner">
          <input id="testimonialImgAddID" type="text" class="form-control mb-4" placeholder="Testimonial Img">
          <input id="testimonialDesAddID" type="text" class="form-control mb-4" placeholder="Testimonial Description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button  id="testimonialAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
getTestimonialData();

//                           Testimonial load data 

function getTestimonialData() {
    axios.get('/getTestimonialData')
        .then(function(response) {
            if (response.status == 200) {
                $('#testimonialmainDiv').removeClass('d-none');
                $('#testimonialLoderDiv').addClass('d-none');
                $('#testimonial_table').empty();
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].name + "</td>" +
                        "<td>" + jsonData[i].owner + "</td>" +
                        "<td>" + jsonData[i].img + "</td>" +
                        "<td>" + jsonData[i].des + "</td>" +
                        "<td><a class='testimonialUpdateBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='testimonialDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#testimonial_table');
                });

                //                     Testimonial Delete Btn modal

                $('.testimonialDeleteBtn').click(function() {

                    let id = $(this).data('id');
                    $('#testimonialDeleteId').html(id);
                    $('#testimonialDeleteModal').modal('show');
                })

                //                     Testimonial update Btn modal
                $('.testimonialUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    $('#testimonialUpdateId').html(id);
                    detailsTestimonialData(id);
                    $('#testimonialUpdateModal').modal('show');
                })
            
            } else {
                $('#testimonialLoderDiv').addClass('d-none');
                $('#testimonialWrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#testimonialLoderDiv').addClass('d-none');
            $('#testimonialWrongDiv').removeClass('d-none');
        });
}


//                       Testimonial Modal Delete Confrom btn  

$('#testimonialDeleteConfromBtn').click(function() {
    let id = $('#testimonialDeleteId').html();
    deleteTestimonialData(id);

})

//                           Testimonial  Delete  data 

function deleteTestimonialData(deleteID) {
    $('#testimonialDeleteConfromBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
    axios.post('/deleteTestimonialData', {
            id: deleteID
        })
        .then(function(response) {
            $('#testimonialDeleteConfromBtn').html("YES")
            if (response.data == 1) {
                $('#testimonialDeleteModal').modal('hide');
                toastr.success('Delete Success');
                getTestimonialData();
            } else {
                $('#testimonialDeleteModal').modal('hide');
                toastr.error('Delete Failed');
                getTestimonialData();
            }
        })
        .catch(function(error) {
            $('#testimonialDeleteModal').modal('hide');
            toastr.error('Delete Failed');
        });

}

//                          Re fillup Testimonial Data

function detailsTestimonialData(detailsID) {
    axios.post('/detailsTestimonialData', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#testimonialEditLoader').addClass('d-none');
                $('#testimonialEditForm').removeClass('d-none');
                var jsonData = response.data;
                $('#testimonialUpdateNameID').val(jsonData[0].name);
                $('#testimonialUpdateOwnerID').val(jsonData[0].owner);
                $('#testimonialUpdateImgID').val(jsonData[0].img);
                $('#testimonialUpdateDesID').val(jsonData[0].des);
            } else {
                $('#testimonialEditLoader').addClass('d-none');
                $('#testimonialEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#testimonialEditLoader').addClass('d-none');
            $('#testimonialEditWrong').removeClass('d-none');
        });

}



//                       Testimonial Modal Update Confrom btn  

$('#testimonialUpdateConfirmBtn').click(function() {
    var id = $('#testimonialUpdateId').html();
    var name = $('#testimonialUpdateNameID').val();
    var owner = $('#testimonialUpdateOwnerID').val();
    var img = $('#testimonialUpdateImgID').val();
    var des = $('#testimonialUpdateDesID').val();
    updateTestimonialData(id,name,owner,img,des);

})


//                        Update Testimonial Data

function updateTestimonialData(updateId, name, owner,img,des) {
    if (name.length == 0) {
        toastr.error('Name Requred !');
    } else if (owner.length == 0) {
        toastr.error('Owner Requred !');
    } else if (img.length == 0) {
        toastr.error('Image Requred !');
    }else if (des.length == 0) {
        toastr.error('Description Requred !');
    } else {
        $('#testimonialUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/updateTestimonialData', {
            id:updateId,
            name: name,
            owner: owner,
            img: img,
            des: des
            })
            .then(function(response) {
                $('#testimonialUpdateConfirmBtn').html("UPDATE")
                if (response.data == 1) {
                    $('#testimonialUpdateModal').modal('hide');
                    toastr.success('Update Success');
                    getTestimonialData();
                } else {
                    $('#testimonialUpdateModal').modal('hide');
                    toastr.error('Update Failed');
                    getTestimonialData();
                }
            })
            .catch(function(error) {
                $('#testimonialUpdateModal').modal('hide');
                toastr.error('Update Failed');
            });
    }

}

//                   ADD New Btn Click

$('#addNewTestimonialBtnId').click(function() {
    $('#testimonialAddModal').modal('show');
})

//                   ADD Testimonial data confrom btn

$('#testimonialAddConfirmBtn').click(function() {
    var name = $('#testimonialNameAddID').val();
    var owner = $('#testimonialOwnerAddID').val();
    var img = $('#testimonialImgAddID').val();
    var des = $('#testimonialDesAddID').val();
    addTestimonialData(name, owner,img,des);

})

//                          Add  Testimonial  data 

function addTestimonialData(name, owner,img,des) {
    if (name.length == 0) {
        toastr.error('Name Requred !');
    } else if (owner.length == 0) {
        toastr.error('Owner Requred !');
    } else if (img.length == 0) {
        toastr.error('Image Requred !');
    }else if (des.length == 0) {
        toastr.error('Description Requred !');
    }else {
        $('#testimonialAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") // Animation ......
        axios.post('/addTestimonialData', {
            name: name,
            owner: owner,
            img: img,
            des: des
            })
            .then(function(response) {
                $('#testimonialAddConfirmBtn').html("SAVE")
                if (response.data == 1) {
                    $('#testimonialAddModal').modal('hide');
                    toastr.success('Insert Success');
                    getTestimonialData();
                } else {
                    $('#testimonialAddModal').modal('hide');
                    toastr.error('Insert Failed');
                    getTestimonialData();
                }
            })
            .catch(function(error) {
                $('#testimonialAddModal').modal('hide');
                toastr.error('Insert Failed');
            });
    }

}

</script>
@endsection