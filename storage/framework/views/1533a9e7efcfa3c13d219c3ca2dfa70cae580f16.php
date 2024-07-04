<?php
    $users = \Auth::user();
    $businesses = App\Models\Business::allBusiness();
    $currantBusiness = $users->currentBusiness();
    $bussiness_id = $users->current_business;
?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Leads Campaign')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Leads Campaign')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Leads Campaign')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .export-btn {
            float: right;
        }
    </style>


    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="list-unstyled">
                        <li class="dropdown dash-h-item drp-language">
                            <a class="dash-head-link dropdown-toggle arrow-none me-0 cust-btn shadow-sm border border-success"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-original-title="<?php echo e(__('Select your bussiness')); ?>">
                                <i class="ti ti-credit-card"></i>
                                <span class="drp-text hide-mob"><?php echo e(__(ucfirst($currantBusiness))); ?></span>
                                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                            </a>
                            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end page-inner-dropdowm">
                                <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('business.change', $key)); ?>" class="dropdown-item">
                                        <i
                                            class="<?php if($bussiness_id == $key): ?> ti ti-checks text-primary <?php elseif($currantBusiness == $business): ?> ti ti-checks text-primary <?php endif; ?> "></i>
                                        <span><?php echo e(ucfirst($business)); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    </ul>
					<div>
					
					
					<a href="<?php echo e(route('leads.export')); ?>" class="btn btn-primary export-btn">
						Export All Leads
					</a>
					
					<a href="<?php echo e(route('leadcontact.index')); ?>" class="btn btn-primary export-btn" style="background-color: aliceblue;color: black;margin-right: 5px;">
						View All Leads
					</a>
					</div>
					

                    
                    
                </div>
                <div class="table-responsive">
                    <table class="table" id="pc-dt-export">
                        <thead>
                            <tr><th><?php echo e(__('#')); ?></th>
                                <th><?php echo e(__('Campaign Name')); ?></th>
                                <th><?php echo e(__('Total Leads')); ?></th>
								<th><?php echo e(__('Created On')); ?></th>
                                <th id="ignore"><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leadGeneration_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$leadCount = App\Models\LeadContact::where('campaign_id', $val->id)->count();
										
							?>
                                <tr>
									<td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($val->title); ?></td>
                                    <td><?php echo e($leadCount); ?></td>
									<td><?php echo e(\Carbon\Carbon::parse($val->created_at)->format('j F, Y')); ?></td>
									
                                    
                                    
                                    
                                    <div class="row ">
                                        <td class="d-flex">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete contact')): ?>
                                                <div class="action-btn bg-info  ms-2" style="width:100px; padding: 0 60px;">
                                                    <a href="<?php echo e(route('campaign.lead', $val->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('View Lead')); ?>"> <span
                                                            class="text-white" > <i
                                                                class="ti ti-brand-google-analytics  text-white"></i></span><span style="margin-left:5px; padding-right:5px">View Leads</span></a>
                                                </div>
                                            
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['leadcontact.destroy', $val->id],
                                                    'id' => 'delete-form-' . $val->id,
                                                ]); ?>

                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                            
                                        </td>

                                    </div>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
    <script>
        const table = new simpleDatatables.DataTable("#pc-dt-export", {
            searchable: true,
            fixedheight: true,
            dom: 'Bfrtip',
        });
        $('.csv').on('click', function() {
            $('#ignore').remove();
            $("#pc-dt-export").table2excel({
                filename: "contactDetail"
            });
            setTimeout(function() {
                location.reload();
            }, 2000);
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\firstlink\resources\views/leadcontact/campaign.blade.php ENDPATH**/ ?>