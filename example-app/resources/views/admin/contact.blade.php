@extends('admin.app')

@section('content')

<div id="contactMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm font-weight-bold">Name</th>
                        <th class="th-sm font-weight-bold">Email</th>
                        <th class="th-sm font-weight-bold">Phone</th>
                        <th class="th-sm font-weight-bold">Website</th>
                        <th class="th-sm font-weight-bold">Massege</th>
                        <th class="th-sm font-weight-bold">Create_date</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                </thead>
                <tbody id="contact_table">
  
                </tbody>
            </table>
  
        </div>
    </div>
  </div>
  
  <!-- Loding animation  -->
  <div id="contactLoderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <img src="{{asset('img/loder-1.svg')}}">
        </div>
    </div>
  </div>
  
  
  <!-- Something went wrong  -->
  <div id="contactWrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center mt-5 p-5">
            <h3>Something went wrong</h3>
        </div>
    </div>
  </div>




                                       <!-- Delete Modal -->

<div class="modal fade" id="contactDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">Do You Want To Delete</div>
            <h4 id="contactDeleteId" class="modal-body text-center"></h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="contactDeleteConfromBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
  </div>


@endsection

@section('script')
<script type="text/javascript">
getContactData();

</script>
@endsection