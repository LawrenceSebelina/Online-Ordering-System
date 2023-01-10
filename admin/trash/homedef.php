<div class="col-md-12">
                    <div class="card border-custom-green mb-3">
                        <div class="border border-light border-5 rounded">
                            <div class="card-header bg-custom-green text-light d-flex align-items-center fw-bold">
                                <i class='bx bx-money fs-3 me-2'></i>Sales
                            </div>
                            <div class="card-body bg-success bg-opacity-25">
                                <div class="row g-4">
                                    <div class="col-12 col-lg-4">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Weekly Sales</p>
                                            <h3>₱<span class="counter"><?php echo $weeklySale ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Monthly Sales</p>
                                            <h3>₱<span class="counter"><?php echo $monthlySale ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Yearly Sales</p>
                                            <h3>₱<span class="counter"><?php echo $yearlySale ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card border-custom-green mb-3">
                        <div class="border border-light border-5 rounded">
                            <div class="card-header bg-custom-green text-light d-flex align-items-center fw-bold">
                                <i class='bx bxs-cart-alt fs-3 me-2'></i>Total Products
                            </div>
                            <div class="card-body bg-success bg-opacity-25">
                                <div class="row g-4">
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-secondary text-center text-light p-3">
                                            <p class="fw-bold">All Products</p>
                                            <h3><span class="counter"><?php echo $countProducts ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Good Stock</p>
                                            <h3><span class="counter"><?php echo $countGoodProducts ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-warning text-center text-light p-3">
                                            <p class="fw-bold">Critical</p>
                                            <h3><span class="counter"><?php echo $countCriticalProducts ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-danger text-center text-light p-3">
                                            <p class="fw-bold">Out of Stock</p>
                                            <h3><span class="counter"><?php echo $countStockoutProducts ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>    
                </div>

                <div class="col-md-12">
                    <div class="card border-custom-green mb-3">
                        <div class="border border-light border-5 rounded">
                            <div class="card-header bg-custom-green text-light d-flex align-items-center fw-bold">
                                <i class='bx bxs-package fs-3 me-2'></i>Orders
                            </div>
                            <div class="card-body bg-success bg-opacity-25">
                                <div class="row g-4">
                                    <div class="col-12 col-lg-4">
                                        <div class="border-custom-green rounded bg-primary text-center text-light p-3">
                                            <p class="fw-bold">All Orders</p>
                                            <h3><span class="counter"><?php echo $countOrders ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="border-custom-green rounded bg-primary text-center text-light p-3">
                                            <p class="fw-bold">Approved Orders</p>
                                            <h3><span class="counter"><?php echo $countOrdersApproved ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="border-custom-green rounded bg-primary text-center text-light p-3">
                                            <p class="fw-bold">Delivered Orders</p>
                                            <h3><span class="counter"><?php echo $countOrdersDelivered ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card border-custom-green mb-3">
                        <div class="border border-light border-5 rounded">
                            <div class="card-header bg-custom-green text-light d-flex align-items-center fw-bold">
                                <i class='bx bx-wrench fs-3 me-2'></i>Service Installation Requests
                            </div>
                            <div class="card-body bg-success bg-opacity-25">
                                <div class="row g-4">
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">All Service Requests</p>
                                            <h3><span class="counter"><?php echo $countServiceReqs ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Assigned Service Reqs</p>
                                            <h3><span class="counter"><?php echo $countSRAssigned ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Declined Service Reqs</p>
                                            <h3><span class="counter"><?php echo $countSRDeclined ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="border-custom-green rounded bg-success text-center text-light p-3">
                                            <p class="fw-bold">Done Service Reqs</p>
                                            <h3><span class="counter"><?php echo $countSRDone ?? ""; ?></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>