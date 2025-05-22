<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Create Sales Person</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="UpdateSalesPersonForm" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-1">
                            <div class="col-md-12">
                               <div class="col-md-12">
                                <div class="form-group border-fullname">
                                    <label for="fullname">Sales Person Fullname</label>
                                     <input type="text" class="form-control" id="u_fullname" name="u_fullname" required="">
                                    <small class='error-message' id="error-fullname"></small>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="offset-md-8 col-md-4 " id="SIAdditem">
                    <a class="cBtn button addItemSoldUpdate">
                        Add Item Sold
                    </a> 
               </div>

                <div>
                    <div class="row mb-3" id="tableItemSoldUpdate">
                       <div class="col-md-12">
                          <table class="table table-sm table-bordered w-100" id="PO-table" >
                             <thead style="font-size: 12px;">
                                <tr class="text-center bg-primary">
                                  
                                   <th width="50%">Item Name</th>
                                   <th width="40%">Amount</th>
                                    <th width="10%"></th>
                                   <!-- <th width="1%"></th> -->
                                </tr>
                             </thead>
                             <tbody id="tbodyItemSoldlistUpdate">
                             </tbody>
                          </table>
                       </div>
                    </div>
                  </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
    </div>
  </div>
</div>
