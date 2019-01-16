<table class="table table-bordered" id="calender">
    <thead class="week-days">
    <tr>
        <?php $weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'];?>
        <?php $__currentLoopData = $weekDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th>
                <?php echo e($day); ?>

            </th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    </thead>
    <?php
    $year = date('Y');
    $dayDiff = \Carbon\Carbon::parse("{$year}-{$month}-01")->dayOfWeek - 1;
    $dayDiff = $dayDiff == -1 ? 6 : $dayDiff;
    $prevMonth = \Carbon\Carbon::parse($year . '-' . $month . '-01')->subMonth();
    $endOfPrevMonth = $prevMonth->endOfMonth()->format('d');
    $startFromPrevMonth = $endOfPrevMonth - $dayDiff;
    $count = 1;
    $today = date('d');
    ?>
    <tbody class="">
    <tr>
        <?php for($i=$startFromPrevMonth;$i<=$endOfPrevMonth;$i++): ?>
            <?php
            $date = ($year . '-' . $prevMonth->format('m') . '-' . ($i < 10 ? '0' . $i : $i));
            $weekDay = \Carbon\Carbon::parse($date)->dayOfWeek;
            ?>
            <td>
                <a href="#" data-date="<?php echo e($date); ?>" data-url="<?php echo e($url); ?>" disabled="true"
                   class="disabled js-calender-date "><?php echo e($i<10 ? '0'.$i:$i); ?>


                </a>
            </td>
            <?php if($count%7==0): ?>
    </tr>
    <tr>
        <?php endif; ?>
        <?php $count++;?>
        <?php endfor; ?>
        <?php for($i=1;$i<=$endOfTheMonth;$i++): ?>
            <?php
            $date = $year . '-' . $month . '-' . ($i < 10 ? '0' . $i : $i);
            $weekDay = \Carbon\Carbon::parse($date)->dayOfWeek;
            ?>

            <td class="<?php echo e($today==$i ? 'today':''); ?>">
                <a href="#" data-date="<?php echo e($date); ?>" data-url="<?php echo e($url); ?>" class="js-calender-date">
                    <span style="display: block;" ><?php echo e($i<10 ? '0'.$i:$i); ?></span>
                    <?php $__currentLoopData = $allSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($date === \Carbon\Carbon::parse($schedule->schedule_start_time)->format('Y-m-d')): ?>
                            <span style="font-size:10px;max-width:150px;margin:0;font-weight: normal;display: inline-block;">
                            <span class="text-danger"><i
                                        class="fa fa-circle"></i></span> <?php echo e($schedule->subject->name); ?>    <?php echo e(\Carbon\Carbon::parse($schedule->schedule_start_time,'UTC')->tz('Asia/Calcutta')->format('d M Y g:i A').'-'.\Carbon\Carbon::parse($schedule->schedule_end_time,'UTC')->tz('Asia/Calcutta')->format('d M Y g:i A')); ?>

                        </span>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </a>
            </td>
            <?php if($count%7==0): ?>
    </tr>
    <tr>
        <?php endif; ?>
        <?php $count++;?>
        <?php endfor; ?>
    </tr>
    </tbody>
</table>