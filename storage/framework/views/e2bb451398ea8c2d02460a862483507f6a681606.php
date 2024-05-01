<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('message')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session()->get('error')); ?>

                                </div>
                            <?php endif; ?>

                            <h3 class="font-weight-bold">Hi, <?php echo e(Auth::user()->f_name); ?> <?php echo e(Auth::user()->l_name); ?></h3>
                            <h6 class="font-weight-normal mb-0">Fund History<span class="text-primary"></span>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">



                <div class="col-md-6 grid-margin stretch-card">

                </div>

                <div class="col-md-6 grid-margin stretch-card">

                </div>











                <div class="col-md-12 grid-margin transparent">
                    <div class="row">

                        <div class="col-md-4 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">My Wallet</p>
                                    <p class="fs-30 mb-4">NGN <?php echo e(number_format(Auth::user()->wallet)); ?></p>

                                    <div class="modal fade" id="pay" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title btn-fw text-dark" id="staticBackdropLabel">Fund
                                                        your Wallet</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>


                                                <div class="modal-body">


                                                    <form method="POST" action="<?php echo e(route('pay')); ?>"
                                                        accept-charset="UTF-8">

                                                        <div class="form-group col-lg-8">
                                                            <h5 class="mb-2 text-dark">Enter Amount to Fund(NGN)</h5>
                                                            <input type="number" required
                                                                class="form-control form-control-lg mt-3" name="amount"
                                                                id="exampleInputPassword1" placeholder="200">
                                                        </div>




                                                        <input type="hidden" name="email"
                                                            value="<?php echo e(Auth::user()->email); ?>">
                                                        




                                                        <input type="hidden" name="currency" value="NGN">

                                                        <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                                        
                                                        <input type="hidden" name="orderID" value="477747473838383">
                                                        
                                                        <input type="hidden" name="quantity" value="3">
                                                        <input type="hidden" name="currency" value="NGN">
                                                       
                                                        <input type="hidden" name="reference"
                                                            value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        


                                                


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <button class="btn btn-primary btn-lg btn-block"
                                                                    type="submit" value="Pay Now!">

                                                                    <i class="fa fa-plus-circle fa-lg"></i> Pay
                                                                    Now!</button>
                                                            </div>

                                                        </div>






                                                    </form>

                                                </div>










                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-inverse-primary btn-fw text-white"
                                        data-bs-toggle="modal" data-bs-target="#pay">
                                        Fund Wallet
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Successful Funding</p>
                                    <p class="fs-30 mb-4"><?php echo e($successful_funding); ?></p>
                                    <p>Total Funding Count</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Money IN</p>
                                    <p class="fs-30 mb-4">NGN<?php echo e(number_format($money_in), 2); ?></p>
                                    <p>Total Money Fundend</p>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>




            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">All Funding</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Trx ID</th>
                                                    <th>Amount(NGN)</th>
                                                    <th>Balance(NGN)</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Time</th>


                                                </tr>


                                            </thead>

                                            <tbody class="table-border-bottom-0">



                                                <?php $__empty_1 = true; $__currentLoopData = $funding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($data->ref_trans_id); ?></td>
                                                        <td><?php echo e(number_format($data->amount)); ?></td>
                                                        <td><?php echo e(number_format($data->balance)); ?></td>
                                                        <?php if($data->status == 0): ?>
                                                            <td><span
                                                                    class="badge rounded-pill bg-warning text-white">Pending</span>
                                                            </td>
                                                        <?php elseif($data->status == 1): ?>
                                                            <td><span
                                                                    class="badge rounded-pill bg-success text-white">Completed</span>
                                                            </td>
                                                        <?php elseif($data->status == 3): ?>
                                                            <td><span
                                                                    class="badge rounded-pill bg-danger text-white">Declined</span>
                                                            </td>
                                                        <?php endif; ?>
                                                        <td><?php echo e(date('F d, Y', strtotime($data->created_at))); ?></td>
                                                        <td><?php echo e(date('h:i:s A', strtotime($data->created_at))); ?></td>


                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr colspan="20" class="text-center">No History Found</tr>
                                                <?php endif; ?>







                                            </tbody>
                                            <?php echo $funding->appends(Request::all())->links(); ?>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fundhistory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/watersupply/resources/views/funding.blade.php ENDPATH**/ ?>