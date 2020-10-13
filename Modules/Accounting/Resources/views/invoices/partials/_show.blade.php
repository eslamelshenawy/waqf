<div class="tab-pane fade show" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
    <div class="d-sm-flex mb-5" data-view="print">
        <span class="m-auto"></span>
        <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
    </div>
    <!---===== Print Area =======-->
    <div id="print-area">
        <div class="row">
            <div class="col-md-6">
                <h4 class="font-weight-bold">Order Info</h4>
                <p>#106</p>
            </div>
            <div class="col-md-6 text-sm-right">
                <p><strong>Order status: </strong> Delivered</p>
                <p><strong>Order date: </strong> 10 Dec, 2018</p>
            </div>
        </div>
        <div class="mt-3 mb-4 border-top"></div>
        <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-sm-0">
                <h5 class="font-weight-bold">Bill From</h5>
                <p>New Age Inc.</p>
                <span style="white-space: pre-line">
                                            rodriguez.trent@senger.com
                                            61 Johnson St. Shirley, NY 11967.

                                            +202-555-0170
                                        </span>
            </div>
            <div class="col-md-6 text-sm-right">
                <h5 class="font-weight-bold">Bill To</h5>
                <p>UI Lib</p>
                <span style="white-space: pre-line">
                                            sales@ui-lib.com
                                            8254 S. Garfield Street. Villa Rica, GA 30180.

                                            +1-202-555-0170
                                        </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover mb-4">
                    <thead class="bg-gray-300">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Product 1</td>
                        <td>300</td>
                        <td>2</td>
                        <td>600</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Product 2</td>
                        <td>200</td>
                        <td>3</td>
                        <td>600</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <div class="invoice-summary">
                    <p>Sub total: <span>$1200</span></p>
                    <p>Vat: <span>$120</span></p>
                    <h5 class="font-weight-bold">Grand Total: <span> $1320</span></h5>
                </div>
            </div>
        </div>
    </div>
    <!--==== / Print Area =====-->
</div>